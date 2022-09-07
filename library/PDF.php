<?php

require 'library/TCPDF-master/tcpdf.php';

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Colored table
    public function ColoredTable($headers, $data) {
        // Colors, line width and bold font
        $this->SetFillColor(59, 42, 152);
        $this->SetTextColor(255);
        $this->SetDrawColor(59, 42, 152);
        $this->SetLineWidth(0.3);
        $this->SetFont('helvetica', 'B', 9.5);
        // Header
        $this->Cell(10, 7, 'Sl#', 1, 0, 'L', 1);
        foreach ($headers as $hKey => $hValue) {
            $width[] = $hValue;
            $this->Cell($hValue, 7, $hKey, 1, 0, 'L', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('helvetica', '', 9.5);
        // Data
        $fill = 0;
        $n = 1;
        foreach ($data as $row) {
            $this->Cell(10, 6, $n, 'LR', 0, 'L', $fill);
            $n++;
            $i = 0;
            foreach ($row as $key => $value) {
                $this->Cell($width[$i], 6, $value, 'LR', 0, 'L', $fill);
                $i++;
            }
            $this->Ln();
            $fill = !$fill;
        }
//        foreach ($data as $row) {
//            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
//            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
////            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
//            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);
////            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
//            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'L', $fill);
//        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
