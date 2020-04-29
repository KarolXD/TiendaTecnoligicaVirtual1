
<?php
include_once 'public/headerUsuario.php';
?>


<div class="content">

    <style type="text/css">
        * { padding: 0; margin: auto; text-align: center; }
        #cabecera { background-color: #fff0f0; }  
        h1 { font: bold 1.5em arial; padding: 0.5em; }
        #navegador { background-color: #663366; padding: 0.5em; }
        #navegador li { margin: 0px 5px; padding: 0.1em 1em 0.5em 1em; 
                        background-color: #9933cc; width: 12%;float: left;
                        list-style-type: none;   }
        #navegador li:hover { background-color: #990033; }
        #navegador li a:link, #navegador li a:visited { 
            color: #feffe4; text-decoration: none; }
        #navegador li a:hover, #navegador li a:active { 
            color:#ffd7a9 ; text-decoration: none; }
        .borrar { clear: both; }	
        #principal h2 { font: bold 1.5em arial; padding: 0.5em }
        #principal p { font: normal 0.9em arial; text-align: justify;
                       text-indent: 3em; padding: 0.5em 2em; }
        </style>
        <script type="text/javascript" >




        //guardar los datos en arrays:
            var titulos = new Array();
            var enlaces = new Array();
                     <?php
                foreach ($vars['subcategoria'] as $item) {
                    ?>
        //Datos de los submenús
            titulos[0] = new Array(
                    "<?php echo $item[0] ?>",
                    "Subsección uno uno",
                    "Subsección uno dos",
                    "Subsección uno tres",
                    "Subsección uno cuatro");
            enlaces[0] = new Array("#", "#", "#", "#");
            titulos[1] = new Array(
                    "Subsección dos uno",
                    "Subsección dos dos",
                    "Subsección dos tres",
                    "Subsección dos cuatro",
                    "Subsección dos cinco");
            enlaces[1] = new Array("#", "#", "#", "#", "#");
            titulos[2] = new Array(
                    "Subsección tres uno",
                    "Subsección tres dos",
                    "Subsección tres tres",
                    "Subsección tres cuatro",
                    "Subsección tres cinco");
            enlaces[2] = new Array("#", "#", "#", "#", "#");
            titulos[3] = new Array(
                    "Subsección cuatro uno",
                    "Subsección cuatro dos",
                    "Subsección cuatro tres");
            enlaces[3] = new Array("#", "#", "#");
        //arrays para guardar elementos de la lista y submenús:
            var menu = new Array()
            var submenu = new Array()

            window.onload = function () {
        //BARRA DE NAVEGACIÓN: Crear desplegables:
                for (i = 0; i < titulos.length; i++) {
                    //localizar elementos principales
                    menu[i] = document.getElementById("seccion" + i);
                    //crear elemento menu desplegable
                    menu[i].innerHTML += "<div id='subseccion" + i + "'></div>"
                    //localizar elemento menu desplegable
                    submenu[i] = document.getElementById('subseccion' + i);
                    //escribir menu desplegable
                    for (j = 0; j < titulos[i].length; j++) {
                        submenu[i].innerHTML += "<p><a href='" + enlaces[i][j] + "'>" + titulos[i][j] + "</a></p>";
                    }
                    //estilo de los submenús
                    menu[i].style.position = "relative";
                    submenu[i].style.position = "absolute";
                    submenu[i].style.top = "100%";
                    submenu[i].style.left = "0px";
                    submenu[i].style.backgroundColor = "#41338b";
                    submenu[i].style.font = "normal 0.8em arial";
                    submenu[i].style.padding = "0.2em 0.5em";
                    submenu[i].style.display = "none"
                }
        //eventos para ver - ocultar menu
                for (i = 0; i < titulos.length; i++) {
                    menu[i].onmouseover = ver;
                    menu[i].onmouseout = ocultar;
                }
            }
        //función para ver los menús desplegables.
            function ver() {
                muestra = this.getElementsByTagName("div")[0];
                muestra.style.display = "block"
            }
        //funcion para ocultar los menús desplegables.
            function ocultar() {
                oculta = this.getElementsByTagName("div")[0];
                oculta.style.display = "none"
            }
              <?php
                }
                    ?>
        </script>

        <body>
            <div id="cabecera">
            <h1>Mi página</h1>
        </div>
        <div id="navegador">
            <ul>
                         <?php
                foreach ($vars['listado'] as $item) {
                    ?>

                    <li id="seccion<?php echo $item[0] ?>"><a href="#"><?php echo $item[1] ?></a></li>

                    <?php
                }
                ?>
                  
                    <li id="seccion2"><a href="#">1</a></li>
                    <li id="seccion1"><a href="#"> 2  </a></li>
                    <li id="seccion0"><a href="#">3</a></li>
                      <li id="seccion3"><a href="#">4</a></li>
           
            </ul>
            <div class="borrar"></div>
        </div>
        <div id="principal">
            <h2>Cuerpo principal de la página</h2>
            <p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis 
                in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens 
                inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. 
                Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod 
                consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli 
                viris intellegam, ut fugit veritus placerat per.</p>

            <p>Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet 
                libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. 
                Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum 
                eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, 
                ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus 
                deserunt quaestio ei.</p>
        </div>
    </body>

</div>

<?php
include_once 'public/footerUsuario.php';



