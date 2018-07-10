<?php

require_once '../Modelo/profesor.php';
require_once '../Modelo/usuario.php';

class ProfesorController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new profesor();
    }

    public function Index(){
        require_once '../Vista/lista-profesores.php';

    }

    public function Crud(){
        $pvd = new profesor();

        if(isset($_REQUEST['persona_id'])){
            $pvd = $this->model->Obtener($_REQUEST['persona_id']);
        }

        require_once '../Vista/editar-profesores.php';
  }

    public function Nuevo(){
        $pvd = new profesor();

        require_once '../Vista/agregar-profesores.php';

    }

    public function Guardar(){
        $pvd = new profesor();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['persona_dni'], PASSWORD_BCRYPT);
        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->usuario_cuenta = $_REQUEST['persona_dni'];
        $pc2->usuario_password = $hash;
        $pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		$pc2->usuario_persona_id = 1;
        $pc2->usuario_estado = $_REQUEST['persona_estado'];
        
        $this->model->Registrar($pvd);
		$this->model->RegistrarU($pc2);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Editar(){
        $pvd = new profesor();

        $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->persona_nombres = $_REQUEST['persona_nombres'];
        $pvd->persona_apellido1 = $_REQUEST['persona_apellido1'];
        $pvd->persona_apellido2 = $_REQUEST['persona_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->persona_dni = $_REQUEST['persona_dni'];
        $pvd->persona_direccion = $_REQUEST['persona_direccion'];
        $pvd->persona_email = $_REQUEST['persona_email'];
        $pvd->persona_telefono = $_REQUEST['persona_telefono'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['persona_id']);
        header('Location: ../Vista/profesorVista.php');
    }

    public function GuardarArchivo(){
        $pvd = new profesor();

        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $archivotmp = $_FILES['archivo']['tmp_name'];
        $lineas = file($archivotmp);
        $i = 0;
        foreach ($lineas as $linea_num => $linea) { 
            if($i != 0) { 
                $datos = explode(",",$linea);
                $pvd->persona_nombres = utf8_encode($datos[0]);
                $pvd->persona_apellido1 = utf8_encode($datos[1]);
                $pvd->persona_apellido2 = utf8_encode($datos[2]);
                $pvd->persona_tipo_id = 2;
                $pvd->persona_dni = $datos[4];
                $pvd->persona_direccion = utf8_encode($datos[5]);
                $pvd->persona_email = utf8_encode($datos[6]);
                $pvd->persona_telefono = $datos[7];
                $pvd->persona_estado = $datos[8];

                $this->model->Registrar($pvd);
            }
                $i++;
        }

        header('Location: ../Vista/profesorVista.php');
    }

}
