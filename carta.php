<?php
include("header.php");
include("Productos.php");
include("platosCombinados.php");
include("Categorias.php");
include("listaProductos.php");
require_once "Pedido.php";

function miPrint($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if (isset($_SESSION['compraProductos'])) {
    if (isset($_POST['producto'])) {
        // $productoSel = $arrayProductos[$_POST['producto']];
        array_push($_SESSION['compraProductos'], $_POST['producto']);
        miPrint($_SESSION['compraProductos']);
    }
} else {
    $_SESSION['compraProductos'] = array();
}

?>

<html>

<head>
    <title>Carta el Pato Gordo</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Descripció web" />
    <meta name="keywords" content="Paraules clau" />
    <meta name="author" content="Autor" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen" />

    <meta http-equiv="refresh" content="2000" />

</head>
<section id="carta_pc" class="container-fluid " style="background-image: URL(assets/images/mesas.jpg);">
    <h2 class="textoPlatos py-5">Nuestra Carta</h2>
    <div id="" class="container-xxl contenedorCarta">
        <div class="contenedor">
            <div class="row">
                <!-- <div class="col columnaVacia">
                </div> -->
                <div class="col-6 columna my-4">
                    <h2 class="TitleCards">Platos Combinados </h2>
                    <?php foreach ($platosCombinados as $plato) { ?>
                        <p id="TitlePlatos"><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre(); ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <div class="divP">
                            <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="col">

                </div>
                <div class="col-6 columna my-4">
                    <h2 class="TitleCards">Patos</h2>
                    <?php foreach ($arrayPatos as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <div class="divP">
                            <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="row align-items-center">
                <!-- <div class="col">

                </div> -->
                <div class="col-6 columnaMobil my-4 ">
                    <h2 class="TitleCards">Verduras/Merluza</h2>
                    <?php foreach ($arrayVerduras as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <div class="divP">
                            <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                        </div>
                    <?php }
                    ?>
                    <?php foreach ($arrayPescados as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <div class="divP">
                            <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="col">
                </div>
                <div class="col-6 columna my-4">
                    <h2 class="TitleCards">Postres</h2>
                    <?php foreach ($arrayPostres as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <div class="divP">
                            <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--                              CARTA MOBIL                               -->
<section id="carta_mobil" class="container-fluid py-5" style="background-image: URL(assets/images/mesas.jpg);">
    <h2 class="textoPlatos pb-5">Nuestra Carta</h2>
    <div id="" class="container-xxl contenedorCartaMobil">
        <div class="row">
            <!-- <div class="col columnaVacia">
                </div> -->
            <div class="col-12 columna my-4 mx-auto">
                <h2 class="TitleCards">Platos Combinados </h2>
                <?php foreach ($platosCombinados as $plato) { ?>
                    <p id="TitlePlatos"><?= $plato->getNombre() ?></p>
                    <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                    <form method="POST" action="carta.php">
                        <input type="hidden" name="producto" value='<?= $plato->getNombre(); ?>'>
                        <button type="submit" class="botonStyleCarta">Añadir</button>
                    </form>
                    <div class="divP">
                        <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                    </div>
                <?php }
                ?>
            </div>
            <!-- <div class="col">

                </div> -->
            <div class="col-12 columna my-4 mx-auto">
                <h2 class="TitleCards">Patos</h2>
                <?php foreach ($arrayPatos as $plato) { ?>
                    <p><?= $plato->getNombre() ?></p>
                    <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                    <form method="POST" action="carta.php">
                        <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                        <button type="submit" class="botonStyleCarta">Añadir</button>
                    </form>
                    <div class="divP">
                        <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                    </div>
                <?php }
                ?>
            </div>
        </div>

        <div class="row align-items-center">
            <!-- <div class="col">
                </div> -->
            <div class="col-12 columna my-4 mx-auto">
                <h2 class="TitleCards">Verduras/Merluza</h2>
                <?php foreach ($arrayVerduras as $plato) { ?>
                    <p><?= $plato->getNombre() ?></p>
                    <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                    <form method="POST" action="carta.php">
                        <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                        <button type="submit" class="botonStyleCarta">Añadir</button>
                    </form>
                    <div class="divP">
                        <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                    </div>
                <?php }
                ?>
                <?php foreach ($arrayPescados as $plato) { ?>
                    <p><?= $plato->getNombre() ?></p>
                    <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                    <form method="POST" action="carta.php">
                        <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                        <button type="submit" class="botonStyleCarta">Añadir</button>
                    </form>
                    <div class="divP">
                        <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                    </div>
                <?php }
                ?>
            </div>
            <!-- <div class="col">
                </div> -->
            <div class="col-12 columna my-4 mx-auto">
                <h2 class="TitleCards">Postres</h2>
                <?php foreach ($arrayPostres as $plato) { ?>
                    <p><?= $plato->getNombre() ?></p>
                    <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                    <form method="POST" action="carta.php">
                        <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                        <button type="submit" class="botonStyleCarta">Añadir</button>
                    </form>
                    <div class="divP">
                        <p class="styleP"><?= $plato->getPrecioProducto() ?>€</p>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- <div class="row align-items-end">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">

            </div>
        </div> -->
<!-- columna1 -->
<!-- <div class="row md-3">
            <div class="col-6 col-md-6 ">
                <div class="me-md-2 my-5 my-md-0 columna">
                    <h2 class="TitleCards">Platos Combinados </h2>
                    <?php foreach ($platosCombinados as $plato) { ?>
                        <p id="TitlePlatos"><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre(); ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <p class="styleP"><?= $plato->getPrecioProducto() ?></p>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="col-6 col-md-6 ">
                <div class="ms-md-2 columna">
                    <h2 class="TitleCards">Patos</h2>
                    <?php foreach ($arrayPatos as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <p class="styleP"><?= $plato->getPrecioProducto() ?></p>
                    <?php }
                    ?>
                </div>
            </div>
        </div> -->
<!-- columna2 -->
<!-- <div class="row px-1 py-5">
            <div class="col-6 col-md-6 ">
                <div class="me-md-2 my-5 my-md-0 columna">
                    <h2 class="TitleCards">Verduras/Merluza</h2>
                    <?php foreach ($arrayVerduras as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <p class="styleP"><?= $plato->getPrecioProducto() ?></p>
                    <?php }
                    ?>
                    <?php foreach ($arrayPescados as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <p class="styleP"><?= $plato->getPrecioProducto() ?></p>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="col-6 col-md-6 ">
                <div class="ms-md-2 columna">
                    <h2 class="TitleCards">Postres</h2>
                    <?php foreach ($arrayPostres as $plato) { ?>
                        <p><?= $plato->getNombre() ?></p>
                        <img class="imagenesCarta" src=<?= $plato->getImagen() ?>>
                        <form method="POST" action="carta.php">
                            <input type="hidden" name="producto" value='<?= $plato->getNombre() ?>'>
                            <button type="submit" class="botonStyleCarta">Añadir</button>
                        </form>
                        <p class="styleP"><?= $plato->getPrecioProducto() ?></p>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div> -->
</section>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>


<?php

include("footer.html");


?>