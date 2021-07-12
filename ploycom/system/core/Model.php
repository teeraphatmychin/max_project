<?php /**
 *
 */
class Model
{
    private $database = [];
    public $db;
    function __construct()
    {
        $this->db = $this->db();
    }
    public function db()
    {
        // require_once 'app/config/database.php';
        require 'application/config/database.php'; // ที่ไม่ใช้ require_once เพราะว่ามันมีการเชื่อมมากกว่าหนึ่งครั้ง
        $this->database = $db;
        $db_host = $this->database['hostname'];
        $db_name = $this->database['database'];
        $db_user = $this->database['username'];
        $db_pass = $this->database['password'];
        $db_driver = $this->database['dbdriver'];
        $char_set = $this->database['char_set'];
        try{
            return $con = new PDO(
                "$db_driver:host=$db_host;dbname=$db_name",$db_user,$db_pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES $char_set"));
        }catch(PDOException $error){
                echo $error->getMessage();
        }
    }
    public function select($data=[],$check='')
    {
        $tableName = isset($data['table']) ? $data['table'] : $this->table;
        $select = (isset($data['select']) and !empty($data['select'])) ? $data['select'] : '*';
        $where = isset($data['where']) ? 'WHERE '.$data['where'] : '';
        $order_by = isset($data['order_by']) ? 'ORDER BY '.$data['order_by'] : '';
        $group_by = isset($data['group_by']) ? 'GROUP BY '.$data['group_by'] : '';
        $limit = isset($data['limit']) ? 'LIMIT '.$data['limit'] : '';
        $str = "SELECT $select FROM $tableName $where $order_by $group_by $limit";
        $result = $this->db->query($str);
        if ($check != ''):
            echo $str;exit;
        endif;
        if ($result !== false):
            return $result->fetchAll(PDO::FETCH_OBJ);
        else:
            return false;
        endif;
        $con = null;
    }
    public function insert($data=[])
    {
        if(isset($data['table'])):
            $tableName = $data['table'];
            unset($data['table']);
        else:
            $tableName = $this->table;
        endif;
        $columns=array_keys($data['data']);
        $values=array_values($data['data']);
        $str = "INSERT INTO $tableName (".implode(',',$columns).") VALUES('".implode("', '", $values)."')";
        $result = $this->db->prepare($str);
        $result->execute();
        $conn = null;
        // echo $str;exit;
        if ($result !== false):
            return true;
        else:
            return false;
        endif;

    }
    public function delete($data=[])
    {
        $check = $this->validate($data);
        if ($check):
            $tableName = isset($data['table']) ? $data['table'] : $this->table;
            $where = isset($data['where']) ? 'WHERE '.$data['where'] : '';
            $result = $this->db->query("DELETE FROM $tableName $where");
            if ($result !== false):
                return $result;
            else:
                return false;
            endif;
        else:
            echo "validate fail";
        endif;
    }
    public function update($data=[],$check='',$method='')
    {
        if(isset($data['table'])):
            $tableName = $data['table'];
            // unset($data['table']);
        else:
            $tableName = $this->table;
        endif;
        // $check = $this->validate($data);
        // if ($check) {
            $columns=array_keys($data['data']);
            $values=array_values($data['data']);
            $dat = '';
            if($method != ''):
                for ($i=0; $i < count($columns) ; $i++) {
                    $dat .= $columns[$i].'= '.$values[$i].',';
                }
            else:
                for ($i=0; $i < count($columns) ; $i++) {
                    $dat .= $columns[$i].'= "'.$values[$i].'",';
                }
            endif;
            $dat = substr($dat,0,-1);

            $where = isset($data['where']) ? 'WHERE '.$data['where'] : '';
            $str = "UPDATE $tableName SET $dat $where";
            $result = $this->db->query("UPDATE $tableName SET $dat $where");
            if ($check != ''):
                echo $str;exit;
            endif;
            return true;exit;
        // }else {
        //     return "validate fail";exit;
        // }

    }
    public function validate($data)
    {
        $con =  array();
        // $con['table'] = $this->table;
        $con['table'] = isset($data['table']) ? $data['table'] : $this->table;
        $con['where'] = $data['where'];
        $result = $this->select($con);
        if ($result):
            return $result;
        else:
            return false;
        endif;
    }



}
 ?>
