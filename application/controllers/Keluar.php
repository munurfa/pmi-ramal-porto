<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login('root','admin');
        $this->load->model('Keluar_M');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
	public function master($tgl_keluar=null,$idkom=4)
	{
	
       	// str_replace('/','-',$tahun_ajar)
        $tgl = date('Y-m-d');
        $tgl_keluar = ($tgl_keluar==null) ? $tgl : $tgl_keluar ;
        $data = array(
        				'title' => 'Data Stok Darah Masuk',
        				'pg' => $this->Keluar_M->master($tgl_keluar,"PG",$idkom)->row(),
        				'sg' => $this->Keluar_M->master($tgl_keluar,"SG",$idkom)->row(),
        				'mlm' => $this->Keluar_M->master($tgl_keluar,"MLM",$idkom)->row(),
                        'komdar' => $this->Keluar_M->komdar($idkom)->row(),
        				'allkomdar' => $this->Keluar_M->allkomdar()->result(),
        				'content' => 'stok-keluar/master',
                        'tgl_keluar' => $tgl_keluar
        			);
        $this->load->view('tpl/content', $data);
	}


    public function cari($tgl)
    {
        $this->form_validation->set_rules('tanggal', 'TANGGAL', 'required');
            if ($this->form_validation->run() == FALSE) {
             redirect('keluar/master/'.$tgl.'/1');
         } else {
            $tanggal = $this->input->post('tanggal');
            redirect('keluar/master/'.$tanggal.'/1');
        }
        return false;
    }

    public function insert($tgl)
    {
        $allkomdar     = $this->Keluar_M->allkomdar();
        foreach ($allkomdar->result() as $n) { 

                $this->form_validation->set_rules('a'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('b'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('o'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('ab'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
        }
        
        if ($this->form_validation->run() == FALSE) {
             $this->master($tgl,4);
        } else {
            
            foreach ($allkomdar->result() as $n) { 
                $data[] = array(
                        'id_komponen_darah' => $n->id_komponen_darah,
                        'id_user'=> $this->session->id,
                        'jenis_A' => $this->input->post('a'.$n->id_komponen_darah),
                        'jenis_AB'=> $this->input->post('ab'.$n->id_komponen_darah),
                        'jenis_B'=> $this->input->post('b'.$n->id_komponen_darah),
                        'jenis_O'=> $this->input->post('o'.$n->id_komponen_darah),
                        'tgl_keluar' => $tgl,
                );
            }
            $this->Keluar_M->tambah($data);

            $this->session->set_flashdata('sukses', 'Stok Ditambahkan');

            redirect(site_url('keluar/master/'.$tgl));
        }
        return false;
        
    }

    public function update($tgl)
    {
        $allkomdar     = $this->Keluar_M->allkomdar();
        foreach ($allkomdar->result() as $n) { 

                $this->form_validation->set_rules('a'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('b'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('o'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
                $this->form_validation->set_rules('ab'.$n->id_komponen_darah, 'STOK DARAH', 'required|numeric|greater_than_equal_to[0]');
        }
        
        if ($this->form_validation->run() == FALSE) {
             $this->master($tgl,4);
        } else {
            foreach ($allkomdar->result() as $n) { 
                $data[] = array(
                        'id_komponen_darah' => $n->id_komponen_darah,
                        'id_user'=> $this->session->id,
                        'jenis_A' => $this->input->post('a'.$n->id_komponen_darah),
                        'jenis_AB'=> $this->input->post('ab'.$n->id_komponen_darah),
                        'jenis_B'=> $this->input->post('b'.$n->id_komponen_darah),
                        'jenis_O'=> $this->input->post('o'.$n->id_komponen_darah),
                        'tgl_keluar' => $tgl,
                );
            }
            $this->Keluar_M->ubah($data);

            $this->session->set_flashdata('sukses', 'Stok Ditambahkan');

            redirect(site_url('keluar/master/'.$tgl));
        }
        return false;
    }

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */