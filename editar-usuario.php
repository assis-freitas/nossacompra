<?php include("header.php"); ?>

<div class="container" id="conteudo">
    <h1>Configurações</h1>
    <div class="form-group">
        <label>Alterar Nome</label>
        <input type="text" class="form-control" name="nome">
    </div>
    <div class="form-group">
        <label>Alterar E-mail</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Nova Senha</label>
        <input type="password" class="form-control" name="senha">
    </div>
    <div class="form-group">
        <label>Confirmar Nova Senha</label>
        <input type="password" class="form-control" name="confirmarSenha">
    </div>
   
     <div class="form-group">
        <label>Senha Atual</label>
        <input type="password" class="form-control" name="confirmarSenha">
     </div>
    
    <input type="button" class="btn btn-default" value="Salvar"/>
    <input type="submit" class="btn btn-default btn-danger" value="Desativar Conta" />

</div> 
    

<?php include("scripts.php"); ?>
<?php include("footer.php"); ?>