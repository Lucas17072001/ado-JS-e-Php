<?php
    function conectar() {
        try {
            $conn = "estacionamento.bd";
            return new PDO("sqlite:$conn");
        } 
	    catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            throw $e;
        }
    }
?>