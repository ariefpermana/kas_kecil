<?php /**
* 
*/
class Barang_m extends CI_Model
{
	
	public function getAllBarang($per_page = 0, $offset = 0)
	{	
		if(empty($per_page)){
			return $this->db->order_by('id_barang','asc')->get('barang')->result();
		}else{
			return $this->db->limit($per_page, $offset)->order_by('id_barang','asc')->get('barang')->result();
		}
	}

	public function get_total_rows()
	{
		return $this->db->get('barang')->num_rows();//dapatkan total data dalam table artikel
	}

	public function get_spec_barang($id)
	{
		$implID = implode(', ',$id);

		return $this->db->query("SELECT * FROM barang WHERE id_barang IN(".$implID.")")->result();

	}

	public function get_detail_barang($id)
	{
		return $this->db->query("SELECT * FROM barang WHERE id_barang IN(".$id.")")->result();
	}

	public function update_barang($id, $jmlh)
	{
		$query = $this->db->query("SELECT jumlah_barang FROM barang WHERE id_barang = ".$id);
		$row = $query->row(0);
		$get_jumlah = $row->jumlah_barang;

		$tot_jumlah = intval($get_jumlah) - $jmlh;

		$this->db->set('jumlah_barang', $tot_jumlah);
		$this->db->where('id_barang', $id);
		$this->db->update('barang');
	}

	public function update_jumlah_barang($data)
	{
	    $this->db->where('id_barang	', $data['id_barang']);
	    $this->db->update('barang', array(
	    									'quality_barang' => $data['quality_barang'],
	    									'jumlah_barang' => $data['jumlah_barang'],
	    									));
	    return true;
	}

	public function get_jumlah($id)
	{
		$query = $this->db->query("SELECT jumlah_barang FROM barang WHERE id_barang = ".$id);
		$row = $query->row(0);
		$get_jumlah = $row->jumlah_barang;

		return $get_jumlah;
	}

	public function getWaiting($id)
	{
		return $this->db->query("SELECT w.*, b.nama_barang, p.nama_peminjam 
								 FROM waiting_list as w 
								 LEFT JOIN barang as b ON w.id_barang = b.id_barang 
								 LEFT JOIN peminjam as p ON p.id_peminjam = w.id_peminjam 
								 WHERE w.id_peminjam = ".$id)->result();
	}

	public function update_waiting($data)
	{
	    $this->db->where('id_barang	', $data['id_barang']);
	    $this->db->where('status	', 0);
	    $this->db->update('waiting_list', array(
	    									'status' => 1,
	    									));
	    return true;
	}

	public function getEmail($id)
	{
		return $this->db->query("SELECT p.email 
								 FROM barang as b
								 LEFT JOIN waiting_list as w ON w.id_barang = b.id_barang 
								 LEFT JOIN peminjam as p ON p.id_peminjam = w.id_peminjam 
								 WHERE b.id_barang = ".$id." AND w.status = 0")->result();
	}
} ?>