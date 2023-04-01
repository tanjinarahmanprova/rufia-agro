<?php

    $email = $_POST['email'];
    $pass = $_POST['pass'];

	// Database connection
	$conn = new mysqli('localhost','root','','data entry');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else {
		$stmt = $conn->prepare("select * from register where email = ?");
        $stmt->bind_param("s", $email);
		$stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] === $pass){
                echo "Login successfully...";
            }
            else{
                echo "Invaid email or password";
            }
        }
        else{
            echo "Invaid email or password";
        }
		echo "</br>";
		echo '<a href="../homepage/index.html">Go to homepage</a>';
        $stmt->close();
		$conn->close();
	}
?>