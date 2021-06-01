<?php

require_once __DIR__ . "/categorias.controlador.php";

if (isset($_POST['option'])) {
    $opcion = $_POST['option'];
    switch ($opcion) {
        case 1:
            // creando nueva categoria
            $categoria = ControladorCategorias::ctrCrearCategoria($_POST["nuevaCate"]);
            echo json_encode($categoria);
            break;
        case 2:
            $item = null;
            $valor = null;
            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
            $datos["data"] = [];
            foreach ($categorias as $c) {
                $datos["data"][] = $c;
            }
            echo json_encode($datos);
            break;
        case 3:
            $editar = ControladorCategorias::ctrEditarCategoria();
            echo json_encode($editar);
            break;
        case 4:
            $eliminar = ControladorCategorias::ctrBorrarUsuario($_POST["id_categoria"]);
            echo json_encode($eliminar);
    }
}
