<?php
    $result=file_get_contents("http://localhost/rest-api-crud-using-php/json.php");
    $data=json_decode($result,true);
?>  
<?php $i=1; foreach($data as $list){ ?>
  <h5><?php echo $list['title']; ?></h5>
<?php } ?>