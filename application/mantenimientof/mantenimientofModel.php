<?php
class mantenimientofModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='opr_detalle_factura';
		$this->id_tabla='id_dt_fact';
	}
	
	public function generar_sql($parametros){
		try{
						
			if($parametros['operacion']=='obtener_consulta_detalle')
			{
				
				$sql = "select id_dt_fact, id_producto, id_factura, cantidad, precio, 
				pago from $this->tabla";
			}
			
			/*solamente para ejecutar la consulta del JqGrid, en el model se tiene la otra condicion para generar los Rows */
			if($parametros['operacion']=='consulta_detalle')
			{
				
				$sql = "select id_dt_fact, id_producto, id_factura, cantidad, precio, 
				pago from $this->tabla";
			}
						
				return $sql;
		}
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
	
	
	
		
	
}

?>