<?php require_once 'modules/marcoHtml.php'; echo $headerHtml?>

<br>
<h1>Carrito De Compras</h1> 

<br>
<div class="container px-auto bg-dark text-white border border-dark p-3 rounded-lg">

    <form action="pages/Output.php" method="post" name="formulario" class="mx-auto w-100">
    <div class="row p-0">
        <!-- INPUT NOMBRE -->
        <label class=" col py-1" for="nombre">
            
                <span class="ml-auto">Nombre: </span> <input class="ml-1 mr-auto form-control" paceholder="nombre" type="text" name="nombre" id="nombre">
            
        </label>
        <!-- INPUT FECHA -->
        <label class=" col py-1" for="fecha">
            
                <span class="ml-auto">Fecha: </span><input class="ml-1 mr-auto form-control" paceholder="fecha" type="date" name="fecha" id="fecha">
            
        </label>

    </div>
    <div class="col"></div>

    <!-- INPUT DETALLE -->
    <label class="d-block w-100 my-0" for="detalle" id="detalle"><br>
        Detalle:<br>
            <?php
                /* llamar funciones */
                require 'modules/Components.php';
                /* Declaración de Variables */

                $filas= 1;

                /* Declaración de Funciones */
                tablaIn(1)
            ?>
        <!-- <div id="extras"> -->
        </label>

    <!-- BOTONES -->
    <input type="hidden" id="cantFilas" name="cantFilas" value="1" >
    <input type="submit" class="btn btn-primary btn-sm rounded-pill">
    <input type="button" value="Nuevo Producto" onclick="agregProduct()" class="btn btn-primary btn-sm rounded-pill">

    </form>

</div>
<br>


<?php echo $footerHtml?>