<?php

require_once "conexion.php";
class ModeloProductos
{


    // CREAR producto
    static public function mdlIngresarproducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,stock,valor_compraU,porcentaje_inpuesto,valor_inpuesto,valor_ventaU,Id_proveedor,id_cate) VALUES (:descripcion,:stock,:valor_compraU,:porcentaje_inpuesto,:valor_inpuesto,:valor_ventaU,:Id_proveedor,:id_cate)");
        $stmt->bindParam(":descripcion", $datos["description"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_compraU", $datos["precioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":porcentaje_inpuesto", $datos["PorcentajeInpuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_inpuesto", $datos["valorInpuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_ventaU", $datos["precioVenta"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_proveedor", $datos["ProveedorProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cate", $datos["categoriaProducto"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        // $stmt->close();
        $stmt = null;
    }
    static public function mdlMostrarProducto($tabla, $item, $valor)
    {
        if ($item != null && $valor != null ) {
                $campoBusca1 = $item['categoria'];
                $campoBusca2 = $item['proveedor'];

                
                $donde = $item['codigo'];

            $stmt = Conexion::conectar()->prepare("SELECT  $campoBusca1,$campoBusca2 FROM $tabla WHERE $donde = $valor");
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare(" SELECT p.codigo as codigo, p.descripcion,
             p.stock,p.valor_compraU,p.porcentaje_inpuesto,p.valor_inpuesto,p.valor_ventaU,c.categoria, 
             p.fecha_registro FROM $tabla as p inner JOIN categoria as c on (p.id_cate = c.id_categoria)");

           
            $stmt->execute();
            return $stmt->fetchAll();
        }
        // $stmt->close();
        $stmt = null;
    }

    static public function mdlmostrarCategoriaProducto($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        if(  $stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return false;
        }
    }

    static public function mdlmostrarProveedorProducto($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, proveedor FROM $tabla");

        if(  $stmt->execute()){
            return $stmt->fetchAll();
        }
        else{
            return false;
        }
    }


    
    static public function mdlEditarproducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion=:descripcion ,stock=:stock ,valor_compraU=:valor_compraU,
        porcentaje_inpuesto=:porcentaje_inpuesto, valor_inpuesto =:valor_inpuesto ,valor_ventaU=:valor_ventaU , 
        Id_proveedor=:Id_proveedor ,id_cate=:id_cate  WHERE codigo = :codigo");

        $stmt->bindParam(":descripcion", $datos["description"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_compraU", $datos["precioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":porcentaje_inpuesto", $datos["PorcentajeInpuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_inpuesto", $datos["valorInpuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_ventaU", $datos["precioVenta"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_proveedor", $datos["ProveedorProducto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cate", $datos["categoriaProducto"], PDO::PARAM_STR);
        
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        // $stmt->close();
        $stmt = null;
    }
    static public function mdlBorrarproducto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE codigo = $datos");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
        // $stmt->close();

        $stmt = null;
    }
}
