<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 /*
  * Simple_login Class
  * Class ini digunakan untuk fitur login, proteksi halaman dan logout
  * @author  Gun Gun Priatna
  * @url    https://recodeku.blogspot.com
  */
 
 class Simple_login {
 
     // SET SUPER GLOBAL
     var $CI = NULL;
 
     /**
      * Class constructor
      *
      * @return   void
      */
     public function __construct() {
         $this->CI =& get_instance();
     }
 
     /*
     * cek username dan password pada table users, jika ada set session berdasar data user dari
     * table users.
     * @param string username dari input form
     * @param string password dari input form
     */
     public function login($username, $password) {
         
         //cek username dan password
         $query = $this->CI->db->get_where('user',array('username'=>$username,'password' => sha1($password)));
 
         if($query->num_rows() == 1) {
             $q = "SELECT a.username,a.hak_akses,a.shift,b.* FROM user as a 
                      join petugas as b on a.id_user=b.id_user
                      where username = ? limit 1";
             //ambil data user berdasar username
             $row  = $this->CI->db->query($q, array($username));
             $admin     = $row->row();
             $id   = $admin->id_user;
             $id_petugas   = $admin->id_petugas;
             $username   = $admin->username;
             $nama   = $admin->nama_petugas;
             $shift =$admin->shift;
             $hak = $admin->hak_akses;
             $tmp_lahir = $admin->tempat_lahir;
             $tgl_lahir = $admin->tgl_lahir;
             $alamat = $admin->alamat;
             $jenis_kelamin = $admin->jenis_kelamin;
             $no_telp = $admin->no_telp;
 
             //set session user
             $this->CI->session->set_userdata('id_petugas', $id_petugas);
             $this->CI->session->set_userdata('id', $id);
             $this->CI->session->set_userdata('id_login', uniqid(rand()));
             $this->CI->session->set_userdata('username', $username);
             $this->CI->session->set_userdata('nama', $nama);
             $this->CI->session->set_userdata('shift', $shift);
             $this->CI->session->set_userdata('hak', $hak);
             $this->CI->session->set_userdata('tmp_lahir', $tmp_lahir);
             $this->CI->session->set_userdata('tgl_lahir', $tgl_lahir);
             $this->CI->session->set_userdata('alamat', $alamat);
             $this->CI->session->set_userdata('jenis_kelamin', $jenis_kelamin);
             $this->CI->session->set_userdata('no_telp', $no_telp);
 
             //redirect ke halaman dashboard
             redirect(site_url('beranda/index/'.$hak));
         }else{
 
             //jika tidak ada, set notifikasi dalam flashdata.
             $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');
 
             //redirect ke halaman login
             redirect(site_url('login'));
         }
          return false;
      }
     
     /**
      * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
      * login
      */
     public function cek_login($hak1,$hak2=null) {
        $hak_akses = $this->CI->session->userdata('hak');

        if ($hak2==null) {
          $hak2=$hak1;
        }
         //cek session username
         if($this->CI->session->userdata('username') == '') {
 
             //set notifikasi
             $this->CI->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('login'));
         }

         
        if ( $hak_akses <> $hak1 && $hak_akses <> $hak2) {
          $this->CI->session->set_flashdata('sukses','Anda Tidak Memiliki Hak Akses Untuk Halaman Yang Anda Minta');
          redirect(site_url('beranda/index/'.$this->CI->session->userdata('hak')));
        }
          
           
         
     }
 
     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
     public function logout() {
         $this->CI->session->unset_userdata('id_petugas');
         $this->CI->session->unset_userdata('id_login');
         $this->CI->session->unset_userdata('username');
         $this->CI->session->unset_userdata('nama');
         $this->CI->session->unset_userdata('shift');
         $this->CI->session->unset_userdata('hak');
         $this->CI->session->unset_userdata('tmp_lahir');
         $this->CI->session->unset_userdata('tgl_lahir');
         $this->CI->session->unset_userdata('alamat');
         $this->CI->session->unset_userdata('jenis_kelamin');
         $this->CI->session->unset_userdata('no_telp');
         
          $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
         redirect(site_url('login'));
     }
 }