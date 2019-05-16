<?php 
/**
* 
*/
class M_timeline extends CI_Model
{	
	public function get_data()
	{
		$query = $this->db->order_by('tgl_mulai','DESC')->get('timeline');
		return $query->result();
	}

	public function save_data()
	{
		$param = array(
			'tgl_mulai' => $data['tgl_mulai'],
			'tgl_selesai' => $data['tgl_selesai'],
			'kegiatan' => $data['kegiatan']
		);
		$insert = $this->db->insert('timeline',$param);
		if($insert){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_data($data){
		$table = 'timeline';
		$param = array(
			'idx' => $data['idx'],
			'tgl_mulai' => $data['tgl_mulai'],
			'tgl_selesai' => $data['tgl_selesai'],
			'kegiatan' => $data['kegiatan'] 
		);
		$this->db->where('idx', $data['idx']);
		$update = $this->db->update($table,$param);
		if($update){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_data($idx){
		$table = 'timeline';
		$this->db->where('idx', $idx);
		$delete = $this->db->delete($table);
		if($delete){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>