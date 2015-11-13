<?php
require_once("./util/Conexao.class.php");
require_once("./util/funcoes.php");
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();

$id = $_GET['id'];
if (!isLogged()) {
    header("Location: login.php");
} else if (isset($_POST['nomegrupo']) && $_POST['nomegrupo'] != '') {
    $campos = array("GRU_NOME");
    $valores = array($_POST['nomegrupo']);
    $conexao = new Conexao();
    $conexao->update("grupo", $campos, $valores, "GRU_CODIGO = $id");
    header("Location: /dashboard/");
} else {
    include('./header.php');
    ?>
    <div class="container" id="conteudo">
        <div class="alert alert-danger">O nome não foi informado ! Por favor informe-o.</div>
    </div>
    <a href="/editar-grupo.php?id=<?php echo $id ?>"
    <?php
    include("./scripts.php");
    include("./footer.php");
}
?>