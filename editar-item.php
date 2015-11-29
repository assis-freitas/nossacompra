<?php
include('header.php');
require_once("util/Conexao.class.php");
require_once("util/funcoes.php");
if(session_status() != PHP_SESSION_ACTIVE)
{ session_start();}

$codGrupo = $_GET['codGrupo'];
$lista = $_GET['lista'];
$id  = $_GET['id'];

if (!isMember($codGrupo)):
    ?>
<div class="container" id="conteudo">
    <p>Você não tem permissão para acessar essa página</p>
</div>
<?php
else:
    $conexao = new Conexao();
   
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
            $colunas = array("itens_lista.*");
            $dados = $conexao->select("itens_lista", $colunas, "WHERE ITE_LIS_CODIGO = $id")[0];
        ?>
        <div class="container" id="conteudo">
            <h1>Editar Item</h1>
            <form method="post" action="/grupos/<?php echo $codGrupo; ?>/listas/<?php echo $lista; ?>/itens/<?php echo $id; ?>/editado/" id="formItem">
                <div class="form-group" >
                    <label>Nome do Item</label>
                    <input type="text" class="form-control" name="Item" value="<?php echo $dados['ITE_LIS_DESCRICAO_ITEM']; ?>"/>
                </div>
                
                <div class="form-group" >
                    <label>Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" value="<?php echo $dados['ITE_LIS_QUANTIDADE']; ?>"/>
                </div>
                <input type="submit" class="btn btn-default" value="Alterar">
            </form>
        </div>
<?php
    }
    include('scripts.php');
    include('footer.php');
endif;