<?php
/**
*
*/
class M_panduanpilih extends CI_Model
{
  public function get_data()
  {
    $query = $this->db->order_by('urutan','ASC')->get('panduanpilih');
    return $query->result();
  }

  public function add_data($data)
  	{
       $table = 'panduanpilih';
      $param = array(
           "urutan"=>$data['urutan'],
           "isi"=>$data['isi'],
           "gambar" =>$data['gambar'],
         );
  		$insert = $this->db->insert($table, $param);
          if ($insert){
              return TRUE;
          }else{
              return FALSE;
          }
  	}
  public function edit_data($data){
       $table = 'panduanpilih';
       $param = array(
            "urutan"=>$data['urutan'],
            "isi"=>$data['isi'],
            "gambar"=>$data['gambar'],
          );
        $this->db->where('urutan', $data['urutan']);
        $update = $this->db->update($table,$param);
        if ($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_data($urutan){
        $table = 'panduanpilih';
        $this->db->where('urutan', $urutan);
        $delete = $this->db->delete($table);
        if ($delete){
            return TRUE;
        }else{
            return FALSE;
        }

    }
}
