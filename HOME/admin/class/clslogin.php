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
	function mylogin($email,$password)
	{
	 	$password=md5($password);
		$link=$this->connect();
		$sql="select id, email, password from tk_admin where email='$email' and password ='$password' limit 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		echo $i;
		if($i==1)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$email = $row['email'];
				$password = $row['password'];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['email']=$email;
				$_SESSION['password']=$password;
			}
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
		$sql="select id from tk_admin where id='$id' and email='$email' and password='$password' limit 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			header('location:../Login_admin.php');
		}
	}

}
?>