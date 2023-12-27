<?php
   ini_set('default_charset', 'UTF-8');
   require_once "fpdf/fpdf.php";
   require_once 'conexao.php';

   $pdf = new FPDF();
   $pdf->addPage();

   $arquivo ="relatorio.pdf";
   $tipo_pdf = "I";


   $pdo = Database::conexao();
   $stmt = $pdo->prepare('SELECT * FROM public."vwLivro"');
   $stmt->execute();
   $resData=$stmt->fetchAll();


   $pdf->SetFont('Arial','B',16);
   $pdf->Cell(40,10,'Livros');
 
   $oldName = '';
   foreach($resData as $rowData){
        $nome = $rowData['nome'];
        $titulo = $rowData['titulo'];
        $editora = $rowData['editora'];
        $edicao = $rowData['edicao'];
        $ano = $rowData['anopublicacao'];
        $pdf->SetFont('Arial','B',12);

       if ($oldName != $nome){
            $pdf->Ln();
            $pdf->Cell(40,10,'Autor',1);
            $pdf->Cell(150,10,$nome,1);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(80,10,utf8_decode('Título'),1);
            $pdf->Cell(60,10,'Editora',1);
            $pdf->Cell(30,10,utf8_decode('Edição'),1);       
            $pdf->Cell(20,10,'Ano',1);              
       }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,utf8_decode($titulo),1);
        $pdf->Cell(60,10,utf8_decode($editora),1);
        $pdf->Cell(30,10,$edicao,1);
        $pdf->Cell(20,10,$ano,1);
        $oldName  = $nome;
    }  

   $pdf->Output($arquivo, $tipo_pdf)
?>