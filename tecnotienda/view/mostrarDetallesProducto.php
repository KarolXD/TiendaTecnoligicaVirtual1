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

            @keyframes escalar {
                to {
                    transform:scale(1);
                }
                from {
                    transform: scale(1.05);
                }
            }
            .gallery {
              
                animation:escalar;
                cursor:pointer;
                animation:escalar 1.4s infinite alternate; 
            }
            .estado{

                animation:escalar;
                cursor:pointer;
                animation:escalar 1.4s infinite alternate;   

            }
        </style>

        <?php
        foreach ($vars['listado'] as $item) {
            ?>
            <div class="animated infinite bounceIn slow">
                <center>  <label class="bg-light"> 
                        <font  SIZE=5 style="text-transform: uppercase;"> <strong><?php echo $item[4] ?> </strong> </font>
                    </label></center>
                <br>
            </div>
            <div class="animated infinite bounceInRight slow">
                <center>  <p class="bg-light"><strong>Estado del Producto: <?php echo $item[7] ?></strong></p> </center>
            </div>

            <!--    <div class="container">-->
            <div class="row" style="border-style: hidden">
                <div class="col-sm-5">
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


                <div class="col-sm-3">
                    <p class="text-warning"> </p>
                    <?php
                    $contenido1 = ($item[2]);
                    $total1 = explode(",", $contenido1);
                    $contadorComas1 = substr_count($contenido1, ',');
                    for ($j = 0; $j <= $contadorComas1 - 1; $j++) {
                        ?>

                        <p class=""><strong>  <?php echo $total1[$j] ?> </strong>   <strong id="valor" name="valor"> </strong></p> 


                        <hr style="color: #47748b">

                        <?php
                    }
                    ?>


                    <p class=""><strong>  Color</strong></p> 
                    <hr style="color: #47748b">

                    <p class=""><strong>  Tamaño</strong></p> 
                    <hr style="color: #47748b">

                    <p class=""><strong>  Disc.Teclado</strong></p> 
                    <hr style="color: #47748b">

                    <p class="">      <span class="">Disponibles :  <strong>  <?php echo $item[10] ?></strong> </span></p>  


                    <hr style="color: #47748b">
                    <p class=""><strong>Sub Categoria: <?php echo $item[0] ?></strong></p> 
                         <hr style="color: #47748b">
                  
                </div>   
                <div class="col-sm-4">

                    <p class="text-warning"> </p>

                    <?php
                    $contenido2 = ($item[3]);
                    $total2 = explode(",", $contenido2);
                    $contadorComas2 = substr_count($contenido2, ',');
                    for ($k = 0; $k <= $contadorComas2 - 1; $k++) {
                        ?>

                        <p class=""><strong>   <?php echo $total2[$k] ?></strong></p> 
                        <hr style="color: #47748b">
                        <?php
                    }
                    ?>    
 
 
                    <?php
                   
                    $contenido3 = ($item[5]);
                    $total3 = explode(",", $contenido3);
                    $contadorComas3 = substr_count($contenido3, ',');


                    for ($d = 0; $d <= $contadorComas3 ; $d++) {
                        ?>


                        <p class=""><strong> <?php echo $total3[$d] ?></strong></p> 
                        <hr style="color: #47748b">
                        <?php
                    }
                    ?> 
                          <p class="btn btn-outline-info  animated infinite flipInY slow">      <span class="">Precio :  <strong >  ₡<?php echo $item[1] ?></strong> </span></p>  

                </div>  




            </div> 
            <!--    </div>-->




            <br><br>





            <center><a  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoria&subcategoriaid= <?php echo $item[8] ?>" class="btn btn-outline-info"> Regresar a el menú</a></center>


            <br>
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
            });


        });





    </script>
</body>

<?php
require 'public/footerUsuario.php';
