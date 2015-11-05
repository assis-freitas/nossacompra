<?php
    class Conexao{
        private $conexao;
        private $banco;
        private $charset;

        function __construct(){
            $this->conexao = mysqli_connect("localhost", "root", "7572504710") or die(mysqli_error($this->conexao));
            $this->banco   = mysqli_select_db($this->conexao, "nossacompra") or die(mysqli_error($this->conexao));
            $this->charset = mysqli_set_charset($this->conexao, "utf8") or die(mysqli_error($this->conexao));
        }

        function insert($tabela, $campos, $valores) {
            $query = "INSERT INTO ".$tabela."(";

            for($i = 0; $i < count($campos);$i++){
                $query .= $campos[$i];

                if($i != count($campos)-1){
                    $query .= ",";
                }
            }

            $query .= ") VALUES(";

            for($i = 0; $i < count($valores); $i++){

                if(is_int($valores[$i]) || is_float($valores[$i]) || is_double($valores[$i])){
                    $query .= $valores[$i];
                }else{
                    $query .= "'".$valores[$i]."'";
                }

                if($i != count($valores)-1){
                    $query .= ",";
                }
            }

            $query .= ")";

            mysqli_query($this->conexao, $query) or die(mysqli_error($this->conexao));
        }
        
        function update($tabela, $campos, $valores, $where){
            $query = "UPDATE $tabela SET ";
            
            for($i = 0; $i < count($campos); $i++){
                $query .= $campos[$i]." = ";
                if(is_int($valores[$i]) || is_float($valores[$i]) || is_double($valores[$i])){
                    $query .= $valores[$i];
                }else{
                    $query .= "'".$valores[$i]."'";
                }

                if($i != count($valores)-1){
                    $query .= ",";
                }
            }
            
            $query .= " WHERE ".$where;
            
            mysqli_query($this->conexao, $query);
        }
        
        function delete($tabela, $campo, $valor){
            $query = "DELETE FROM $tabela WHERE $campo = ";
            
            if(is_int($valor) || is_float($valor) || is_double($valor)){
                $query .= $valor;
            }else{
                $query .= "'".$valor."'";
            }
            
            mysqli_query($this->conexao, $query);
        }
        
        function select($tabela, $colunas, $where) {
            $query = "SELECT ";
            $data  = array();
            
            for($i = 0; $i < count($colunas);$i++){
                $query .= $colunas[$i];
                
                if($i != count($colunas)-1){
                    $query .= ",";
                }
            }
            
            $query .= " FROM $tabela ".$where;
            $q = mysqli_query($this->conexao, $query) or die(mysqli_error($this->conexao));
            
            while($a = mysqli_fetch_assoc($q)){
                array_push($data, $a);
            }
            return $data;
        }
        
        function selectmax($tabela, $coluna, $where){
            $data = array();
            $query = "SELECT MAX($coluna) AS 'maximo' FROM $tabela ".$where;
            $q = mysqli_query($this->conexao, $query) or die(mysqli_error($this->conexao));
            
            array_push($data, mysqli_fetch_assoc($q));
            
            return $data;
        }
    }