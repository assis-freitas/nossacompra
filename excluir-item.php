<?php
session_start();
$codGrupo = $_GET['codGrupo'];
$codLista = $_GET['codLista'];
$id = $_GET['id'];
require_once 'util/funcoes.php';
require_once 'util/Conexao.class.php';
include 'header.php';

$conexao = new Conexao();
if (!isset($_POST['resp'])):
    if (isMember($codGrupo)):
        $itens = $conexao->select("itens_lista", array('*'), "WHERE ITE_LIS_CODIGO = $id")[0];
        if (count($itens) > 0):
?>
            <div class="container" id="conteudo">
                <h1>Remover Item</h1>
                <form method="post">
                    <label>Você realmente deseja excluir o item <?php echo $itens["ITE_LIS_DESCRICAO_ITEM"] ?> ?</label>
                    <input type="submit" name="resp" value="Sim" class="btn btn-default btn-danger">
                    <input type="submit" name="resp" value="Não" class="btn btn-default">
                </form>
            </div>
            <?php
        else:
            ?>
            <div class="container" id="conteudo">
                <div class="alert alert-danger">
                    <p>Item não encontrado</p>
                </div>
            </div>
<?php
        endif;
    else:
        ?>
        <div class="container" id="conteudo">
            <div class="alert alert-danger">
                <p>Você não tem permissão para acessar esta página</p>
            </div>
        </div>
<?php
    endif;
else:
    if($_POST['resp'] == "Sim"){
        $conexao->delete("itens_lista", "ITE_LIS_CODIGO", $id);
    }
    header("Location: /grupos/$codGrupo/listas/$codLista/itens/");
endif;

include ("scripts.php");
include ("footer.php");
?>