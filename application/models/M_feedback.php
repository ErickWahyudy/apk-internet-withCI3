<?php 

/**
* 
*/
class M_feedback extends CI_model
{

private $table = 'tb_feedback';

//FEEDBACK PELANGGAN
public function view($value='')
{
  $this->db->select('*');
  $this->db->from($this->table);
  $this->db->order_by('id_feedback','DESC');
  return $this->db->get();
}

public function view_id($id='')
{
 return $this->db->select ('*')->from ($this->table)->where ('id_feedback', $id)->get ();
}

//mengambil id feedback urut terakhir
public function id_urut($value='')
{ 
  $this->db->select_max('id_feedback');
  $this->db->from ($this->table);
}

public function add($SQLinsert){
  return $this -> db -> insert($this->table, $SQLinsert);
}

public function update($id='',$SQLupdate){
  $this->db->where('id_feedback', $id);
  return $this->db-> update($this->table, $SQLupdate);
}

public function delete($id=''){
  $this->db->where('id_feedback', $id);
  return $this->db-> delete($this->table);
}

}