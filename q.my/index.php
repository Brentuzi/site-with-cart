<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
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
                        <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
                        <a href="account.html"><i class="fa-solid fa-user"></i></a>
                    </li>



                </ul>

            </div>
        </div>
    </nav>



    <!--главная-->
    <section id="home">
        <div class="container">
            <h5>Новое поступление</h5>
            <h1><span>Мы предоставляем Вам </span></h1>
            <p>Предлагаем оригинальную продукцию по справедливым ценам</p>
            <button>Купить сейчас</button>
        </div>
    </section>



    <!-- товары-->
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/brand1.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/brand2.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/brand3.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/brand4.jpeg" />
        </div>
    </section>

    <!-- новое-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/img/max.jpeg" />

                <div class="details">
                    <h2>Nike Air Max 1 "Travis Scott - Saturn Gold"</h2>
                    <button class="text-uppercase">Купить</button>
                </div>
            </div>
            <!--2-->


            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/img/dunk.jpeg" />

                <div class="details">
                    <h2>Nike Dunk Low "Cheetah" sneakers</h2>
                    <button class="text-uppercase">Купить</button>
                </div>
            </div>

            <!--3-->


            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/img/ston.jpeg" />

                <div class="details">
                    <h2>Jacket Stone Island Men</h2>
                    <button class="text-uppercase">Купить</button>
                </div>
            </div>
            <!---->

    </section>

    <!--soon-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Скоро</h3>
            <hr class="mx-auto">
            <p>в пути</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_coats.php'); ?>
            <?php while ($row = $coast_products->fetch_assoc()) {   ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" />
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price"><?php echo $row['product_price']; ?>р</h4>
                    <a href="<?php echo "single_product.php?product_id=".$row['product_id'];?>"><button class="buy-btn">Купить</button></a>
                </div>
            <?php } ?>
            </div>
    </section>


    <!--плакат  со скидкой-->
    <section id="banner" class="my-5 pb-5">
        <div class="container">
            <h4>Скидка</h4>
            <h1> Летнии коллекции <br> до 40%</h1>
            <button class="text-uppercase">за покупками</button>
        </div>
    </section>
    <!--только одежда-->

    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Одежда</h3>
            <hr class="mx-auto">
            <!--<p>в пути</p>-->
        </div>
        <div class="row mx-auto container-fluid">

            <?php include('server/get_featured_products.php'); ?>

            <?php while ($row = $featured_products->fetch_assoc()) {   ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" />
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price"><?php echo $row['product_price']; ?>р</h4>
                    <button class="buy-btn">Купить</button>
                </div>
            <?php } ?>
        </div>
    </section>




    <!--сумки-->
    <section id="bag" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Сумки</h3>
            <hr class="mx-auto">
            <!--<p>в пути</p>-->
        </div>
        <div class="row mx-auto container-fluid">
            <!--1-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/bag1.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"> Сумка box-logo side bag "SS22"</h5>
                <h4 class="p-price">5300р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--2-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/bag2.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">" Сумка Supreme x TNF bleached denim print"</h5>
                <h4 class="p-price">6900р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--3-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/bag3.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Рюкзак TNF"</h5>
                <h4 class="p-price">8000р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--4-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/bag4.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Шоппер Maison Kitsuné</h5>
                <h4 class="p-price">3000р</h4>
                <button class="buy-btn">Купить</button>
            </div>
        </div>
    </section>
    <!--обувь-->
    <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Обувь</h3>
            <hr class="mx-auto">
            <!--<p>в пути</p>-->
        </div>
        <div class="row mx-auto container-fluid">
            <!--1-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/vans.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Кеды vans</h5>
                <h4 class="p-price">6300р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--2-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/reb.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Addidas original кроссовки"</h5>
                <h4 class="p-price">6900р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--3-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/adi.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">adidas x Sean Wotherspoon x Disney Superturf Adventure"</h5>
                <h4 class="p-price">8000р</h4>
                <button class="buy-btn">Купить</button>
            </div>
            <!--4-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/img/force.jpg" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Nike air force 1 Supreme</h5>
                <h4 class="p-price">11000р</h4>
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
</body>

</html>