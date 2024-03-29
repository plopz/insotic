<?php
include_once ('../model/config.php');
/**
 * 
 * Clase de acceso a los datos de los aportes de empresa.
 * @author Pablo L�pez.
 *
 */
class EmpresaSaldo{
	
	/**
	*
	* Funci�n de conexi�n a la base de datos.
	*/
	function conectar(){
		$config = new bd();
		$config->conexion();
	}
	/**
	 *
	 * Funci�n de desconexi�n a la base de datos.
	 */
	function desconectar(){
		mysql_close($this->conectar());
	}
	
	/**
	 *
	 * Funci�n encargada de crear un nuevo registro de aporte de empresa en la base de datos.
	 * @param array $a - Arreglo que contiene los datos necesarios para la inserci�n.
	 * @return boolean - True si la inserci�n es correcta, false si ocurre un error.
	 */
	function addEmpresaSaldo($a){
		$sql = "INSERT INTO insotic_empresa_saldo (
					rut_empresa, 
					year, 
					tipo_cuenta, 
					debe,
					haber)
				VALUES(
					'$a[0]',
					$a[1],
					'$a[2]',
					0,
					0);";
		$this->conectar();
		if (mysql_query ($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 *
	 * Funci�n encargada de modificar un registro de aporte de empresa de la base de datos.
	 * @param int $id - Id del registro a modificar en la base de datos.
	 * @param array $a - Arreglo que contiene los datos nuevos para realizar la modificaci�n del registro.
	 * @return boolean - True si la modificaci�n es exitosa, false en caso contrario.
	 */
	function updateSaldoDebe($a){
		$sql = "UPDATE insotic_empresa_saldo SET 
					debe = $a[3]
				WHERE rut_empresa = $a[0]
				AND year = $a[1] 
				AND tipo_cuenta = '$a[2]'";
		$this->conectar();
		if(mysql_query ($sql)){
			return true;				
		}
		else{
			return false;
	
		}
	}
	
	function updateSaldoHaber($a){
		$sql = "UPDATE insotic_empresa_saldo SET
						haber = $a[4]
					WHERE rut_empresa = $a[0]
					AND year = $a[1] 
					AND tipo_cuenta = '$a[2]'";
		$this->conectar();
		if(mysql_query ($sql)){
			return true;
		}
		else{
			return false;
	
		}
	}
	
	/**
	*
	* Funci�n encargada de buscar un registro especifico de aporte de empresa de la base de datos por su numero de recibo.
	* @param int $nroRecibo - Numero de recibo del registro que se desea buscar en la base de datos.
	* @return resource - Recurso que contiene los datos devueltos por la consulta a la base de datos. En caso de error retorna false.
	*/
	function getSaldoEmpresa($a){
		$sql = "SELECT debe, haber FROM insotic_empresa_saldo 
				WHERE rut_empresa = '$a[0]'
				AND year = $a[1] 
				AND tipo_cuenta = '$a[2]'";
		$this->conectar();
		$r = mysql_query ($sql);
		
		if (mysql_num_rows($r)==0) {
			return false;
		}
		else {
			return $r;
		}
	}
	
}