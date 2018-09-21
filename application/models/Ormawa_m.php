<?php /**
* 
*/
class Ormawa_m extends CI_Model
{
	
	public function get_all()
	{
		return $this->db->get('ormawa')->result();
	}
} 

?>