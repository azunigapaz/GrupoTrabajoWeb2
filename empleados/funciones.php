<?php
    
    class elementosPage{

        //CARGAR TABLAS
        function CargarTablaEmpleados(){

            include("conexion.php");
            $sql ="
            SELECT empleado_cedula,
            CONCAT(empleado_primer_nombre,' ',empleado_segundo_nombre,' ',empleado_primer_apellido,' ',empleado_segundo_apellido) as NOMBRECOMPLETO,
            e.empleado_genero 
            FROM tbl_empleados e
            INNER JOIN tbl_cargo c on e.cargo_codigo = c.cargo_codigo;
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaEmpleado'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Cedula</th>
                        <th scope='col'>Nombre Completo</th>
                        <th scope='col'>Genero</th>  
                        <th scope='col'>Editar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_empleado.php?id=$data[empleado_cedula]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[empleado_cedula]</th>    
                        <td>$data[NOMBRECOMPLETO]</td>
                        <td>$data[empleado_genero]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditEmpleado&id=$data[empleado_cedula]&u=1' onclick='return confirm(\"Desea eliminar el usuario: $data[empleado_cedula]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaUsuarios(){

            include("conexion.php");
            $sql ="
            SELECT usuario_nombre,
            usuario_clave,
            usuario_estado,
            CONCAT(empleado_primer_nombre,' ',empleado_segundo_nombre,' ',empleado_primer_apellido,' ',empleado_segundo_apellido) as NOMBRECOMPLETO,
            usuario_clave_temporal_activa
            FROM `u391525088_transportweb`.`tbl_usuarios` u
            INNER JOIN tbl_empleados e ON u.empleado_cedula = e.empleado_cedula;
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaUsuario'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Usuario</th>
                        <th scope='col'>Clave</th>
                        <th scope='col'>Estado</th>  
                        <th scope='col'>Nombre Completo</th>
                        <th scope='col'>Clave Temporal</th>
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_usuario.php?id=$data[usuario_nombre]' method='POST' name='form2'>
                        
                        <th scope='row'>$data[usuario_nombre]</th>    
                        <td>$data[usuario_clave]</td>
                        <td>$data[usuario_estado]</td>
                        <td>$data[NOMBRECOMPLETO]</td>
                        <td>$data[usuario_clave_temporal_activa]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditUsuario&id=$data[usuario_nombre]&u=1' onclick='return confirm(\"Desea eliminar el usuario: $data[usuario_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaCargos(){

            include("conexion.php");
            $sql ="
            SELECT `tbl_cargo`.`cargo_codigo`,
            `tbl_cargo`.`cargo_nombre`,
            `tbl_cargo`.`cargo_descripcion`
            FROM `u391525088_transportweb`.`tbl_cargo`;
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaCargo'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Descripciòn del cargo</th>  
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_cargos.php?id=$data[cargo_codigo]' method='POST' name='form2'>                    
                        <th scope='row'>$data[cargo_codigo]</th>    
                        <td>$data[cargo_nombre]</td>
                        <td>$data[cargo_descripcion]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditCargos&id=$data[cargo_codigo]&u=1' onclick='return confirm(\"Desea eliminar el cargo: $data[cargo_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaRuta(){

            include("conexion.php");
            $sql ="
            SELECT `Vista_Ruta`.`ruta_codigo`,
            `Vista_Ruta`.`ruta_nombre`,
            `Vista_Ruta`.`Origen`,
            `Vista_Ruta`.`destino`,
            `Vista_Ruta`.`ruta_precio`,
            `Vista_Ruta`.`ruta_kilometro`,
            `Vista_Ruta`.`ruta_observacion`
            FROM `u391525088_transportweb`.`Vista_Ruta`;";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaRuta'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Origen</th>
                        <th scope='col'>Destino</th>
                        <th scope='col'>Precio</th>
                        <th scope='col'>Distancia</th>
                        <th scope='col'>Observacion</th>     
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_rutas.php?id=$data[ruta_codigo]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[ruta_codigo]</th>    
                        <td>$data[ruta_nombre]</td>
                        <td>$data[Origen]</td>
                        <td>$data[destino]</td>
                        <td>$data[ruta_precio]</td>
                        <td>$data[ruta_kilometro]</td>
                        <td>$data[ruta_observacion]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditRutas&id=$data[ruta_codigo]&u=1' onclick='return confirm(\"Desea eliminar la ruta: $data[ruta_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }


        function CargarTablaCiudades(){

            include("conexion.php");
            $sql ="
            SELECT `tbl_ciudades`.`ciudad_codigo`,
            `tbl_ciudades`.`ciudad_nombre`
            FROM `u391525088_transportweb`.`tbl_ciudades`;";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaCiudad'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre</th>  
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_ciudades.php?id=$data[ciudad_codigo]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[ciudad_codigo]</th>    
                        <td>$data[ciudad_nombre]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditCiudades&id=$data[ciudad_codigo]&u=1' onclick='return confirm(\"Desea eliminar la ruta: $data[ciudad_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }



        function CargarTablaBuses(){

            include("conexion.php");
            $sql ="
            SELECT `Vista_Buses`.`bus_codigo`,
            `Vista_Buses`.`bus_marca`,
            `Vista_Buses`.`bus_modelo`,
            `Vista_Buses`.`bus_placa`,
            `Vista_Buses`.`ruta_nombre`,
            `Vista_Buses`.`NOMBRECOMPLETO`
            FROM `u391525088_transportweb`.`Vista_Buses`;
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaBuses'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>SERIE</th>
                        <th scope='col'>MARCA</th>  
                        <th scope='col'>MODELO</th>  
                        <th scope='col'>PLACA</th>  
                        <th scope='col'>RUTA ASIGNADA</th>  
                        <th scope='col'>CONDUCTOR</th>  
                        <th scope='col'>MODIFICAR</th>
                        <th scope='col'>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_buses.php?id=$data[bus_codigo]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[bus_codigo]</th>    
                        <td>$data[bus_marca]</td>
                        <td>$data[bus_modelo]</td>
                        <td>$data[bus_placa]</td>
                        <td>$data[ruta_nombre]</td>
                        <td>$data[NOMBRECOMPLETO]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditBuses&id=$data[bus_codigo]&u=1' onclick='return confirm(\"Desea eliminar el bus con codigo: $data[bus_codigo]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaHorarioRutas(){

            include("conexion.php");
            $sql ="
            SELECT horario_codigo,
            horario_salida,
            horario_llegada,
            r.ruta_nombre
            FROM tbl_horario_rutas h inner join tbl_rutas r
			on h.ruta_codigo = r.ruta_codigo
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaHorarioRuta'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Hora Salida</th>  
                        <th scope='col'>Hora Llegada</th>
                        <th scope='col'>Ruta</th>    
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_horario_rutas.php?id=$data[horario_codigo]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[horario_codigo]</th>    
                        <td>$data[horario_salida]</td>
                        <td>$data[horario_llegada]</td>
                        <td>$data[ruta_nombre]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditHorarioRutas&id=$data[horario_codigo]&u=1' onclick='return confirm(\"¿Esta seguro de eliminar el horario?\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaEstaciones(){

            include("conexion.php");
            $sql ="
            SELECT estacion_codigo,
            estacion_nombre,
            c.ciudad_nombre
            FROM tbl_estaciones e
            INNER JOIN tbl_ciudades c
            ON e.ciudad_codigo = c.ciudad_codigo;";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaCiudad'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre Estacion</th>
                        <th scope='col'>Ubicacion</th>    
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_estaciones.php?id=$data[estacion_codigo]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[estacion_codigo]</th>    
                        <td>$data[estacion_nombre]</td>
                        <td>$data[ciudad_nombre]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditEstaciones&id=$data[estacion_codigo]&u=1' onclick='return confirm(\"Desea eliminar la estacion: $data[estacion_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }


        function CargarTablaClientes(){

            include("conexion.php");
            $sql ="
            SELECT `tbl_clientes`.`cliente_cedula`,
			CONCAT(cliente_primer_nombre,' ',cliente_segundo_nombre,' ', cliente_primer_apellido,' ', cliente_segundo_apellido) as nombrecompleto, 
            `tbl_clientes`.`cliente_rtn`,
            `tbl_clientes`.`cliente_telefono`,
            `tbl_clientes`.`cliente_observaciones`
            FROM `u391525088_transportweb`.`tbl_clientes`;";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaCliente'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Cedula</th>
                        <th scope='col'>Cliente</th>
                        <th scope='col'>RTN</th> 
                        <th scope='col'>Telefono</th> 
                        <th scope='col'>Observaciones</th>          
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_clientes.php?id=$data[cliente_cedula]' method='POST' name='form2'>
                    
                        <th scope='row'>$data[cliente_cedula]</th>    
                        <td>$data[nombrecompleto]</td>
                        <td>$data[cliente_rtn]</td>
                        <td>$data[cliente_telefono]</td>
                        <td>$data[cliente_observaciones]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addeditClientes&id=$data[cliente_cedula]&u=1' onclick='return confirm(\"Desea eliminar el cliente: $data[nombrecompleto]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";

        }

        function CargarTablaPaquetes(){

            include("conexion.php");
            $sql ="
            SELECT paquete_codigo,
            b.bus_placa,
            CONCAT(c.cliente_primer_nombre,' ',c.cliente_segundo_nombre,' ',c.cliente_primer_apellido, ' ',c.cliente_segundo_apellido) as NombreCliente,
            paquete_descripcion,
            paquete_peso_libras,
                tp.tipo_paquete_nombre,
            paquete_fecha_hora_envio,
            paquete_fecha_hora_entrega,
            paquete_estado
            FROM tbl_paquetes p
            INNER JOIN tbl_tipo_paquete tp ON p.tipo_paquete_codigo = tp.tipo_paquete_codigo
            INNER JOIN tbl_clientes c on p.cliente_cedula = c.cliente_cedula
            INNER JOIN tbl_buses b on p.bus_codigo = b.bus_codigo
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablapaquetes'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Bus</th>
                        <th scope='col'>Cliente</th>
                        <th scope='col'>Descripciòn</th>  
                        <th scope='col'>Peso</th>
                        <th scope='col'>Nombre Paquete</th>
                        <th scope='col'>Fecha Envio</th>
                        <th scope='col'>Fecha Entrega</th>
                        <th scope='col'>Estado Paquete</th>
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_paquetes.php?id=$data[paquete_codigo]' method='POST' name='form2'>
                        
                        <th scope='row'>$data[paquete_codigo]</th>    
                        <td>$data[bus_placa]</td>
                        <td>$data[NombreCliente]</td>
                        <td>$data[paquete_descripcion]</td>
                        <td>$data[paquete_peso_libras]</td>
                        <td>$data[tipo_paquete_nombre]</td>
                        <td>$data[paquete_fecha_hora_envio]</td>
                        <td>$data[paquete_fecha_hora_entrega]</td>
                        <td>$data[paquete_estado]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addediPaquete&id=$data[paquete_codigo]&u=1' onclick='return confirm(\"Desea eliminar el paquete: $data[paquete_codigo]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";
    
        }


        function CargarTablaTipoPaquetes(){

            include("conexion.php");
            $sql ="
            SELECT `tbl_tipo_paquete`.`tipo_paquete_codigo`,
            `tbl_tipo_paquete`.`tipo_paquete_nombre`,
            `tbl_tipo_paquete`.`tipo_paquete_precio`
            FROM `u391525088_transportweb`.`tbl_tipo_paquete`;
            ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));           
                  
            echo " 
            <table id='tablaTipoPaquetes'  class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre Categoria</th>
                        <th scope='col'>Precio</th>
                        <th scope='col'>Modificar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                    <form action='form_tipo_paquetes.php?id=$data[tipo_paquete_codigo]' method='POST' name='form2'>
                        
                        <th scope='row'>$data[tipo_paquete_codigo]</th>    
                        <td>$data[tipo_paquete_nombre]</td>
                        <td>$data[tipo_paquete_precio]</td>
                        <td><button class='btn btn-primary' type='submit' name='accion' value='2'><i class='icon ion-md-create'></i></button></td>
                        <td><a class='btn btn-primary' href='acciones.php?accion=3&dir=addediTipoPaquete&id=$data[tipo_paquete_codigo]&u=1' onclick='return confirm(\"Desea eliminar la categoria de paquete $data[tipo_paquete_nombre]\");'><i class='icon ion-md-trash'></i></a></td>
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table>            
            ";
    
        }

//------------------------------------------------------------------------------------------------------
        public function obtenerEmpleado($empleadoID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_empleados WHERE empleado_cedula = '$empleadoID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

        public function obtenerTipoPaquete($tipoPaquete){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_tipo_paquete WHERE tipo_paquete_nombre = '$tipoPaquete'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

        public function obtenerCargos($cargoID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_cargo WHERE cargo_codigo = $cargoID";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }
        
        /*Setear Buses-Emil */ 
        public function obtenerBuses($busID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_buses WHERE bus_codigo = $busID ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

        /*Setear Ciudades-Emil */ 
        public function obtenerCiudades($ciudadId){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_ciudades WHERE ciudad_codigo = $ciudadId";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

          /*Setear clientes-Emil */ 
        public function obtenerClientes($clienteID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_clientes WHERE cliente_cedula = '$clienteID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

          /*Setear clientes-Emil */ 
        public function obtenerEstaciones($estacionID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_estaciones WHERE estacion_codigo = '$estacionID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

          /*Setear facturas-Emil */ 
        public function obtenerFactura($facturaID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_factura WHERE factura_codigo = '$facturaID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

          /*Setear horario_rutas-Emil */ 
        public function obtenerHorarioRuta($horarioRutaID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_horario_rutas WHERE horario_codigo = $horarioRutaID";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

          /*Setear rutas-Emil */ 
        public function obtenerRuta($RutasID){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_rutas WHERE ruta_codigo = '$RutasID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

        /*Setear Usuario-Emil */ 
        public function obtenerUsuarios($UsuarioID){
            include 'conexion.php';      
            $sql = "SELECT `Vista_Usuario`.`usuario_nombre`,
            `Vista_Usuario`.`usuario_clave`,
            `Vista_Usuario`.`NombreCompleto`
            FROM `u391525088_transportweb`.`Vista_Usuario` = '$UsuarioID'";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));       
            
            
            $data = mysqli_fetch_assoc($query);
            //retorna el dataset
            return $data;

        }

//-----------------------------COMBOBOX OBTENER DATOS
        function ObtenerCargoCombobox(){
            include 'conexion.php';      
            $sql = "SELECT * FROM tbl_cargo";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));                           
           
            while($data = mysqli_fetch_assoc($query)){

                echo "
                
                    <option value=$data[cargo_codigo]>$data[cargo_nombre]</option>
                
                ";
            }
        }


        public function obtenerRutasCombobox(){
            include("conexion.php");
            $sql = "select 
            ruta_codigo,
            ruta_nombre
            from tbl_rutas ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["ruta_codigo"]."'>".$columna["ruta_nombre"]."</option>
                ";
            } 

        }

        public function obtenerEmpleadoCombobox(){
            include("conexion.php");
            $sql = "select 
            empleado_cedula,
            concat(empleado_primer_nombre,' ',empleado_segundo_nombre,' ',empleado_primer_apellido,' ' ,empleado_segundo_apellido) as nombres
            from tbl_empleados ";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["empleado_cedula"]."'>".$columna["nombres"]."</option>
                ";
            }
        }
        
        public function obtenerEstacionCombobox(){
            include("conexion.php");
            $sql = "SELECT * FROM tbl_estaciones";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["estacion_codigo"]."'>".$columna["estacion_nombre"]."</option>
                ";
            }
        }

        public function obtenerCiudadCombobox(){
            include("conexion.php");
            $sql = "SELECT * FROM tbl_ciudades";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["ciudad_codigo"]."'>".$columna["ciudad_nombre"]."</option>
                ";
            }
        }

        public function obtenerClientesCombobox(){
            include("conexion.php");
            $sql = "SELECT cliente_cedula, CONCAT(cliente_primer_nombre,' ',cliente_segundo_nombre,' ',cliente_primer_apellido,' ',cliente_segundo_apellido) AS ClienteNombre FROM tbl_clientes";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["cliente_cedula"]."'>".$columna["ClienteNombre"]."</option>
                ";
            }
        }        

        public function obtenerTipoPaquetesCombobox(){
            include("conexion.php");
            $sql = "SELECT tipo_paquete_codigo,tipo_paquete_nombre FROM tbl_tipo_paquete";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["tipo_paquete_codigo"]."'>".$columna["tipo_paquete_nombre"]."</option>
                ";
            }
        }                

        public function obtenerBusesCombobox(){
            include("conexion.php");
            $sql = "SELECT bus_codigo,CONCAT(bus_marca,' ',bus_modelo, ' ',bus_placa) AS BusNombre FROM tbl_buses";
            $query = mysqli_query($con, $sql)
            or die('error: '.mysqli_error($con));  
            while($columna = mysqli_fetch_assoc($query)){
                echo "
                <option value='".$columna["bus_codigo"]."'>".$columna["BusNombre"]."</option>
                ";
            }
        }                        

  
    }






?>