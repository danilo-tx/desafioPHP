<?php 

    function carregaProdutos(){

        $strJson = file_get_contents("../includes/produtos.json");

        $produtos = json_decode($strJson, true);
        
        return $produtos;
    }

    function addProduto($nome, $descricao, $preco, $foto){
        
        $produtos = carregaProdutos();

        $p = ['nome' => $nome, 'descricao' => $descricao, 'preco' => $preco, 'foto' => $foto];

        $produtos[] = $p;

        $stringjson = json_encode($produtos);

        if($stringjson){

            file_put_contents('../includes/produtos.json', $stringjson);
            
        }
    }

?>