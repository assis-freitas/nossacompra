<?php
    function isLogged(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start ();
        }
        
        if(isset($_SESSION['usuario'])){
            return true;
        }
        
        return false;
    }
    
    function isAdministrator($codGrupo){
        if(isLogged()){
            if(session_status() != PHP_SESSION_ACTIVE)
                session_start();
            
            require_once 'util/Conexao.class.php';
            $conexao = new Conexao();
            $colunas = array("grupo.*", "membros.MEM_IDENTIFICADOR");
            $dados = $conexao->select("membros", $colunas, "INNER JOIN grupo ON membros.MEM_GRU_CODIGO = grupo.GRU_CODIGO WHERE membros.MEM_USU_EMAIL = '".$_SESSION['usuario']['USU_EMAIL']."' AND GRU_CODIGO = $codGrupo");
        
            if(count($dados) > 0){
                if($dados[0]["MEM_IDENTIFICADOR"] == 1){
                    return true;
                }
            }
            
        }
        
        return false;
    }
?>