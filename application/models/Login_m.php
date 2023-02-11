<?php 
/*model design by Ismarianto Putra Tech Programing
 * http://minangopensource.blogspot.com 
 *
 *
*/
class login_m extends CI_model
{
	
 public function admin($username='',$password='')
 {
  return $this->db->query("SELECT * from tb_pengguna where username='$username' AND password='$password' limit 1");
 }

 public function pelanggan($nama='', $email='', $no_hp='', $password='')
 {
  return $this->db->query("SELECT * from tb_pelanggan where status_plg='Aktif' AND (nama='$nama' OR email='$email' OR no_hp='$no_hp') AND password='$password' limit 1");
 }

}