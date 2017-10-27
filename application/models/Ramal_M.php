<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ramal_M extends CI_Model {

	
	function genapSebulan($komp,$tgl_ramal)
	{
		$sql = "SELECT  MONTH(tgl_keluar) AS bulan, YEAR(tgl_keluar) AS tahun, 
					SUM(jenis_A) as A, SUM(jenis_B) as B, SUM(jenis_O) as O, SUM(jenis_AB) as AB,
					COUNT(MONTH(tgl_keluar)) as jmldata, COUNT(DISTINCT tgl_keluar) as jmlhari FROM stok_keluar
				join komponen_darah ON stok_keluar.id_komponen_darah=komponen_darah.id_komponen_darah and komponen_darah.nama_komponen like ?
				join user ON user.id_user=stok_keluar.id_user 
				WHERE tgl_keluar <= ? and tgl_keluar > DATE_SUB(?, INTERVAL 12 MONTH)
				GROUP BY MONTH(tgl_keluar), YEAR(tgl_keluar)
				HAVING COUNT(DISTINCT tgl_keluar) >=28
				ORDER BY tgl_keluar asc
				";
				// 
		return $this->db->query($sql,[$komp,$tgl_ramal,$tgl_ramal]);
	}

	function masuk($komp, $tgl_masuk)
	{
		$sql = "SELECT SUM(jenis_A) as A, SUM(jenis_B) as B, SUM(jenis_O) as O, SUM(jenis_AB) as AB
				FROM `stok_masuk` 
				join komponen_darah ON stok_masuk.id_komponen_darah=komponen_darah.id_komponen_darah
				and komponen_darah.nama_komponen LIKE ?
				where tgl_masuk like ?
				LIMIT 1";
		return $this->db->query($sql, array($komp, $tgl_masuk));
	}
}

/* End of file Ramal_M.php */
/* Location: ./application/models/Ramal_M.php */