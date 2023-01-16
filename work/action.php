<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'batch'	=>	$_POST['batch'],
			'gname'	=>	$_POST['gname'],
			'title'		=>	$_POST['title'],
			'intro'	=>	$_POST['intro'],
			'subhead'	=>	$_POST['subhead'],
			'points'	=>	$_POST['points'],
			'linkedin'	=>	$_POST['linkedin'],
			'youtube'	=>	$_POST['youtube'],
			'image'	=>	$_POST['image']
		);
		$api_url = "http://localhost/rest-api-crud-using-php/api/test_api.php?action=insert";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/rest-api-crud-using-php/api/test_api.php?action=fetch_single&id=".$id."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'batch'	=>	$_POST['batch'],
			'gname'	=>	$_POST['gname'],
			'title'		=>	$_POST['title'],
			'intro'	=>	$_POST['intro'],
			'subhead'	=>	$_POST['subhead'],
			'points'	=>	$_POST['points'],
			'linkedin'	=>	$_POST['linkedin'],
			'youtube'	=>	$_POST['youtube'],
			'image'	=>	$_POST['image'],
			'id'			=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/rest-api-crud-using-php/api/test_api.php?action=update";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/rest-api-crud-using-php/api/test_api.php?action=delete&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>