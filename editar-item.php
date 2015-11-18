<?php
include('header.php');
require_once("./util/Conexao.class.php");
require_once("./util/funcoes.php");
if(session_status() != PHP_SESSION_ACTIVE)
{ session_start();}

if (!isLogged()) {
    header("Location: login.php");
} else {
    $conexao = new Conexao();
    $id = $_GET['id'];
    $lista = $_GET['lista'];
   
     $colunas2 = array("LIS_GRU_CODIGO");
     $data2 = $conexao->select("lista", $colunas2, "WHERE LIS_CODIGO = $lista");
    if (count($data2)<=0) {
        ?>
        <div class="container" id='conteudo'>
            <div class="alert alert-danger"><i class="fa fa-times"></i>Grupo ou item inexistente!</div>
            <a href="/dashboard/" class="btn btn-default">Voltar</a>
        </div>
        <?php
    } else {
            if(isMember($data2[0]["LIS_GRU_CODIGO"])){
            $colunas = array("itens_lista.*");
            $dados = $conexao->select("itens_lista", $colunas, "WHERE ITE_LIS_CODIGO = $id")[0];
            ?>
            <div class="container" id="conteudo">
                <h1>Editar Item</h1>
                <form method="post" action="/item/editado/<?php echo $id; ?>/" id="formItem">
                    <div class="form-group" >
                        <label>Nome do Item</label>
                        <input type="text" class="form-control" name="Item" value="<?php echo $dados['ITE_LIS_DESCRICAO_ITEM']; ?>"/>
                    </div>
                    <input type="submit" class="btn btn-default" value="Alterar">
                </form>
            </div>

            <?php

            }else{
                header("Location: /dashboard/");
            }
    }
    include('scripts.php');
    include('footer.php');
}