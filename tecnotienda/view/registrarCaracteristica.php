
<?php

require 'public/headerMenuP.php';
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>   
<script src="./public/js/repeater.js" type="text/javascript"></script>

<div class="container">

    <div class="row" >
        <div class="col-sm-4" ></div>
        <div class="col-sm-4" >
            <h5>  <center>Registra una Producto </center></h5>
            <hr style="color: #47748b">
            <form method="post" id="repeater_form">


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
    </div>
    ----
    <div class="row">
      <div class="col-sm-4" ></div>
        <div class="col-sm-4" >
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
                            <label>Select Programming Skill</label>
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
      
      <div class="col-sm-4" ></div>
      </div>
    <div class="clearfix"></div>
    <div class="form-group" align="center">
        <br /><br />
        <input type="submit" name="insert" class="btn btn-success" value="insert" />
    </div>
</form>
</div>
<script>
    $(document).ready(function () {
        $("#repeater").createRepeater();
        $("#repeater1").createRepeater();

        $('#repeater_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({

                url: "?controlador=Producto&accion=guardarCaracteristica",
                method: "POST",
                data: $(this).serialize(),
                success: function (data)
                {
                    console.log("entro" + data);
                    //   $('#repeater_form')[0].reset();
                    //    $("#repeater").createRepeater();
                    //  $('#success_result').html(data);
                    /*setInterval(function(){
                     location.reload();
                     }, 3000);*/
                }
            });
        });

    });

</script>


<br>


</div>
<?php

require 'public/footer.php';
