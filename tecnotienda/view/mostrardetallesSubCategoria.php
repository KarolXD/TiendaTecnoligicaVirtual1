
<?php
include_once 'public/headerUsuario.php';
?>
<link href="./public/css/animate.css" rel="stylesheet" type="text/css"/>
<link href="./public/css/animate.min.css" rel="stylesheet" type="text/css"/>
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
            animation:escalar 1.4s infinite alternate; 
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
    <br><br><br>
    <center class="">    <font style="text-transform: uppercase;">   <p class="card-text"><strong>  Contenidos </strong>  </p>    </font> 
    </center>

    <br><br>


    <div class="row">
        <?php
        foreach ($vars['listado'] as $item) {
            ?>


            <div class="card" style="width: 18rem;">

                <center class="titulo">    <font style="text-transform: uppercase;">   <p class="card-text"> <strong><?php echo$item[3] ?>   </strong> </p>    </font> 
                </center>


                <hr style="border-top: 1px solid black;">
                <?php
                $pizza = ($item[0]);
                $pieces = explode(",", $pizza);
                $contadorComas = substr_count($pizza, ',');
                for ($i = 0; $i <= 1 - 1; $i++) {
                    ?>


                    <a href="?controlador=Producto&accion=mostrarDetallesProducto&productoid=<?php echo$item[4] ?>"> <img src="<?php echo $pieces[$i] ?>" class="card-img-top" width="80" height="150" alt="..."> </a>
                    <?php
                }
                ?>

                <div class="card-body">

                    <p class="card-text  animated infinite bounce"> <img src="./public/img/money.png" alt="..."> <strong> <font size="4"><?php echo$item[2] ?></font></strong>  </p>
                    <hr style="border-top: 1px solid black;">
                    <a class="etiqueta"  href="?controlador=Producto&accion=mostrarDetallesProducto&productoid=<?php echo$item[4] ?>">  <h5 class="card-title"><?php echo$item[1] ?>  </h5> </a>
                </div>
                <hr style="border-top: 5px solid black;">
            </div>


            <hr style="border-top: 5px solid black;">

            <br>


            <?php
        }
        ?>

    </div>

    <br>
    <br><br><br><br><br>
    <center><a  href="?controlador=SubCategoria&accion=mostrarSubCategorias&categoriaid=<?php echo$item[5] ?>" class="btn btn-outline-info"> Regresar a el menu</a></center>

</div>


<br><br><br><br><br>
<br><br><br><br><br>

<?php
include_once 'public/footerUsuario.php';

