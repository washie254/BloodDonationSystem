<?php
    require "fpdf.php";
    
    $db = new PDO('mysql:host=localhost;dbname=dkut_blood_donation_system;','root','');
    //$reg = 'C025-02-0029/2015'; 

    class myPDF extends FPDF{
        function header(){
            $this->Image('logo.png',10,6);
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'BLOOD DONATION SYSTEM',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276, 10, 'Nairobi, Kenya',0,0,'C');
            $this->Ln(40);
        }
        function footer(){
            $this->SetY(-26);
            $this->SetFont('Arial','',8);
            $this->Ln();
            $this->Cell(0,10,'Red-Cross Blood Donation System',0,0,'C');
            $this->Ln();
            $this->Cell(0,10,'Page',0,0,'C');
        }
        function headerTable(){
            $this->SetFont('Times','',12);
            $this->Cell(30,10,'id#',1,0,'C');
            $this->Cell(40,10,'Username',1,0,'C');
            $this->Cell(40,10,'First Name',1,0,'C');
            $this->Cell(40,10,'Last name',1,0,'C');
            $this->Cell(30,10,'Blood Group',1,0,'C');
            $this->Cell(10,10,'R',1,0,'C');
            $this->Cell(40,10,'DOB',1,0,'C');
            $this->Cell(50,10,'Location',1,0,'C');
            $this->Ln();
        }
        function viewUser($db){
            $stmt = $db->query("SELECT *FROM users ORDER BY id");
            while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->Cell(30,10,$data->id,1,0,'C');
                $this->Cell(40,10,$data->username,1,0,'C');
                $this->Cell(40,10,$data->firstName,1,0,'C');
                $this->Cell(40,10,$data->lastName,1,0,'C');
                $this->Cell(30,10,$data->bloodType,1,0,'C');
                $this->Cell(10,10,$data->rh,1,0,'C');
                $this->Cell(40,10,$data->dob,1,0,'C');
                $this->Cell(50,10,$data->location,1,0,'C');
                $this->Ln();
            }
        }

     
    }  

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewUser($db);
    $pdf->output();

?>