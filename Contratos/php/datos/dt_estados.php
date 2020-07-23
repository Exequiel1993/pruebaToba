<?php
class dt_estados extends Contratos_datos_tabla
{
		function get_descripciones()
		{
			$sql = "SELECT id_estado, estado FROM estados ORDER BY estado";
			return toba::db('Contratos')->consultar($sql);
		}







	
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['estado'])) {
			$where[] = "estado ILIKE ".quote("%{$filtro['estado']}%");
		}
		$sql = "SELECT
			t_e.id_estado,
			t_e.estado
		FROM
			estados as t_e
		ORDER BY t_e.estado";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Contratos')->consultar($sql);
	}

}
?>