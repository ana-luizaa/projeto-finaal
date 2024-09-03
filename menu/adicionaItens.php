 <?php
 
//Pegando o caminho absoluto a partir da raiz da pasta publica do servidor
   $path = $_SERVER['DOCUMENT_ROOT'] . '\projeto-finaal\backend\\';

   $fileConnect = $path . 'config.php';

   include($fileConnect);
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