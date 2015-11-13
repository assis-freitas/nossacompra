<?php include("header.php");?>

<div class="container" id="conteudo">
    <form method="post">
        <label>Você realmente deseja excluir este membro ?</label>
        <input type="submit" name="resp" value="Sim" class="btn btn-default btn-danger">
        <input type="submit" name="resp" value="Não" class="btn btn-default">
    </form>
</div>

<?php include("scripts.php");?>
<?php include("footer.php");?>