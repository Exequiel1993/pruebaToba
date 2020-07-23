<?php
class dt_solicitantes extends Contratos_datos_tabla
{
		function get_descripciones()
		{
			$sql = "SELECT id_solicitante, solicitante FROM solicitantes ORDER BY solicitante";
			return toba::db('Contratos')->consultar($sql);
		}






	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['solicitante'])) {
			$where[] = "solicitante ILIKE ".quote("%{$filtro['solicitante']}%");
		}
		$sql = "SELECT
			t_s.id_solicitante,
			t_s.solicitante
		FROM
			solicitantes as t_s
		ORDER BY t_s.solicitante";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Contratos')->consultar($sql);
	}

}
?>