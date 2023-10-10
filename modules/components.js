
//crear una clase tabla que reciba como parámetros un array con los nombres de las columnas y que tenga un metodo llamado insertarfila que reciba como parámetros un array con los valores a colocar en cada celda

class Tabla{
    //              [
    //               ["headerCol1", "headerCol2"],
    //               ["contCellA1", "contCellA2"],
    //               ["contCellB1", "contCellB2"]
    //              ]
    //              |
    //              |       {cols"table table-dark text-white rounded container",
    //                       rows"border border-top-0"
    //              |       |
    
    constructor (tabla){ //return tabla Html
        
        this.clasesTabla="table table-dark text-white rounded container";
        
        this.clasesFila="border border-top-0";
        
        this.tHeader = tabla[0].join(" ");
        tabla.splice(0,1)
        
        this.filas = tabla;
        console.log(this.filas);

        // creo un elemento tabla para luego insertar el texto de más abajo como html en lugar de texto
        this.html= document.createElement("table");
        
        this.clasesTabla.split(" ").forEach(clase => this.html.classList.add(clase)); 
        


        // armo el texto que se convertirá en HTML
        this.html.innerHTML =//armo la estructura de la tabla que quiero representar
           `<table class= "${this.clasesTabla}" >
            <thead>
                <tr>
                    <th scope="col">${this.tHeader.split(" ").join('</th>\n <th scope="col">')}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border border-top-0">${// Para armar el contenido de la tabla transformo el array Tabla de 2 dimensiones en una sola string
                   
                    this.filas.map(celdas=> {
                        // transformo cada array de celdas en html
                        return `<td class="p-0">${celdas.join('</td><td class="p-0">')}</td>`
                    }).join(`</tr><tr class="border border-top-0">`)
                        
                    // obtengo un solo texto html
                }</tr>
                </tbody>
                </table>`;           

        
    }
}




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
