<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM tbl_sample ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["batch"]))
		{
			$form_data = array(
				':batch'		=>	$_POST["batch"],
				':gname'		=>	$_POST["gname"],				
				':title'		=>	$_POST["title"],
				':intro'		=>	$_POST["intro"],
				':subhead'		=>	$_POST["subhead"],
				':points'		=>	$_POST["points"],
				':linkedin'		=>	$_POST["linkedin"],
				':youtube'		=>	$_POST["youtube"],
				':image'		=>	$_POST["image"]
			);
			$query = "
			INSERT INTO tbl_sample 
			(batch,title,intro,subhead,points,linkedin,youtube,image,gname) VALUES 
			(:batch,:title,:intro,:subhead,:points,:linkedin,:youtube,:image,:gname)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM tbl_sample WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['batch'] = $row['batch'];
				$data['gname'] = $row['gname'];
				$data['title'] = $row['title'];
				$data['intro'] = $row['intro'];
				$data['subhead'] = $row['subhead'];
				$data['points'] = $row['points'];
				$data['linkedin'] = $row['linkedin'];
				$data['youtube'] = $row['youtube'];
				$data['image'] = $row['image'];
			
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["batch"]))
		{
			$form_data = array(
				':batch'	=>	$_POST['batch'],
				':gname'	=>	$_POST['gname'],
				':title'	=>	$_POST['title'],
				':intro'	=>	$_POST['intro'],
				':subhead'	=>	$_POST['subhead'],
				':points'	=>	$_POST['points'],
				':linkedin'	=>	$_POST['linkedin'],
				':youtube'	=>	$_POST['youtube'],
				':image'	=>	$_POST['image'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE tbl_sample 
			SET batch = :batch, gname = :gname, title = :title, intro = :intro, subhead = :subhead, points = :points, linkedin = :linkedin, youtube = :youtube,image = :image
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM tbl_sample WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>