<?php
    require_once 'conexao.php';

    $orig  = $_POST['orig'];

    $editora = $_POST['editora'];
    $edicao  = $_POST['edicao'];
    $anopub  = $_POST['anopub'];

    if($orig==1){
       $codigo  = $_POST['codigo'];
       $script = 'UPDATE public.livro SET editora=:editora, edicao=:edicao, anopublicacao=:anopub WHERE codl=:cod';
    }else{
        $titulo  = $_POST['titulo'];
        $script = 'INSERT INTO public.livro(titulo, editora, edicao, anopublicacao)VALUES (:titulo, :editora, :edicao, :anopub)';
    }

    $pdo = Database::conexao();
    $stmt = $pdo->prepare($script);
    if($orig==1){
        $stmt->bindValue(':cod', $codigo, PDO::PARAM_INT);
    }else{
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
    }
    $stmt->bindValue(':editora', $editora, PDO::PARAM_STR);
    $stmt->bindValue(':edicao', $edicao, PDO::PARAM_STR);
    $stmt->bindValue(':anopub', $anopub, PDO::PARAM_STR);
    $stmt->execute();
    $resData=$stmt->fetchAll();

?>