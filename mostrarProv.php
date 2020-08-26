<?php
include('link.php');
require 'conexion.php';
         
$where = "";
       
if(!empty($_POST))
{
    $valor = $_POST ['campo'];
    if(!empty($valor)){
        $where = "WHERE nombre_producto LIKE '%$valor%'";
    }
}

$sql = "SELECT * FROM proveedor $where";
$resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado de Proveedores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo ">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" 
                style="line-height: 55px; 
                       cursor: pointer; 
                       padding: 0 10px; 
                       margin-left: 7px;">
                </i> 
                Sistema de Almacen
            </div>
            <div>
                <figure>
                    <img src="assets/img/logo.jpg" alt="Biblioteca" class="img-responsive center-box"
                     style="width:100%; height: 27%;">
                </figure>
                
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="inicio.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-store"></i>&nbsp;&nbsp; Productos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="nuevoProducto.php"><i class="zmdi zmdi-collection-plus"></i>&nbsp;&nbsp; Agregar Nuevo Producto</a></li>
                            <li><a href="mostrarPro.php"><i class="zmdi zmdi-collection-text"></i>&nbsp;&nbsp; Listado de Productos</a></li>
                            <li><a href="precioPro.php"><i class="zmdi zmdi-money"></i>&nbsp;&nbsp; Agregar Precio a Productos</a></li>
                            <li><a href="mostrarPrec.php"><i class="zmdi zmdi-money-box"></i>&nbsp;&nbsp; Listado de Productos con su Precio</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Empleados <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="nuevoEm.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Agregar Empleado</a></li>
                            <li><a href="mostrarEm.php"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Listado de Empleados</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Proveedores <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="nuevoProv.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Proveedor</a></li>
                            <li><a href="mostrarProv.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Listado de Proveedores</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
              <hy></hy>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema de Almacen<small>   </small></h1>
            </div>
       <div class="edii">
              <div class="container">
       
            <div class="row">
                
                <h2 style="text-align:center">LISTADO DE PROVEEDORES</h2>
                
            </div>
            <div class="row">
                <a href="nuevoProv.php" class="btn btn-success">Agregar Nuevo Proveedor</a>
                
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                
                    <input type="text" id="campo" name="campo" required='required'
                     placeholder="buscar un producto " autocomplete="off"/>
                    <input type="submit"  id="enviar" name="enviar" value="Buscar"  
                    class="btn btn-danger"  />
                   
                 </form>
            </div>
            
            <br>
            <div class="row table-responsive">
                <table class="table table-striped">
                   <thead>
                    <tr>
                        <th>codigo</th>
                        <th>proveedor</th>
                        <th>dirección</th>
                        <th>telefono</th>
                        <th>email</th>
                        <th>producto</th>
                        <th>actualizar</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
                    { ?> 
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre_proveedor']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['producto_servicio']; ?></td>
                    <td><a href="css/actualizar2.php?id=<?php echo $row 
                    ['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
            </div>
        </div>
        <section class="full-reset text-center" style="padding: 40px 0;">         
        </section>
        
    </div>
</body>
</html>