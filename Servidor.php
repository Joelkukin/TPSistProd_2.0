
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Integrador - Joel Kukin</title>

    <!-- BOOSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container">
    
    <br>
    <h1>Carrito de compras</h1>
    
    <br>
    <div class="container px-auto bg-dark text-white border border-dark p-3 rounded-lg">
        <?PHP 
        /* llamar funciones */
        require 'Funciones.php';

        /* IMPORTAR DATOS VALIDANDO SECURITY*/
        $cantFilas=  filter_var($_POST['cantFilas'],FILTER_SANITIZE_NUMBER_INT);
        $fecha= filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
        $nombre= filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
        $impuesto=  filter_var(intVal($_POST['impuesto']),FILTER_SANITIZE_NUMBER_INT);
        
        print '
            <div class="row p-0">
                <p class=" col py-1"><b>Fecha: </b>'.$fecha.'</p>
                <p class=" col py-1"><b>Nombre: </b>'.$nombre.'</p>
                <p class=" col py-1"><b>Impuesto: </b>'.$impuesto.'%</p>
            </div>
            <table id="tablaResults">

                '.tablaOut($cantFilas).' 
                    
                <input type="button" value="Comprar" onclick="" class="col px-2 pb-2 btn btn-primary btn-lg rounded-pill">
            </table>'?>

    </div>
    <br>s
    <h2>TP Integrador de Joel Kukin</h2>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>