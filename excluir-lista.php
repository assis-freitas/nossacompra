<?php
session_start();
$id = $_GET['id'];
$codGrupo = $_GET['codGrupo'];

require_once 'util/funcoes.php';
require_once 'util/Conexao.class.php';
include 'header.php';

$conexao = new Conexao();
if (!isset($_POST['resp'])) {
    if (isMember($codGrupo)):
        $listas = $conexao->select("lista", array('lista.*'), "WHERE LIS_CODIGO = $id")[0];
        if (count($listas) > 0):
            
            ?>
            <div class="container" id="conteudo">
                <form method="post">
                    <label>Você realmente deseja excluir a lista <?php echo $listas["LIS_NOME"] ?> ?</label>
                    <input type="submit" name="resp" value="Sim" class="btn btn-default btn-danger">
                    <input type="submit" name="resp" value="Não" class="btn btn-default">
                </form>
            </div>
            <?php
        else:
            ?>
        <div class="container" id="conteudo">
            <div class="alert alert-danger">
                <p>Lista não encontrada</p>
            </div>
        </div>
    <?php
        endif;
    
    else:
        ?>
        <div class="container" id="conteudo">
            <div class="alert alert-danger">
                <p>Você não tem permissão para acessar essa página</p>
            </div>
        </div>
<?php
    endif;
} else {
    if($_POST['resp'] == "Sim"){
        //$conexao->delete("itens_lista", "ITE_LIS_LIS_CODIGO", $id);
        $conexao->delete("lista", "LIS_CODIGO", $id);
    }
    
    header("Location: /grupos/".$codGrupo."/listas/");
}

include ("scripts.php");
include ("footer.php");