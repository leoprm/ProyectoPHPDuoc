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
    $titulo = "Contacto";

    require __DIR__.'/./config/env.php';
    require __DIR__.'/./templates/sitio/header.php';
    require __DIR__.'/./clases/Producto.php';

    $modelo = new Producto();
    $productos = $modelo->obtenerTodos(3);

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

        <?php if( array_key_exists('success_contact', $_SESSION) ){ ?>
            <div class="alert alert-info" role="alert">
                <strong>Hey!</strong>
                <br>
                Muchas gracias por el interes, responderemos a la brebedad tus comentarios realizados por este medio.
                <?php unset($_SESSION['success_contact']); ?>
            </div>
        <?php }else{ ?>
            <div class="page-header">
                <h1><span class="glyphicon glyphicon-phone"></span> Contacto</h1>
                <p>
                    De antemano muchas gracias por enviarnos tus comentarios o quejas, todo por parte de <cite>Mira en tu Interior</cite> es bien recibido.
                </p>
            </div>

            <?php if( array_key_exists('error_tmp', $_SESSION) ){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong><span class="glyphicon glyphicon-exclamation-sign"></span>  D'oh!</strong>
                    <br>
                    <?= $_SESSION['error_tmp'] ?>
                    <?php unset($_SESSION['error_tmp']); ?>
                </div>
            <?php } ?>

            <form class="form-horizontal" method="post" action="<?= ROOT_URL ?>save.php">
                <fieldset>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="inputNombre" placeholder="Nombre" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="inputEmail" placeholder="Email" type="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Comentario</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea" placeholder="¿Qué nos quieres contar?" name="comentario"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Asunto</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select" name="asunto">
                                <option value="Comprar">Comprar</option>
                                <option value="Reclamos">Reclamos</option>
                                <option value="Sugerencias">Sugerencias</option>
                                <option value="ContactoEmpresarial">Contacto Empresarial</option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2 text-right">
                            <button type="submit" class="btn btn-success">Enviar  <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                </fieldset>
            </form>
        <?php } ?>

        <!-- Despliege de Productos -->
        <?php if($productos->rowcount() > 0){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1><span class="glyphicon glyphicon-shopping-cart"></span> Algunos Productos</h1>
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
                                    <a href="<?= ROOT_URL ?>detalle.php?id=<?= $producto['CODPROD'] ?>" class="btn btn-default pull-right">Ver Detalle</a>
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