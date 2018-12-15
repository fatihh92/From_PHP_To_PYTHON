<!DOCTYPE html>
<html>
<head>
<title>FROM PHP TO PYTHON</title>
</head>
<body bgcolor="black">


<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" align="center">

<input type="submit" name="color" value="blue" style="width:100%;heignt:200%;background-color:blue;color:red"/><br/><br/>
<input type="submit" name="color" value="green" style="width:100%;heignt:100%;background-color:green;color:red"/><br/><br/>
<input type="submit" name="color" value="yellow" style="width:100%;heignt:100%;background-color:yellow;color:red"/><br/>
</form>
<?php
if(isset($_POST['color']))
{
	$color = $_POST['color'];
	echo '<p style="color:white" align="center">'.$color.'</p>';
	
	//$sonuc = shell_exec('python transfer.py ' .$color);
	//echo '<p style="color:white">'.$sonuc.'</p>';
	
	$host    = "127.0.0.1";
	$port    = 25003;
	$message = $color;
	echo "Message To server :".$message;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
	// send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	// get server response
	$result = socket_read ($socket, 1024) or die("Could not read server response\n");
	echo "Reply From Server  :".$result;
	// close socket
	socket_close($socket);
}
?>

</body>
</html>