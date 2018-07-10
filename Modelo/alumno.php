<?php
class alumno
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto alumno
    public $id_estudiante;
    public $txt_nombres;
    public $txt_apellido1;
    public $txt_apellido2;
	public $txt_cui;
	
	

	//Método de conexión a SGBD.
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conectar::conexion();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método selecciona todas las tuplas de la tabla
	//tbl_estudiante en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM tbl_estudiante WHERE (id_estudiante = 1) ");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del alumno a partir del nit
	//utilizando SQL.
	public function Obtener($id_estudiante)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el id del alumno.
			$stm = $this->pdo->prepare("SELECT * FROM tbl_estudiante WHERE id_estudiante = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro id.
			$stm->execute(array($id_estudiante));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla alumno dado un id.
	public function Eliminar($id_estudiante)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE tbl_estudiante SET tbl_estudiante = 1 WHERE id_estudiante = ?");

			$stm->execute(array($id_estudiante));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el id del alumno.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE tbl_estudiante SET
						txt_nombres          = ?,
						txt_apellido1        = ?,
						txt_apellido2        = ?,
						id_estudiante			 = ?,
						txt_cui				 = ?,
						
				    WHERE id_estudiante = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->txt_nombres,
                        $data->txt_apellido1,
                        $data->txt_apellido2,
                        $data->id_estudiante,
						$data->txt_cui,

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo alumno a la tabla.
	public function Registrar(alumno $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO tbl_estudiante (txt_nombres,txt_apellido1,txt_apellido2,id_estudiante,txt_cui)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->txt_nombres,
                        $data->txt_apellido1,
                        $data->txt_apellido2,
                        $data->id_estudiante,
						$data->txt_cui,
                )
			);
		  return $this->pdo->lastInsertId();
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	
	
	//Método que registra un nuevo alumno a la tabla.
	 function RegistrarU(usuario $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_estudiante_id)
		        VALUES (?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_estudiante_id,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
