<?php
session_start();

        $conn = mysqli_connect("localhost", "root", "root", "revaluation");
        $id=$_SESSION["uid"];
        $prnno = mysqli_real_escape_string($conn,$id);
        $sql_query="select * from marks where prn='".$prnno."'";
        $result = mysqli_query($conn,$sql_query);
        
        require('fpdf.php');
        $pdf = new FPDF(); 
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        
        $width_cell=array(10,150,30,30);
        $pdf->SetFillColor(193,229,252); // Background color of header 
        $pdf->SetFont('Arial','',20);
        $pdf->cell(180, 20, 'Student Evaluation Report', 1, 1,'C');
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

            $pdf->Cell($width_cell[1],10,'FOURH YEAR PRESENTY (IN%)',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[7],1,1,'C',false); // Second column of row 1 

            $pdf->Cell($width_cell[1],10,'IS THE STUDNET ENJOY LEARNING?',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[8],1,1,'C',false);

            $pdf->Cell($width_cell[1],10,'HOW MUCH THE STUDNET IS PHYSICALLY FIT (OUT OF 5)? ',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[9],1,1,'C',false); // Second column of row 1 

            $pdf->Cell($width_cell[1],10,'IS STUDNET PARTICIPLATE IN EXTRA-CIRCULAER ACTIVITIES?',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[10],1,1,'C',false);

            $pdf->Cell($width_cell[1],10,'IS HE INTRESTED IN HIGHER STUIES? (OUT OF 5)',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[11],1,1,'C',false); // Second column of row 1 

            $pdf->Cell($width_cell[1],10,'ANY PRIVATE TUTIONS?',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[12],1,1,'C',false); // Second column of row 1 

            $pdf->Cell($width_cell[1],10,'HOW MUCH SUPPORT FORM FAMILY? (OUT OF 5)',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[13],1,1,'C',false); // Second column of row 1 
 
            $pdf->Cell($width_cell[1],10,'DOES HE HAVE SUFFICIENT STUDY TIME?',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[14],1,1,'C',false); // Second column of row 1 

            $pdf->Cell($width_cell[1],10,'STUDENTS PREDICTED RESULT (IN %)',1,0,'C',false); // First column of row 1 
            $pdf->Cell($width_cell[2],10,$row[15],1,1,'C',false); // Second column of row 1 
        }
        //$pdf->write(12,"Copyright ©Group 15. All rights reserved.");
    $pdf->Output('D','Evaluation-Report.pdf');
?>