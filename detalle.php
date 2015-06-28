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
    require __DIR__.'/./config/env.php';
    require __DIR__.'/./clases/Producto.php';
    require __DIR__.'/./clases/Categoria.php';

    $modeloProducto = new Producto();
    $modeloCategoria = new Categoria();

    $idProducto = ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
    $producto = $modeloProducto->traerProducto($idProducto);
    $categoria = ( is_array($producto) && count($producto) > 0 ) ? $modeloCategoria->buscarPorID($producto['IDCATEGORI']) : null ;
    $nombrePagina = ( is_array($producto) && count($producto) > 0 ) ? $producto['NOMBREPROD'] : 'Producto no Encontrado' ;


    $titulo = $nombrePagina.' | Productos ';
    require __DIR__.'/./templates/sitio/header.php';
    

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
            <?php if( is_array($producto) && count($producto) > 0 ){ ?>
                <!-- Detalle de Producto -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>
                                <?= $producto['NOMBREPROD'] ?>
                                <br>
                                <small>
                                    <span class="glyphicon glyphicon-bookmark"></span> <?= $categoria['NOMCATEGOR'] ?>
                                </small>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 pull-right">
                        <figure class="text-center">
                            <img src="<?= ROOT_URL ?>assets/dist/img/uploads/<?= $producto['IMAGENPROD'] ?>" class="img-thumbnail">
                        </figure>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 pull-left">
                        <div>
                            <?= $producto['DESCRIPPROD'] ?>
                        </div>
                        <div class="detalles">
                            <br>
                            <ul>
                                <li>Alto: <?= $producto['DIMALTO'] ?></li>
                                <li>Ancho: <?= $producto['DIMANCHO'] ?></li>
                            </ul>
                        </div>
                        <div class="precio">
                            <h2 class="text-success">$<?= $producto['PRECIO'] ?></h2>
                            <span class="label label-<?= ( $producto['CANTIDAD'] > 0 ) ? 'success' : 'danger' ?>"><?= ( $producto['CANTIDAD'] > 0 ) ? 'Disponible' : 'Sin Stock' ?></span>
                            <?php if( $producto['CANTIDAD'] < 10 && $producto['CANTIDAD'] > 0 ){ ?>
                                <br>
                                Quedan solo <strong><?= $producto['CANTIDAD'] ?></strong> unidades.
                            <?php } ?>
                            <br>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="row">
                    <div class="alert alert-warning" role="alert">
                        <strong>D'oh</strong>
                        <br>
                        No existe el producto solicitado
                    </div>
                    <div class="col-md-12 text-center">
                        Pero siempre puedes ver nuestros otros <a href="<?= ROOT_URL ?>productos.php">productos disponibles</a>.
                    </div>
                </div>
            <?php } ?>

            <?php $productos = $modeloProducto->obtenerTodos( 3, [ $idProducto ] ); ?>
            <?php if( $productos->rowcount() > 0 ){ ?>
                <!-- Relacionados -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Otros Productos</h2>
                        </div>
                    </div>
                    <?php foreach ($productos as $producto){ ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?= ROOT_URL ?>assets/dist/img/uploads/<?= $producto['IMAGENPROD'] ?>" class="img-circle img-producto">
                                <div class="caption">
                                    <h3><?= $producto['NOMBREPROD'] ?></h3>
                                    <p><?= utf8_encode($producto['DESCRIPPROD']) ?></p>
                                    <div class="clearfix">
                                        <a href="<?= ROOT_URL ?>detalle.php?id=<?= $producto['CODPROD'] ?>" class="btn btn-default pull-right">Ver Detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-12 text-center">
                        <a href="<?= ROOT_URL ?>productos.php" class="btn btn-primary"> Ver todos</a>
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