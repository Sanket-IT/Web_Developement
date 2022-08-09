<?php
$conn = mysqli_connect("localhost", "root", "root", "revaluation");
		
// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}


if(isset($_POST['btn'])){

    $uname = mysqli_real_escape_string($conn,$_POST['userid']);
    $password = mysqli_real_escape_string($conn,$_POST['userpass']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from student where sid='".$uname."' and sspass='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            echo '<script>alert("Login Succesfful..")</script>';
        }else{
            echo '<script>alert("Invalid Credentials..")</script>';
            include 'user.html';
        }

    }

}

?>