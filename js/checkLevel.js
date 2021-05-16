fetch("./php/checkLevel.php")
.then((res)=>{
    return res.text();
})
.then((res)=>{
    console.log(res);
    if (res == 'admin'){
        document.getElementById('menu').innerHTML = `            <li><a href="almacen.html">Almacén</a></li>
    <li><a href="servicios.html">Servicios</a></li>
    <li><a href="clientes.html">Clientes</a></li>
    <li><a href="empleados.html">Empleados</a></li> <li>
    <li><a href="pedidos.html">Pedidos</a></li>
    <li><a href="proveedores.html">Proveedores</a></li>
    <li><a href="usuarios.html">Usuarios</a></li>
    <li><a href="ventas.html">Ventas</a></li>
    <li><a href="javascript:exitSystem()" class="salir">Salir</a></li>`;
    }else if(res == 'user'){
        document.getElementById('menu').innerHTML = `
    <li><a href="almacen.html">Almacén</a></li>
    <li><a href="servicios.html">Servicios</a></li>
    <li><a href="clientes.html">Clientes</a></li>
    <li><a href="pedidos.html">Pedidos</a></li>
    <li><a href="proveedores.html">Proveedores</a></li>
    <li><a href="ventas.html">Ventas</a></li>
    <li><a href="javascript:exitSystem()" class="salir">Salir</a></li>`;
    }
})
.catch((err)=>{console.log(err);})
