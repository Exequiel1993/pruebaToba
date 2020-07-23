<?php
class dt_personas extends Contratos_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['apellido'])) {
			$where[] = "apellido ILIKE ".quote("%{$filtro['apellido']}%");
		}
		if (isset($filtro['nro_doc'])) {
			$where[] = "nro_doc ILIKE ".quote("%{$filtro['nro_doc']}%");
		}
		$sql = "SELECT
			t_p.id_pers,
			t_p.apellido,
			t_p.nombre,
			t_p.nro_doc,
			t_p.domicilio,
			t_p.mail,
			t_p.telefono,
			t_p.fecha_nac,
			t_s.descsexo as sexo_nombre,
			t_p.cuit
		FROM
			personas as t_p,
			sexo as t_s
		WHERE
				t_p.sexo = t_s.sexo
		ORDER BY nombre";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Contratos')->consultar($sql);
	}


		function get_descripciones()
		{
			$sql = "SELECT id_pers, apellido || ' ' || nombre as nombre FROM personas ORDER BY nombre";
			return toba::db('Contratos')->consultar($sql);
		}





}
?>