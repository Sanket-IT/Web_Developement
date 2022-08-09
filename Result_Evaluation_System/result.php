<?php
session_start();
		$conn = mysqli_connect("localhost", "root", "root", "revaluation");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
if(isset($_POST['btn'])){
    
              $uname = mysqli_real_escape_string($conn,$_POST['userid']);
              $password = mysqli_real_escape_string($conn,$_POST['userpass']);
              $_SESSION["uid"]=$uname;
              if ($uname != "" && $password != ""){

    $sql_query = "select count(*) as cntUser from student where sid='".$uname."' and sspass='".$password."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0){
        echo '<script>alert("Login Succesfful..")</script>';

        $prnno = mysqli_real_escape_string($conn,$_POST['userid']);
        $sql_query="select * from marks where prn='".$prnno."'";
        $result = mysqli_query($conn,$sql_query);
      
        if ($result->num_rows > 0) {
        echo "<table>";
    
    
                    while($row=$result->fetch_array())
                    {
    
                        echo"<tr>";
                        echo "<th>","Parameter","</th>";
                        echo "<th>","Evaluation","</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","PRN NUMBER","</th>";
                        echo "<th>",$row['prn'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","FIRST YEAR PERCENTAGE (IN %)","</th>";
                        echo "<th>",$row['fcgpa'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","FIRST YEAR PRESENTY (IN%)","</th>";
                        echo "<th>",$row['fpre'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","SECOND YEAR PERCENTAGE (IN %)","</th>";
                        echo "<th>",$row['scgpa'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","SECOND YEAR PRESENTY (IN%)","</th>";
                        echo "<th>",$row['spre'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","THIRD YEAR PERCENTAGE (IN %)","</th>";
                        echo "<th>",$row['tcgpa'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","THIRD YEAR PRESENTY (IN%)","</th>";
                        echo "<th>",$row['tpre'],"</th>";
                        echo"</tr>";
                        
                        echo"<tr>";
                        echo "<th>","FOURTH YEAR PRESENTY (IN%)","</th>";
                        echo "<th>",$row['fopre'],"</th>";
                        echo"</tr>";

                        echo"<tr>";
                        echo "<th>","IS THE STUDNET ENJOY LEARNING?","</th>";
                        echo "<th>",$row['will'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","HOW MUCH THE STUDNET IS PHYSICALLY FIT (OUT OF 5)? ","</th>";
                        echo "<th>",$row['health'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","IS STUDNET PARTICIPLATE IN EXTRA-CIRCULAER ACTIVITIES? ","</th>";
                        echo "<th>",$row['extra'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","IS HE INTRESTED IN HIGHER STUIES? (OUT OF 5)","</th>";
                        echo "<th>",$row['high'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","ANY PRIVATE TUTIONS?","</th>";
                        echo "<th>",$row['tut'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","HOW MUCH SUPPORT FORM FAMILY? (OUT OF 5)","</th>";
                        echo "<th>",$row['family'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","DOES HE HAVE SUFFICIENT STUDY TIME? ","</th>";
                        echo "<th>",$row['stime'],"</th>";
                        echo"</tr>";
    
                        echo"<tr>";
                        echo "<th>","BASED ON YOUR PREVIOUS YEARS PERCENTAGE AND PRESENTY OF THIS YEAR YOUR PREDICTED RESULT (IN %)","</th>";
                        echo "<th>",$row['pp'],"</th>";
                        echo"</tr>";
    
                        $no=$row[0];
                        
                    }
        echo"</table>";
      }
      include 'output.html';
  }
  else{
    echo '<script>alert("Invalid Credentials..")</script>';
    include 'user.html';
}
}
}
/*
if(isset($_POST['dbtn'])){
    $conn = mysqli_connect("localhost", "root", "root", "revaluation");
    $id=$no;
    $sql_query="select * from marks where prn='".$id."'";
    $result = mysqli_query($conn,$sql_query);
    
    require('fpdf.php');
    $pdf = new FPDF(); 
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    
    $width_cell=array(10,150,30,30);
    $pdf->SetFillColor(193,229,252); // Background color of header 
    $pdf->SetFont('Arial','',10);
    while($row=$result->fetch_array()){


        $pdf->Cell($width_cell[1],10,'STUDENT PRN NUMBER',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[0],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'FIRST YEAR PERCENTAGE (IN %)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[1],1,1,'C',false); // Second column of row 1 
    
        $pdf->Cell($width_cell[1],10,'FIRST YEAR PRESENTY (IN%)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[2],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'SECOND YEAR PERCENTAGE (IN %)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[3],1,1,'C',false);

        $pdf->Cell($width_cell[1],10,'SECOND YEAR PRESENTY (IN%)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[4],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'THIRD YEAR PERCENTAGE (IN %)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[5],1,1,'C',false);

        $pdf->Cell($width_cell[1],10,'THIRD YEAR PRESENTY (IN%)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[6],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'IS THE STUDNET ENJOY LEARNING?',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[7],1,1,'C',false);

        $pdf->Cell($width_cell[1],10,'HOW MUCH THE STUDNET IS PHYSICALLY FIT (OUT OF 5)? ',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[8],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'IS STUDNET PARTICIPLATE IN EXTRA-CIRCULAER ACTIVITIES?',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[1],1,1,'C',false);

        $pdf->Cell($width_cell[1],10,'IS HE INTRESTED IN HIGHER STUIES? (OUT OF 5)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[9],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'ANY PRIVATE TUTIONS?',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[10],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'HOW MUCH SUPPORT FORM FAMILY? (OUT OF 5)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[11],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'DOES HE HAVE SUFFICIENT STUDY TIME?',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[12],1,1,'C',false); // Second column of row 1 

        $pdf->Cell($width_cell[1],10,'STUDENTS PREDICTED RESULT (IN %)',1,0,'C',false); // First column of row 1 
        $pdf->Cell($width_cell[2],10,$row[13],1,1,'C',false); // Second column of row 1 
    }

$pdf->Output();
}*/
?>
