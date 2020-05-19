<?php
require 'public/headerCliente.php';
?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type="text/javascript" src="js/incrementing.js"></script>
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
                filter:brightness(130%);
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
        
<br>

            <!--    <div class="container">-->
            <div class="row" style="background-color: #ddd">
        
                <div class="col-sm-5">
                    <br>        <br>
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
                        <p class="bg-light"><strong>  <?php echo $total1[$j] ?> </strong>   <strong id="valor" name="valor"> </strong></p> 


                        <hr style="color: #47748b">

                        <?php
                    }
                    ?>



                    <p class="bg-light"><strong>Color</strong></p> 
                    <hr style="color: #47748b">
                            <p class="bg-light"><strong>Tamaño</strong></p> 
                    <hr style="color: #47748b">
                            <p class="bg-light"><strong>Distri Teclado</strong></p> 
                    <hr style="color: #47748b">

                    <p class="bg-light"><strong>Sub Categoria: <?php echo $item[0] ?></strong></p> 
                    <hr style="color: #47748b">
              
      <p class="bg-light"><strong> Cantidad disponible: <?php echo $item[10] ?></strong></p> 
                    </div>   
                    <div class="col-sm-4">

                        <p class="text-warning"> </p>

                        <?php
                        $contenido2 = ($item[3]);
                        $total2 = explode(",", $contenido2);
                        $contadorComas2 = substr_count($contenido2, ',');
                        for ($k = 0; $k <= $contadorComas2 - 1; $k++) {
                            ?>

                                <p class="bg-light"><strong>   <?php echo $total2[$k] ?></strong></p> 

                                <?php
                            }
                            ?>   
                        <hr style="color: #999">
                              <?php
                    $contenido3 = ($item[5]);
                    $total3 = explode(",", $contenido3);
                    $contadorComas3 = substr_count($contenido3, ',');


                    for ($d = 0; $d <= $contadorComas3 - 1; $d++) {
                            ?>

                                <p class="bg-light"><strong> <?php echo $total3[$d] ?></strong></p> 
                                <hr style="color: #47748b">

                                <?php
                            }
                            ?>


                </div>  




            </div> 
      


    <br>
       
            <div class="row">
         
                              <div class="col-sm-4"></div>
                <div class="col-sm-4">
                        <br>
                        <div class="" style="background-color: #fafafa"> 

                            <p  class="" style="background-color: #7386D5"> <strong class="">   <center > <font size="4">₡<?php echo $item[1] ?> </font></center></strong> </p>  
                            <hr style="color: #999">

                                <form action="?controlador=Compra&accion=agregaralcarrito"  method="post">
                                    <div class="row">

                                        <div class="col-sm-8">
                                            <center>    <label class="form-control-label">Cantidad</label> 
                                            <input type="number" class="form-control input-sm" id="3" name="3" value="1" min="0" max="10" > </center>
                                        </div>


                                        <div class="col-sm-4">
                                         <center>    <label class="form-control-label"></label> </center>
                                            <button type="button" onclick="cantidad(3, 0)" class="btn btn-danger"><font size="4">- </font></button>

                                            <button type="button" onclick="cantidad(3, 1)" class="btn btn-success"><font size="4">+</font></button>
                                        </div>
                                    </div>
                                    <center>
                                        <input type="hidden" id="producto" name="producto"  value="<?php echo $item[9] ?>" >
                                        <input type="hidden" id="cliente" name="cliente" value="<?php echo $_SESSION["usuario"] ?>">

                                    </center>


                                    <hr style="color: #999">
                                    <center>
                                        <button type="submit" class="btn btn-outline-danger"> Añadir a el Carrito!</button>
                                    </center>
                                    <br>
                         
                        </form>   
                      

                    </div>
                    
                </div>
  
                       <div class="col-sm-4"></div>
            </div>
<br><br>
            <br>
            <br>

   


            <center><a  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoriaCliente&subcategoriaid= <?php echo $item[8] ?>" class="btn btn-outline-info"> Regresar a el menú</a></center>


            <br>
            <br>
            <br>
            <!-- Left and right controls -->

            <?php
        }
        ?>
    </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <script>
                                    function cantidad(id_input, operacion) {
                                        var numero = $('#' + id_input).val();
                                        if (operacion == '1') {
                                            numero++;
                                        } else {
                                            numero--;
                                        }
                                        $('#' + id_input).val(numero);
                                    }
    </script>

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