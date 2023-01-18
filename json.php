<?php
header('Access-Control-Allow-Origin: *');
$con = mysqli_connect("localhost","root","","testing");
$response = array();
if(isset($_REQUEST['filter'])){
	$bat=$_REQUEST['filter'];
}
else{
	$bat="Batch 2022-2023";
}
if($con){
	$sql="SELECT * FROM tbl_sample WHERE batch='$bat'";
	$result = mysqli_query($con, $sql);
	if($result){
		header("Content-Type: application/json; charset=UTF-8");
		$i=0;
		while($row = mysqli_fetch_assoc($result)){
			$response[$i]['id'] = $i;
			$response[$i]['batch']= $row['batch'];
			$response[$i]['title']= $row['title'];
			$response[$i]['gname']= $row['gname'];
			$response[$i]['intro']= $row['intro'];
			$response[$i]['subhead']= $row['subhead'];
			$response[$i]['points']= $row['points'];
			$response[$i]['linkedin']= $row['linkedin'];
			$response[$i]['youtube']= $row['youtube'];
			$response[$i]['image']= $row['image'];
			$i++;
		}
			echo json_encode($response, JSON_PRETTY_PRINT);
	}
}
else{
	echo "Database connection failed";
}
?>