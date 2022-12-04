<?php


require_once "header.php";
require_once "Pedido.php";
require_once "Productos.php";
require_once "listaProductos.php";
// function miPrint($data)
// {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
$pedidos = [];

$precioTotal = 0;
$pedidoCookie = [];
if (isset($_SESSION['compraProductos'])) {
    if (isset($_POST['añadirProducto'])) {

        // $añadir = $_SESSION['compraProductos'][$_POST['añadirProducto']];
        // $añadir->setCantidadPedido($añadir->getCantidadPedido() + 1);
        array_push($_SESSION['compraProductos'], $_POST['añadirProducto']);
    }
    if (isset($_POST['restarProducto'])) {
        if (($key = array_search($_POST['restarProducto'], $_SESSION["compraProductos"])) !== false) {
            unset($_SESSION["compraProductos"][$key]);
        }
    }
    if (isset($_POST['borrarProducto'])) {
        $array_del = array($_POST["borrarProducto"]);
        $_SESSION["compraProductos"] = array_values(array_diff($_SESSION["compraProductos"], $array_del));
    }
    $cuentasProductos = array_count_values($_SESSION['compraProductos']);
    foreach ($cuentasProductos as $nombreProducto => $cuentas) {
        $producto = $listaProductos[$nombreProducto];
        $pedido = new Pedido($nombreProducto, $cuentas, $producto->getPrecioProducto());
        array_push($pedidos, $pedido);
        $precioTotal = $precioTotal + $pedido->getPrecioTotal();
        array_push($pedidoCookie, [$nombreProducto, $cuentas, $pedido->getPrecioTotal()]);
    }
} else {
    $_SESSION['compraProductos'] = array();
}

setcookie("pedido", json_encode($pedidoCookie), time() + 8 * 3600);

setcookie("precioTotal", $precioTotal, time() + 8 * 3600);

?>



<html>

<head>
    <title>Platilla de bootstrapp</title>

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
<html>
<section id="carrito_pc" class="container-fluid pt-5 pb-5" style="background-image: URL(assets/images/mesas.jpg);">
    <h1 class="text-center h1Carrito pb-5">Carrito</h1>
    <div class="container contenedorCarrito pt-1">
        <div class="contenedorDentroCarrito container-fluid">
            <h1 class="h1Pedido mx-5 pt-3">Tu Pedido</h1>
            <?php foreach ($pedidos as $pedido) { ?>
                <div class="container">
                    <div class="row px-3">
                        <div class="col-md">
                            <p class="px-4"><?= $pedido->getNombrePedido() ?></p>
                        </div>
                        <div class="col-md">
                            <div class="d-flex flex-row " style="margin-left:6rem;">
                                <form method="POST" action="carrito.php">
                                    <input type="hidden" name="añadirProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                                    <button type="submit" class="botonStyleCarritoPC mx-3"><img src="assets/images/mas.png" width="30px" height="30px"></button>
                                </form>
                                <p class="pt-1"><?= $pedido->getCantidadPedido() ?></p>
                                <div class="">
                                    <form method="POST" action="carrito.php">
                                        <input type="hidden" name="restarProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                                        <button type="submit" class="botonStyleCarritoPC mx-3"><img src="assets/images/menos.png" width="30px" height="30px"></button>
                                    </form>
                                </div>
                                <div class="" style=" margin-left:12rem">
                                    <p class="pt-1"> Precio: <?= $pedido->getPrecioTotal() ?>€</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <form method="POST" action="carrito.php">
                                <input type="hidden" name="restarProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                                <button type="submit" class="botonStyleCarritoPC mx-3" style="float: right;"><img src="assets/images/trash.png" width="30px" height="30px"></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <div class="d-flex flex-row ">
                <div class="container mx-4" style="max-width: 25%;">
                    <div class="divPrecio">
                        <h5 class="h2Total mx-3" style="float:left;">Total: </h5>
                        <p class="pPrecio px-3" style="float:right;"><?= $precioTotal ?></p>
                    </div>
                </div>
                <div class="p-1 container" style="max-width:22%; ">
                    <form method="POST" action="CompraFinal.php">
                        <button type="submit" style="float:right;" class="botonStyleCarrito">Finalizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--                     CARRITO             MOBILE                   -->
<section id="carrito_mobil" class="container-fluid pt-5 pb-5" style="background-image: URL(assets/images/mesas.jpg);">
    <h1 class="text-center h1Carrito pb-5">Carrito</h1>
    <div class="container contenedorCarrito pt-2">
        <div class="container contenedorDentroCarritoMobil">
            <h1 class="h1Pedido py-3 " style="padding-left:30px">Tu Pedido</h1>
            <?php foreach ($pedidos as $pedido) { ?>
                <p style="padding-left:30px"><?= $pedido->getNombrePedido() ?></p>
                <p style="padding-left:30px">Precio: <?= $pedido->getPrecioTotal() ?></p>
                <div class="d-flex flex-row ">
                    <div class="p-1 ">
                        <form method="POST" action="carrito.php">
                            <input type="hidden" name="borrarProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                            <button type="submit" class="botonStyleCarritoMas"><img src="assets/images/mas.png" width="30px" height="30px"></button>
                        </form>
                    </div>
                    <div class="p-1">
                        <p><?= $pedido->getCantidadPedido() ?></p>
                    </div>
                    <div class="p-1">
                        <form method="POST" action="carrito.php">
                            <input type="hidden" name="borrarProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                            <button type="submit" class="botonStyleCarritoMenos"><img src="assets/images/menos.png" width="30px" height="30px"></button>
                        </form>
                    </div>
                    <div class="p-1 px-5">
                        <form method="POST" action="carrito.php">
                            <input type="hidden" name="borrarProducto" value='<?= $pedido->getNombrePedido(); ?>'>
                            <button type="submit" class="botonStyleCarritoQuitar"><img src="assets/images/trash.png" width="30px" height="30px"></button>
                        </form>
                    </div>
                </div>
            <?php }
            ?>
            <div class="d-flex flex-row ">
                <div class="container mx-3" style="max-width: 50%;">
                    <div class="divPrecio">
                        <h5 class="h2Total mx-3" style="float:left;">Total: </h5>
                        <p class="pPrecio px-3" style="float:right;"><?= $precioTotal ?></p>
                    </div>
                </div>
                <div class="p-1 container" style="max-width:32%; max-height:60%">
                    <form method="POST" action="CompraFinal.php">
                        <button type="submit" style="float:right;" class="botonStyleCarrito">Finalizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
<?php

require_once "footer.html";


?>