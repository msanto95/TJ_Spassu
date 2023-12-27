<?php
    require_once 'conexao.php';
    $descricao = $_POST['descricao'];
    $orig = $_POST['orig'];

    switch($orig){
        case 0:
            $script = 'INSERT INTO public."autor"("nome") VALUES (:nome)';
        break;
        case 1:
            $script = 'INSERT INTO public."assunto"("descricao") VALUES (:nome)';
        break;      
        case 2:
            $cod = $_POST['codigo'];
            $val = $_POST['val'];
            $script = 'INSERT INTO public."Livro_Autor"("Livro_Codl", "Autor_CodAu") VALUES ('.$cod.','.$val.')';
        break;   
        case 3:
            $cod = $_POST['codigo'];
            $val = $_POST['val'];
            $script = 'INSERT INTO public."Livro_Assunto"("Livro_Codl", "Assunto_codAs") VALUES ('.$cod.','.$val.')';
        break;                       
    }

    $pdo = Database::conexao();
    $stmt = $pdo->prepare($script);
    if($orig<>2 && $orig<>3){
      $stmt->bindValue(':nome', $descricao, PDO::PARAM_STR);
    }
    $stmt->execute();
    $resData=$stmt->fetchAll();

?>