<?php
class dt_sexo extends Contratos_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT sexo, descsexo FROM sexo ORDER BY descsexo";
		return toba::db('Contratos')->consultar($sql);
	}


}
?>