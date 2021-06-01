<?php
require_once __DIR__ . "/../modelos/proveedor.modelo.php";
class ControladorProveedores
{

    static public function ctrCrearProveedores()
    {

        if (isset($_POST["nuevaProved"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑ+áéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaProved"])) {

                $tabla = "proveedores";
                $datos = array(
                    "nit"=> $_POST["nuevaProved"],
                    "proveedor"=> $_POST["nombreProved"],
                    "telefono"=> $_POST["telProved"],
                    "ubicacion"=> $_POST["dirProved"]
                );
                $respuesta = ModeloProveedores::mdlIngresarProveedores($tabla, $datos);
                return $respuesta;
            } else {
                $respuesta = "error1";
                return $respuesta;
            }
        }
    }

    static public function ctrMostrarProveedores($item, $valor)
    {
        $tabla = "proveedores";

        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrEditarProveedores()
    {
 
        if (isset($_POST["EditProved"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑ+áéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNomPRoved"])) {

                $tabla = "proveedores";
                $datos = array(
                    "id"=> $_POST["id"],
                    "nit"=> $_POST["EditProved"],
                    "proveedor"=> $_POST["EditarNomPRoved"],
                    "telefono"=> $_POST["EdittelProved"],
                    "ubicacion"=> $_POST["EditdirProved"]
                );
                $respuesta = ModeloProveedores::mdlEditarProveedores($tabla, $datos);
                return $respuesta;
            } else {
                $respuesta = "error1";
                return $respuesta;
            }
        }
    }

    static public function ctrBorrarPRoved($provedId)
    {

        if (isset($provedId)) {

            $tabla = "proveedores";
            $datos = $provedId;



            $respuesta = ModeloProveedores::mdlBorrarProveedores($tabla, $datos);

            return $respuesta;
        }
    }
}
