<?php
    session_start();
    require_once 'util/Conexao.class.php';
    require_once 'util/funcoes.php';
    $conexao = new Conexao();
    $colunas = array("grupo.*", "membros.MEM_IDENTIFICADOR");
    $dados = $conexao->select("membros", $colunas, "INNER JOIN grupo ON membros.MEM_GRU_CODIGO = grupo.GRU_CODIGO WHERE membros.MEM_USU_EMAIL = '".$_SESSION['usuario']['USU_EMAIL']."'");    
?>

<?php if(count($dados) == 0): ?>
    <p id="erroGrupo">Desculpe, mas não encontramos nenhum grupo vinculado a esta conta</p>
<?php else: ?>
    <?php foreach($dados as $grupo): ?>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo $grupo["GRU_NOME"]; ?></h3>
            </div>
            <div class="panel-body">
                <?php if(isAdministrator($grupo["GRU_CODIGO"])): ?>
                <a href="grupos/novo-membro/<?php echo $grupo["GRU_CODIGO"]; ?>/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Adicionar Membro"><i class="fa fa-user-plus"></i></a>
                <a href="grupos/editar/<?php echo $grupo["GRU_CODIGO"]; ?>/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar Grupo"><i class="fa fa-pencil"></i></a>
                <a href="grupos/excluir/<?php echo $grupo["GRU_CODIGO"]; ?>/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Excluir Grupo"><i class="fa fa-times-circle"></i></a>
                <?php endif; ?>
                <a href="grupos/listas/<?php echo $grupo["GRU_CODIGO"]; ?>/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Ver Listas"><i class="fa fa-list"></i></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
