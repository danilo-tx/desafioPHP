<?php 
    
    include('../includes/functions.php');
    
    // Valores padrões
    $nome = '';
    $descricao = '';
    $preco = '';
    
    // Controle de erro
    $nomeOk = true;
    $precoOk = true;
    $imgOk = true;
    

    if($_POST){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        // $foto = $_POST['foto'];

        if($_FILES){

            $tmpName = $_FILES['foto']['tmp_name'];
            $fileName = uniqid() . '-' . $_FILES['foto']['name'];
            $error = $_FILES['foto']['error'];

            move_uploaded_file($tmpName,'../img/produtos/'.$fileName);

            $imagem ='../img/produtos/'.$fileName;

        } else {
            $imagem = null;
        }

        if($nomeOk && $precoOk && $imgOk){

            addProduto($nome, $descricao, $preco, $imagem);
            
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feirão dos Games</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header></header>
    <main>
    
    
    <form id="form-produtos" method="POST" enctype="multipart/form-data">
        <h3>Cadastrar produto</h3>
        <label>
            Nome<br>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" value="<?=$nome?>">
            <?= ($nomeOk ? '' : '<span class="erro">Preencha o campo com um nome válido</span>');  ?>
        </label>
        <label>
            Descrição do Produto<br>
            <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto">
        </label>
        <label>
            Preço<br>
            <input type="number" name="preco" min="0.00" step="0.01" placeholder="Digite o preço do produto" />
            <?= ($precoOk ? '' : '<span class="erro">Digite um preço válido</span>');  ?>
        </label>
        <label>
            Foto do Produto<br>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,.gif">
            <?= ($imgOk ? '' : '<span class="erro">Carregue uma foto válida</span>');  ?>
        </label>
        <div>
                <button type="reset">Resetar</button>
                <button type="submit">Cadastrar</button>
        </div>
    
    </form>

    </main>
    <footer></footer>
</body>
</html>