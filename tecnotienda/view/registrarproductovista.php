
<?php

require 'public/headerMenuP.php';
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>   
<script src="./public/js/repeater.js" type="text/javascript"></script>

<div class="container">


    <h5>  <center>Registra una Producto </center></h5>
    <hr style="color: #47748b">
         <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
             
    <form  action="?controlador=Producto&accion=registrarProductos" method="POST"  enctype="multipart/form-data">
        <div class="row">
          
            <div class="col-md-4">
               <hr style="color: #47748b">
                    <strong>   <center>Datos sobre el producto </center></strong>
                    <hr style="color: #47748b">

                <div class="form-group">
                    <label class="form-control-label">Código de Barras</label>
                    <input class="form-control" id="productocodigobarras" name="productocodigobarras"type="number" placeholder="Código de Barras" required="">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Cantidad</label>
                    <input class="form-control" id="cantidad" name="cantidad"type="number" placeholder="Cantidad de Producto" required="">
                </div>
                <div class="form-group">
                    <label class="">Sub Categoria</label>
                    <select class="form-control" name="subcategoriaid" id="subcategoriaid"></select>

                </div>
                <div class="form-group">
                    <label class="">Estado del producto:</label>
                    <input class="form-control" name="productoestado" placeholder="Estado del Productos" id="productoestado" type="text" required="">

                </div>

            </div>
            <div class="col-md-4">
                           <div class="form-group ">
                    <hr style="color: #47748b">
                    <strong>   <center>Datos sobre el precio </center></strong>
                    <hr style="color: #47748b">
                    <label class="">Precio de Compra</label>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="preciocompra" name="preciocompra" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Compra</label>

                    <input class="form-control" id="preciofechacompra" name="preciofechacompra"  type="date" >

                </div>

                <div class="form-group ">
                    <label class="">Fecha  de Venta</label>

                    <input class="form-control" id="preciofechaventa" name="preciofechaventa" type="date" >

                </div>
                <div class="form-group ">
                    <label class=""> % de Ganancia</label>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="precioganacia" name="precioganacia" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">0</span>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                
                <hr style="color: #47748b">
                <strong>   <center> Caracteristicas sobre el producto  </center>    </strong>   <hr style="color: #47748b">
                <div class="form-group">
                    <label class="">Titulo</label>
                    <input class="form-control " id="caractericticatitulo" name="caractericticatitulo" type="text" required="">
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-md-12">

                <hr style="color: #47748b">
                <strong> <center> Añade imagenes para el producto  </center> </strong>     <hr style="color: #47748b">
                <br>
                <div class="container ">
                    <div class="row">
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field3">
                                <tr>
                                    <td><input  placeholder="" type="texto" name="imagenesnombre[]" placeholder="Escriba caracteristica" class="form-control name_list" /></td>
                                    <td><button type="button" name="add3" id="add3"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field4">
                                <tr>
                                    <td><input type="file"  name="imagenesruta[]"  class="form-control name_list"  /></td>
                                    <td><button type="button" name="add4" id="add4"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                  
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>

            </div></div>






















        <center>      <div class="form-group ">
                <button class="btn btn-primary" type="submit" value="Registrar">Registrar </button>
                <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar </a>
            </div>

        </center>
    </form>
     <div class="row" >
            <div class="col-sm-4" ></div>
            <div class="col-sm-4" >
                <h6>  <center>Registra Caractetisticas </center></h6>
                <hr style="color: #47748b">

                <label for="">Seleccione la cantidad de criterios que desea agregar</label>
                <select id="selector" name="selector" onchange="mostrarDivs();"> 
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                </select>



            </div>
        </div>
        <div id="divcriterio" name="divcriterio">

            <div id="div3" name="div3" style="display: none"> 
            <form action="?controlador=Producto&accion=registrarCaracteristicas1" method="post">
                       <input id="titulo" name="titulo" type="text"  type="text">
           
                      <input id="productocodigobarras2" name="productocodigobarras2" type="number" type="hidden" placeholder="co">
                <input id="valorselect" name=valorselect" type="number" type="hidden">

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>
                        <div id="repeater">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Ingrese valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4"></div>

                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name1" id="name1" class="form-control" required />
                        </div>
                        <div id="repeater1">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Ingrese valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill1[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4"></div>

                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name2" id="name2" class="form-control" required />
                        </div>
                        <div id="repeater2">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Ingrese valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill2[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4"></div>

                </div>
                       <button type="submit" class="btn btn-primary">Enviar</button>
         
                </form>
            </div>
            <div id="div5" name="div5" style="display: none">    
                  <form action="?controlador=Producto&accion=registrarCaracteristicas2" method="post">
                <input id="titulo1" name="titulo1" type="text"  type="text">
                <input id="productocodigobarras3" name="productocodigobarras3" type="number"  type="hidden">
                <input id="valorselect2" name=valorselect2" type="number" type="hidden">
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name3" id="name3" class="form-control" required />
                        </div>
                        <div id="repeater3">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill3[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name4" id="name4" class="form-control" required />
                        </div>
                        <div id="repeater4">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill4[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name5" id="name5" class="form-control" required />
                        </div>
                        <div id="repeater5">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill5[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name6" id="name6" class="form-control" required />
                        </div>
                        <div id="repeater6">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill6[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name7" id="name7" class="form-control" required />
                        </div>
                        <div id="repeater7">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill7[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                       <button type="submit" class="btn btn-primary">Enviar</button>
         
                </form>
            </div>
            <div id="div7" name="div7" style="display: none">    
                <form action="?controlador=Producto&accion=registrarCaracteristicas3" method="post">
                <input id="titulo2" name="titulo2" type="text"  type="text">
                 <input id="productocodigobarras4" name="productocodigobarras4" type="number" type="hidden">
                <input id="valorselect3" name=valorselect3" type="number"  type="hidden">
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name8" id="name8" class="form-control" required />
                        </div>
                        <div id="repeater8">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill8[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name9" id="name9" class="form-control" required />
                        </div>
                        <div id="repeater9">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill9[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name10" id="name10" class="form-control" required />
                        </div>
                        <div id="repeater10">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill10[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name11" id="name11" class="form-control" required />
                        </div>
                        <div id="repeater11">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill11[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name12" id="name12" class="form-control" required />
                        </div>
                        <div id="repeater12">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill12[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name13" id="name13" class="form-control" required />
                        </div>
                        <div id="repeater13">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill13[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                <div class="row">
                    
                    <div class="col-sm-4" ></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Ingrese Criterios</label>
                            <input type="text" name="name14" id="name14" class="form-control" required />
                        </div>
                        <div id="repeater14">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">+</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Escribe Valores</label>
                                                <input class="form-control" data-skip-name="true" data-name="skill14[]" required>

                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" ></div>

                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
             </form>
            </div>
        </div>



</div>

<br>
<script type="text/javascript">
    function  mostrarDivs() {
        var valor = document.getElementById("selector").value;
      
        document.getElementById("valorselect").value=valor;  
        document.getElementById("valorselect2").value=valor; 
        document.getElementById("valorselect3").value=valor;
        div = document.getElementById('selector');
        div = "div" + valor;
        
        if (valor == 3) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
        } else if (valor == 5) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
        } else if (valor == 7) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
        }
    }


</script>
<script>
  $(document).ready(function () {

document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew);
document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew2);
document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew3);
function autoCompleteNew(e) {            
    var value = $(this).val();
    var a=localStorage.setItem("codigoId", document.getElementById("productocodigobarras").value);

    $("#productocodigobarras2").val(value.replace(/\s/g, '').toLowerCase()); 
       $("#productocodigobarras2").val(localStorage.getItem("codigoId"));
    
}
function autoCompleteNew2(e) {            
    var value = $(this).val();         
    $("#productocodigobarras3").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew3(e) {            
    var value = $(this).val();         
    $("#productocodigobarras4").val(value.replace(/\s/g, '').toLowerCase()); 
}


document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew4);



document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew5);
document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew6);
function autoCompleteNew4(e) {            
    var value = $(this).val();         
    $("#titulo").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew5(e) {            
    var value = $(this).val();         
    $("#titulo1").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew6(e) {            
    var value = $(this).val();         
    $("#titulo2").val(value.replace(/\s/g, '').toLowerCase()); 
}



        var i = 1;

    
        $('#add3').click(function () {
            i++;

            $('#dynamic_field3').append('<tr id="row' + i + '"><td><input type="text" name="imagenesnombre[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove3" id="' + i + '" class="btn btn-danger btn_remove3">X</button></td></tr>');


        });
        
        
        $('#add4').click(function () {
            i++;

            $('#dynamic_field4').append('<tr id="row' + i + '"><td><input type="file" name="imagenesruta[]"  class="form-control name_list" /></td><td><button type="button"  name="remove4" id="' + i + '" class="btn btn-danger btn_remove4">X</button></td></tr>');


        });
        $(document).on('click', '.btn_remove4', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove3', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });

        ///jugar con estos
        $(document).on('click', '.btn_remove2', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });


        $("#repeater").createRepeater();
        $("#repeater7").createRepeater();
        $("#repeater1").createRepeater();
        $("#repeater2").createRepeater();
        $("#repeater3").createRepeater();
        $("#repeater4").createRepeater();
        $("#repeater5").createRepeater();
        $("#repeater6").createRepeater();
        $("#repeater8").createRepeater();
        $("#repeater9").createRepeater();
        $("#repeater10").createRepeater();
        $("#repeater11").createRepeater();
        $("#repeater12").createRepeater();
        $("#repeater13").createRepeater();
        $("#repeater14").createRepeater();

    });
</script>


<?php

require 'public/footer.php';
