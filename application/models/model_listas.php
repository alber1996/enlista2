<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_listas extends CI_Controller {

	public function eliminar_lista($id_lista) {
		$this->db->where("id_lista",$id_lista);
		
		if($this->db->delete("listas")) {
			return true;
		} else {
			return false;
		}
	}
	public function crear_lista($nom,$desc,$tipo){
 		session_start();
   	 	$datos=array(
       		'nom_lista'=> $nom,
       		'desc_lista'=> $desc,
       	 	'tipo_lista'=> $tipo,
       	 	'creador_lista'=> $_SESSION['user'],
       	);
		
       	if($this->db->insert('listas',$datos)){
       		return $this->db->insert_id();
       	}else{
       		return false;
       	} 
	}
	public function ver_listas(){
   		 	$this->db->from('listas');
   		 	$this->db->like('creador_lista',$_SESSION['user']);
   		 	$consulta=$this->db->get();
            return $consulta;
   	}
   	public function ver_tipo(){
   		 $con = $this->db->get('tipo_lista');
   		 $resultado = $con->result_array();
   		?>
   		 	<div class="form-group">
				<label for="tipo_lista">Tipo de la lista:</label>
				<select class="form-control" id="tipo_lista" name="tipo_lista">
			        <?php
			        	foreach ($resultado as $item) {
			        		echo "<option value='".$item['nombre_tipo']."' >".$item['nombre_tipo']."</option>";
			        	}
			        ?>
			     </select>
			</div>
		<?php
	}
}