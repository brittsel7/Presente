<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>

    <div id="wrapper">
	<?php include("panel.php"); ?>		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registro de Alumno
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Formulario" data-toggle="tab">Formulario</a>
                                </li>
                                <li><a href="#Archivo" data-toggle="tab">Archivo</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-alumno" action="?c=alumno&a=Guardar" method="post" >
                                        <input type="hidden" name="id_estudiante" value="<?php echo $pvd->id_estudiante; ?>" />
                                        <input type="hidden" name="usuario_id" value="<?php echo $pc2->usuario_id; ?>" />

										<div class="form-group col-lg-12">
                                            <label>Nombres</label>
											<input type="text" name="txt_nombres" value="<?php echo $pvd->txt_nombres; ?>" class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:100" />                                        </div>
                                        
										<div class="form-group col-lg-6">
                                            <label>Primer Apellido</label>
                                            <input class="form-control" name="txt_apellido1" value="<?php echo $pvd->txt_apellido1; ?>"  placeholder="Ingrese Primer Apellido">
                                        </div>
										<div class="form-group col-lg-6">
                                            <label>Segundo Apellido</label>
                                            <input class="form-control" name="txt_apellido2" value="<?php echo $pvd->txt_apellido2; ?>"  placeholder="Ingrese Segundo Apellido">
                                        </div>
										
                                        <div class="form-group col-lg-6">
                                            <label>CUI</label>
                                            <input class="form-control" name="txt_cui" value="<?php echo $pvd->txt_cui; ?>"  placeholder="Ingrese CUI">
                                        </div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Registrar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                <div class="tab-pane fade" id="Archivo">
                                    <form role="form" id="frm-alumno-archivo" enctype="multipart/form-data" action="?c=alumno&a=GuardarArchivo" method="post">
                                        
                                        <div class="form-group">
                                            <label>Subir Archivo</label>
                                            <input id="archivo" accept=".csv" name="archivo" type="file" /> 
                                        </div>
                                  
                                        <button type="submit" class="btn btn-default">Registrar</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
								</div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.Registro -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>

</body>

</html>
