<?php

	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['password']))
	{

		/*include("class/clslogin.php");
		$q = new login();
		$q->confirmlogin($_SESSION['id'], $_SESSION['email'], $_SESSION['password']);
		*/
		require('header.php');
		if (isset($_GET['controller']))
		{
			$controller = $_GET['controller'];
		} 
		else
		{
			$controller = '';
		}
		switch ($controller) {
			case 'test':
				echo "trang test";
				break;
			
			default:
				require('pages/home.php');
				break;
		}
		require('footer.php');
	}
	else
	{
		header('location:Login_admin.php');
	}
	/*include("../../QTRi/class/bai2.php");
	$p =new tmdt();
	$layid = 0;
	if(isset($_REQUEST['id']))
	{
		$layid = $_REQUEST['id'];	
	}*/
?>