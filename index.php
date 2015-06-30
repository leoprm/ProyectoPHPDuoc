<?php
    /*
    |--------------------------------------------------------------------------
    | Archivos y configuracion de Pagina
    |--------------------------------------------------------------------------
    |
    | Aqui se hace "required" de archivos minimos de funcionamiento para armar
    | cada pagina, mas declaraion de variables para el header, menu, sidebar.
    |
    */
    $titulo = "Inicio";

    require __DIR__.'/./config/env.php';
    require __DIR__.'/./templates/sitio/header.php';
    require __DIR__.'/./clases/Producto.php';

    $modelo = new Producto();
    $productos = $modelo->obtenerTodos(6);

    /*
    |--------------------------------------------------------------------------
    | Contenido del Sitio
    |--------------------------------------------------------------------------
    |
    | Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
    | haber solo HTML cn algunos tags para PHP para acceder a variables.
    |
    */
?>

<div class="row row-offcanvas row-offcanvas-left">
    <?php require __DIR__.'/./templates/sitio/menu.php'; ?>
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <!-- Portada del Sitio -->
        <div class="jumbotron clearfix">
            <div class="row">
                <div class="col-md-9">
                    <h1>¡Ambienta tu espacio!</h1>
                    <p class="pull-left">
                        Puedes decorar cualquier rincón de tu casa de manera sencilla y económica. Olvídate del clásico cuadro y dale a tu entorno un toque original y muy moderno.
                    </p>
                </div>
                <div class="col-md-3">
                    <img src="<?= ROOT_URL.'assets/dist/img/presentacion.jpg' ?>" class="img-circle imagen-presentacion">
                </div>
            </div>
        </div>

        <!-- Despliege de Productos -->
        <?php if($productos->rowcount() > 0){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1><span class="glyphicon glyphicon-shopping-cart"></span> Productos</h1>
                    </div>
                </div>

                <?php foreach ($productos as $producto){ ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= ROOT_URL ?>assets/dist/img/uploads/<?= $producto['IMAGENPROD'] ?>" class="img-circle img-producto">
                            <div class="caption">
                                <h3><?= $producto['NOMBREPROD'] ?></h3>
                                <p><?= $producto['DESCRIPPROD'] ?></p>
                                <div class="clearfix">
                                    <a href="<?= ROOT_URL ?>detalle.php?id=<?= $producto['IDPROD'] ?>" class="btn btn-default pull-right">Ver Detalle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?= ROOT_URL ?>productos.php" class="btn btn-primary">Ver todos los Productos</a>
                </div>
            </div>
        <?php }else{ ?>
            <div class="row">
                <div class="alert alert-warning" role="alert">
                    <strong>D'oh</strong>
                    <br>
                    No existen productos para deplegar :c
                </div>
                <div class="col-md-12 text-center">
                    Pero siempre puedes <a href="<?= ROOT_URL ?>contacto.php">contactarnos</a> por si tienes dudas.
                </div>
            </div>
        <?php } ?>
    </div>
</div>        

<?php
    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    |
    | Solo se hace un require del footer de la pagina de admin.
    |
    */
    require __DIR__.'/./templates/sitio/footer.php';
?>