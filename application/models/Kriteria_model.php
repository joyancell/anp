<?php  

class Kriteria_model extends CI_Model {

	public function getKriteria()
	{
		$kueri = " SELECT * FROM data_kriteria ORDER BY id_kriteria ASC ";
		return $this->db->query($kueri)->result();
	}

	public function getNewId()
	{
		$kueri = " SELECT MAX(id_kriteria) AS code FROM data_kriteria ";
		$row = $this->db->query($kueri)->row();
		if ($row) {
			$pcs = explode("C", $row->code);
			$result = "C".($pcs[1]+1);
		} else {
			$result = "C1";
		}
		return $result;
	}

	public function simpan($tabel, $data)
	{
		$this->db->insert($tabel, $data);
		return true;
	}

	public function getOneKriteria($id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->get('data_kriteria')->row();
	}

	public function getOneKriteria2($id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->get('data_kriteria')->result();
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
		$kueri = "DELETE FROM data_kriteria WHERE id_kriteria in $ax";
		$this->db->query($kueri);
		return true;
	}

	function countAll() {
		$query = "SELECT * FROM data_kriteria ORDER BY id_kriteria ASC";
		return $this->db->query($query)->num_rows();
	}

	
}

?>