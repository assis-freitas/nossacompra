<?php
session_start();
require_once ("util/funcoes.php");
require_once ("util/Conexao.class.php");

include("header.php");
$codigo = $_GET['codGrupo'];

if (!isMember($codigo) && !isAdministrator($codigo)):
    ?>
<div class="container" id="conteudo">
    <div class="alert alert-danger">
        <p>
            Você não tem permissão para acessar está página
        </p>
    </div>
</div>
<?php
else:
    if(isset($_POST['email']) && isset($_GET['cod_grupo'])):

    $email_membro = $_POST['email'];
    $codigo3 = $_GET['mem_identificador'];
    $conexao = new Conexao();
    $dados = $conexao->select('membros', array('*'), "where MEM_USU_EMAIL = '$email_membro' and MEM_GRU_CODIGO = $codigo");
    $dados2 = $conexao->select('grupo',array('GRU_USU_EMAIL') , "where GRU_CODIGO = ".$codigo);
    var_dump($dados2);
    $mem_identificador->select('membros',array('*'),"where MEM_USU_EMAIL =".$codigo3);
    ?>
    
       
        <div class="container" action="/membro/editado/<?php echo $mem_identi?>"id="conteudo">
            <form method="post">
            <label>Nomear como adm do grupo?</label>
            <input type="checkbox" /> 
            <input type="hidden" name="Valor" value="<?php echo $email_membro?>"/>
            <input type="submit" class="btn btn-default" value="Salvar"/>
            </form>
        </div>
        <div class="container" id="conteudo">
            <label>Remover membro do grupo ?</label>
            <button type="submit" class="btn btn-default btn-danger" Value="Remover"<?php if ($dados[0]['MEM_IDENTIFICADOR'] == 1) echo "disabled" ?>>Remover</button>
        </div>
        
   
    <?php
    else:
        echo 'Qualquer coisa ai';
    endif;
endif;
include("scripts.php");
include("footer.php");
?>