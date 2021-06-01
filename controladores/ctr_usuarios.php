<?php

require_once __DIR__ . "/usuarios.controlador.php";

if (isset($_POST['option'])) {
    $opcion = $_POST['option'];
    switch ($opcion) {
        case 1:
            $item = null;
            $valor = null;
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            $datos["data"] = [];
            foreach ($usuarios as $u) {
                $u['estado'] == 0 ? $u['icon_estado'] = '<button class="btn btn-danger btn-xs " id="desactivado">Desactivado</button>' : $u['icon_estado'] = '<button class="btn btn-success btn-xs " id="activado">Activado</button>';
                $u['foto'] != "" ? $u['foto_user'] = '<img src="perez/' . $u["foto"] . '" class="img-thumbnail" width="40px">' : $u['foto_user'] = '<img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px">';
                $datos["data"][] = $u;
            }

            echo json_encode($datos);
            break;
        case 2:
            $estado = ControladorUsuarios::ctrCambiarEstado($_POST["id_usuario"], $_POST["estado"]);
            echo json_encode($estado);
            break;
        case 3:
            $estado = ControladorUsuarios::ctrCrearUsuario($_POST["id_usuario"], $_POST["estado"]);
            echo json_encode($estado);
            break;
        case 4:
            $editar = ControladorUsuarios::ctrEditarUsuario();
            echo json_encode($editar);

            break;
        case 5:
            $eliminando = ControladorUsuarios::ctrBorrarUsuario($_POST["id_usuario"]);
            echo json_encode($eliminando);
            break;
    }
}
