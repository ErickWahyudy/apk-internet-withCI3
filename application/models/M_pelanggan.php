<?php 

/**
* 
*/
class M_pelanggan extends CI_model
{

    private $table1 = 'tb_pelanggan';
    private $table2 = 'tb_paket';
    private $table3 = 'tb_maps';

//PELANGGAN	
public function view($value='')
{
    //join table tb_pelanggan dan tb_paket
    $this->db->select('*');
    $this->db->from($this->table1);
    $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
    $this->db->order_by('id_pelanggan');
    return $this->db->get();
}

public function view_id($id='')
{
  //join table tb_pelanggan dan tb_paket dan tb_maps
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
  $this->db->join($this->table3 , 'tb_pelanggan.id_maps = tb_maps.id_maps');
  $this->db->where('id_pelanggan', $id);
  $this->db->order_by('id_pelanggan');
  return $this->db->get();
}

//mengambil id pelanggan urut terakhir
public function id_urut($value='')
{ 
  $this->db->select_max('id_pelanggan');
  $this->db->from ($this->table1);
}

public function add($SQLinsert){
  return $this -> db -> insert($this->table1, $SQLinsert);
}

public function update($id='',$SQLupdate){
  $this->db->where('id_pelanggan', $id);
  return $this->db-> update($this->table1, $SQLupdate);
}

public function view_id_maps($id='')
{
  //join table tb_pelanggan dan tb_paket dan tb_maps
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
  $this->db->join($this->table3 , 'tb_pelanggan.id_maps = tb_maps.id_maps');
  $this->db->where('id_pelanggan', $id);
  $this->db->order_by('id_pelanggan');
  return $this->db->get();
}

public function addMaps($SQLinsert2){
  return $this -> db -> insert($this->table3, $SQLinsert2);
}

public function update_maps($id='',$SQLupdate){
  $this->db->where('id_maps', $id);
  return $this->db-> update($this->table3, $SQLupdate);
}

//delete 2 table
public function delete($id=''){
  $this->db->where('id_pelanggan', $id);
  return $this->db-> delete($this->table1);
}


//untuk page pelanggan login
public function view_id_plg($id='')
{
  //join table tb_pelanggan dan tb_paket di pelanggan
  $id = $this->session->userdata['id_pelanggan'];
  $this->db->select('*');
  $this->db->from($this->table1);
  $this->db->join($this->table2 , 'tb_pelanggan.id_paket = tb_paket.id_paket');
  $this->db->join($this->table3 , 'tb_pelanggan.id_maps = tb_maps.id_maps');
  $this->db->where('id_pelanggan', $id);
  $this->db->order_by('id_pelanggan');
  return $this->db->get();
}

}
