<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login('root','admin');
        $this->load->model('Masuk_M');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
	public function master($tgl_masuk=null,$idkom=1)
	{
	
       	// str_replace('/','-',$tahun_ajar)
        $tgl = date('Y-m-d');
        $tgl_masuk = ($tgl_masuk==null) ? $tgl : $tgl_masuk ;
        $data = array(
        				'title' => 'Data Stok Darah Masuk',
        				'pg' => $this->Masuk_M->master($tgl_masuk,"PG",$idkom)->row(),
        				'sg' => $this->Masuk_M->master($tgl_masuk,"SG",$idkom)->row(),
        				'mlm' => $this->Masuk_M->master($tgl_masuk,"MLM",$idkom)->row(),
                        'komdar' => $this->Masuk_M->komdar($idkom)->row(),
        				'allkomdar' => $this->Masuk_M->allkomdar()->result(),
        				'content' => 'stok-masuk/master',
                        'tgl_masuk' => $tgl_masuk
        			);
        $this->load->view('tpl/content', $data);
	}


    public function cari($tgl)
    {
        $this->form_validation->set_rules('tanggal', 'TANGGAL', 'required');
            if ($this->form_validation->run() == FALSE) {
             redirect('masuk/master/'.$tgl.'/1');
         } else {
            $tanggal = $this->input->post('tanggal');
            redirect('masuk/master/'.$tanggal.'/1');
        }
        return false;
    }

    public function insert($tgl)
    {
        $allkomdar     = $this->Masuk_M->allkomdar();
        foreach ($allkomdar->result() as $n) { 

                $this->form_validation->set_rules('a'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('b'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('o'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('ab'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
        }
        
        if ($this->form_validation->run() == FALSE) {
             $this->master($tgl,1);
        } else {
            
            foreach ($allkomdar->result() as $n) { 
                $data[] = array(
                        'id_komponen_darah' => $n->id_komponen_darah,
                        'id_user'=> $this->session->id,
                        'jenis_A' => $this->input->post('a'.$n->id_komponen_darah),
                        'jenis_AB'=> $this->input->post('ab'.$n->id_komponen_darah),
                        'jenis_B'=> $this->input->post('b'.$n->id_komponen_darah),
                        'jenis_O'=> $this->input->post('o'.$n->id_komponen_darah),
                        'tgl_masuk' => $tgl,
                );
            }
            $this->Masuk_M->tambah($data);

            $this->session->set_flashdata('sukses', 'Stok Ditambahkan');

            redirect(site_url('masuk/master/'.$tgl));
        }
        return false;
        
    }

    public function update($tgl)
    {
        $allkomdar     = $this->Masuk_M->allkomdar();
        foreach ($allkomdar->result() as $n) { 

                $this->form_validation->set_rules('a'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('b'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('o'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('ab'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
        }
        
        if ($this->form_validation->run() == FALSE) {
             $this->master($tgl,1);
        } else {
            foreach ($allkomdar->result() as $n) { 
                $data[] = array(
                        'id_komponen_darah' => $n->id_komponen_darah,
                        'id_user'=> $this->session->id,
                        'jenis_A' => $this->input->post('a'.$n->id_komponen_darah),
                        'jenis_AB'=> $this->input->post('ab'.$n->id_komponen_darah),
                        'jenis_B'=> $this->input->post('b'.$n->id_komponen_darah),
                        'jenis_O'=> $this->input->post('o'.$n->id_komponen_darah),
                        'tgl_masuk' => $tgl,
                );
            }
            $this->Masuk_M->ubah($data);

            $this->session->set_flashdata('sukses', 'Stok Ditambahkan');

            redirect(site_url('masuk/master/'.$tgl));
        }
        return false;
    }

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */