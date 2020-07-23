<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class Contratos_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'Contratos_comando' => 'extension_toba/Contratos_comando.php',
		'Contratos_modelo' => 'extension_toba/Contratos_modelo.php',
		'Contratos_ci' => 'extension_toba/componentes/Contratos_ci.php',
		'Contratos_cn' => 'extension_toba/componentes/Contratos_cn.php',
		'Contratos_datos_relacion' => 'extension_toba/componentes/Contratos_datos_relacion.php',
		'Contratos_datos_tabla' => 'extension_toba/componentes/Contratos_datos_tabla.php',
		'Contratos_ei_arbol' => 'extension_toba/componentes/Contratos_ei_arbol.php',
		'Contratos_ei_archivos' => 'extension_toba/componentes/Contratos_ei_archivos.php',
		'Contratos_ei_calendario' => 'extension_toba/componentes/Contratos_ei_calendario.php',
		'Contratos_ei_codigo' => 'extension_toba/componentes/Contratos_ei_codigo.php',
		'Contratos_ei_cuadro' => 'extension_toba/componentes/Contratos_ei_cuadro.php',
		'Contratos_ei_esquema' => 'extension_toba/componentes/Contratos_ei_esquema.php',
		'Contratos_ei_filtro' => 'extension_toba/componentes/Contratos_ei_filtro.php',
		'Contratos_ei_firma' => 'extension_toba/componentes/Contratos_ei_firma.php',
		'Contratos_ei_formulario' => 'extension_toba/componentes/Contratos_ei_formulario.php',
		'Contratos_ei_formulario_ml' => 'extension_toba/componentes/Contratos_ei_formulario_ml.php',
		'Contratos_ei_grafico' => 'extension_toba/componentes/Contratos_ei_grafico.php',
		'Contratos_ei_mapa' => 'extension_toba/componentes/Contratos_ei_mapa.php',
		'Contratos_servicio_web' => 'extension_toba/componentes/Contratos_servicio_web.php',
	);
}
?>