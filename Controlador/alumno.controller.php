<?php
//Se incluye el modelo donde conectará el controlador.
require_once '../Modelo/alumno.php';
require_once '../Modelo/usuario.php';

class AlumnoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new alumno();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once '../Vista/lista-alumnos.php';

    }

    //Llamado a la vista alumno-editar
    public function Crud(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno a editar.
        if(isset($_REQUEST['id_estudiante'])){
            $pvd = $this->model->Obtener($_REQUEST['id_estudiante']);
        }

        //Llamado de las vistas.
        require_once '../Vista/editar-alumnos.php';
	}
	
	//Llamado a la vista alumno-perfil
    public function Perfil(){
        $pvd = new alumno();

        //Se obtienen los datos del alumno.
        if(isset($_REQUEST['id_estudiante'])){
            $pvd = $this->model->Obtener($_REQUEST['id_estudiante']);
        }

        //Llamado de las vistas.
        require_once '../Vista/perfil-alumno.php';
	}

    //Llamado a la vista alumno-nuevo
    public function Nuevo(){
        $pvd = new alumno();

        //Llamado de las vistas.
        require_once '../Vista/agregar-alumnos.php';

    }

    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new alumno();
		$pc2 = new usuario();
		$hash = password_hash($_REQUEST['txt_cui'], PASSWORD_BCRYPT);
        //Captura de los datos del formulario (vista).
        $pvd->id_estudiante = $_REQUEST['id_estudiante'];
        $pvd->txt_nombres = $_REQUEST['txt_nombres'];
        $pvd->txt_apellido1 = $_REQUEST['txt_apellido1'];
        $pvd->txt_apellido2 = $_REQUEST['txt_apellido2'];
        $pvd->txt_cui = $_REQUEST['txt_cui'];
		$pc2->usuario_id = $_REQUEST['usuario_id'];
        $pc2->usuario_cuenta = $_REQUEST['txt_cui'];
        $pc2->usuario_password = $hash;
		$pc2->usuario_estudiante_id = 1;
        
        //Registro al modelo alumno.
        $this->model->Registrar($pvd);
        $this->model->RegistrarU($pc2);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: ../Vista/alumnoVista.php');
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new alumno();

        $pvd->id_estudiante = $_REQUEST['id_estudiante'];
        $pvd->txt_nombres = $_REQUEST['txt_nombres'];
        $pvd->txt_apellido1 = $_REQUEST['txt_apellido1'];
        $pvd->txt_apellido2 = $_REQUEST['txt_apellido2'];
        $pvd->txt_cui = $_REQUEST['txt_cui'];

        $this->model->Actualizar($pvd);

        header('Location: ../Vista/alumnoVista.php');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_estudiante']);
        header('Location: ../Vista/alumnoVista.php');
    }

    public function GuardarArchivo(){
        $pvd = new alumno();

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
                $pvd->txt_cui = $datos[4];

                $this->model->Registrar($pvd);
            }
            $i++;
        }

        header('Location: ../Vista/alumnoVista.php');
    }

}
