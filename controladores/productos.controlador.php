<?php
require_once __DIR__ . "/../modelos/productos.modelo.php";
class Controladorproductos  
{

    static public function ctrCrearProducto()
    {        

        if (isset($_POST["Descripcion"])) {

           

            $tabla = "productos";
                
            $description =  $_POST["Descripcion"];
            $stock =  $_POST["stock"];
            $precioCompra =  $_POST["precioCompra"];
            $PorcentajeInpuesto = $_POST["PorcentajeInpuesto"];
            $categoriaProducto =  $_POST["categoriaProducto"];
            $ProveedorProducto =  $_POST["ProveedorProducto"];
            $precioVenta = $_POST["precioVenta"];
            $valorInpuesto = 0;

            if($PorcentajeInpuesto == 19){
                $valorInpuesto = round(($precioCompra)-($precioCompra/1.19),3);
                }elseif($PorcentajeInpuesto == 5){
                    $valorInpuesto = round(($precioCompra)-($precioCompra/1.05),3);
                    // return $valorInpuesto;
                }
                elseif($PorcentajeInpuesto == 0){
                    $valorInpuesto = 0;
                    // return $valorInpuesto;
                }else{
                    return "porcentaje error";
                }               

                
            $datos = array("description" => $description,"stock" => $stock,"precioCompra"=> $precioCompra,
            "PorcentajeInpuesto"=> $PorcentajeInpuesto, "valorInpuesto"=>$valorInpuesto, "precioVenta"=> $precioVenta,
            "ProveedorProducto"=>$ProveedorProducto,"categoriaProducto"=>$categoriaProducto);              
            
         
            $respuesta = Modeloproductos::mdlIngresarProducto($tabla, $datos);
            return $respuesta;
            
        }
        else {
            $respuesta = "error1";
            return $respuesta;
            }
    }

    static public function ctrMostrarProducto($item, $valor)
    {
        $tabla = "productos"; 

        $respuesta = ModeloProductos::mdlMostrarProducto($tabla, $item, $valor);
        return $respuesta;
        echo $respuesta;
    }

    static public function ctrMostrarCategoriaProducto()
    {
        $tabla = "categoria";

        $respuesta = ModeloProductos::mdlmostrarCategoriaProducto($tabla);
        return $respuesta;
        // echo $tabla;
    }
      static public function ctrMostrarProveedorProducto()
    {
        $tabla = "proveedores";

        $respuesta = ModeloProductos::mdlmostrarProveedorProducto($tabla);
        return $respuesta;
        // echo $tabla;
    }

    static public function ctrEditarProducto()
    {
  if (isset($_POST["EditarDescripcion"])) {
       

                $tabla = "productos";
                $codigo = $_POST["codigo"];
                $description =  $_POST["EditarDescripcion"];
                $stock =  $_POST["editStock"];
                $precioCompra =  $_POST["editPrecioCompra"];
                $PorcentajeInpuesto = $_POST["editPorcentajeInpuesto"];
                $categoriaProducto =  $_POST["editarCategoriaProducto"];
                $ProveedorProducto =  $_POST["editProveedorProducto"];
                $precioVenta = $_POST["editPrecioVenta"];
                $valorInpuesto = 0;

               if($PorcentajeInpuesto == 19){
                   $valorInpuesto = round(($precioCompra)-($precioCompra/1.19),3);
                }elseif($PorcentajeInpuesto == 5){
                   $valorInpuesto = round(($precioCompra)-($precioCompra/1.05),3);
                    // return $valorInpuesto;
                }
                elseif($PorcentajeInpuesto == 0){
                   $valorInpuesto = 0;
                    // return $valorInpuesto;
                }else{
                    return "porcentaje error";
                }
                
                $datos = array("description" => $description,"stock" => $stock,"precioCompra"=> $precioCompra,
                "PorcentajeInpuesto"=> $PorcentajeInpuesto, "valorInpuesto"=>$valorInpuesto, "precioVenta"=> $precioVenta,
                "ProveedorProducto"=>$ProveedorProducto,"categoriaProducto"=>$categoriaProducto, "codigo"=>$codigo);  
            
         
                $respuesta = Modeloproductos::mdlEditarproducto($tabla, $datos);
                return $respuesta;

            
        }
        else {
                $respuesta = "error1";
                return $respuesta;
            }
    }

    static public function ctrborrarProducto($codigoProducto)
    {

        if (isset($codigoProducto)) {

            $tabla = "productos";
            $datos = $codigoProducto;

            $respuesta = ModeloProductos::mdlBorrarproducto($tabla, $datos);

            return $respuesta;
        }
        else{
        return false;

        }
    }
}
