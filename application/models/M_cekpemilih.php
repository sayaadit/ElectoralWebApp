<?php
/**
*
*/
class M_cekpemilih extends CI_Model
{
	public function get_data()
	{
		$query = $this->db->order_by('no_ktp','DESC')->get('pemilih');
		return $query->result();
	}

	public function cari_data($data)
	{
		$this->db->where('no_ktp',$data['no_ktp']);
		$this->db->like('nama',$data['nama']);
		$result = $this->db->get('pemilih');
		if($result->num_rows()==1){
				return $result->row(0);
		}else{
				return false;
		}
	}

	public function save_data($data)
	{
		$param = array(
			'no_ktp' => $data['no_ktp'],
			'nama' => $data['nama'],
			'jk' => $data['jk'],
			'alamat' => $data['alamat'],
			'agama' => $data['agama'],
			'pekerjaan' => $data['pekerjaan']
		);
		$query = $this->db->insert('pemilih',$param);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_data($data)
	{
		$param = array(
			'no_ktp' => $data['no_ktp'],
			'nama' => $data['nama'],
			'jk' => $data['jk'],
			'alamat' => $data['alamat'],
			'agama' => $data['agama'],
			'pekerjaan' => $data['pekerjaan']
		);
		$this->db->where('no_ktp',$data['no_ktp']);
		$update = $this->db->update('pemilih',$param);
		if ($update) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_data($no_ktp)
	{
		$this->db->where('no_ktp',$no_ktp);
		$delete = $this->db->delete('pemilih');
		if($delete){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>
