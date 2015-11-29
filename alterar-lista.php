<?php
require './util/funcoes.php';
session_start();

if (!isLogged()) {
    header("Location: /login.php");
} else if (isset($_POST['nomeLista']) && $_POST['nomeLista'] != '') {
    require_once ("util/Conexao.class.php");
    $id = $_GET['id'];
    $campos = array("LIS_NOME", "LIS_DATA_INICIAL");
    $valores = array($_POST['nomeLista'], "2015-10-10");
    $conexao = new Conexao();
    $conexao->update("lista", $campos, $valores, "LIS_CODIGO = $id");

    header("Location: /listas.php");
} else {
    include ("./header.php");
    ?>
    <div class="container">
        <div class="alert alert-danger">O nome não foi informado ! Por favor, informe-o.</div>
    </div>
<a href="editar-lista.php?id=<?php echo $id; ?>">Voltar</a>
    <?php
        include ("./scripts.php");
        include ("./footer.php.php");
}
?>