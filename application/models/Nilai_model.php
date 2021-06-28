<?php  

class Nilai_model extends CI_Model {

	public function getNilai()
	{
		$kueri = " SELECT * FROM nilai ORDER BY id_nilai ASC ";
		return $this->db->query($kueri)->result();
	}

	public function simpan($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return true;
	}

	public function getOneNilai($id)
	{
		$this->db->where('id_nilai', $id);
		return $this->db->get('nilai')->row();
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
		$kueri = "DELETE FROM nilai WHERE id_nilai in $ax";
		$this->db->query($kueri);
		return true;
	}
}

?>