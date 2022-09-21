<?php
include('server/connection.php');
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    $product = $stmt->get_result();
} else {
    header('location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>продукт</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!-- верх-->
    <nav class="navbar navbar-expand-lg bg-white py-4 fixed-top">
        <div class="container">
            <img src="assets/img/shoplogo.jpeg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Магазин</a>
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

    <!--товар-->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

            <?php while ($row = $product->fetch_assoc()) { ?>
                             

                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <img class="img-fluid w-100 pb-1" src="assets/img/<?php echo $row['product_image']; ?>" id="mainImg" />
                        <div class="small-img-group">
                            <div class="small-img-col">
                                <img src="assets/img/<?php echo $row['product_image']; ?>" width="100%" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="assets/img/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="assets/img/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="assets/img/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        <h6>Мужская обувь</h6>
                        <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                        <h2><?php echo $row['product_price']; ?>р</h2>


                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />

                                <input type="number" name="product_quantity" value="1" />
                                <button class="buy-btn" type="submit" name="add_to_cart">Добавить</button>
                        </form>

                        <h4 class="mt-5 mb-5">Описание:</h4>
                        <span> <?php echo $row['product_description']; ?>
                        </span>
                    </div>
                

            <?php } ?>
        </div>
    </section>

    <!--похожие товары-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Похожие товары</h3>
            <hr class="mx-auto">

        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/bad.jpeg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">adidas x Bad Bunny Forum Low "Easter Egg</h5>
                <h4 class="p-price">18600р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--2-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/aj3.jpeg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Air Jordan 3 Retro "Desert Elephant"</h5>
                <h4 class="p-price">23000р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--3-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/aj1.jpeg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Jordan 1 Low "Mocha Brown"</h5>
                <h4 class="p-price">12000р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--4-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/as.jpeg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">ASICS x GmbH Gel-Quantum 360</h5>
                <h4 class="p-price">9600р</h4>
                <button class="buy-btn">Купить</button>
            </div>
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
    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for (let i = 0; i < 4; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src
            }
        }
    </script>
</body>

</html>