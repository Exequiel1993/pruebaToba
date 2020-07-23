<?php
class dt_objeto extends Contratos_datos_tabla
{
		function get_descripciones()
		{
			$sql = "SELECT objeto, desc_objeto FROM objeto ORDER BY desc_objeto";
			return toba::db('Contratos')->consultar($sql);
		}








	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['desc_objeto'])) {
			$where[] = "desc_objeto ILIKE ".quote("%{$filtro['desc_objeto']}%");
		}
		$sql = "SELECT
			t_o.objeto,
			t_o.desc_objeto
		FROM
			objeto as t_o
		ORDER BY desc_objeto";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Contratos')->consultar($sql);
	}

}
?>