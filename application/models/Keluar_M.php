<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar_M extends CI_Model {

	
	function master($tgl_masuk,$shift,$idkom)
	{
		$sql = "SELECT a.*,b.* FROM `stok_keluar` as a 
				JOIN user as b on a.id_user=b.id_user AND a.tgl_keluar = ? AND b.shift=? AND a.id_komponen_darah = ?
				WHERE a.id_komponen_darah IN (4,5,6,7,9) LIMIT 1";
		return $this->db->query($sql, array($tgl_masuk,$shift,$idkom));
	}

	function komdar($idkom)
	{
		$sql = "SELECT * FROM komponen_darah WHERE id_komponen_darah = ? LIMIT 1";
		return $this->db->query($sql, array($idkom));
	}

	function allkomdar()
	{
		$sql = "SELECT * FROM komponen_darah WHERE id_komponen_darah IN (4,5,6,7,9)";
		return $this->db->query($sql);
	}
	function tambah($data)
	{
		$this->db->insert_batch('stok_keluar', $data);
	}
	function ubah($data)
	{	
		
		$this->db->where('id_user', $data[1]['id_user']);
		$this->db->where('tgl_keluar', $data[1]['tgl_keluar']);
		$this->db->update_batch('stok_keluar', $data, 'id_komponen_darah');
	}

	
}

/* End of file Masuk.php */
/* Location: ./application/models/Masuk.php */