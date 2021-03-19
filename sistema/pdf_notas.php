<?php
//AddPage(orientacion[PORTRAIT, LANDSCAPE],Tçtamaño[A3,A4,A5,LETTER,LEGAL],rotacion),
//SetFomt(tipo[COURIER, HELVETICA,ARIAL,TIMES,SYMBOL,ZAPDINGBAST], estilo[normal,B,I,U],tamaño),
//OutPut(destino[I,D,F,S],nombre_archivos,utf8)
//Cell(ancho,alto,texto,borde,?,aliniacion, rellenar, link)
//Image(ruta,poicionx,posiciony,alto,ancho,tipo,link)
//PageNo...AliasNbPage  numero de paginas [nb]
require ('fpdf/fpdf.php');
require ('model.php');

$fpdf = new FPDF();
$fpdf->AddPage('PORTRAIT','letter');//agregaga paginas

class pdf extends FPDF{
		function header(){
			$this->SetFont('Arial','B',10);
			$this->SetTextColor(128,128,128);
			$this->Cell(0, 5,'Unidad Educativa Matilde Lanza',0,0,'C');
			$this->Image('img/logo.png',170,5,25,25,'png');
			
			//$this->SetX(-40);
			//$this->Write(5,"U. E. Matilde Lanza");
			//$this->Cell(120,10, 'Reporte De Estados',0,0,'C');
			//$this->Ln(20);
		}
		
		public function footer(){
			$this->SetFont('Arial','B', 10);
			$this->SetY(-15);
			$this->SetTextColor(16,87,97);
			$this->Write(5,'CBBA-BOLIVIA');
			$this->SetX(-30);
			$this->aliasNbPages('tpagina');
			$this->Write(5, $this->PageNo().'/tpagina' );//paginacion
		}		
	}

$fpdf = new pdf('P','mm','letter',true);	
$fpdf->Addpage('portrait","letter');//tipo de texto tamaño
$fpdf->SetFont('Arial','B',12);//tipo de texto tamaño ..BU=negrilla subrayado
$fpdf->SetY(30);
$fpdf->SetTextColor(128, 0, 0);
$fpdf->Cell(0, 5,'Lista de  Usuarios',0,0,'C');//ancho=30 tabla y alto=5
$fpdf->SetDrawColor(128, 0, 0);
$fpdf->SetLineWidth(1);
$fpdf->Line(85, $fpdf->GetY() + 5, 130, $fpdf->GetY() + 5);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Ln(20);//salto de linea
$fpdf->setFont('Arial','',12);
$fpdf->SetTextColor(16, 87, 97);
$fpdf->Cell(20, 5,'Nombre:');//ancho=20 tabla y alto=5
$fpdf->Ln();
$fpdf->Cell(20, 5,'Fecha:');
$fpdf->Ln();
$fpdf->Cell(20, 5,'hora:');
$fpdf->Ln(20);
//manejo de tablas 
$fpdf->SetTextColor(40, 40, 40);
$fpdf->SetFont('Arial','B');
$fpdf->SetFontSize(10);
$fpdf->SetFillColor(255,255,255);//color tabla fondo
$fpdf->SetDrawColor(88,88,88);//color borde de tabla
$fpdf->Cell(20,10,'Nª',0,0,'C',1);
$fpdf->Cell(50,10,'Nombre',0,0,'C',1);
$fpdf->Cell(45,10,'Correo',0,0,'C',1);
$fpdf->Cell(40,10,'Nombre Usuario',0,0,'C',1);
$fpdf->Cell(40,10,'Rol',0,0,'C',1);
$fpdf->SetDrawColor(61,174,233);
$fpdf->SetLineWidth(1);//grosor de la linea
$fpdf->line(15,90,190,90); //dibujar Linea derecha,arriba,ancho,izquierda




$fpdf->OutPut();



