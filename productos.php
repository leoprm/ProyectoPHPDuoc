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
    $titulo = "Productos";

    require __DIR__.'/./config/env.php';
    require __DIR__.'/./templates/sitio/header.php';
    require __DIR__.'/./clases/Producto.php';
    require __DIR__.'/./clases/Categoria.php';

    $modelo = new Categoria();
    $modeloProducto = new Producto();
    $categoria = ( isset($_GET['categoria']) && $_GET['categoria'] != "" ) ? $modelo->buscarPorID($_GET['categoria']) : null;
    $categorias = $modelo->ObtenerLista();

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
        <?php if( is_null($categoria) ){ ?>
            <?php if( $categorias->rowcount() > 0 ){ ?>
                <?php foreach ($categorias as $row){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h1><span class="glyphicon glyphicon-bookmark"></span> <?= $row['NOMCATEGOR'] ?></h1>
                            </div>
                        </div>

                        <?php $productos = $modeloProducto->porCategoria( $row['IDCATEGORI'],6 ); ?>
                        <?php if( $productos->rowcount() > 0 ){ ?>
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
                            <div class="col-md-12 text-center">
                                <a href="<?= ROOT_URL ?>productos.php?categoria=<?= $row['IDCATEGORI'] ?>" class="btn btn-primary"> Ver todos</a>
                            </div>
                        <?php }else{ ?>
                            <div class="col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    <strong>D'oh</strong>
                                    <br>
                                    No existen productos para deplegar sobre esta categoría :c
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1><span class="glyphicon glyphicon-shopping-cart"></span> Productos</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <strong>D'oh</strong>
                            <br>
                            No existen productos para deplegar :c
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        Pero siempre puedes <a href="<?= ROOT_URL ?>contacto.php">contactarnos</a> por si tienes dudas.
                    </div>
                </div>
            <?php } ?>
        <?php }else if(is_array($categoria) && count($categoria) > 0 ){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="page-header">
                                <h1><span class="glyphicon glyphicon-bookmark"></span> <?= $categoria['NOMCATEGOR'] ?></h1>
                                <p>
                                    <?= $categoria['DESCRIPCATEGO'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img src="<?= ROOT_URL.'assets/dist/img/uploads/'.$categoria["IMAGENCAT"] ?>" class="img-circle imagen-presentacion">
                        </div>
                    </div>
                </div>
                
                <?php $productos = $modeloProducto->porCategoria( $categoria['IDCATEGORI'],6 ); ?>
                <?php if( $productos->rowcount() > 0 ){ ?>
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
                    <div class="col-md-12 text-center">
                        <a href="<?= ROOT_URL ?>productos.php" class="btn btn-default"> Volvar a todos los Productos</a>
                    </div>
                <?php }else{ ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <strong>D'oh</strong>
                            <br>
                            No existen productos para deplegar sobre esta categoría :c
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }else{ ?>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <strong>D'oh</strong>
                    <br>
                    No existen la categoría solicitada
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