<?php
class dt_contratos extends Contratos_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['fecha_desde'])) {
			$where[] = "t_c.fecha_desde = ".quote($filtro['fecha_desde']);
		}
		if (isset($filtro['fecha_hasta'])) {
			$where[] = "t_c.fecha_hasta = ".quote($filtro['fecha_hasta']);
		}
		if (isset($filtro['nro_dispo'])) {
			$where[] = "nro_dispo ILIKE ".quote("%{$filtro['nro_dispo']}%");
		}
		if (isset($filtro['id_estado'])) {
			$where[] = "t_c.id_estado = ".quote($filtro['id_estado']);
		}
		if (isset($filtro['id_solicitante'])) {
			$where[] = "t_c.id_solicitante = ".quote($filtro['id_solicitante']);
		}
		if (isset($filtro['contrato'])) {
			$where[] = "contrato ILIKE ".quote("%{$filtro['contrato']}%");
		}
		if (isset($filtro['objeto'])) {
			$where[] = "t_c.objeto = ".quote($filtro['objeto']);
		}
		if (isset($filtro['id_pers'])) {
			$where[] = "t_c.id_pers = ".quote($filtro['id_pers']);
		}
		$sql = "SELECT
			t_c.nro_contrato,
			t_c.fecha_desde,
			t_c.fecha_hasta,
			t_c.fecha_disp,
			t_c.nro_dispo,
			t_e.estado as id_estado_nombre,
			t_c.resumen,
			t_c.nombre_archivo,
			t_c.fecha_carga,
			t_c.anexo,
			t_s.solicitante as id_solicitante_nombre,
			t_c.contrato,
			t_o.desc_objeto as objeto_nombre,
			t_p.nombre as id_pers_nombre
		FROM
			contratos as t_c,
			estados as t_e,
			solicitantes as t_s,
			objeto as t_o,
			personas as t_p
		WHERE
				t_c.id_estado = t_e.id_estado
			AND  t_c.id_solicitante = t_s.id_solicitante
			AND  t_c.objeto = t_o.objeto
			AND  t_c.id_pers = t_p.id_pers
		ORDER BY contrato";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Contratos')->consultar($sql);
	}


}
?>