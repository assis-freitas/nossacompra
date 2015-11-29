<?php include("header.php"); ?>
<div class="container-fluid" id="conteudo">
    <a title="Criar novo Grupo" href="grupos/novo/" class="btn btn-default"><i class="fa fa-plus"></i> Novo Grupo</a>
        <div id="grupos"></div>

</div>
<?php include("scripts.php"); ?>
<script>
    loadGrupos();
    setInterval(function(){
        loadGrupos();
    }, 5000);
    
    function loadGrupos(){
        $.get("grupos.php", function(data){
            $("#grupos").html(data);
            $('[data-toggle="tooltip"]').tooltip();
        });
    }
</script>
<?php include("footer.php"); ?>