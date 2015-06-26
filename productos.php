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

    //Verificamos si existe una categoria que cargar
    $categoria = ( isset($_GET['categoria']) && $_GET['categoria'] != "" ) ? $_GET['categoria'] : null;

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
    <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
            <a href="productos.php" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span> Productos</a>
            <a href="contacto.php" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Contacto</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><span class="glyphicon glyphicon-bookmark"></span> Categoria 1</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, sed, esse delectus omnis eum inventore sunt consequatur explicabo, commodi ullam hic atque quo eos non dolores fuga accusamus. Aspernatur, itaque.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/200x200" class="img-circle">
                    <div class="caption">
                        <h3>Un Producto</h3>
                        <p>Su mini descripcion, algo simple y lol</p>
                        <div class="clearfix">
                            <a href="detalle-producto.php" class="btn btn-default pull-right">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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