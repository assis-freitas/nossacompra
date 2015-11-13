<?php
session_start();
$id = $_GET['id'];
require_once './util/funcoes.php';
require_once './util/Conexao.class.php';
$conexao = new Conexao();
if (!isset($_POST['resp'])) {
    if (isLogged()) {
        $listas = $conexao->select("lista", array('lista.*'), "WHERE LIS_CODIGO = $id")[0];
        if (count($listas) > 0):
            include './header.php';
            ?>
            <div class="container" id="conteudo">
                <form method="post">
                    <label>Você realmente deseja excluir a lista <?php echo $listas["LIS_NOME"] ?> ?</label>
                    <input type="submit" name="resp" value="Sim" class="btn btn-default btn-danger">
                    <input type="submit" name="resp" value="Não" class="btn btn-default">
                </form>
            </div>
            <?php
            include ("scripts.php");
            include ("footer.php");
        else:
            header("Location: listas.php");
        endif;
    }
    else {
        header("Location: login.php");
    }
} else {
    if($_POST['resp'] == "Sim"){
        //$conexao->delete("itens_lista", "ITE_LIS_LIS_CODIGO", $id);
        $conexao->delete("lista", "LIS_CODIGO", $id);
    }
    header("Location: listas.php");
}