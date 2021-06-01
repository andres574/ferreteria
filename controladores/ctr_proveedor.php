<?php

require_once __DIR__ . "/proveedor.controlador.php";

if (isset($_POST['option'])) {
    $opcion = $_POST['option'];
    switch ($opcion) {
        case 1:
            // creando nueva categoria
            $proveedor = ControladorProveedores::ctrCrearProveedores($_POST["nuevaProved"]);
            echo json_encode($proveedor);
            break;
        case 2:
            $item = null;
            $valor = null;
            $categorias = ControladorProveedores::ctrMostrarProveedores($item, $valor);
            $datos["data"] = [];
            foreach ($categorias as $c) {
                $datos["data"][] = $c;
            }
            echo json_encode($datos);
            break;
        case 3:
            $editar = ControladorProveedores::ctrEditarProveedores();
            echo json_encode($editar);
            break;
        case 4:
            $eliminar = ControladorProveedores::ctrBorrarPRoved($_POST["id"]);
            echo json_encode($eliminar);
    }
}
