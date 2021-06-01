<?php

require_once "conexion.php";
class ModeloProveedores
{


    // CREAR proveedores
    static public function mdlIngresarProveedores($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nit, proveedor, telefono, ubicacion) VALUES (:nit,:proveedor, :telefono, :ubicacion)");

		$stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
        $stmt = null;
    }
    static public function mdlMostrarProveedores($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":item", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }


    static public function mdlEditarproveedores($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nit = :nit, proveedor = :proveedor, telefono = :telefono,
        ubicacion = :ubicacion  WHERE id = :id");

        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return  true;
        } else {
            return  false;
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlBorrarProveedores($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
        $stmt->close();

        $stmt = null;
    }
}
