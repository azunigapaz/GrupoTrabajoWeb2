
<?php

require("menu.html");
require("funciones.php");
$objetoTabla = new elementosPage();  

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro de paquetes</title>

    <!-- Libreria para iconos -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- DataTable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <link rel="stylesheet" href="style.css">
    


    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
        
  
  </head>
<body>
    
<div class="container">
    <div class="border m-5" style="height:550px; justify-content-center" >
        <div>
                <h2 style="text-align:center;">Agregar Encomiendas</h2>
        </div>
            <form name='formulario' id='formulario' method="POST" action='clientes.php'> <br><br>
                        <input type="hidden" name="accion" id="accion" value="">
        
                    
            <div class="row justify-content-center">
        
                <div class="col-2">
                <label  class="form-label">Transporte</label>
                </div>
                <div class="col-8">
                <select name="cmb_buses" id="cmb_buses"  class="form-control">
                          <option value="0" disabled selected > Seleccione una unidad de trasporte</option>
                    <?php

                    echo $objetoTabla-> obtenerBusesCombobox();
                    ?>
             </select>
                </div>
                </div><br>

        <div class="row justify-content-center">
                <div class="col-2">
                <label  class="form-label">Cliente</label>
                </div>
                <div class="col-3">
                <select name="cmb_clientes" id="cmb_clientes"  class="form-control">
                          <option value="0" disabled selected > Seleccione un cliente</option>
                    <?php

                    echo $objetoTabla-> obtenerClientesCombobox();
                    ?>
             </select>
                </div>
          
                <div class="col-2">
                <label  class="form-label">Peso Lbs.</label>
                </div>
                <div class="col-3">
                <input type="text" name="speso"  id="speso" class="form-control" value="0" aria-label="default input example" required>
                </div>
         </div><br>



                <div class="row justify-content-center">
                    <div class="col-2">
                    <label  class="form-label">Fecha de envio</label>
                    </div>
                    <div class="col-3">
                    <input type="date" name="speso"  id="speso" class="form-control" aria-label="default input example" required>
                    </div>
                
                
                     <div class="col-2">
                    <label  class="form-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-3">
                    <input type="date" name="tpaquete"  id="tpaquete" class="form-control" aria-label="default input example" required>
                    </div>

                </div><br>


                <div class="row justify-content-center">
                    <div class="col-2">
                    <label  class="form-label">Tipo Paquetes</label>
                    </div>
                    <div class="col-3">
                <select name="cmb_tipo_paquetes" id="cmb_tipo_paquetes"  class="form-control">
                          <option value="0" disabled selected > Seleccione un tipo de paquete</option>
                    <?php

                        echo $objetoTabla-> obtenerTipoPaquetesCombobox();
                    ?>
             </select>
                    </div>

                    <div class="col-2">
                    <label  class="form-label">Estado</label>
                    </div>
                    <div class="col-3">
                    <select name="scmb_estado" id="scmb_estado"  class="form-control">
                            <option value="" disabled selected > Seleccione el estado del paquete</option>
                            <option value='Registrado'>Registrado</option>
                            <option value='Entregado'>Entregado</option>
                    </select>
                    </div>
                </div><br>

                <div class="row justify-content-center">
                    <div class="col-2">
                    <label  class="form-label">Descripcion</label>
                    </div>
                    <div class="col-8">
                    <textarea id="observaciones" name="observaciones" rows="6"  required class="form-control"></textarea>
                    </div>
               </div><br>

    
                <div class="row justify-content-center" style="padding-top:40px; margin:auto;">
         
                <div class="col-4">
                    <button class="btn btn-primary" onClick="return guardarPaquete()">GUARDAR</button>
                </div>
                </div> <br><br>
                
                <div class='row'> 
                    <div class='col-12'>
                        <?php                 
                            echo $objetoTabla-> CargarTablaPaquetes();
                          
                        ?>  
                    </div>               
                </div>         
                

        
            </form>
    </div>
</div>
         <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

        <!-- DataTable JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

        <!-- validar datos -->
        <script src="validar_paquetes.js"></script>	



</body>
</html>