<?php
require 'public/headerUsuario.php';
?>

<body>
     <div class="container " 
         >
        <br>
    <style>
        body {}

        .modal-dialog {
            max-width: 600px;
            margin: 40px auto;
        }



        .modal-body {
            position:relative;
            padding:10px;
            min-height:400px;
            background:#fff;
        }




        .close {
            position:absolute;
            right:-30px;
            top:0;
            z-index:999;
            font-size:2rem;
            font-weight: normal;
            color:#fff;
            opacity:1;
        }

        #image {
            min-height:200px;
        }

    </style>

    <?php
    foreach ($vars['listado'] as $item) {
        ?>
    <center>  <label class="bg-info"> 
            <font  SIZE=5 style="text-transform: uppercase;"> <strong><?php echo $item[4] ?> </strong> </font>
        </label></center>
    <br>
    <center>  <p class="bg-light"><strong>Estado del Producto: <?php echo $item[7] ?></strong></p> </center>

<!--    <div class="container">-->
        <div class="row" style="border-style: hidden">
            <div class="col-sm-6">
                <div class="gallery">

                    <?php
                    $pizza = ($item[6]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                        ?>
                    <center>
                        <img  width="300" height="300" src= "<?php echo $pieces[$i] ?>" alt="" data-toggle="modal" data-bigimage="<?php echo $pieces[$i] ?>" data-target="#myModal" class="img-fluid">
  </center>                     
 <?php
                    }
                    ?>

                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>        

                                <img src="//media.tenor.com/images/556e9ff845b7dd0c62dcdbbb00babb4b/tenor.gif" alt="" id="image" class="img-fluid"> 

                            </div>

                        </div>
                    </div>
                </div> 


            </div> 


            <div class="col-sm-2">
                <p class="text-warning"> </p>
                <?php
                $contenido1 = ($item[2]);
                $total1 = explode(",", $contenido1);
                $contadorComas1 = substr_count($contenido1, ',');
                for ($j = 0; $j <= $contadorComas1 - 1; $j++) {
                    ?>
                    <ul>
                        <li>   <p class="bg-light"><strong>  <?php echo $total1[$j] ?> :</strong>   <strong id="valor" name="valor"> </strong></p> </li> 

                    </ul>


                    <?php
                }
                ?>
            </div>   
            <div class="col-sm-4" style="border-style: #47748b">

                <p class="text-warning"> </p>

                <?php
                $contenido2 = ($item[3]);
                $total2 = explode(",", $contenido2);
                $contadorComas2 = substr_count($contenido2, ',');
                for ($k = 0; $k <= $contadorComas2 - 1; $k++) {
                    ?>
                    <ul>
                        <p class="bg-light"><li><strong>   <?php echo $total2[$k] ?></strong></li></p> 
                    </ul>
                    <?php
                }
                ?>    
            </div>  




        </div> 
<!--    </div>-->




    <br><br>


   
        <div class="row">

            <div class="col-sm-4">
                <center>        <p class="bg-info">Datos sobre el producto</p></center>
                <ul>
                  
                    <p class="bg-light"><li><strong>Sub Categoria: <?php echo $item[0] ?></strong></li></p> 


                </ul>
            </div>

            <div class="col-sm-4">
                <center>    <p class="bg-info"> Caracteristicas sobre el producto</p></center>
                <?php
                $contenido3 = ($item[5]);
                $total3 = explode(",", $contenido3);
                $contadorComas3 = substr_count($contenido3, ',');


                for ($d = 0; $d <= $contadorComas3 - 1; $d++) {
                    ?>
                    <ul>
                        <p class="bg-light"><li><strong> <?php echo $total3[$d] ?></strong></li></p> 
                    </ul>
                    <?php
                }
                ?>

            </div>

            <div class="col-sm-4">

                <ul>
                    <center> <p class="bg-info"> Datos sobre el precio</p></center>
                     <p class="bg-light"><li> <strong>Precio venta: <?php echo $item[1] ?></strong></li></p>  
                </ul>
            </div>
        </div>
 
    <br>
    <center><a  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoria&subcategoriaid= <?php echo $item[8] ?>" class="btn btn-info"> Regresar</a></center>
                     
    <br>
    <br>
    <!-- Left and right controls -->

        <?php
}
?>
</div>
 
    <script  type="text/javascript">
        $(document).ready(function () {

    // Gets the video src from the data-src on each button
            var $imageSrc;
            $('.gallery img').click(function () {
                $imageSrc = $(this).data('bigimage');
            });
            console.log($imageSrc);



    // when the modal is opened autoplay it  
            $('#myModal').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get

                $("#image").attr('src', $imageSrc);
            })


    // reset the modal image
            $('#myModal').on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#image").attr('src', '');
            })






    // document ready  
        });





    </script>
</body>

<?php
require 'public/footerUsuario.php';
