<?php

		$conn = mysqli_connect("localhost", "root", "root", "revaluation");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
if(isset($_POST['adbtn'])){

    $uname = mysqli_real_escape_string($conn,$_POST['admid']);
    $password = mysqli_real_escape_string($conn,$_POST['admpass']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from adlogin where adid='".$uname."' and adpass='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            echo '<script>alert("Admin Login Successful..")</script>';
            include 'admindash.html';
        }else{
            echo '<script>alert("Invalid Credentials..")</script>';
            include 'admin.html';
        }

    }

}
?>