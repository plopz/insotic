<?php
include_once ('../model/config.php');

class PorcentajeFranquicia{
	/**
	 * 
	 * Función de conexión a la base de datos.
	 */ 
	function conectar(){
		$config = new bd();
		$config->conexion();
	}
	/**
	 * 
	 * Función de desconexión a la base de datos.
	 */
	function desconectar(){	
		mysql_close($this->conectar());
	}
	
	/**
	 * 
	 * Función encargada de crear un nuevo registro de porcentaje de franquicia en la base de datos.
	 * @param array $a - Arreglo que contiene los datos necesarios para la inserción.
	 * @return boolean - True si la inserción es correcta, false si ocurre un error.
	 */
	function addPorcentajeFranquicia($a){
		$sql = "INSERT INTO insotic_tabla (
					tipo,	
					valor) 
				VALUES (
					'FRQ',
					'$a[0]')";
		$this->conectar();
		if (mysql_query ($sql)){
			return true;}
		else{
			return false;
		}				
	}
	
	/**
	 * 
	 * Función encargada de eliminar un registro de porcentaje de franquicia de la base de datos.
	 * @param int $id - Id del registro a eliminar de la base de datos.
	 */
	/*function deletePorcentajeFranquiciaById($id){
		$sql = "delete from insotic_tabla where id=$id";
		$this->conectar();
		if(mysql_query ($sql)){
			echo "<script>alert('Se ha eliminado correctamente el porcentaje de beneficio de franquicia.')</script>";
		} 
		else{
			echo "<script>alert('Se ha generado un error al eliminar el porcentaje de beneficio de franquicia.')</script>";
		}
	}*/
	
	/**
	 * 
	 * Función encargada de modificar un registro de porcentaje de franquicia de la base de datos.
	 * @param int $id - Id del registro a modificar en la base de datos.
	 * @param array $a - Arreglo que contiene los datos nuevos para realizar la modificación del registro.
	 * @return boolean - True si la modificación es exitosa, false en caso contrario.
	 */
	function updatePorcentajeFranquicia($id, $a){
		$sql = "update insotic_tabla set
					valor =  '$a[0]'
				where  
					id=$id";
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
	 * Función que busca y retorna todos los registros de porcentaje de franquicia de la base de datos.
	 * @return resource - Recurso que contiene los datos devueltos por la consulta a la base de datos.
	 */
	function getPorcentajeFranquicia(){
		$sql = "select * from insotic_tabla where tipo='FRQ' order by valor asc ";
		$this->conectar();
		$r = mysql_query ($sql);
		if (mysql_num_rows($r)==0) {
			echo "<script>alert('No tiene resultados la query de porcentaje de beneficio de franquicia.')</script>"; 
			die();
		} 
		else {
			return $r;
		}
	}
	
	/**
	 * 
	 * Función encargada de buscar un registro especifico de porcentaje de franquicia de la base de datos.
	 * @param int $id - Id del registro que se desea buscar en la base de datos.
	 * @return resource - Recurso que contiene los datos devueltos por la consulta a la base de datos.
	 */
	function getPorcentajeFranquiciaById($id){
		$sql = "select * from insotic_tabla where id=$id";
		$this->conectar();
		$r = mysql_query ($sql);
		if (mysql_num_rows($r)==0) {
			echo "<script>alert('No tiene resultados la query de porcentaje de beneficio de franquicia.')</script>"; 
			die();
		} 
		else {
			return $r;
		}
	}
}
	
	
	
?>