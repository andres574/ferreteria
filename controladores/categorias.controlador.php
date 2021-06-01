<?php
require_once __DIR__ . "/../modelos/categorias.modelo.php";
class ControladorCategorias
{

    static public function ctrCrearCategoria()
    {

        if (isset($_POST["nuevaCate"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑ+áéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCate"])) {

                $tabla = "categoria";
                $datos = $_POST["nuevaCate"];
                $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
                return $respuesta;
            } else {
                $respuesta = "error1";
                return $respuesta;
            }
        }
    }

    static public function ctrMostrarCategorias($item, $valor)
    {
        $tabla = "categoria";

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrEditarCategoria()
    {

        if (isset($_POST["categoriaEditada"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑ+áéíóúÁÉÍÓÚ ]+$/', $_POST["categoriaEditada"])) {

                $tabla = "categoria";
                $datos = array("categoria" => $_POST["categoriaEditada"], "id" => $_POST["id"]);
                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
                return $respuesta;
            } else {
                $respuesta = "error1";
                return $respuesta;
            }
        }
    }

    static public function ctrBorrarUsuario($categoryId)
    {

        if (isset($categoryId)) {

            $tabla = "categoria";
            $datos = $categoryId;



            $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

            return $respuesta;
        }
    }
}
