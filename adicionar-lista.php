<?php
    require_once 'util/Conexao.class.php';
    require_once 'util/funcoes.php';
    
    include 'header.php';
    $codGrupo = $_GET['codGrupo'];
    
    if(isset($_POST['nome']) && 
       isset($_POST['dataInicial']) && 
       isset($_POST['dataFinal'])){
        $nome = $_POST['nome'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];
        $conexao = new Conexao();
        
        $colunas = array("LIS_NOME", "LIS_DATA_INICIAL", "LIS_DATA_FINAL", "LIS_GRU_CODIGO");
        $valores = array($nome, $dataInicial, $dataFinal, $codGrupo);
        
        $conexao->insert("lista", $colunas, $valores);
        
        header("Location: /grupos/".$codGrupo."/listas/");
    }
    
    
    if(!isMember($codGrupo)):
?>
<div class="container" id="conteudo">
    <div class="alert alert-danger">
        <p>Você não ten permissão para acessar essa página</p>
    </div>
</div>
<?php
    else:
?>
    <div class="container" id="conteudo">
        <h1>Nova Lista</h1>
        <form method="post" action="">
            <div class="form-group">
                <label>Nome da Lista</label>
                <input type="text" class="form-control" name="nome">
            </div>
            
            <div class="form-group">
                <label>Data Inicial</label>
                <input type="date" class="form-control" name="dataInicial">
            </div>
            
            <div class="form-group">
                <label>Data Final</label>
                <input type="date" class="form-control" name="dataFinal">
            </div>
            
            <input type="submit" class="btn btn-default" value="Adicionar Lista">
        </form>
    </div>
<?php
    endif;
    
    include 'scripts.php';
    include 'footer.php';
?>