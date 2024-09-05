<?php
//Pegando o caminho absoluto a partir da raiz da pasta publica do servidor
$path = $_SERVER['DOCUMENT_ROOT'] . '\projeto-finaal\backend\\';

$fileConnect = $path . 'config.php';

include($fileConnect);

 $sql = "SELECT * FROM item WHERE tipo = 'bebida'";
 $result = mysqli_query($conexao, $sql);
 
?>
<!DOCTYPE html>
<html lang="en">
<form action="adicionaItens.php" method="POST">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebida</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <body>
        <div class="menu">
            <h1>BEBIDA</h1>
            <div class="teste">

                <Section>
                    <div class="cardapio">
                        <a href="menu.php">CARDÁPIO</a>
                        </div>
                
                    <div class="sobremesa">
                        <a href="menusobremesa.php">SOBREMESA</a>
                    </div>
                </Section>
            </div>
        <div>

        </div>
        
            


            <!-- constroi o cardapio trazendo os dados do banco -->
        <?php
                    while($cardapio = mysqli_fetch_assoc($result)){
                       
                        echo "<section><div class='menu-item'><img src='./menu/img/".$cardapio['nomeImg']."'><h2>".$cardapio['nome']."</h2><li>R$".$cardapio['valor']."</li><p class='text-bottom'>".$cardapio['descricao']."</p><button class='add-to-cart' name='insertItem'><input hidden name='idItem' value='".$cardapio['idItem']."'></input><input hidden name='quantidade' value='".$cardapio['quantidade']."'><input hidden name='redirect' value='menubebida.php'></input><input hidden type='submit'><i class='fa-solid fa-cart-shopping'></i></button></div></section><br />";
                    };
            
        ?>
        </div>


        <script src="menu.js"></script>
</body>
                </form>
</html>