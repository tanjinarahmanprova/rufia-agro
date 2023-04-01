<?php
	$name=$_POST['name'];
    $address=$_POST['address'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $passconfirm = $_POST['passconfirm'];

	// Database connection
	$conn = new mysqli('localhost','root','','data entry');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(name, address, number, email, pass, passconfirm) 
        values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi",$name, $address, $number, $email, $pass, $passconfirm);
		$stmt->execute();
		echo "Register successfully...";
		echo "</br>";
		echo '<a href="../homepage/index.html">Go to homepage</a>';
		$stmt->close();
		$conn->close();
	}
?> 