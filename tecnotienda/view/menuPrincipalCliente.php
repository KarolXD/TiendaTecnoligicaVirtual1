<?php
include_once 'public/headerCliente.php';
?>


<div class="container" >
    <div class="row">
            <div class="col-lg-12">
                
                      <a class=" btn btn-outline-primary" href="?controlador=Cliente&accion=productomascompradoByclientes">       
                          <img src="./public/img/avatar.png" alt=""/>Entretenimiento</a>
                              
                <br>
                <center>  <label style="background-color: #ffcccc"><font size="6"  face="Verdana">  Tienda Tecnologia Virtual Costa Rica  </font></label></center> 
                <br>
                <br>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./public/img/fondo1.jpg" alt="First slide"  width="1000" height="350">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./public/img/fondo2.png" alt="Second slide" width="900" height="350">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./public/img/fondo3.jpg" alt="Third slide" width="900" height="350">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
    
    
    
            </div>
    
        </div>
    <br><br>


    <div class="row ">

        <div class="col-lg-11">
            <hr style="color:black">
            <center>   <label>Nuestras Ofertas</label></center>
            <hr style="color:black">
            <div class="row">

                <?php
                foreach ($vars['listado'] as $item) {

                    $pizza = ($item[6]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    ?>
                    <div class="card gallery" style="width: 16rem;border:2px solid #ebe3e3">


                        <img src="<?php echo $pieces[0] ?>" class="card-img-top " width="80" height="200" alt="...">
                        <div class="card-body">

                            <p class="card-text">
                                <font style="text-transform: uppercase;">
                            <center>
                                <hr style="border-top: 1px solid black;" width="50%">
                                <strong><?php echo $item[5] ?>  </strong>
                                <hr style="border-top: 1px solid black;" width="50%">
                            </center>
                            </font>
                            </p>
                            <p class="card-text text-justify btn btn-outline-dark">Fecha Limite Oferta:  <?php echo $item[4] ?></p>
                            <h5 class="btn btn-outline-info "  >Precio: ₡<?php echo $item[1] ?> </h5>
                            <br>
                            <h5 class="btn btn-dark " >COMPRAR AHORA!</h5>
                        </div>
                        <hr style="border-top: 5px solid #ebe3e3">
                    </div>


                    <hr style="  border-top: 1px solid #ebe3e3;">

                    <?php
                }
                ?>
            </div>
        </div>

        <div class="col-lg-1" 
             >
            <hr style="color:black">
            <strong  class="badge-primary">Recientes </strong>
            <hr style="color:black">



            <div class="card text-right" style="width: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        
                        <center><img src="./public/img/asus-vivobook-x541ua-core-i3-1005g1-4-gb.jpg" alt=""  width="80" height="100" alt="..."/></center></h5>
                    <hr style="border-top: 5px solid #ebe3e3">

                    <font size="1">  <p    class="card-text">ASUS X509J - CORE I3 1005G1 - 4 GB</p></font>

                    <hr style="border-top: 5px solid #ebe3e3">
                </div>
            </div>
            <br>
            <div class="card text-right" style="width: 8rem;">
                <div class="card-body">
                    
                    <h5 class="card-title">
                 
                        <center><img src="./public/img/asus-vivobook-x512fa-core-i5-8265u-8gb.jpg" alt=""  width="80" height="100" alt="..."/></center></h5>
                    <hr style="border-top: 5px solid #ebe3e3">

                    <font size="1">  <p    class="card-text">ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB</p></font>

                    <hr style="border-top: 5px solid #ebe3e3">
                </div>
            </div>
            <br>
            <div class="card text-right" style="width: 8rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <center><img src="./public/img/co.jpg" alt=""  width="80" height="100" alt="..."/></center></h5>
                    <hr style="border-top: 5px solid #ebe3e3">

                    <font size="1">  <p    class="card-text">MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB</p></font>

                    <hr style="border-top: 5px solid #ebe3e3">
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<br>
<?php
include_once 'public/footer.php';
?>

