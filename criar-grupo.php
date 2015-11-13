<?php include('header.php'); ?>

<div class="container" id="conteudo">
    <h1>Novo Grupo</h1>
    <form method="post" action="/grupos/adicionar/" id="formGrupo">
        <div class="form-group" >
            <label>Nome do Grupo</label>
            <input type="text" name="nome" class="form-control"/>
        </div>
        <input type="submit" class="btn btn-default" value="Criar">
    </form>
</div>


<?php include('scripts.php'); ?>
<?php include('footer.php'); ?>