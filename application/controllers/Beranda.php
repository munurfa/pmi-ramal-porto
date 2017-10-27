<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Beranda extends CI_Controller {
     function __construct(){
         parent::__construct();
         
     }
     public function index($hak)
     {
        $this->simple_login->cek_login('root','admin');
       

        $data = array(  'title' => 'Beranda '.$hak,
                        'content' => 'welcome_message', );
        $this->load->view('tpl/content', $data);
     }
 
     //Load Halaman dashboard
   
     //  public function Siswa() {
     //    $this->simple_login->cek_login('Siswa');
     //    $data = array('content' => 'welcome_Siswa',
     //                'pageTitle' => 'Beranda Siswa' );
     //    $this->load->view('tpl/content', $data);
     // }
 }