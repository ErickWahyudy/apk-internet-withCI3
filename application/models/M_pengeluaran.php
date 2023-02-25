<?php 

/**
* 
*/
class M_pengeluaran extends CI_model
{

private $table = 'tb_pengeluaran';

//PENGELUARAN INTERNET
public function view($value='')
{
  $this->db->select ('*');
  $this->db->from ($this->table);
  $this->db->order_by('tanggal', 'DESC');
  return $this->db->get();
}

public function view_id($id='')
{
 return $this->db->select ('*')->from ($this->table)->where ('id_pengeluaran', $id)->get ();
}

//mengambil id pengeluaran urut terakhir
public function id_urut($value='')
{ 
  $this->db->select_max('id_pengeluaran');
  $this->db->from ($this->table);
}

public function add($SQLinsert){
  return $this -> db -> insert($this->table, $SQLinsert);
}

public function update($id='',$SQLupdate){
  $this->db->where('id_pengeluaran', $id);
  return $this->db-> update($this->table, $SQLupdate);
}

public function delete($id=''){
  $this->db->where('id_pengeluaran', $id);
  return $this->db-> delete($this->table);
}

}