<?php
class ci_abm_contratos extends Contratos_ci
{
	protected $s__datos_filtro;
	protected $s__edita;


	//---- Filtro -----------------------------------------------------------------------

	function conf__filtro(toba_ei_formulario $filtro)
	{
		if (isset($this->s__datos_filtro)) {
			$filtro->set_datos($this->s__datos_filtro);
		}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->s__datos_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->s__datos_filtro);
	}

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		if (isset($this->s__datos_filtro)) {
			$cuadro->set_datos($this->dep('datos')->tabla('contratos')->get_listado($this->s__datos_filtro));
		} else {
			$cuadro->set_datos($this->dep('datos')->tabla('contratos')->get_listado());
		}
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
		$this->set_pantalla('pant_edicion');
	}

	//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
		if ($this->dep('datos')->esta_cargada()) {
			$form->set_datos($this->dep('datos')->tabla('contratos')->get());
			$this->dependencia('formulario')->set_solo_lectura('fecha_desde');
			$this->dependencia('formulario')->set_solo_lectura('fecha_hasta');
			$this->dependencia('formulario')->set_solo_lectura('fecha_carga');
			$this->dependencia('formulario')->set_solo_lectura('contrato');
		} else {
			$this->dependencia('formulario')->set_solo_lectura('contrato');
			$this->dependencia('formulario')->set_solo_lectura('fecha_carga');
			$this->pantalla()->eliminar_evento('eliminar');
		}
	}

	function evt__formulario__modificacion($datos)
	{
		if (isset($this->s__edita)){
			if ($this->s__edita <> 1){
				$contrato = toba::db('Contratos')->consultar("select sp_get_nrocontrato()");
				$datos['contrato'] = $contrato[0]['sp_get_nrocontrato'];
				toba::notificacion()->info("El nro de contrato <strong>" . $datos['contrato'] . "</strong> fue generado con exito");
				$this->s__datos_filtro = $datos;
			}
		}
		$this->dep('datos')->tabla('contratos')->set($datos);
	}

	function resetear()
	{
		$this->dep('datos')->resetear();
		$this->set_pantalla('pant_seleccion');
	}

	//---- EVENTOS CI -------------------------------------------------------------------

	function evt__agregar()
	{
		$this->s__edita = 0; //si la var esta en 0, tengo que generar el nro de contrato
		$this->set_pantalla('pant_edicion');
	}

	function evt__volver()
	{
		$this->resetear();
	}

	function evt__eliminar()
	{
		$this->dep('datos')->eliminar_todo();
		$this->resetear();
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

}

?>