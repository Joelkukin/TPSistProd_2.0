<?php
    include_once 'config.php';

    /* TABLA DE ENTRADA DE DATOS */
    function tablaIn($cantFilas){
        $tabla=[];
        for ($fila=0; $fila < $cantFilas; $fila++) { 
        
            /* FILAS */    
            $tabla[$fila] = '
                <tr class="border border-top-0" id="row-'.$fila.'">
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="codigo[]" id="codigo-'.($fila).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="text" name="descripcion[]" id="descripcion-'.($fila).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="cantidad[]" id="cantidad-'.($fila).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="precio[]" id="precio-'.($fila).'">
                    </td>
                </tr>';

        }

        /* PLANTILLA DE LA TABLA */
        print '
        <table class= "table table-dark text-white rounded container" >
        <thead>
            <tr>
                <th scope="col"> Codigo </th>
                <th scope="col"> Descripcion </th>
                <th scope="col"> Cantidad </th>
                <th scope="col"> Precio Unit. </th>
            </tr>
        </thead>
        <tbody id="tabla" cantFilas= '.$fila.'>
            '.implode($tabla).'
        </tbody>
        </table>';
    };

    /* CONSTRUCTOR TABLA DE SALIDA DE DATOS */
    function tablaOut($cantFilas){
        $filas=[];
        for ($fila=0; $fila < $cantFilas; $fila++) { 
            /* VALIDACIÓN DE SEGURIDAD 
            Guiado por: https://www.baulphp.com/prevenir-la-inyeccion-sql-en-php-ejemplo-completo/
             */
            $codigo = filter_var($_POST["codigo"][$fila],FILTER_SANITIZE_NUMBER_INT);
            $descripcion = filter_var($_POST["descripcion"][$fila],FILTER_SANITIZE_STRING);
            $cantidad = filter_var($_POST["cantidad"][$fila],FILTER_SANITIZE_NUMBER_INT);
            $precio = filter_var($_POST["precio"][$fila],FILTER_SANITIZE_NUMBER_INT);
            

            $subtotal[$fila]= $precio*$cantidad;
            
            /* CREAR FILAS DINÁMICAS */
            $filas[$fila] = 
                '<tr>
                    <td>
                        '.$codigo.'
                        </td>
                    <td>
                        '.$descripcion.'
                        </td>
                    <td>
                        '.$cantidad.'
                        </td>
                    <td>
                        '. $subtotal[$fila] .'
                        </td>
                </tr>';

        }# fin del for

        /* PLANTILLA DE LA TABLA */
        return 
        '<table id="tabla" class= "table table-dark text-white rounded container">
            <thead>
                <tr>
                    <th scope="col">
                        Codigo
                    </th>
                    <th scope="col">
                        Descripcion
                    </th>
                    <th scope="col">
                        Cantidad
                    </th>
                    <th scope="col">
                        Importe
                    </th>
                </tr>
            </thead>
            <tbody id="tabla" cantFilas= '.$fila.'>
                '.implode($filas).'
                <tr class="bg-secondary">
                    
                
                    <td></td>
                    <td></td>
                    <td><b>Total:</b></td>

                    <td>'.array_sum($subtotal).'</td>
                </tr>
            </tbody>
        </table>';
    };

    function guardarEnBD (){
        
    }
?>
