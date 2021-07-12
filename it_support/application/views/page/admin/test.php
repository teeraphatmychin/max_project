<form class="" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" value="" multiple>
    <input type="submit" name="submit" value="upload">
</form>



<?php
// แนวตั้ง วัด width มากกว่า height คือภาพแนวตั้ง
    // หาว่า width_old - x = width_config หาเปอเซ็นต์ แล้วเอาเปอเซ็นต์ไปใช้กับ height และ width
// exit;
// paramiter | path files newsize suffix
$data['upload_path'] = '../it_support/public/file/images/issue/' ;
$data['file'] = $_FILES;
// $data['new_size'] = '1920/1080';
// $data['new_size'] = '1366';
$data['suffix'] = 'issue'; // ต่อท้ายชื่อรูปภาพ
$data['path_image'] = $this->public_url();
$test = it_upload_image($data);
// echo "<pre>";print($test);exit;
echo "<img src='".$test[0]."'>";
function it_upload_image($data = [])
{
    $files = '';
    $new_height = 0;
    $file_new_name = '';
    $path_image = array();
    $full_path = explode('public/',$data['upload_path']);
    $full_path = $data['path_image'].$full_path[1];
    if(isset($data['upload_path']) and !empty($data['upload_path'])):
        $path = $data['upload_path'];
    else:
        echo 'Enter your path for uploading image. Please..';exit;
    endif;
    if(!empty($data['new_size'])):
        if(strpos($data['new_size'],'/') == false):
            $new_width = $data['new_size'];
        else:
            $new_size = explode('/',$data['new_size']);
            $new_width = $new_size[0];
            $new_height = $new_size[1];
        endif;
    else:
        $new_width = 1920;
    endif;
    if(!isset($data['file']) or count($data['file']) < 1):
        echo "Choose your file for upload";exit;
    endif;

    if(!is_array($data['file'][array_key_first($data['file'])]['name'])):
        $data['file'][array_key_first($data['file'])]['name'] = array(0 => $data['file'][array_key_first($data['file'])]['name']);
        $data['file'][array_key_first($data['file'])]['type'] = array(0 => $data['file'][array_key_first($data['file'])]['type']);
        $data['file'][array_key_first($data['file'])]['tmp_name'] = array(0 => $data['file'][array_key_first($data['file'])]['tmp_name']);
        $data['file'][array_key_first($data['file'])]['error'] = array(0 => $data['file'][array_key_first($data['file'])]['error']);
        $data['file'][array_key_first($data['file'])]['size'] = array(0 => $data['file'][array_key_first($data['file'])]['size']);
    endif;
        $files = $data['file'][array_key_first($data['file'])]; //get key array อยากตั้งชื่อตัวแปรอะไรที่ input ก็ได้
        foreach ($files['name'] as $key => $value):
            $file_new_name = !empty($data['suffix'])? time().'_'.$data['suffix'] : time();
            $ext = '.'.pathinfo($files['name'][$key], PATHINFO_EXTENSION); //get last name file
            if(count($files['name']) > 1):
                $file_new_name = !empty($data['suffix'])? time().'_'.$data['suffix'].($key+1) : time().'_group'.($key+1); // new name file when multi upload
            endif;
            $sourceProperties = getimagesize($files['tmp_name'][$key]);
            switch ($sourceProperties['mime']):
                case 'image/png':
                    $imageResourceId = @ImageCreateFromPNG($files['tmp_name'][$key]);
                    break;
                case 'image/jpeg':
                    $imageResourceId = @ImageCreateFromJPEG($files['tmp_name'][$key]);
                    break;
                default:
                    break;
            endswitch;
            $new_height = empty($new_height)? round($new_width*$sourceProperties[1]/$sourceProperties[0]) : $new_height; // get new size if have no paramiter
            if($sourceProperties[1] > $sourceProperties[0]): // $sourceProperties[0] คือ $width_old
                if($sourceProperties[0] > $new_width):// width_old - x = width_config
                    //กรณีภาพแนงตั้งให้สลับ width กับ height ของแนวนอน
                    $new_height = $new_width;
                    $new_width = round($new_height*$sourceProperties[0]/$sourceProperties[1]);
                    $targetLayer = image_resize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$new_width,$new_height);
                    imagejpeg($targetLayer,$path.$file_new_name.$ext);
                    imageDestroy($targetLayer);
                else:
                    move_uploaded_file($files['tmp_name'][$key],$path.$file_new_name.$ext);
                endif;
            else:
                if($sourceProperties[0] > $new_width):
                    $targetLayer = image_resize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$new_width,$new_height);
                    imagejpeg($targetLayer,$path.$file_new_name.$ext);
                    imageDestroy($targetLayer);
                else:
                    move_uploaded_file($files['tmp_name'][$key],$path.$file_new_name.$ext);
                endif;
            endif;
            $path_image[$key] = $full_path.$file_new_name.$ext;
        endforeach;

        return $path_image;
}
function image_resize($imageResourceId,$width,$height,$new_width,$new_height) {
    $targetLayer=imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$new_width,$new_height, $width,$height);
    return $targetLayer;
}




?>
