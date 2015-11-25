<?php
session_start();
$codigo = $_GET['cod_grupo'];
$codigo2 = $_GET['cod_lista'];




include("header.php");
require_once 'util/Conexao.class.php';
require_once 'util/funcoes.php';
$conexao = new Conexao();
$colunas = array("*");
$colunas1 = array("grupo.*");
$colunas2 = array("lista.*");

$dados = $conexao->select("itens_lista", $colunas, "JOIN lista ON lista.LIS_CODIGO = itens_lista.ITE_LIS_LIS_CODIGO");

$dados1 = $conexao->select("grupo", $colunas1, "where GRU_CODIGO = " . $codigo);

$dados2 = $conexao->select("lista", $colunas2, "where LIS_CODIGO =  " . $codigo2);

?>
<?php if(isMember($dados1[0]["GRU_CODIGO"])): ?>
<table>
    <thead>
        <tr>
            <th><?php echo $dados2[0]['LIS_NOME']; ?></th>
        </tr> 
    </thead>

    <tbody>
        <tr>
            <td><?php echo $dados[0]['ITE_LIS_DESCRICAO_ITEM']; ?></td>
        </tr>
    </tbody>
</table>


<?php
endif;
include("scripts.php");
include("footer.php");
?>