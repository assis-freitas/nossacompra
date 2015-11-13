<?php
    require_once 'util/Conexao.class.php';
    if(isset($_POST['user']) && isset($_POST['pass'])):
        $usuario = $_POST['user'];
        $senha   = hash("whirlpool",$_POST['pass']);
        $conexao = new Conexao();
        $dados = $conexao->select("usuario", "*", "WHERE USU_EMAIL = '$usuario' AND USU_SENHA = '$senha'");
        if(count($dados) > 0):
            if(session_status() != PHP_SESSION_ACTIVE)
                session_start();

            $_SESSION['usuario'] = $dados[0];
            header("Location: /dashboard/");
        else:
            include_once 'header.php';
?>
<div class="container" id="conteudo">
    <div class="alert alert-danger">
        <p>
            Usuário ou senha inválido
        </p>
    </div>
    <a href="/" class="btn btn-default">Voltar</a>
</div>
<?php
            include_once 'scripts.php';
            include_once 'footer.php';
        endif;
    else:
?>
<div class="alert alert-warning">
    <p>
        Preencha todos os campos
    </p>
</div>
<?php
    endif;
?>