
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('#gravar').click(function() {
                var titulo = $('#titulo').val();
                var editora = $('#editora').val();
                var edicao = $('#edicao').val();
                var anopub = $('#anopub').val();

                if (titulo == "") {
                    alert("Por favor, preencha o campo Título.");
                    return false;
                }         
                if (editora == "") {
                    alert("Por favor, preencha o campo Editora.");
                    return false;
                }  
                if (edicao == "") {
                    alert("Por favor, preencha o campo Edição.");
                    return false;
                }  
                if (anopub == "") {
                    alert("Por favor, preencha o campo Ano de Publicação.");
                    return false;
                }  
                                                                       
                $.post('gravaLivro.php', {orig:0, titulo: titulo, editora: editora, edicao: edicao, anopub: anopub}, function(data) {
                    $(location).prop('href', 'livro.php');
                });
            });
        }) 

        function somenteNumeros(e) {
            var charCode = e.charCode || e.keyCode;
            if (charCode < 48 || charCode > 57) {
                e.preventDefault();
            }
        }

    </script>    
    <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Livro>> Incluir Livro</h5>         
        </header>        
    </div> 
    <div class="w-75 p-3">
        <a class="inicio" href="index.php"> Início </a><a class="inicio" href="livro.php"> Voltar </a><br><br> 
        <div id="alert"></div>
        <form>
            <head>Cadastro de Livros</head>
            <div class="border border-dark w-400 mt-2 bg-light">
                <div class="p-3">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control w-75 border-dark" id="titulo">
                    </div>
                    <div class="form-group">
                        <label for="editora">Editora</label>
                        <input type="text" class="form-control  w-75 border-dark" id="editora">
                    </div>
                    <div class="form-group">
                        <label for="edicao">Edição</label>
                        <input type="text" class="form-control  w-25 border-dark" maxlength="2" onkeypress="somenteNumeros(event)" id="edicao">
                    </div>
                    <div class="form-group">
                        <label for="anopub">Ano de publicação</label>
                        <input type="text" class="form-control w-25 border-dark" maxlength="4" onkeypress="somenteNumeros(event)" id="anopub">
                    </div>
                </div>  
                <div class="col-12 p-3">
                        <button type="button" class="btn btn-primary" id="gravar">Gravar</button>
                </div>  
            </div>
        </form>
    <div>
</body>
</html>