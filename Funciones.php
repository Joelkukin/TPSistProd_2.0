
<?php
    /* CONSTRUCTOR TABLA DE ENTRADA DE DATOS */
    function tablaIn($c){
        $tabla=[];
        for ($n=0; $n < $c; $n++) { 
        
            /* FILAS */    
            $tabla[$n] = '
                <tr class="border border-top-0" id="row-'.$n.'">
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="codigo[]" id="codigo-'.($n).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="text" name="descripcion[]" id="descripcion-'.($n).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="cantidad[]" id="cantidad-'.($n).'">
                        </td>
                    <td class="p-0">
                        <input class="form-control rounded-0 d-flex w-100" type="number" name="precio[]" id="precio-'.($n).'">
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
        <tbody id="tabla" cantFilas= '.$n.'>
            '.implode($tabla).'
        </tbody>
        </table>';
    };

    /* CONSTRUCTOR TABLA DE SALIDA DE DATOS */
    function tablaOut($f){
        $filas=[];
        for ($n=0; $n < $f; $n++) { 
            /* VALIDACIÓN DE SEGURIDAD 
            Guiado por: https://www.baulphp.com/prevenir-la-inyeccion-sql-en-php-ejemplo-completo/
             */
            $codigo = filter_var($_POST["codigo"][$n],FILTER_SANITIZE_NUMBER_INT);
            $descripcion = filter_var($_POST["descripcion"][$n],FILTER_SANITIZE_STRING);
            $cantidad = filter_var($_POST["cantidad"][$n],FILTER_SANITIZE_NUMBER_INT);
            $precio = filter_var($_POST["precio"][$n],FILTER_SANITIZE_NUMBER_INT);
            $impuesto = filter_var($_POST['impuesto'],FILTER_SANITIZE_NUMBER_INT)/100+1;

            $subtotal[$n]= $precio*$cantidad*$impuesto;
            
            /* CREAR FILAS DINÁMICAS */
            $filas[$n] = 
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
                        '. $subtotal[$n] .'
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
            <tbody id="tabla" cantFilas= '.$n.'>
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
?>
