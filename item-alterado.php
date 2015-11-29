<?php
    include('header.php');
    require_once("./util/Conexao.class.php");
    require_once("./util/funcoes.php");
    
    $conexao = new Conexao();
    $item_edit = $_POST['Item'];
    $quantidade = $_POST['quantidade'];
    $codigo = $_GET['id'];
    $codGrupo = $_GET['codGrupo'];
    $codLista = $_GET['lista'];
    
    $dados = $conexao->select('itens_lista',array('*'),"where ITE_LIS_CODIGO = ".$codigo);

    if(count($dados) > 0){
        $att = $conexao->update('itens_lista',array('ITE_LIS_DESCRICAO_ITEM'),array($item_edit),"ITE_LIS_CODIGO = ".$codigo);
        header("Location: /grupos/$codGrupo/listas/$codLista/itens/");
    
    }
    
    
    
    include('footer.php');
?>