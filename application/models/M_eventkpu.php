<?php
/**
 * Created by PhpStorm.
 * User: Kacangrebus
 * Date: 01/05/2018
 * Time: 23:04
 */

class M_eventkpu extends CI_Model
{
    public function get_data()
    {
        $query = $this->db->order_by('id','DSC')->get('eventkpu');
        return $query->result();
    }

    public function add_data($data)
    {
        $table = 'eventkpu';
        $param = array(
            "nama"=>$data['nama'],
            "tipe"=>$data['tipe'],
            "isi"=>$data['isi'],
            "link"=>$data['link']
        );
        $insert = $this->db->insert($table, $param);
        if ($insert){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function edit_data($data){
        $table = 'eventkpu';
        $param = array(
           "nama"=>$data['nama'],
            "tipe"=>$data['tipe'],
            "isi"=>$data['isi'],
            "link"=>$data['link']
        );
        $this->db->where('id', $data['id']);
        $update = $this->db->update($table,$param);
        if ($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_data($id){
        $table = 'eventkpu';
        $this->db->where('id', $id);
        $delete = $this->db->delete($table);
        if ($delete){
            return TRUE;
        }else{
            return FALSE;
        }

    }


}
