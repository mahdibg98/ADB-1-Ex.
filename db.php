<?
    $user = "root";
	$pass = "";

	try{
		$databaseconnect = new PDO( "mysql:host=localhost;dbname=adb1" , $user , $pass );
		$databaseconnect->exec("set names utf8");
	}
	catch(PDOException $e){
		header("Location: error.php");
	}
?>
