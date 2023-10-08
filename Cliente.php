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
<h1>Carrito De Compras</h1> 

<br>
<div class="container px-auto bg-dark text-white border border-dark p-3 rounded-lg">

    <form action="Servidor.php" method="post" name="formulario" class="mx-auto w-100">
    <div class="row p-0">
        <!-- INPUT NOMBRE -->
        <label class=" col py-1" for="nombre">
            
                <span class="ml-auto">Nombre: </span> <input class="ml-1 mr-auto form-control" paceholder="nombre" type="text" name="nombre" id="nombre">
            
        </label>
        <!-- INPUT FECHA -->
        <label class=" col py-1" for="fecha">
            
                <span class="ml-auto">Fecha: </span><input class="ml-1 mr-auto form-control" paceholder="fecha" type="date" name="fecha" id="fecha">
            
        </label>


        <!-- INPUT PROVINCIA -->
        <label class=" col py-1" for="provincia">
            
                <span class="ml-auto">
                    Provincia:
                </span>
                <select class="ml-1 mr-auto form-control" paceholder="provincia" name="impuesto" id="impuesto">
                    <option value="10">impuesto 1 (impuesto 10%)</option>
                    <option value="20">impuesto 2 (impuesto 20%)</option>
                    <option value="30">impuesto 3 (impuesto 30%)</option>
                </select>
            
            </label>
    </div>
    <div class="col"></div>

    <!-- INPUT DETALLE -->
    <label class="d-block w-100 my-0" for="detalle" id="detalle"><br>
        Detalle:<br>
            <?php
                /* llamar funciones */
                require 'Funciones.php';
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
<h2>TP Integrador de Joel Kukin</h2>
    <!-- JAVASCRIPT -->
    <script>
    function agregProduct(){

            // VARIABLES
            let tabla= document.getElementById("tabla"); // seleccionar tabla
            let cantFilas = tabla.getAttribute("cantFilas"); // ver cant Filas
            let inCantFilas= document.getElementById("cantFilas"); // seleccionar input cantFilas
            console.log(tabla); // test
            cantFilas++; // aumentar indicador cant Filas
            
            let fila= document.createElement("tr") // genero nueva fila
            fila.setAttribute("class","border border-top-0");
            fila.setAttribute("id","row-"+cantFilas);
            fila.innerHTML= 
            
            //AÑADIR CELDAS EN LA FILA
                    `<!-- INPUT CODIGO -->
                    <td class="p-0 text-white">
                        <input class=" d-flex form-control rounded-0  w-100" type="number" name="codigo[]" id="codigo-${cantFilas}"> 
                        </td>

                    <!-- INPUT DESCRIPCION -->
                    <td class="p-0 text-white">
                        <input class=" d-flex form-control rounded-0  w-100" type="text" name="descripcion[]" id="descripcion-${cantFilas}">
                        </td>

                    <!-- INPUT CANTIDAD -->
                    <td class="p-0 text-white">
                        <input class=" d-flex form-control rounded-0  w-100" type="number" name="cantidad[]" id="cantidad-${cantFilas}">
                        </td>

                    <!-- INPUT PRECIO UNITARIO -->
                    <td class="p-0 text-white">
                        <input class=" d-flex form-control rounded-0  w-100" type="number" name="precio[]" id="precio-${cantFilas}">
                        </td>`;
            
            // INSERTAR FILA EN LA TABLA
            tabla.appendChild(fila);

            //ENVIAR CANT DE FILAS
            tabla.setAttribute("cantfilas",cantFilas);
            console.log(inCantFilas.getAttribute("value")); 
            inCantFilas.setAttribute("value",cantFilas);
            
            // pude ver cant filas?
        }
    </script>
    <!-- BOOSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>