<?php
/**
 * Created by PhpStorm.
 * User: Kacangrebus
 * Date: 01/05/2018
 * Time: 23:04
 */

class M_profilecalon extends CI_Model
{
    public function get_data()
    {
        $query = $this->db->order_by('urutan','ASC')->get('profilcalon');
        return $query->result();
    }

    public function add_data($data)
    {
        $table = 'profilcalon';
        $param = array(
            "calon_gb"=>$data['calon_gb'],
            "usia_calon_gb"=>$data['usia_calon_gb'],
            "jabatan_gb"=>$data['jabatan_calon_gb'],
            "calon_wgb"=>$data['calon_wakil_gb'],
            "usia_calon_wgb"=>$data['usia_calon_wakil_gb'],
            "jabatan_wgb"=>$data['jabatan_calon_wakil_gb'],
            "partai_pengusung"=>$data['partai_pengusung'],
            "image"=>$data['image_url']
        );
        $insert = $this->db->insert($table, $param);
        if ($insert){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function edit_data($data){
        $table = 'profilcalon';
        $param = array(
            "calon_gb"=>$data['calon_gb'],
            "usia_calon_gb"=>$data['usia_calon_gb'],
            "jabatan_gb"=>$data['jabatan_calon_gb'],
            "calon_wgb"=>$data['calon_wakil_gb'],
            "usia_calon_wgb"=>$data['usia_calon_wakil_gb'],
            "jabatan_wgb"=>$data['jabatan_calon_wakil_gb'],
            "partai_pengusung"=>$data['partai_pengusung'],
            "image"=>$data['image_url']
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
        $table = 'profilcalon';
        $this->db->where('urutan', $urutan);
        $delete = $this->db->delete($table);
        if ($delete){
            return TRUE;
        }else{
            return FALSE;
        }

    }


}