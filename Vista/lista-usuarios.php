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
                            Usuarios Registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Codigo ID</th>
                                            <th>Contraseña</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Luis</td>
                                            <td>Jimenez Gonzales</td>
                                            <td>20123677</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Ver</button></td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Michael Mario</td>
                                            <td>Flores Conislla</td>
                                            <td>19922334</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Ver</button></td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Elisabeth</td>
                                            <td>Farfán Choquehuanca</td>
                                            <td>20135678</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Ver</button></td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Diego</td>
                                            <td>Maraza Itomacedo</td>
                                            <td>20123456</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Ver</button></td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php include("scripts.php"); ?>
</body>

</html>
