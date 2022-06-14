<?php
class login
{
	private function connect()
	{
		$con = mysql_connect(SERVERNAME, USERNAME, PASSWORD);	
		if (!$con)
		{
   			echo "Connection failed";
			exit();
		}
		else
		{
			mysql_select_db(DATABASE);
			mysql_query("SET NAMES UTF8");	
			return $con;
		}
	}
	function cruser($email,$password,$ten,$hodem)
	{
	 	$password=md5($password);
		$link=$this->connect();
		$sql1="SELECT FROM tk_uesr where email='$email'"; 
		$ketqua1=mysql_query($sql1,$link);
		echo $ketqua1;
		$sql="INSERT INTO tk_user (email ,password ,ten ,hodem) VALUES ('$email', '$password', '$ten', '$hodem')";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i==1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function confirmlogin($id,$email,$password)
	{
		$link=$this->connect();
		$sql="select id from taikhoan where id='$id' and email='$email' and password='$password' limit 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			header('location:login.php');
		}
	}

}

?>