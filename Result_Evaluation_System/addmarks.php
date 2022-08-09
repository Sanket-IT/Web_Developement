<?php

$conn = mysqli_connect("localhost", "root", "root", "revaluation");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		

		// Taking all 5 values from the form data(input)
		$prn = $_REQUEST['prn'];
        $fcgpa = $_REQUEST['fcgpa'];
        $fpre = $_REQUEST['fpre'];
        $scgpa = $_REQUEST['scgpa'];
        $spre = $_REQUEST['spre'];
        $tcgpa = $_REQUEST['tcgpa'];
        $tpre = $_REQUEST['tpre'];
        $fopre= $_REQUEST['fopre'];
        $will = $_REQUEST['Willingness'];
        $health = $_REQUEST['health'];
        $extra = $_REQUEST['extra'];
        $high = $_REQUEST['high'];
        $tut = $_REQUEST['tutt'];
        $family = $_REQUEST['family'];
        $studytime = $_REQUEST['studyt'];

        $data = array("$prn","$fcgpa","$fpre","$scgpa","$spre","$tcgpa","$tpre","$fopre","$will","$health","$extra",
        "$high","$tut","$family","$studytime");

        $temp=$prn." ".$fcgpa." ".$fpre." ".$scgpa." ".$spre." ".$tcgpa." ".$tpre." ".$fopre;

		$sql = "INSERT INTO marks VALUES ('$prn','$fcgpa','$fpre','$scgpa','$spre','$tcgpa','$tpre','$fopre','$will','$health','$extra',
        '$high','$tut','$family','$studytime',10)";
		
        //$f = fopen('data.csv', 'a'); // Configure fopen to create, open, and write data.
        //fputcsv($f, $data); // Add the keys as the column headers
        //fclose($f);


        if(isset($_POST['mbtn'])){

            $uprn = mysqli_real_escape_string($conn,$_POST['prn']);
        
            if ($uprn != ""){
        
                $sql_query = "select count(*) as cntUser from student where sid='".$uprn."'";
                $result = mysqli_query($conn,$sql_query);
                $row = mysqli_fetch_array($result);
                $count = $row['cntUser'];
        
                if($count > 0){
                    mysqli_query($conn, $sql);
                    $command=exec("python backend.py ".escapeshellarg($temp));
                    echo '<script>alert("Marks Entered Successfully..")</script>';
                    include 'admindash.html';
                }else{
                    echo '<script>alert("Invalid Prn No entered..")</script>';
                    include 'addmarks.html';
                }
        
            }
        }

        if(isset($_POST['mbtn'])){
            $output = null;
            $command=exec("python backend.py" .$fcgpa);
        }

		// Close connection
		mysqli_close($conn);
		?>