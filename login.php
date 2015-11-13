<?php include 'header.php'; ?>
<div class="container-fluid" id="conteudo">
    <div class="row">
        <div class="col-md-offset-3 col-md-5">
            <div class="login-box">
                <h1>Login</h1>
                <form method="post" id="form-login" action="/entrar/">
                    <div class="form-group">
                        <label>Usuário</label>
                        <input type="text" name="user" autocomplete="off" class="form-control" id="user">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="pass" class="form-control" id="pass"/>
                    </div>
                    <input type="submit" value="Entrar" class="btn btn-default"/>
                </form>
                <br>
                <a href="/cadastro/">Não tem cadastro? Então crie sua conta.</a>
            </div>
        </div>
    </div>
</div>

<?php include 'scripts.php'; ?>
<?php include 'footer.php'; ?>