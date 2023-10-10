<?php require_once '../modules/marcoHtml.php'; echo $headerHtml?>
    
    <br>
    <h1>Carrito de compras</h1>
    
    <br>
    <div class="container px-auto bg-dark text-white border border-dark p-3 rounded-lg">
        <?PHP 
        /* llamar funciones */
        require '../modules/Components.php';

        /* IMPORTAR DATOS VALIDANDO SECURITY*/
        $cantFilas=  filter_var($_POST['cantFilas'],FILTER_SANITIZE_NUMBER_INT);
        $fecha= filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
        $nombre= filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
        
        print '
            <div class="row p-0">
                <p class=" col py-1"><b>Fecha: </b>'.$fecha.'</p>
                <p class=" col py-1"><b>Nombre: </b>'.$nombre.'</p>
            </div>
            <table id="tablaResults">

                '.tablaOut($cantFilas).' 
                    
                <input type="button" value="Comprar" onclick="" class="col px-2 pb-2 btn btn-primary btn-lg rounded-pill">
            </table>'?>

    </div>
    <br>

<?php echo $footerHtml?>