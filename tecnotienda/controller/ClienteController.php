<?php

class ClienteController {

    public function __construct() {
        $this->view = new View();
    }

    public function cerrarSession() {
        session_start();

        if (session_destroy()) {
         //   echo "Sesión destruida correctamente";
        } else {
         //   echo "Error al destruir la sesión";
        }
        $this->view->show("loginAdmin.php");
    }

    public function loginCliente() {

        $this->view->show("loginCliente.php");
    }

    public function loginClientee() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_POST["username"];
        $contra = $_POST["password"];

        $_SESSION['usuario'] = $clienteid;
        $dato = $items->loginCliente($clienteid, $contra);

        if ($dato == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>  Inicio de session correcto</div> ");  });</script>';
            $this->view->show("compraArticulo.php", $dato);
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Usuario y/o Contraseña INCORRECTA </div> ");  });</script>';
            $this->view->show("loginCliente.php", $dato);
        }
    }

    public function loginUsuario() {
        require 'model/data/usuarioDato.php';
        $items = new usuarioDato();
        $clienteid = $_POST["username"];
        $contra = $_POST["password"];

        $dato = $items->loginUsuario($clienteid, $contra);

        if ($dato == 1) {
            session_start();
            if (!isset($_SESSION['usuario'])) {
                $_SESSION['usuario'] = '';
            }

            $_SESSION['usuario'] = $clienteid;
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>  Inicio de session correcto</div> ");  });</script>';

            $this->view->show("menuPrincipal.php");
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Usuario y/o Contraseña INCORRECTA </div> ");  });</script>';

            $this->view->show("loginAdmin.php");
        }
    }

    public function loginAdmin() {
        $this->view->show("loginAdmin.php");
    }

    public function registrarClienteVista() {
        $this->view->show("registrarClienteVista.php");
    }

    public function menuPrincipal() {
        $this->view->show("menuPrincipal.php");
    }

    public function menuClientes() {
        $this->view->show("menuClientes.php");
    }

    public function listarClientes() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $dato['listado'] = $items->listarDatosCliente();
        $this->view->show("MenuClientes.php", $dato);
    }

   public function listarClientesDetalle() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato(); 
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->listarDatosClienteDetalle($clienteid);
        $this->view->show("detalleCliente.php", $dato);
    }

    public function listarCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $dato['listado'] = $items->listarCorreo();
        $this->view->show("MenuCorreo.php", $dato);
    }

    public function actualizarCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        echo $array_num;
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $resultado = $items->actualizarCorreo($clienteid, $valor, $correoid);

        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente</div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>  No modificado</div> ");  });</script>';
        }

        $dato['listado'] = $items->filtarCorreoById($correoid);
        $this->view->show("actualizarCorreo.php", $dato);
    }

    public function filtarClienteById() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById($clienteid);
        $this->view->show("actualizarCorreo.php", $dato);
    }

    public function filtarClienteById2() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById2($clienteid);
        $this->view->show("actualizarTelefono.php", $dato);
    }

    public function actualizarDatosCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
       
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
       $resultado= $items->actualizarCorreo($correoid, $valor);

       
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente</div> ");  });</script>';
        } else {
                  echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha Modificado exitosamente</div> ");  });</script>';
      
        }
        $dato['listado'] = $items->filtarClienteById($_POST["id"]);
        $this->view->show("actualizarCorreo.php", $dato);
    }

    public function actualizarDatosTelefono() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
      $resultado=  $items->actualizarTelefono($correoid, $valor);

           if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente</div> ");  });</script>';
        } else {
                  echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha Modificado exitosamente</div> ");  });</script>';
      
        }
        $dato['listado'] = $items->filtarClienteById2($_POST["id"]);
        $this->view->show("actualizarTelefono.php", $dato);
    }

    public function registrarCliente() {

        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $usuario = $_POST["usuario"];
        $valor = "";
        $valor2 = "";
        $temp = "";
        $temp2 = "";
        $correos = $_POST["name"];
        $telefono = $_POST["names"];
        $array_cor = count($correos);
        $array_num = count($telefono);
        $estado = $_POST["estado"];
        $contra = $_POST["contra"];

        $provincia = $_POST["provincia"];
        if ($provincia == 1) {
            $provincia = "San José";
        }
        if ($provincia == 2) {
            $provincia = "Alajuela";
        }
        if ($provincia == 3) {
            $provincia = "Cartago";
        }
        if ($provincia == 4) {
            $provincia = "Heredia";
        }
        if ($provincia == 5) {
            $provincia = "Guanacaste";
        }
        if ($provincia == 6) {
            $provincia = "Puntarenas";
        }
        if ($provincia == 7) {
            $provincia = "Limón";
        }
       echo $canton = $_POST["canton"];
      echo  $distrito = $_POST["distrito"];
      echo  $descripcion = $_POST["direccion"];

        $banco = $_POST["banco"];
        $numerocuenta = $_POST["numerocuenta"];

        for ($i = 0; $i < $array_cor; $i++) {
            $valor .= $correos[$i] . ",";
            $temp .= "0" . ",";
        }
        for ($y = 0; $y < $array_num; $y++) {
            $valor2 .= $telefono[$y] . ",";
            $temp2 .= "0" . ",";
        }
        
    
              $resultado3 = $items->registrarCliente($usuario, $contra, $estado);
        if ($resultado3 == 1) {
          
            echo $valor;
            echo $temp;
            $resultado1 = $items->registrarCorreo($usuario, $valor, $temp);
            $resultado2 = $items->registrarTelefono($usuario, $valor2, $temp2);
            $resultado4 = $items->registrarDireccion($usuario, $provincia, $canton, $distrito, $descripcion);
            $resultado5 = $items->registrarCuentaBancaria($usuario, $banco, $numerocuenta);
           $resultado6 = $items->registrarClienteCategorizacion($usuario, $usuario);
            if ($resultado2 == 1 && $resultado1 == 1 && $resultado4 == 1 && $resultado5 == 1 && $resultado6 == 1) {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>  Se ha registrado correctamente el cliente</div> ");  });</script>';
            }else{
                      echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> No  registrado </div> ");  });</script>';
            }
            
        } else if ($resultado3 == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>  Usuario existente</div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No registrado</div> ");  });</script>';
        }
        $this->view->show("registrarClienteVista.php");
    }

    public function eliminarCliente() {
        require 'model/data/clienteDato.php';
        $PD = new clienteDato();
        $usuario = $_POST['clienteid'];
        $resultado = $PD->quitarCliente($usuario);
        $dato['listado'] = $PD->listarDatosCliente();

        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Eliminado exitosamente</div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha Eliminado exitosamente</div> ");  });</script>';
        }
        $this->view->show("MenuClientes.php", $dato);
    }

}

//fin
// fin clase
?>