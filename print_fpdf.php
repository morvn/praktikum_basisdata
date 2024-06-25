<?php

require 'fpdf.php';

$pdo = new PDO('mysql:host=localhost;dbname=db_app_tiket', 'root', '');

class MyPDF extends FPDF
{
    function header()
    {
        $this->SetFont('Arial', 'B', 24);
        $this->Cell(276, 5, 'Data Daftar Pembeli Evan', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 14);
        $this->Cell(276, 10, 'Pemrograman Basis Data', 0, 0, 'C');
        $this->Ln(15);
    }

    function headerTable()
    {
        $this->SetFont('Times', 'B', 10);
        $this->Cell(75, 10, 'Nama Pembeli', 1, 0, 'C');
        $this->Cell(60, 10, 'KTP', 1, 0, 'C');
        $this->Cell(50, 10, 'No Telp', 1, 0, 'C');
        $this->Cell(40, 10, 'Tiket', 1, 0, 'C');
        $this->Cell(30, 10, 'Harga', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        $hasil = $db->query("SELECT tb_pembeli.id_pembeli, tb_pembeli.nama_pembeli, tb_pembeli.ktp_pembeli, 
            tb_pembeli.telp_pembeli, tb_jenistiket.nama_jenistiket, tb_jenistiket.harga 
            FROM tb_jenistiket 
            INNER JOIN tb_pembeli ON tb_pembeli.id_jenistiket = tb_jenistiket.id_jenistiket");

        while ($row = $hasil->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(75, 10, $row->nama_pembeli, 1, 0, 'L');
            $this->Cell(60, 10, $row->ktp_pembeli, 1, 0, 'L');
            $this->Cell(50, 10, $row->telp_pembeli, 1, 0, 'L');
            $this->Cell(40, 10, $row->nama_jenistiket, 1, 0, 'L');
            $this->Cell(30, 10, $row->harga, 1, 0, 'L');
            $this->Ln();
        }
    }
}

$pdf = new MyPDF('L'); // 'L' denotes landscape orientation
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($pdo);
$pdf->Output();
