<?php 
    session_start();
    $id = $_GET['id'];
    require_once 'util/funcoes.php';
    require_once 'util/Conexao.class.php';
    $objetos = new Conexao();
    if(!isset($_POST['resp'])){
        if(isLogged()){
            $grupos = $objetos->select('grupo',array('*'),"where GRU_CODIGO = $id and GRU_USU_EMAIL ='".$_SESSION['usuario']['USU_EMAIL']."' ")[0];
            if(count($grupos) > 0):
                include("header.php");

            ?>
            <div class="container" id="conteudo">
                <form method="post">
                    <label>Você realmente deseja excluir o grupo <?php echo $grupos["GRU_NOME"]; ?>?</label>
                    <input type="submit" name="resp" value="Sim" class="btn btn-default btn-danger">
                    <input type="submit" name="resp" value="Não" class="btn btn-default">
                </form>
            </div>
<?php
                include("scripts.php");
                include("footer.php");
            else:
                header('Location: /dashboard/');
            endif;
        }
        else{
            header('Location: /login/');
        }
    }else{
        if($_POST['resp'] == "Sim"){
            $objetos->delete("mensagem", "MENS_GRU_CODIGO", $id);
            $objetos->delete("itens_lista", "ITE_LIS_GRU_CODIGO", $id);
            $objetos->delete("lista", "LIS_GRU_CODIGO", $id);
            $objetos->delete("membros", "MEM_GRU_CODIGO", $id);
            $objetos->delete("grupo", "GRU_CODIGO", $id);
        }
        header("Location: /dashboard/");
        
    }
?>