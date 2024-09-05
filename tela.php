<?php
// Pegando o caminho absoluto a partir da raiz da pasta publica do servidor
$path = $_SERVER['DOCUMENT_ROOT'] . '/projeto-finaal/backend/';

$fileConnect = $path . 'config.php';

include($fileConnect);

$sql = "SELECT * FROM item_pedido";
$result = mysqli_query($conexao, $sql);

$valorTotalItens = 0; // Inicializa o valor total

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="tela.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="website icon" type="png" href="">
    <title>Cheirô Mineiro</title>
</head>

<body>
    <nav>
        <ul class="nav-flex-row">
            <div class="icons-container">
                <div class="menu-icon">
                    <a href="<?php echo'./menu/menuRefeicao.php';?>"><i class="fa-solid fa-bars"></i></a>
                </div>
                <div class="cart-icon">
                    <a href="#cart"><i class="fa-solid fa-shopping-cart"></i></a>
                </div>
            </div>
        </ul>
    </nav>    

    <section class="section-intro">
        <header>
            <h1>Cherô Mineiro</h1>
        </header>
        <div class="link-to-book-wrapper">
            <a class="link-to-book" href="#reservations"></a>
        </div>
    </section>

    <div class="info-box">
        <div class="info-item">
            <i class="fa-solid fa-magnifying-glass"></i>
            <h3>Cidade</h3>
            <p>Belo Horizonte</p>
        </div>
        <div class="info-item">
            <i class="fa-regular fa-clock"></i>
            <h3>Horário</h3>
            <p>11h - 17h</p>
        </div>
        <div class="info-item">
            <i class="fa-solid fa-utensils"></i>
            <h3>Modalidades</h3>
            <p>Delivery</p>
        </div>
    </div>

    <section class="panels">
        <div class="panels-sm">
            <div class="panel">
                <div>
                    <div class="icon">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <h2>Um pedaço de Minas em cada prato, com o sabor que só a comida mineira tem!</h2>
                </div>
            </div>
            <div class="panel"></div>
            <div class="panel"></div>
            <div class="panel">
                <div>
                    <div class="icon">
                        <i class="fa-solid fa-plate-wheat"></i>
                    </div>
                    <h2>Aqui, o cheiro da comida mineira invade a cozinha e o coração</h2>
                </div>
            </div>
        </div>
        </div>
        <div class="panel-lg"></div>
    </section>
    <div id="cart" class="cart-hidden">
        <div class="cart-header">
          <h2>Meu Carrinho</h2>
          <i class="fa-solid fa-shopping-cart"></i>
        </div>
       
            <!-- constroi o cardapio trazendo os dados do banco -->
            <?php
                if(empty($carrinho = mysqli_fetch_assoc($result))){
                echo "<div class='cart-content'><div id='cart-items'><p id='empty-cart-message'>Você não adicionou nenhum item.</p></div></div>";
                }
                else{
                    while($carrinho = mysqli_fetch_assoc($result)){
                        $itemDetalhe = "SELECT nome, valor, nomeImg FROM item WHERE idItem = '" . $carrinho['idItem'] . "'";
                        $resultSel = $conexao->query($itemDetalhe);
                        $linhaDet = mysqli_fetch_assoc($resultSel);
                        $valorTI = $valorTotalItens + $linhaDet['valor'];

                        $valorTotalItens += $linhaDet['valor'];

                        echo "<div id='cart-items'><img src=./menu/img/".$linhaDet['nomeImg']."><h2>".$linhaDet['nome']."</h2><li>R$".$linhaDet['valor'].",00</li></div><br/>";
                        
                    }
                }
        ?>
        
        <div class="cart-footer">
            <a class="continue-button" href="./FinalizarCompra/index.html">Continuar</a><br/>
    </div>
    
      </div>
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
            <div class="wave" id="wave5"></div>
        </div>
        <ul class="social_icon">
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <p>Cherô Mineiro©2024 | Feito com muito amor❤️Belo Horizonte</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="carrinho.js"></script>
</body>

</html>