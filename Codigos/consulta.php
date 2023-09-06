<?php
 function consulta(){
    include("conexaoBD.php");

     if ($_SERVER["REQUEST_METHOD"] === 'POST') {

         if (isset($_POST["idProduto"]) && ($_POST["idProduto"] != "")) {
             $idProduto = $_POST["idProduto"];
             $stmt = $pdo->prepare("select from * idProduto");
             $stmt->bindParam(':idProduto', $idProduto);
         } else {
             $stmt = $pdo->prepare("select * from idProduto 
             ");
         }

         try {
             //buscando dados
             $stmt->execute();
         } catch (PDOException $e) {
             echo 'Error: ' . $e->getMessage();
         }

         $pdo = null;
     }
     return $idProduto;
    }

?>