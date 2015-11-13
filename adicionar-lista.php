<?php
require './util/funcoes.php';
session_start();
if (!isLogged()) {
    header("Location: /login.php");
} else if (isset($_POST['nome']) && $_POST['nome'] != '') {
    require_once ("util/Conexao.class.php");
    $campos = array("LIS_NOME", "LIS_DATA_INICIAL");
    $valores = array($_POST['nome'], "2015-10-10");
    $conexao = new Conexao();
    $conexao->insert("lista", $campos, $valores);

    header("Location: /listas.php");
} else {
    include ("./header.php");
    ?>
    <div class="container">
        <div class="alert alert-danger">O nome não foi informado ! Por favor, informe-o.</div>
    </div>
    <a href="listas.php">Voltar</a>
    <?php
        include ("./scripts.php");
        include ("./footer.php.php");
}
?>