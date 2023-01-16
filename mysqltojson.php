<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","","testing") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from tbl_sample";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $garray[] = $row;
    }
 
    //write to json file
    $fp = fopen('guestdata.json', 'w');
    fwrite($fp, json_encode($garray));
    fclose($fp);

    //close the db connection
    mysqli_close($connection);  
?>