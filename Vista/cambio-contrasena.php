<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>

<body>

    <div id="wrapper">


	<?php include("panel.php"); ?>		
		
<div class="container">
	<div class="row">
	
        <div class="col-md-6 col-md-offset-3">
  <h4 style="border-bottom: 1px solid #c5c5c5;">
    <i class="glyphicon glyphicon-user">
    </i>
    Cambiar contraseña
  </h4>
  <div style="padding: 20px;" id="form-olvidado">
  <form accept-charset="UTF-8" role="form" id="login-form" method="post">
      <fieldset>
        <div class="form-group input-group">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="Contraseña Actual" name="password" type="password" value="" required="">
        </div>
        <div class="form-group input-group">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="Nueva Contraseña" name="password" type="password" value="" required="">
        </div>
		<div class="form-group input-group">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="Repetir Contraseña" name="password" type="password" value="" required="">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">
            Cambiar Contraseña
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
	</div>
</div>
		
		
		
    </div>
    <!-- /#wrapper -->

<?php include("scripts.php"); ?>

</body>

</html>
