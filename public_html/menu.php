<?php
include 'php/util/connection.php';
$sql = "SELECT * FROM products";
try {
    conectar();
    $resultado = consultar($sql);
    $menu = $resultado;
    unset($resultado);
    desconectar();
} catch (Exception $exc) {
    die($exc->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>La Trattoria Secreta | Menu</title>
        <link rel="stylesheet" href="./css/menu.css" />
        <link rel="stylesheet" href="./css/main.css" />
        <?php include 'fragments/head_links.php'; ?>
    </head>
    <body>
        <header>
            <?php include 'fragments/nav.php'; ?>
        </header>
        <main>
            <div class="title_section">
                <p><i class="bx bxs-food-menu"></i> Nuestro Menu</p>
                <h3>Prueba nuestros deliciosos Platos</h3>
            </div>
            <div class="container_menu">
                <div class="categories">
                    <div class="nav_categories">
                        <ul>
                            <li><a data-categoria="Todo" href="#" class="category_active category_item">Todos</a></li>
                            <li><a data-categoria="1" class="category_item">Platos Principales</a></li>
                            <li><a data-categoria="2" class="category_item">Ensaladas</a></li>
                            <li><a data-categoria="3" class="category_item">Aperitivos</a></li>
                            <li><a data-categoria="4" class="category_item">Bebidas</a></li>
                            <li><a data-categoria="5" class="category_item">Postres</a></li>
                        </ul>
                    </div>
                </div>
                <section id="menu" class="menu">
                    <div class="menu_cards">
                        <?php
                        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 6;
                        //Empieza desde la posición 0 hasta la cantidad de la variable $limit
                        $items = array_slice($menu, 0, $limit);

                        foreach ($items as $item) :
                            ?>
                            <div class="card">
                                <div>
                                    <div class="container_img">
                                        <img src="<?= $item['src'] ?>" alt="<?= $item['title'] ?>" class="card_img" style="width: 95px; height: 100px" />
                                    </div>
                                    <div class="card_inner">
                                        <div class="description">
                                            <h4><?= $item['title'] ?></h4>
                                            <p>
                                                <?= $item['description'] ?>
                                            </p>
                                        </div>
                                        <div class="review_starts">
                                            <?php
                                            for ($i = 0; $i < $item['stars']; $i++) {
                                                echo '<i class="bx bxs-star" style="color: #ffb100"></i>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="price">
                                    <span>S/ <?= $item['price'] ?></span>
                                    <button class="button" type="button" id="<?= $item['id'] ?>">Agregar</button>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <button type="button" id="btn_seeAll" onclick="seeMore()">See All</button>
                </section>
            </div>
            <div id="container_cart" class="container_cart hidden">
            </div>
        </main>
        <footer>
            <?php include 'fragments/footer.php'; ?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/menu.js"></script>
        <script src="js/login_signup.js"></script>
        <script src="js/go_productos.js"></script>

    </body>

</html>