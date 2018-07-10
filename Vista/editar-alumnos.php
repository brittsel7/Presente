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
                            Edicion de Alumnos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-alumno" action="?c=alumno&a=Editar" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_estudiante" value="<?php echo $pvd->id_estudiante; ?>" />
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
											<button type="submit" class="btn btn-default ">Actualizar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
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
