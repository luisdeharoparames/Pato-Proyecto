<?php
include("header.php");

include ("Productos.php");
include ("Patos.php");
include ("Carnes.php");
include ("Pescados.php");
include ("Postres.php");
include ("Categorias.php");
include("listaProductos.php");
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

<body>
    <section id="banner_principal" class="container-fluid" style="background-image: URL(assets/images/mesas.jpg);">
        <div class="col-12 banner">
            <h2 class="mb-5 ">Restaurante</h2>
            <h1 class="mb-5 ">Con el cariño y la dedicacion de lo casero</h1>
            <button type="button" id="botonmenuprincipal">Ver Carta</button>
        </div>
    </section>
    <section id="pasteles" class="container-fluid mt-5 pb-5 mb-5">
        <h2 class="textoPlatos">Platos mas Solicitados</h2>
        <hr>
        <div class="container-xxl contenedor-xxl">
            <div class="text-center row md-3">
            <?php foreach($platosSolicitados as $platosSoli) { ?>
                <div class="col-12 col-md-3 mt-3 divOferta">
                    <div class="bg-color1 m-1">
                    <img class="fotocolumna" src=<?=$platosSoli->getImagen()?>>
                        <h3 class="textoOfertas fs-4 fa-center p-3 d-flex justify-content-center"><?=$platosSoli->getNombre()?></h3>
                    </div>
                    <button type="button" class="botonStyle" href="">Añadir</button>
                </div>
            <?php } 
            ?>
            </div>
        </div>

    </section>
    <section id="seccionPatoGordo" class="container-fluid" style="background-image: URL(assets/images/señora.png);">
        <div class="col-12 banner">
            <h2 class="mb-2">El Pato Gordo</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and
                typesetting industry.</p><p> Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s,</p><p>
                when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived </p>
            <button type="button" id="botonmenuprincipal">Saber Mas</button>
        </div>
    </section>
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>

<?php

include("footer.html");

?>