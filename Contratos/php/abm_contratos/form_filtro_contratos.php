<?php
class form_filtro_contratos extends Contratos_ei_formulario
{
    //-----------------------------------------------------------------------------------
    //---- JAVASCRIPT -------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function extender_objeto_js()
    {
        echo "
        //---- Validacion general ----------------------------------
        
        {$this->objeto_js}.evt__validar_datos = function()
        { 
            fecha_desde = this.ef('fecha_desde').fecha();
            fecha_hasta = this.ef('fecha_hasta').fecha();
            if (fecha_desde > fecha_hasta){
                notificacion.agregar('La fecha desde debe ser menor o igual a la fecha hasta.');
                return false;
            }
            return true;
        }
        ";
    }

}
?>