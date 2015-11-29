<?php
session_start();
$codigo = $_GET['codGrupo'];
$codigo2 = $_GET['codLista'];

include("header.php");
require_once 'util/Conexao.class.php';
require_once 'util/funcoes.php';
$conexao = new Conexao();
$colunas = array("*");

$dados = $conexao->select("itens_lista", $colunas, "JOIN lista ON lista.LIS_CODIGO = itens_lista.ITE_LIS_LIS_CODIGO WHERE itens_lista.ITE_LIS_LIS_CODIGO = $codigo2");

?>
<?php if(isMember($codigo)): ?>
<div class="container" id="conteudo">
    <a href="/grupos/<?php echo $codigo ?>/listas/<?php echo $codigo2; ?>/itens/adicionar/" class="btn btn-default" title="Criar novos itens"><i class="fa fa-plus"></i> Novo item</a>
    <br>
 <?php if(count($dados) == 0): ?>
    <p id="erroGrupo">Nenhum item encontrado</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <th>Produtos</th>
                <th>Quantidade</th>
                <th>
                    Opções
                </th>
            </thead>

            <tbody>
                <?php foreach($dados as $item): ?>
                <tr>
                    <td><?php echo $item['ITE_LIS_DESCRICAO_ITEM']; ?></td>
                    <td><?php echo $item['ITE_LIS_QUANTIDADE']; ?></td>
                    <td>
                        <a href="/grupos/<?php echo $codigo ?>/listas/<?php echo $codigo2; ?>/itens/<?php echo $item['ITE_LIS_CODIGO'];?>/editar/" data-toggle="tooltip" data-placement="bottom" title="Editar Item" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        <a href="/grupos/<?php echo $codigo ?>/listas/<?php echo $codigo2; ?>/itens/<?php echo $item['ITE_LIS_CODIGO'];?>/excluir/" data-toggle="tooltip" data-placement="bottom" title="Excluir Item" class="btn btn-default"><i class="fa fa-times-circle"></i></a>
                        <a href="/grupos/<?php echo $codigo ?>/listas/<?php echo $codigo2; ?>/itens/<?php echo $item['ITE_LIS_CODIGO'];?>/excluir/" data-toggle="tooltip" data-placement="bottom" title="Item Comprado" class="btn btn-default"><i class="fa fa-cart-arrow-down"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php else: ?>
    <div class="container" id="conteudo">
        <div class="alert alert-danger">
            <p>Desculpe, você não é membro do grupo</p> 
        </div>
    </div>
</div>
<?php
endif;
include("scripts.php");
include("footer.php");
?>