<?php
session_start();
require_once 'util/Conexao.class.php';
require_once 'util/funcoes.php';

$codGrupo = $_GET['codGrupo'];
include("header.php");
if (!isMember($codGrupo)):
?>
<div class="container" id="conteudo">
    <div class="alert alert-danger">
        <p>
            Você não permissão para acessar essa página
        </p>
    </div>
</div>
<?php
else:
    $conexao = new Conexao();
    $colunas = array("*");
    $dados = $conexao->select("lista", $colunas, "where LIS_GRU_CODIGO = ".$codGrupo);
    
    ?>
<div class="container" id="conteudo">
    <div class="row">
        <div class="col-md-1">
            <a class="btn-default btn" href="/grupos/<?php echo $codGrupo; ?>/listas/adicionar/">
                <span class="glyphicon glyphicon-plus-sign"></span> 
                Nova Lista</a>
        </div>
    </div>

    <?php if (count($dados) == 0): ?>
        <div class="container" id="conteudo">
            <p id="erroGrupo">Este grupo não contém listas</p>
        </div>
    <?php else : ?>

        <div class="row">
            <br>
            <?php foreach ($dados as $lista): ?>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Lista <?php echo $lista["LIS_NOME"]; ?></h3>
                        </div>
                        <div class="panel-body">
                            <p class="badge">5 Itens</p>
                            <div class="clearfix"></div>
                            <div class="footer">
                                <a href="/grupos/<?php echo $codGrupo; ?>/listas/<?php echo $lista["LIS_CODIGO"]; ?>/editar/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar Lista"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="/grupos/<?php echo $codGrupo; ?>/listas/<?php echo $lista["LIS_CODIGO"]; ?>/excluir/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Excluir Lista"><i class="fa fa-minus-circle"></i></a>
                                <a href="/grupos/<?php echo $codGrupo; ?>/listas/<?php echo $lista["LIS_CODIGO"]; ?>/itens/" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Itens da Lista"><i class="fa fa-list-ul"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
 </div>
    <?php 
    endif; 
    
    include("scripts.php");
    include("footer.php");
    endif;
 ?>