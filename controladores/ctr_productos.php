<?php

require_once __DIR__ . "/productos.controlador.php";

if (isset($_POST['option'])) {
    $opcion = $_POST['option'];
    switch ($opcion) {
        case 1:
            // creando nueva categoria
            $producto = Controladorproductos::ctrCrearProducto($_POST["Descripcion"]);
            echo json_encode($producto);
            break;
        case 2:
            $item = null;
            $valor = null;
            $prodcutos = Controladorproductos::ctrMostrarProducto($item, $valor);
            $datos["data"] = [];
            foreach ($prodcutos as $c) {
                $datos["data"][] = $c;
            }
            echo json_encode($datos);
            break;
        case 3:
            $editar = Controladorproductos::ctrEditarProducto();
            echo json_encode($editar);
            break;
        case 4:
            $eliminar = Controladorproductos::ctrborrarProducto($_POST["codigo"]);
            echo json_encode($eliminar);
            // echo json_encode(Controladorproductos::ctrborrarProducto($_POST["codigo"]));
            break;
        case 5:          
            $consultaCategoria = Controladorproductos::ctrMostrarCategoriaProducto();           
            echo json_encode($consultaCategoria);
            break;
        case 6:          
            $consultaProveedor = Controladorproductos::ctrMostrarProveedorProducto();           
            echo json_encode($consultaProveedor);
            break;
        case 7:
            $item = array('categoria'=> "id_cate", 'proveedor'=> "id_proveedor", "codigo"=> "codigo");
            $valor = $_POST["codigo"];
     

            $prodcutos = Controladorproductos::ctrMostrarProducto($item, $valor);
       
            echo json_encode($prodcutos);
            break;
            

    }
}
