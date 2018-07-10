<?php
class profesor
{
	private $pdo;

    public $id_docente;
    public $txt_nombres;
    public $txt_apellido1;
    public $txt_apellido2;
	public $persona_tipo_id;
	public $txt_dni;
	public $txt_email;
	public $txt_telefono;
	public $persona_estado;
	
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

	public function Listar()
	{
		try
		{
			$result = array();
			//$stm = $this->pdo->prepare("SELECT * FROM tbl_docente WHERE (persona_tipo_id = 3) AND (persona_estado = 0)");
			$stm = $this->pdo->prepare("SELECT * FROM tbl_docente WHERE estado='1'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($persona_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM tbl_docente WHERE id_docente = ?");
			$stm->execute(array($persona_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($persona_id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE tbl_docente SET estado = 0 WHERE id_docente = ?");

			$stm->execute(array($persona_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE tbl_docente SET
						txt_nombres          = ?,
						txt_apellido1        = ?,
						txt_apellido2        = ?,
						txt_dni				 = ?,
						txt_telefono		 = ?,
						txt_email			 = ?
						
				    WHERE id_docente = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->txt_nombres,
                        $data->txt_apellido1,
                        $data->txt_apellido2,
						$data->txt_dni,
                        $data->txt_telefono,
                        $data->txt_email,
						$data->id_docente

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(profesor $data)
	{
		try
		{
			$sql = "INSERT INTO tbl_docente ( `txt_nombres`, `txt_apellido1`, `txt_apellido2`, `txt_dni`, `txt_telefono`, `txt_email`)
		        VALUES (?, ?, ?, ?, ?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->txt_nombres,
                        $data->txt_apellido1,
                        $data->txt_apellido2,
						$data->txt_dni,
                        $data->txt_telefono,
                        $data->txt_email
                )
			);
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
			$sql = "INSERT INTO usuario (usuario_cuenta,usuario_password,usuario_rol_id,usuario_persona_id,usuario_estado)
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->usuario_cuenta,
                        $data->usuario_password,
                        $data->usuario_rol_id,
                        $data->usuario_persona_id,
						$data->usuario_estado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
