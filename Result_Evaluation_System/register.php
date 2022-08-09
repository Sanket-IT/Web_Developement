<?php
$conn = mysqli_connect("localhost", "root", "root", "revaluation");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$stid = $_REQUEST['stid'];
		$stemail = $_REQUEST['stemail'];
		$stfpass = $_REQUEST['stfpass'];
		$stspass = $_REQUEST['stspass'];
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO student VALUES ('$stid','$stemail'
        ,'$stfpass','$stspass')";
		
		if(mysqli_query($conn, $sql)){
			echo '<script>alert("Student added successfully..")</script>';
			include 'admindash.html';
		} else{
			echo '<script>alert("Sorry! student not added..")</script>';
			include 'register.html';
		}
		
		// Close connection
		mysqli_close($conn);
		?>