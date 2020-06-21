
<?php
include_once 'public/headerCliente.php';
?>

<div class="container">
    <center><h5 class="btn btn-info"> Top 3  sub categorias más compradas</h5></center>
    <br>
    <br>
    <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div></div>

    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">

                <thead>
                    <tr>
                        <th scope="col">Edad  Entre Jovenes y Adultos</th>       

                    </tr>
                </thead>
                <tbody>


                    <tr>  

                        <td class="btn btn-outline-danger"> 
                            29 años, 37 años, 61años, 21años,

                        </td>
                        <td>
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Laptops</div>
                                <div class="card-body text-primary">

                                    <img  class="card-text" src="./public/img/asus-vivobook-x541ua-core-i3-1005g1-4-gb.jpg"   width="200" height="130" alt=""/>
                                </div>
                            </div>
                        </td>


                    </tr>

                    <tr>

                        <td class="btn btn-outline-danger"> 
                            29 años,37 años,
                        </td>
                        <td>
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tarjetas Madre</div>
                                <div class="card-body text-primary">

                                    <img  class="card-text" src="./public/img/1592250880roja.PNG"   width="200" height="130" alt=""/>
                                </div>
                            </div>
                        </td>


                    </tr>

                    <tr>     

                        <td class="btn btn-outline-danger"> 
                            21 años, 29 años,
                        </td>
                        <td>
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tarjeta de Video</div>
                                <div class="card-body text-primary">
                                    <!--                                    <h5 class="card-title">Tarjeta de Video</h5>-->
                                    <img  class="card-text" src="./public/img/asus-geforce-rtx-2080-super-strix-8-gb.jpg" alt=""  width="200" height="130">
                                </div>
                            </div>
                        </td>


                    </tr>
                </tbody>


            </table>
        </div>
    </div>
</div>
<BR><BR>

<?php
include_once 'public/footer.php';
?><?php
