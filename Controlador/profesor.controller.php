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

        if(isset($_REQUEST['id_docente'])){
            $pvd = $this->model->Obtener($_REQUEST['id_docente']);
        }

        require_once '../Vista/editar-profesores.php';
  }

    public function Nuevo(){
        $pvd = new profesor();

        require_once '../Vista/agregar-profesores.php';

    }

    public function Guardar(){
        $pvd = new profesor();
		//$pc2 = new usuario();
		$hash = password_hash($_REQUEST['id_docente'], PASSWORD_BCRYPT);
       // $pvd->persona_id = $_REQUEST['persona_id'];
        $pvd->txt_nombres = $_REQUEST['txt_nombres'];
        $pvd->txt_apellido1 = $_REQUEST['txt_apellido1'];
        $pvd->txt_apellido2 = $_REQUEST['txt_apellido2'];
		$pvd->persona_tipo_id = $_REQUEST['persona_tipo_id'];
        $pvd->txt_dni = $_REQUEST['txt_dni'];
        $pvd->txt_email = $_REQUEST['txt_email'];
        $pvd->txt_telefono = $_REQUEST['txt_telefono'];
        $pvd->persona_estado = $_REQUEST['persona_estado'];
		/*$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->usuario_cuenta = $_REQUEST['persona_dni'];
        $pc2->usuario_password = $hash;
        $pc2->usuario_rol_id = $_REQUEST['persona_tipo_id'];
		$pc2->usuario_persona_id = 1;
        $pc2->usuario_estado = $_REQUEST['persona_estado'];*/
        
        $this->model->Registrar($pvd);
		//sss$this->model->RegistrarU($pc2);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Editar(){
        $pvd = new profesor();

        $pvd->id_docente = $_REQUEST['id_docente'];
        $pvd->txt_nombres = $_REQUEST['txt_nombres'];
        $pvd->txt_apellido1 = $_REQUEST['txt_apellido1'];
        $pvd->txt_apellido2 = $_REQUEST['txt_apellido2'];
        $pvd->txt_dni = $_REQUEST['txt_dni'];
        $pvd->txt_email = $_REQUEST['txt_email'];
        $pvd->txt_telefono = $_REQUEST['txt_telefono'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/profesorVista.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_docente']);
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
                $pvd->txt_nombres = utf8_encode($datos[0]);
                $pvd->txt_apellido1 = utf8_encode($datos[1]);
                $pvd->txt_apellido2 = utf8_encode($datos[2]);
                $pvd->persona_tipo_id = 2;
                $pvd->txt_dni = $datos[4];
                $pvd->txt_direccion = utf8_encode($datos[5]);
                $pvd->txt_email = utf8_encode($datos[6]);
                $pvd->txt_telefono = $datos[7];
                $pvd->txt__estado = $datos[8];

                $this->model->Registrar($pvd);
            }
                $i++;
        }

        header('Location: ../Vista/profesorVista.php');
    }

}
