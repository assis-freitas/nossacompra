<?php
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
        require_once("util/Conexao.class.php");
        $campos  = array("USU_EMAIL", "USU_SENHA", "USU_STATUS", "USU_NOME");
        $valores = array($_POST['email'], hash("whirlpool",$_POST['senha']), 1, $_POST['nome']);
        $conexao = new Conexao();
        $conexao->insert("usuario", $campos, $valores);
        session_start();
        $_SESSION['usuario'] = $conexao->select("usuario", "*", "WHERE USU_EMAIL = '".$_POST['email']."'")[0];
        header("Location: /dashboard/");
    }
?>

<?php include("header.php"); ?>
<div class="container" id="conteudo">
    <div class="row">
        <div class="col-md-6">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                      <img src="img/(101).jpg" alt="Imagem Aleatória" class="img-rounded">
                  </div>
                  <div class="item">
                      <img src="img/(100).jpeg" alt="Imagem Aleatória" class="img-rounded">
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <h1>Cadastro de usuário</h1>
            <form method="post" action="" id="formCadastro">
                <div class="form-group" >
                    <label >Nome</label>
                    <input title="Nome do usuario" type="text" class="form-control" name="nome" >
                </div>
                <div class="form-group" title="E-mail do usuario não cadastrado">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group" >
                    <label>Senha</label>
                    <input title="Senha que será ultilizada para entrar em sua conta" type="password" class="form-control" name="senha">
                </div>
                <div class="form-group">
                    <label>Confirmar Senha</label>
                    <input title="Repita a senha anterior" type="password" class="form-control" name="confirmarSenha">
                </div>
                <input type="button" class="btn btn-default" value="Adicionar" id="btnAdd" title="criar conta">
            </form>
            <div class="alert alert-warning hide" id="erro"></div>
        </div>
    </div>
</div>
<?php include("scripts.php"); ?>
<script type="text/javascript">
    var form = document.getElementById("formCadastro");
        btnAdd = document.getElementById("btnAdd");
        erro  = document.getElementById("erro");
    
    btnAdd.onclick = function(){
        if(form["nome"].value !== "" &&
           form["email"].value !== "" &&
           form["senha"].value !== "" &&
           form["confirmarSenha"].value !== ""){
           
           if(form["senha"].value === form["confirmarSenha"].value){
               form.submit();
           }else{
               erro.innerHTML = "<p>Senhas informadas são diferentes</p>";
               erro.style.display = "block !important";
               erro.className = "alert alert-warning show";
           }
           
        }else{
            erro.innerHTML = "<p>Preencha todos os campos</p>";
            erro.style.display = "block !important";
            erro.className = "alert alert-warning show";
        }
    };
</script>
<?php include("footer.php"); ?>