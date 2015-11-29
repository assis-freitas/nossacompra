<?php
    $conexao = new Conexao();
    $membro_edit = $_POST ['Valor'];
    $codigo = $_GET['cod_grupo'];
    
    $dados = $conexao->select('membros', array('*'), "where MEM_USU_EMAIL = '$email_membro' and MEM_GRU_CODIGO = $codigo");
    
    $att = "UPDATE membros SET MEM_IDENTIFICADOR WHERE GRU_CODIGO =" . $codigo;
?>
