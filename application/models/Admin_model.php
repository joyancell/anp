<?php  

class Admin_model extends CI_Model {

	public function getNilai()
	{
		$kueri = " SELECT * FROM nilai ORDER BY id_nilai ASC ";
		return $this->db->query($kueri)->result();
	}

	public function getKriteria()
	{
		$kueri = " SELECT * FROM data_kriteria ORDER BY id_kriteria ASC ";
		return $this->db->query($kueri)->result();
	}

	public function getSkor()
	{
		$kueri = " SELECT * FROM data_wisata ORDER BY id_wisata ASC ";
		return $this->db->query($kueri)->result();
	}

	public function filter()
	{
		$date = date('Y');
		$kueri = " SELECT * FROM data_wisata a JOIN nilai_awal b ON a.id_wisata=b.id_alternatif AND b.periode = '$date' ";
		return $this->db->query($kueri)->result();
	}

	public function getWisata()
	{
		$kueri = " SELECT * FROM data_wisata ORDER BY id_wisata ASC ";
		return $this->db->query($kueri)->result();
	}

	public function readByAlternatif($id)
	{
		$kueri = " SELECT * FROM nilai_awal WHERE id_alternatif = '$id' ";
		return $this->db->query($kueri)->row();
	}

	public function getNewIdWisata()
	{
		$kueri = " SELECT MAX(id_wisata) AS code FROM data_wisata ";
		$row = $this->db->query($kueri)->row();
		if ($row) {
			return $this->genCode($row->code, 'A', 3);
		} else {
			return $this->genCode($nomor_terakhir, 'A', 3);
		}
	}

	function genCode($latest, $key, $chars = 0) {
		$new = intval(substr($latest, strlen($key))) + 1;
		$numb = str_pad($new, $chars, "0", STR_PAD_LEFT);
		return $key . $numb;
	}

	public function simpan($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return true;
	}

	public function getOneWisata($id)
	{
		$this->db->where('id_wisata', $id);
		return $this->db->get('data_wisata')->row();
	}

	public function updateData($tabel, $data, $where)
	{
		$this->db->update($tabel, $data, $where);
	}

	public function deleteData($tabel, $where)
	{
		$this->db->delete($tabel, $where);
	}

	function hapusell($ax) {
		$gambar = $this->db->query(" SELECT data_wisata.foto_wisata FROM data_wisata WHERE id_wisata in $ax ")->result();
		foreach ($gambar as $gambar) {
			unlink('./assets/images/wisata/'.$gambar->foto_wisata);
		}
		
		$kueri = "DELETE FROM data_wisata WHERE id_wisata in $ax";
		$this->db->query($kueri);
		return true;
	}
	
}

?>