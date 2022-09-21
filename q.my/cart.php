<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include('server/connection.php');

// unset($_SESSION);

session_start();

function console_log($data)
{ // сама функция
    if (is_array($data) || is_object($data)) {
        echo ("<script>console.log('php_array: " . json_encode($data) . "');</script>");
    } else {
        echo ("<script>console.log('php_string: " . $data . "');</script>");
    }
}

console_log($_POST);
console_log($_SESSION);

if (isset($_GET['remove_product'])) {
    console_log($_GET);
    $product_id = $_GET['product_id'];
    console_log($product_id);

    unset($_SESSION['cart'][$product_id]);
    console_log("try to unset product");
} else {
    //header('location: index.php');
}

// вызов функции
if (isset($_POST['add_to_cart'])) {
    // если массив пост с add_to_cart не пустой, то выполняем
    if (isset($_SESSION['cart'])) {
        // если $_SESSION не пустой, то двигаем дальше, иначе
        // сейчас он у нас пуст, следовательно выполняем else

        $products_array_ids = array_column($_SESSION['cart'], "product_id");

        if (!in_array($_POST['product_id'], $products_array_ids)) {


            $product_id = $_POST['product_id'];

            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );
            //array_push($_SESSION['cart'], $product_array);
            //
            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            var_dump($_SESSION);
            echo '<script>alert("Товар уже в корзине");</script>'; // это не ворк?
        }
    } else {
        $product_id = $_POST['product_id'];
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        );
        // array_push($_SESSION['cart'], $product_array);
        $_SESSION['cart'][$product_id] = $product_array;
    }


    //удалить из корзины
} else if (isset($_POST['remove_product'])) {
    console_log($_POST);
    $product_id = $_POST['product_id'];
    console_log($product_id);
    unset($_SESSION['cart'][$product_id]);


} else if ( isset($_POST['edit_quantity'])) {
    
    $product_id = $_POST['product_id'];

    $product_quantity = $_POST['product_quantity'];
    console_log($product_quantity);
    $product_array = $_SESSION['cart'][$product_id];
    
    $product_array['product_quantity'] = $product_quantity;

  
    $_SESSION['cart'][$product_id] = $product_array;


} else {
    //header('location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!--верх-->
    <nav class="navbar navbar-expand-lg bg-white py-4 fixed-top">
        <div class="container">
            <img src="assets/img/shoplogo.jpeg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Магазин</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Обратная связь</a>
                    </li>

                    <!--корзина пользователь -->
                    <li class="nav-item">
                        <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                        <a href="account.php"><i class="fa-solid fa-user"></i></a>
                    </li>



                </ul>

            </div>
        </div>
    </nav>



    <!--корзина-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde"> Ваша корзина</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Товар</th>
                <th>Количество</th>
                <th>Итог</th>
            </tr>

            <pre><?php
                    //print_r($_GET);
                    //    var_dump($_SESSION);
                    //    var_dump($_GET);
                    //    print_r($_SESSION);
                    ?></pre>

            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/img/<?php echo $value['product_image']; ?>" />
                            <div>
                                <p><?php echo $value['product_name']; ?></p>
                                <small><span><?php echo $value['product_price']; ?></span>р</small>
                                <br>
                                <form metod="POST" action="cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                    <input type="submit" name="remove_product" class="remove-btn" value="удалить" />
                                </form>

                            </div>
                        </div>
                    </td>
                    <td>

                        <form metod="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" />
                                <input type="submit" class="edit-btn" value="изменить" name="edit_quantity"/>
                        </form>

                    </td>

                    <td>
                        <span class="product-price"><?php echo $value['product_quantity']* $value['product_price']  ?> </span>
                        <span>р</span>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Промежуточный итог</td>
                    <td>14300р</td>
                </tr>
                <tr>
                    <td>Итог</td>
                    <td>14300р</td>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
            <button class="btn checkout-btn">Оплата</button>
        </div>

    </section>















    <!-- низ-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">

                <p class="pt-3">Мы предоставляем лучшее предложение на рынке</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Полезное</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Мужчины</a></li>
                    <li><a href="#">Женщины</a></li>
                    <li><a href="#">Мальчики</a></li>
                    <li><a href="#">Девочки</a></li>
                    <li><a href="#">Новое поступление</a></li>
                    <li><a href="#">Одежда</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Контакты</h5>
                <div>
                    <h6 class="text-uppercase">Адрес</h6>
                    <p> Санкт Петербург, ст.м Пионерская</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Телефон</h6>
                    <p>+79315404256</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Почта</h6>
                    <p>alex-vp@outlook.com</p>
                </div>
            </div>

        </div>
        <div class="copyright mt-5">
            <div class="row container mx-auto">

                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                    <p>copyright 2022</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-vk"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
        </div>


    </footer>
    <script src="https://kit.fontawesome.com/c07e720f16.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>