<?php
session_start();
require_once("./util/funcoes.php");
if (!isLogged()) {
    header("Location: /login.php");
} else if (isset($_POST['nome']) && $_POST['nome'] != '') {
    require_once("util/Conexao.class.php");
    $campos = array("GRU_NOME", "GRU_USU_EMAIL");
    $valores = array($_POST['nome'], $_SESSION['usuario']['USU_EMAIL']);
    $conexao = new Conexao();
    $conexao->insert("grupo", $campos, $valores);
    
    $dados = $conexao->selectmax("grupo", "GRU_CODIGO", "WHERE grupo.GRU_USU_EMAIL = '".$_SESSION['usuario']['USU_EMAIL']."'")[0];
    
    $campos1 = array("MEM_USU_EMAIL","MEM_IDENTIFICADOR","MEM_GRU_CODIGO");
    $valores1 = array($_SESSION['usuario']['USU_EMAIL'],'1',$dados['maximo']);
    $conexao->insert("membros", $campos1, $valores1);
    
    header("Location: /dashboard/");
} else {
    include ("./header.php");
    ?>
    <div class="container" id="conteudo">
        <div class="alert alert-danger">O nome não foi informado ! Por favor informe-o.</div>
    </div>
    <a title="Voltar para pagina anterior" href="/criar-grupo.php">Voltar</a>
    <?php
    include("./scripts.php");
    include("./footer.php");
}
?>