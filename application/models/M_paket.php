<?php 

/**
* 
*/
class M_paket extends CI_model
{

private $table = 'tb_paket';

//PAKET INTERNET
public function paket_view($value='')
{
 return $this->db->select ('*')->from ($this->table)->get ();
}

public function paket_view_id($id='')
{
 return $this->db->select ('*')->from ($this->table)->where ('id_paket', $id)->get ();
}

//mengambil id paket urut terakhir
public function id_paket_urut($value='')
{ 
  $this->db->select_max('id_paket');
  $this->db->from ($this->table);
}

public function paket_add($SQLinsert){
  return $this -> db -> insert($this->table, $SQLinsert);
}

public function paket_update($id='',$SQLupdate){
  $this->db->where('id_paket', $id);
  return $this->db-> update($this->table, $SQLupdate);
}

public function paket_delete($id=''){
  $this->db->where('id_paket', $id);
  return $this->db-> delete($this->table);
}


}