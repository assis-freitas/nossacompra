<?php
//Verifica se uma sessão foi iniciada
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start(); //Se não tiver uma sessão iniciada, ele inicia
}

require_once("util/funcoes.php"); //Faz a requisição do arquivo de funções
require_once("util/Conexao.class.php"); //Faz a requisição da classe de Conexão

$cod_grupo = $_GET['codGrupo']; //Pega o código do grupo passado por parâmetro
$cod_lista = $_GET['codLista']; //Pega o código da lista passado por parâmetro
include("header.php"); //inclue o arquivo de cabeçalho da página html que contém todos os arquivos necessários para o funcionamento do layout

if (isset($_POST['quantidade']) && //verifica se foi submetido o formulário de adicionar item
        isset($_POST['descricao'])) {
    $quantidade = $_POST['quantidade']; //Pega o valor submetido do formulario via POST
    $descricao = $_POST['descricao'];
    $conexao = new Conexao(); //Instancia um objeto de conexão com o banco de dados

    $conexao->insert("itens_lista", array("ITE_LIS_LIS_CODIGO", "ITE_LIS_DESCRICAO_ITEM", "ITE_LIS_QUANTIDADE", "ITE_LIS_STATUS"), array($cod_lista, $descricao, $quantidade, 0)); //Função utilizada para estar inserindo os dados no banco

    header("Location: /grupos/$cod_grupo/listas/$cod_lista/itens/");
}

if (!isMember($cod_grupo)): //Verifica se o usuário logado é membro do grupo
    ?>
    <div class="container" id="conteudo">
        <div class="alert alert-warning">
            <p>
                Você não tem acesso a este grupo
            </p>
        </div>
    </div>
<?php else: //Se o usuário for membro do grupo ele carrega o formulário para adicionar o item ?> 
    <div class="container" id="conteudo">
        <form method="post" action="">		
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" name="descricao">
            </div>

            <div class="form-group">
                <label>Quantidade</label>
                <input type="text" class="form-control" name="quantidade">
            </div>

            <input type="submit" class="btn btn-default" value="Adicionar item">
        </form>
    </div>
<?php
endif;
include("footer.php"); //Inclui o rodapé da página html
?>