<?php  

class Nilai_awal_model extends CI_Model {

	public function getNilaiAwal()
	{
		$kueri = " SELECT * FROM nilai_awal ORDER BY id_nilai_awal ASC ";
		return $this->db->query($kueri)->result();
	}

	public function getOneWisata($id)
	{
		$this->db->where('id_wisata', $id);
		return $this->db->get('data_wisata')->row();
	}

	function readAllWithCriteria($id) {
		$query = "SELECT c.nama_kriteria AS kriteria, b.nilai FROM nilai_awal a JOIN nilai_awal_detail b ON a.id_nilai_awal=b.id_nilai_awal JOIN data_kriteria c ON b.id_kriteria=c.id_kriteria WHERE a.id_alternatif = '$id' ";
		return $this->db->query($query)->row();
	}

	function getRange($n) {
	  if ($n >= 75 AND $n <= 100) {
	    return "B";
	  } else if ($n > 64 AND $n <= 74) {
	    return "C";
	  } else {
	    return "K";
	  }
	}

	public function simpan($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return true;
	}

	public function getOneData($id)
	{
		$this->db->where('id_nilai', $id);
		return $this->db->get('nilai')->row();
	}
	
}

?>