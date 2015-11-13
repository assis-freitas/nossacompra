<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<?php
session_start();
include("./header.php");
require_once './util/Conexao.class.php';
require_once './util/funcoes.php';
if (!isLogged())
    header("Location: login.php");
else {
    $conexao = new Conexao();
    $colunas = array("lista.*");
    $dados = $conexao->select("lista", $colunas, NULL);
    ?>

    <div class="row"><!--   Pesquisa    -->
        <div class="col-md-offset-7 col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" />
                <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-1">
            <a class="btn-default btn collapsed"
               data-toggle="collapse" data-target="#novaListaCollapse">
                <span class="glyphicon glyphicon-plus-sign"></span> 
                Nova Lista</a>
        </div>
    </div>

    <div class="collapse" id="novaListaCollapse">
        <br>
        <form  method="post" action="adicionar-lista.php" id="formGrupo">
            <label>Nome da Lista</label>
            <input type="text" name="nome" class="form-control"/>
            <input type="submit" class="btn btn-default" value="Criar"/>
        </form>
        <br>
    </div>

    <?php if (count($dados) == 0): ?>
        <div class="container">
            <p id="erroGrupo">Este grupo não contém listas</p>
        </div>
    <?php else : ?>

        <div class="row">
            <br>
            <?php foreach ($dados as $lista): ?>
                <div class="col-md-3">
                    <div class="box">
                        <h3 class="pull-left panel-heading">Lista <?php echo $lista["LIS_NOME"]; ?></h3>
                        <p class="badge pull-right">5 Itens</p>
                        <div class="clearfix"></div>
                        <div class="footer">
                            <a href="editar-lista.php?id=<?php echo $lista["LIS_CODIGO"]; ?>" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> Editar</a>
                            <a href="excluir-lista.php?id=<?php echo $lista["LIS_CODIGO"]; ?>" class="btn btn-default"><i class="fa fa-minus-circle"></i> Excluir</a>
                            <a href="#" class="btn btn-default"><i class="fa fa-list-ul"></i> Itens</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php
    include("./footer.php");
    include("./scripts.php");
}?>