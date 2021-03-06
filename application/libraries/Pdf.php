<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('./assets/img/escudo.jpg',10,8,22);
            $this->Ln(15);
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            $this->Cell(120,10,utf8_decode('MUNICIPALIDAD DE LA PAZ (E. Ríos)'),0,0,'C');
            $this->Ln(28);
            /*$this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(120,10,'INFORMACION DE CONTACTO',0,0,'C');
            $this->Ln(20);*/
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,utf8_decode('Page '.$this->PageNo().'/{nb}'),0,0,'C');
      }
    }