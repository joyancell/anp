<?php  

class Rangking_model extends CI_Model {

	function readR($a,$b){
		$query = "SELECT * FROM jum_alt_kri where id_kriteria='$b' and id_alternatif='$a'";
		$stmt = $this->db->query($query)->result();
		return $stmt;
	}

	function normalisasi1($tabel, $data, $where){
		$stmt = $this->db->update($tabel, $data, $where);
		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	function readHasil1($a){
		$query = "SELECT sum(hasil_alt_kri) as bbn FROM jum_alt_kri WHERE id_alternatif='$a' LIMIT 0,1";
		$stmt = $this->db->query($query)->row();
		return $stmt;
	}

	function hasil1($tabel, $data, $where){
		$stmt = $this->db->update($tabel, $data, $where);
		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	function readByRank($i) {
		$query = "SELECT * FROM data_wisata a JOIN nilai_awal b ON a.id_wisata=b.id_alternatif WHERE b.periode='$i' ORDER BY hasil_akhir";
		$stmt = $this->db->query($query)->result();
		return $stmt;
	}

}