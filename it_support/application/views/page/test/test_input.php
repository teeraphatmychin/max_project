<form class="" method="post">
    <select class="" name="test[]">
        <option value="">0</option>
        <option value="test1">test1</option>
        <option value="test2">test2</option>
        <option value="test3">test3</option>
    </select>
    <select class="" name="test[]">
        <option value="">0</option>
        <option value="testest1">testest1</option>
        <option value="testest2">testest2</option>
        <option value="testest3">testest3</option>
    </select>
    <input type="submit" name="" value="ok">
</form>
<?php
echo "<pre>";print_r($_POST);exit;
 ?>
