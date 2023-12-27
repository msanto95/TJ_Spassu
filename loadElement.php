<?php
    require_once 'conexao.php';

    $cod = $_GET['cod'];
    $orig = $_GET['orig'];

    $pdo = Database::conexao();
    if($orig==0){
       $stmt = $pdo->prepare('SELECT * FROM public."autor" WHERE coau not in(SELECT "Autor_CodAu" from public."Livro_Autor" WHERE "Livro_Codl" = '.$cod.')');
       $campoCod = 'coau';
       $campoDesc = 'nome'; 
    }else{
        $stmt = $pdo->prepare('SELECT * FROM public."assunto" WHERE "codas" not in(SELECT "Assunto_codAs" from public."Livro_Assunto" WHERE "Livro_Codl" = '.$cod.')');
        $campoCod = 'codas';
        $campoDesc = 'descricao';
    }
    $stmt->execute();
    $resData=$stmt->fetchAll();


    if($orig==0){
       echo "<option value=''>Selecione o autor</option>";
    }else{
        echo "<option value=''>Selecione o assunto</option>";
    }   

    foreach($resData as $rowData){

        $cod  = $rowData[$campoCod];
        $desc = $rowData[$campoDesc];

        echo "<option value='".$cod."'>".$desc."</option>";
                
    }     
?>    