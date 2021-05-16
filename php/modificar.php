<?php
include ('conexion.php');
try{
    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    $query = "UPDATE $tabla SET";

    if($tabla == "almacen"){
        $almacen_id=$id;
        $almacen_nombre=$_POST['almacen_nombre'];
            if(empty($_FILES['almacen_foto']['tmp_name']) || $_FILES['almacen_foto']['tmp_name']=="") {       
                $almacen_foto = '';
            }else{
                $almacen_foto = addslashes(file_get_contents($_FILES['almacen_foto']['tmp_name']));
            }
        $almacen_tipo=$_POST['almacen_tipo'];
        $almacen_descripcion=$_POST['almacen_descripcion'];
        $almacen_precioI=$_POST['almacen_precioI'];
        $almacen_cantidad=$_POST['almacen_cantidad']; 
        $almacen_precioM=$_POST['almacen_precioM'];

        $query = $query ." almacen_id='$id', almacen_nombre='$almacen_nombre',";
        if($almacen_foto != ''){
            $query = $query ." almacen_foto='$almacen_foto',";
        }
        $query = $query ." almacen_tipo='$almacen_tipo', almacen_descripcion='$almacen_descripcion', almacen_precioI='$almacen_precioI', almacen_cantidad='$almacen_cantidad', almacen_precioM='$almacen_precioM' WHERE almacen_id='$id';";

    }elseif($tabla == "apartado_servicios"){
        $servicio_folio=$_POST['servicio_folio'];
        $servicio_tipo=$_POST['servicio_tipo'];
        $servicio_fecha=$_POST['servicio_fecha'];
        $servicio_hora=$_POST['servicio_hora'];
        $cliente_id=$_POST['cliente_id'];
        $servicio_precio=$_POST['servicio_precio'];

        $query = $query . "servicio_folio='$id', servicio_tipo='$servicio_tipo', servicio_fecha='$servicio_fecha' , servicio_hora='$servicio_hora', cliente_id='$cliente_id', servicio_precio='$servicio_precio' WHERE servicio_folio='$id';";

    }elseif($tabla == "clientes"){
        $clientes_id=$_POST['clientes_id'];
        $clientes_nombre=$_POST['clientes_nombre'];
        $clientes_apellidoP=$_POST['clientes_apellidoP'];
        $clientes_apellidoM=$_POST['clientes_apellidoM'];
        $clientes_direccion=$_POST['clientes_direccion'];
        $clientes_email=$_POST['clientes_email'];
        $clientes_tel1=$_POST['clientes_tel1'];
        $clientes_tel2=$_POST['clientes_tel2'];
        $clientes_fechaNacimiento=$_POST['clientes_fechaNacimiento'];

        $query = $query ."clientes_id='$id', clientes_nombre='$clientes_nombre', clientes_apellidoP='$clientes_apellidoP, clientes_apellidoM='$clientes_apellidoM', clientes_direccion='$clientes_direccion', clientes_tel1='$clientes_tel1', clientes_tel2='$clientes_tel2', clientes_fechaNacimiento='$clientes_fechaNacimiento', clientes_email='$clientes_email' WHERE clientes_id='$id';";

    }elseif($tabla == "empleados"){
        $empleado_id=$_POST['empleado_id'];
        $empleado_nombre = $_POST['empleado_nombre'];
        if(empty($_FILES['empleado_fotografia']['tmp_name']) || $_FILES['empleado_fotografia']['tmp_name']=="") {       
            $empleado_fotografia = '';
        }else{
            $empleado_fotografia = addslashes(file_get_contents($_FILES['empleado_fotografia']['tmp_name']));
        }
        $empleado_apellidoP=$_POST['empleado_apellidoP'];
        $empleado_apellidoM=$_POST['empleado_apellidoM'];
        $empleado_fechaNacimiento=$_POST['empleado_fechaNacimiento'];
        $empleado_direccion=$_POST['empleado_direccion'];
        $empleado_email=$_POST['empleado_email'];
        $empleado_telFijo=$_POST['empleado_telFijo'];
        $empleado_telCel=$_POST['empleado_telCel'];
        $empleado_cargo=$_POST['empleado_cargo'];
        $empleado_usuario=$_POST['empleado_usuario'];

        $query = $query ."empleado_id='$id', empleado_nombre='$empleado_nombre', empleado_fotografia='$empleado_fotografia, empleado_apellidoP='$empleado_apellidoP', empleado_apellidoM='$empleado_apellidoM', empleado_fechaNacimiento='$empleado_fechaNacimiento', empleado_direccion='$empleado_direccion', empleado_email='$empleado_email', empleado_telFijo='$empleado_telFijo', empleado_telCel='$empleado_telCel', empleado_cargo='$empleado_cargo', empleado_usuario='$empleado_usuario' WHERE empleado_id='$id'";

    }elseif($tabla == "pedidos"){
        $pedido_folio=$_POST['pedidos_folio'];
        $proveedor_id=$_POST['proveedor_id'];
        $pedido_producto=$_POST['pedidos_producto'];
        $pedido_cantidad=$_POST['pedidos_cantidad'];
        $pedido_precio=$_POST['pedidos_precio'];
        $pedido_fecha=$_POST['pedidos_fecha'];

        $query = $query ."pedido_folio='$id', proveedor_id='$proveedor_id', pedido_producto='$pedido_producto, pedido_cantidad='$pedido_cantidad', pedido_precio='$pedido_precio', pedido_fecha='$pedido_fecha' WHERE pedido_folio='$id'";

    }elseif($tabla == "proveedores"){
        $proveedor_id=$_POST['proveedor_id'];
        $proveedor_nombre=$_POST['proveedor_nombre'];
        if(empty($_FILES['proveedor_fotografia']['tmp_name']) || $_FILES['proveedor_fotografia']['tmp_name']=="") {       
            $proveedor_fotografia = '';
        }else{
            $proveedor_fotografia = addslashes(file_get_contents($_FILES['empleado_fotografia']['tmp_name']));
        }
        $proveedor_apellidoP=$_POST['proveedor_apellidoP'];
        $proveedor_apellidoM=$_POST['proveedor_apellidoM'];
        $proveedor_tipoProducto=$_POST['proveedor_tipoProducto'];
        $proveedor_email=$_POST['proveedor_email'];

        $query = $query ."proveedor_id='$id', proveedor_nombre='$proveedor_nombre', proveedor_fotografia='$proveedor_fotografia, proveedor_apellidoP='$proveedor_apellidoP', proveedor_apellidoM='$proveedor_apellidoM', proveedor_tipoProducto='$proveedor_tipoProducto', proveedor_email='$proveedor_email' WHERE proveedor_id='$id';";

    }elseif($tabla == "usuarios"){
        $usuario_id = $id;
        $usuario_usuario=$_POST['usuario_usuario'];
        $usuario_password=$_POST['usuario_password'];
        $usuario_nivel = $_POST['usuario_nivel'];
    
        $query = $query ." usuario_id='$id', usuario_usuario='$usuario_usuario', usuario_password='$usuario_password', usuario_nivel='$usuario_nivel' WHERE usuario_id='$id';";

    }elseif($tabla == "ventas"){
        $venta_folio=$_POST['venta_folio'];
        $producto_id=$_POST['producto_id'];
        $empleado_id=$_POST['empleado_id'];
        $cliente_id=$_POST['cliente_id'];
        $venta_fecha=$_POST['venta_fecha'];
        $venta_cantidad=$_POST['venta_cantidad'];
        $venta_precio=$_POST['venta_precio'];
      
        $query = $query ."venta_folio='$id', producto_id='$producto_id', empleado_id='$empleado_id, cliente_id='$cliente_id', venta_fecha='$venta_fecha', venta_cantidad='$venta_cantidad', venta_precio='$venta_precio' WHERE venta_folio='$id';";
    }
    $resultado = $mysqli->query($query);
        
    if($resultado > 0){
        echo "Modificacion Realizada";
    }else{
        echo "Error";
    }

}catch (Throwable $e) {
    echo "Captured Throwable: " . $e->getMessage() . PHP_EOL;
}
?>