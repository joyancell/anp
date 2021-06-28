<?php  

class Analisa_kriteria_model extends CI_Model {

	function insert($tabel, $data) {
		$stmt = $this->db->insert($tabel, $data);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	public function update($a, $b, $c)
	{
		$query = "UPDATE  analisa_kriteria SET nilai_analisa_kriteria = '$b' WHERE kriteria_pertama = '$a' and kriteria_kedua = '$c'";
		$stmt = $this->db->query($query);

		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function readAll1($a, $b) {
		$query = "SELECT * FROM analisa_kriteria WHERE kriteria_pertama = '$a' AND kriteria_kedua = '$b' LIMIT 0,1";
		return $this->db->query($query)->row();
	}

	function readSum1($a) {
		$query = "SELECT sum(nilai_analisa_kriteria) AS jumkr FROM analisa_kriteria WHERE kriteria_kedua='$a'";
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

	function insert3($tabel, $data, $where) {
		$stmt = $this->db->update($tabel, $data, $where);
		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	function readSum2($a) {
		$query = "SELECT sum(hasil_analisa_kriteria) AS jumlah FROM analisa_kriteria WHERE kriteria_pertama='$a'";
		return $this->db->query( $query )->row();
	}

	function readAvg($a) {
		$query = "SELECT avg(hasil_analisa_kriteria) AS avgkr FROM analisa_kriteria WHERE kriteria_pertama = '$a'";
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

	function getIr($n) {
		switch ($n) {
		case 3:
			$r = 0.58;
			break;
		case 4:
			$r = 0.90;
			break;
		case 5:
			$r = 1.12;
			break;
		case 6:
			$r = 1.24;
			break;
		case 7:
			$r = 1.32;
			break;
		case 8:
			$r = 1.41;
			break;
		case 9:
			$r = 1.45;
			break;
		case 10:
			$r = 1.49;
			break;
		case 11:
			$r = 1.51;
			break;
		case 12:
			$r = 1.48;
			break;
		case 13:
			$r = 1.56;
			break;
		case 14:
			$r = 1.57;
			break;
		case 15:
			$r = 1.59;
			break;

		default:
			$r = 0.00;
			break;
		}
		return $r;
	}
	
}

?>