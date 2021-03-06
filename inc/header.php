<?php
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();   // Create Database Class Object
$fm = new Format();  // Create Format Class Object
$pd = new Product(); // Create Product Class Object
$ct = new Cart(); // Create Cart Class Object
$cat = new Category(); //Category object
$cmr = new User();

?>





<!DOCTYPE HTML>

<head>
    <title>Sklep</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
</head>

<body>
<div class="wrap">
    <div class="header_top">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="header_top_right">
            <div class="search_box">
                <form action="search.php" method="get">

                    <input type="text" name="search" placeholder="Szukaj produktu" id="searchbar">
                    <input type= "submit" value= "Szukaj" id="searchbarbtn">

                </form>
            </div>

            <div class="shopping_cart">
                <div class="cart">
                    <a href="cart.php" title="View my shopping cart" rel="nofollow">
                        <span class="cart_title">Koszyk</span>
                        <span class="no_product">
									<?php
                                    $getData = $ct->checkCartTable();
                                    if ($getData) {

                                        $sum = Session::get("sum");
                                        $qty = Session::get("qty");

                                        echo  $sum . " PLN";
                                    } else {
                                        echo "(pusty)";
                                    }
                                    ?>
								</span>
                    </a>
                </div>
            </div>

            <?php
            if (isset($_GET['cid'])) {
                $delDate = $ct->delCustomerCart();
                Session::destroy();
            }
            ?>

            <div class="login">
                <?php
                $login = Session::get("cuslogin");
                if ($login == false) { ?>
                    <a  href="login.php" >Zaloguj</a>
                <?php } else { ?>
                    <a href="?cid=<?php Session::get('cmrId') ?>">Wyloguj</a>
                <?php  } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>



<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="products.php">Produkty</a> </li>





        <?php
        $login = Session::get("cuslogin");
        if ($login == true) { ?>
            <li><a href="profile.php">Profil</a></li>
        <?php		} ?>


        <li><a href="contact.php">Kontakt</a> </li>
        <?php
        $chkCart = $ct->checkCartTable();
        if ($chkCart) { ?>


            <li><a href="order.php">Zamówienie</a></li>

            <li><a href="cart.php">Koszyk</a></li>

        <?php } ?>
        <div class="clear"></div>
    </ul>
</div>



</body>
<script>
    let searchbar = document.querySelector('#searchbar');
    let searchbarbtn = document.querySelector('#searchbarbtn');
    searchbarbtn.disabled = true;
    searchbarbtn.style.cursor = "not-allowed";
    searchbar.addEventListener("input", searchBarBlock);
    function searchBarBlock() {
        console.log("changed");
        if (searchbar.value === "") {
            searchbarbtn.disabled = true;
            searchbarbtn.style.cursor = "not-allowed";
        } else {
            searchbarbtn.disabled = false;
            searchbarbtn.style.cursor = "pointer";

        }
    }
</script>
