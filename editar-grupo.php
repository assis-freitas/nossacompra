<?php
include('header.php');
require_once("./util/Conexao.class.php");
require_once("./util/funcoes.php");
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (!isLogged()) {
    header("Location: login.php");
} else {
    $conexao = new Conexao();
    $id = $_GET['id'];
    $colunas = array("MEM_IDENTIFICADOR");
    $data = $conexao->select("membros", $colunas, "WHERE MEM_USU_EMAIL = '" . $_SESSION['usuario']['USU_EMAIL'] . "' AND "
            . "MEM_GRU_CODIGO = $id");
    
    if (count($data) <= 0) {
        ?>
        <div class="container" id='conteudo'>
            <div class="alert alert-danger"><i class="fa fa-times"></i> O grupo não existe !</div>
            <a href="/dashboard/" class="btn btn-default">Voltar</a>
        </div>
        <?php
    } else {
        $dados = $data[0];
        if ($dados['MEM_IDENTIFICADOR'] != 1) {
        ?>
        <div class="container" id='conteudo'>
            <div class="alert alert-danger"><i class="fa fa-warning"></i> Você não tem permissão para acessar esta página</div>
            <a href="/dashboard/" class="btn btn-default">Voltar</a>
        </div>
        <?php
        } else {
            $ativo = true;
            $colunas = array("grupo.*");
            $dados = $conexao->select("grupo", $colunas, "WHERE GRU_CODIGO = $id")[0];
            ?>
            <div class="container" id="conteudo">
                <h1>Editar Grupo</h1>
                <form method="post" action="/grupos/alterar/<?php echo $id; ?>/" id="formGrupo">
                    <div class="form-group" >
                        <label>Nome do Grupo</label>
                        <input type="text" class="form-control" name="nomegrupo" value="<?php echo $dados['GRU_NOME']; ?>"/>
                    </div>
                    <input type="submit" class="btn btn-default" value="Alterar">
                </form>
            </div>

            <?php

        }
    }
    include('scripts.php');
    include('footer.php');
}?>