 <?php
 
   include "config.php";
   $redirect= $_POST['redirect'];
   $idItem = $_POST['idItem'];
   $qtdItem = $_POST['quantidade'];
   $qtdItemTotal = $qtdItem + 1;
   $sqlInsItem = "INSERT INTO item_pedido (idItem, quantidade, idPedido) VALUES ('" . $idItem . "','" . $qtdItemTotal . "', NULL)";
   $dadosInsertItem = mysqli_query($conexao, $sqlInsItem);
   if (isset($_POST['idItem'])) {
      $dadosInsertItem;
      header("Location: $redirect");
   }

?>