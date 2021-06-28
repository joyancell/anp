<?php  

class Analisa_alternatif_model extends CI_Model {

	function countByFilter() {
		$query = "SELECT * FROM data_wisata a JOIN nilai_awal b ON a.id_wisata=b.id_alternatif ";
		$stmt = $this->db->query($query)->num_rows();
		return $stmt;
	}

	function readByFilter() {
		$query = "SELECT * FROM data_wisata a JOIN nilai_awal b ON a.id_wisata=b.id_alternatif";
		return $this->db->query($query)->result();
	}

	function readSatu($a) {
		$query = "SELECT * FROM data_wisata WHERE id_wisata='$a' LIMIT 0,1";
		$stmt  = $this->db->query( $query )->result();
		return $stmt;
	}

	function readAlternatif($a) {
		$query = "SELECT * FROM data_wisata WHERE id_wisata='$a'";
		$stmt = $this->db->query( $query )->result();
		return $stmt;
	}

	function readKri($a) {
		$query = "SELECT * FROM data_kriteria WHERE id_kriteria='$a'";
		return $this->db->query($query)->row();
	}

	function countAll() {
		$query = "SELECT * FROM data_alternatif";
		$stmt = $this->db->query($query)->num_rows();
		return $stmt;
	}

	function insert($tabel, $data) {
		$stmt = $this->db->insert($tabel, $data);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function update($tabel, $data, $where) {
		$stmt = $this->db->update($tabel, $data, $where);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function readAll1($a, $b, $c) {
		$query = "SELECT * FROM analisa_alternatif WHERE alternatif_pertama='$a' AND alternatif_kedua='$b' AND id_kriteria='$c' LIMIT 0,1";
		return $this->db->query($query)->row();
	}

	function readSum1($a, $b) {
		$query = "SELECT sum(nilai_analisa_alternatif) AS jumkr FROM analisa_alternatif WHERE alternatif_kedua='$a' AND id_kriteria='$b' ";
		return $this->db->query($query)->row();
	}

	function insert3($tabel, $data) {
		$stmt = $this->db->insert($tabel, $data);

		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function insert5($tabel, $data, $where) {
		$stmt = $this->db->update($tabel, $data, $where);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function readAll3($a, $b) {
		$query = "SELECT * FROM jum_alt_kri WHERE id_alternatif='$a' AND id_kriteria='$b' LIMIT 0,1";
		return $this->db->query($query)->row();
	}

	function insert2($tabel, $data, $where) {
		$stmt = $this->db->update($tabel, $data, $where);

		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function readAvg($a) {
		$query = "SELECT avg(hasil_analisa_alternatif) AS avgkr FROM analisa_alternatif WHERE alternatif_pertama = '$a'";
		return $this->db->query($query)->row();
	}

	function insert4($tabel, $data, $where) {
		$stmt = $this->db->update($tabel, $data, $where);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

}