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
                            Comentario a Alumnos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form">
                                        <h1>Nombre Alumno</h1>
                                        <div class="form-group">
                                            <label>Comentario</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Enviar</button>
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
