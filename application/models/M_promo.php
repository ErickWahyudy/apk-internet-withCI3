<?php 

/**
* 
*/
class M_promo extends CI_model
{

    private $table1 = 'tb_promo';
    private $table2 = 'tb_pelanggan';

//promo
public function promo_add($SQLinsert2){
  return $this -> db -> insert($this->table1, $SQLinsert2);
}

//mengambil id promo urut terakhir

public function promo_id_urut($value='')
{
    $this->db->select_max('id_promo');
    $this->db->from ($this->table1);
}

//join tb_promo and tb_pelanggan
public function promo_view($value='')
{
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->limit(1000,1);
    $this->db->order_by('tgl_daftar');
    return $this->db->get();
}

public function promo_view_id($id='')
{
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->where('id_promo', $id);
    $this->db->order_by('id_promo');
    return $this->db->get();
}

public function promo_update($id='',$SQLupdate2){
  $this->db->where('id_promo', $id);
  return $this->db-> update($this->table1, $SQLupdate2);
}

public function delete_promo($id=''){
  $this->db->where('id_promo', $id);
  return $this->db-> delete($this->table1);
}

}
