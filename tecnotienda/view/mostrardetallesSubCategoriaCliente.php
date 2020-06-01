
<?php
include_once 'public/headerCliente.php';
global $filtro;
global $contador;
?>






<link href="./public/css/animate.css"         rel="stylesheet"   type="text/css"/>
<link href="./public/css/animate.min.css" rel="stylesheet"    type="text/css"/>
<div class="container">
    <style>
        @keyframes escalar {
            to {
                transform:scale(1);
            }
            from {
                transform: scale(1.05);
            }
        }
        .card{
            filter:brightness(120%);
            animation:escalar;
            cursor:pointer;

        }
        .titulo{

            background-color: #66ffff
        }
        .etiqueta{
            color:black;

        }
        .etiqueta:hover{
            background-color: red;

        }

    </style>
    <br>
    <center class="">    <font style="text-transform: uppercase;">   <p class="card-text"><strong>  Contenidos </strong>  </p>    </font>   </center>
    <br>
       <div class="row">

            <div class="col-md-4">
                Subcategorias
                <select class="form-control" id="subcategoriaid" name="subcategoriaid"   
                        onchange='ShowSelectedSubCa();'  >
                </select>
            </div>


            <div class="col-md-4">
                <div class="form-group"> 
                    Criterios
                    <select class="form-control" id="criterioid" name="criterioid" onchange="ShowSelected();"> 
                        <?php
                        foreach ($vars['listado2'] as $item2) {
                            ?>
                            <option value="<?php echo $item2[0] ?>"><?php echo $item2[1] . "  " . $item2[2] ?></option>
                            <?php
                        }
                        ?>
                    </select>


                </div>
            </div>
            <div class="col-md-4">
                  <form method="post" action="?controlador=SubCategoria&accion=filtrarmostrardetallesSubcategoriaCliente">
   
                <div class="form-group" style="" id="divvalores"> 
                    Valores
                    <input  type="hidden" value="" id="valor" name="valor">
                    Criterios
                    <input  type="hidden" value="" id="criteriovalor" name="criteriovalor">
                    Valores
                    <select class="form-control" id="valorid" name="valorid" onchange="ShowSelected1();">  </select>
                    <br>
                    <div style="display: none">
                        <center>   <button type="submit" class="autoclick" >Filtrar </button></center>
                    </div>

                </div>
                    </form>
            </div>

        </div>




    <br><br>


    <div class="row">
        <?php
        foreach ($vars['listado'] as $item) {
            ?>


            <div class="card" style="width: 18rem;">
                <center class="btn btn-outline-success">    <font style="text-transform: uppercase;">   <p class="card-text"> <strong><?php echo$item[3] ?>   </strong> </p>    </font> 
                </center>
                <hr style="border-top: 1px solid black;">
                <?php
                $pizza = ($item[0]);
                $pieces = explode(",", $pizza);
                $contadorComas = substr_count($pizza, ',');
                for ($i = 0; $i <= 1 - 1; $i++) {
                    ?>


                    <a href="?controlador=Producto&accion=mostrarDetallesProductoCliente&productoid=<?php echo$item[4] ?>"> <img src="<?php echo $pieces[$i] ?>" class="card-img-top" width="80" height="150" alt="..."> </a>
                    <?php
                }
                ?>


                <div class="card-body">
                    <p class="card-text ">     <strong> <font size="6"> <span class="input-group-append">₡ <?php echo$item[2] ?> </span></font></strong>  </p>
                    <hr style="border-top: 1px solid black;">
                    <a class="etiqueta"  href="?controlador=Producto&accion=mostrarDetallesProductoCliente&productoid=<?php echo$item[4] ?>">  <h5 class="card-title"><?php echo$item[1] ?>  </h5> </a>
                </div>


                <hr style="border-top: 5px solid black;">
            </div>


            <hr style="border-top: 5px solid black;">

            <br>


            <?php
        } echo $_SESSION['subcategoriaid']
        ?>

    </div>

    <br>
    <br><br><br><br><br>
    <center><a  href="?controlador=SubCategoria&accion=mostrarSubCategoriaCliente&categoriaid=<?php echo$item[5] ?>" class="btn btn-outline-info"> Regresar a el menu</a></center>

</div>

<script type="text/javascript">
    function ShowSelected()
    {
        /* Para obtener el valor */
        var cod = document.getElementById("criterioid").value;
        document.getElementById("criteriovalor").value = cod;
        var filtro = cod;

        //limpiar compo
        var select1 = document.getElementById("valorid");
        for (let i = select1.options.length; i >= 0; i--) {
            select1.remove(i);
        }


///* Para obtener el texto */
//var combo = document.getElementById("criterioid");
//var selected = combo.options[combo.selectedIndex].text;
//alert(selected);

        $.ajax({
            type: 'POST',

            url: "?controlador=SubCategoria&accion=obtenerValores",
            data: {criterioid: filtro},
            success: function (response) {
                console.log(response);
                $.each(JSON.parse(response), function (i, item) {
                    var textSeparado = item.tbproductocaracteristica1valor.split(",");
                    var arrayDeCadenas = textSeparado.length;
                    // alert(arrayDeCadenas);
                    $("#valorid").append('  <option selected value="2">Valores </option>   ');

                    for (i = 0; i < arrayDeCadenas - 1; i++) {

                        $("#valorid").append('    <option value="' + i + '">' + textSeparado[i] + '</option>');


                    }
                    var idP = item.tbproductocaracteristica1id;
                    //  alert("idC"+idP);
                });

            }
        });



    }//fin metoo

    function ShowSelected1() {
        var valor = document.getElementById("valorid").value;
        document.getElementById("valor").value = valor;
        var criteriovalor = document.getElementById("criteriovalor").value;
        $('.autoclick').trigger('click');
    }

function mostrarcontador(){
    
    
        var resultad= localStorage.getItem('contador');
        alert(resultad);
    
}

    function ShowSelectedSubCa() {
        var contador = 0;
        var suma = contador + 1;
        localStorage.setItem('contador', suma);
        var idSub = document.getElementById("subcategoriaid").value;
        document.getElementById("valor").value = idSub;
        location.href = "?controlador=SubCategoria&accion=mostrardetallesSubCategoriaCliente&subcategoriaid=" + idSub;

    }


</script>



<br><br><br><br><br>
<br><br><br><br><br>

<?php
include_once 'public/footerUsuario.php';

