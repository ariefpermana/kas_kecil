<?php /**
* 
*/
class Peminjaman_m extends CI_Model
{
	public function getLaporan()
	{
		$data = $this->db->query('SELECT p.*, a.*, b.id_barang, b.nama_barang, pj.* FROM peminjaman as p LEFT JOIN barang as b ON b.id_barang = p.id_barang LEFT JOIN peminjam as pj ON pj.id_peminjam = p.id_peminjam LEFT JOIN admin as a ON a.id_admin = p.id_peminjam ORDER BY p.tgl_peminjaman ASC');

		return $data->result();
	}

	public function getPeminjaman($id)
	{
		$data = $this->db->query('SELECT p.*, a.nama, b.id_barang, b.nama_barang, pj.* FROM peminjaman as p LEFT JOIN barang as b ON b.id_barang = p.id_barang LEFT JOIN peminjam as pj ON pj.id_peminjam = p.id_peminjam LEFT JOIN admin as a ON a.id_admin = p.id_peminjam WHERE (p.status = 2 OR p.status = 3 OR p.status = 4) AND p.id_peminjam = '.$id.' ORDER BY p.tgl_peminjaman ASC');

		if($data->result() == NULL){
			$data = $this->db->query('SELECT p.*, a.nama, b.id_barang, b.nama_barang, pj.* FROM peminjaman as p LEFT JOIN barang as b ON b.id_barang = p.id_barang LEFT JOIN peminjam as pj ON pj.id_peminjam = p.id_peminjam LEFT JOIN admin as a ON a.id_admin = p.id_peminjam WHERE p.status = 2 OR p.status = 3 OR p.status = 4 ORDER BY p.tgl_peminjaman ASC');
		}

		return $data->result();
	}

	public function getPengajuan($id)
	{
		$data = $this->db->query('SELECT p.*, b.id_barang, b.nama_barang, pj.* FROM peminjaman as p LEFT JOIN barang as b ON b.id_barang = p.id_barang LEFT JOIN peminjam as pj ON pj.id_peminjam = p.id_peminjam WHERE (p.status = 1 OR p.status = 4) AND p.id_peminjam = '.$id.' ORDER BY p.tgl_peminjaman ASC');

		if($data->result() == NULL){
			$data = $this->db->query('SELECT p.*, b.id_barang, b.nama_barang, pj.* FROM peminjaman as p LEFT JOIN barang as b ON b.id_barang = p.id_barang LEFT JOIN peminjam as pj ON pj.id_peminjam = p.id_peminjam WHERE p.status = 1 AND p.group = "'.$id.'" ORDER BY p.tgl_peminjaman ASC');
		}

		return $data->result();
	}

	public function updateStatus($id, $action)
	{
		if($action == 'approve'){
			$this->db->set('status', 2);
			$this->db->where('id_peminjaman', $id);
			$this->db->update('peminjaman');
		}else{
			$this->db->set('status', 4);
			$this->db->where('id_peminjaman', $id);
			$this->db->update('peminjaman');
		}
	}

	public function updatePeminjaman($id, $action)
	{
		if($action == 'approve'){
			$this->db->set('status', 3);
			$this->db->where('id_peminjaman', $id);
			$this->db->update('peminjaman');
		}else{
			$this->db->set('status', 4);
			$this->db->where('id_peminjaman', $id);
			$this->db->update('peminjaman');
		}
	}

	public function updatePriority($data)
	{
		$cekdata = $this->db->query("SELECT jumlah_barang FROM peminjaman WHERE id_barang = ".$data['id_barang']." AND tgl_peminjaman = '".$data['tgl_peminjaman']."' AND status NOT IN(4,5)")->row(0);

		$this->db->set('status', 5);
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->where('tgl_peminjaman', $data['tgl_peminjaman']);
		$this->db->update('peminjaman');

		$this->db->set('jumlah_barang', +$cekdata->jumlah_barang);
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang');

	}
} 
?>