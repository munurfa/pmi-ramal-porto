<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ramal extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login('root','admin');
        $this->load->model('Ramal_M');
    }

	public function keluar($jenis='a',$komp='WB',$tgl_ramal=null)
	{
		$tgl_ramal = ($tgl_ramal==null) ? date('Y-m') : $tgl_ramal ;
		$this->load->model('Ramal_M');
		$komp = strtoupper($komp);
		$all = $this->Ramal_M->genapSebulan($komp.'%',$tgl_ramal.'-01');
		$jenis = strtoupper($jenis);
		$this->load->model('Keluar_M');
		$dd=[];
		if (in_array($jenis, $all->list_fields()) ){
			if ($all->num_rows()>=12){
	            foreach ($all->result() as $row) {
	            	$dd[]= $row->$jenis;
	            }
                $dd = array_replace($dd,
                    array_fill_keys(
                        array_keys($dd, 0),
                        1
                    )
                );
	        }else{
	        	$dd=null;
	        }
    	}        
        
		$data = array(
        				'title' => 'Peramalan Keluar',
        				'sample' => $all,
        				'allkomdar' => $this->Keluar_M->allkomdar()->result(),
        				'content' => 'peramalan/keluar',
        				'jenis' => $jenis,
        				'komp' =>$komp,
        				'tgl_ramal' => $tgl_ramal,
        				'WMA3' => self::WMA($dd, 3, [3,2,1]), 
        				'WMA6' => self::WMA($dd, 6, [6,5,4,3,2,1]), 
        			);
    		
		$this->load->view('tpl/content', $data);
	}

	public function carikeluar($jenis='a',$komp='WB',$tgl_ramal)
    {
    	$tgl_ramal = ($tgl_ramal=='') ? date('Y-m-d') : $tgl_ramal ;
        $this->form_validation->set_rules('tgl_ramal', 'TANGGAL', 'required');
            if ($this->form_validation->run() == FALSE) {
             redirect('ramal/keluar/'.$jenis.'/'.$komp.'/'.$tgl_ramal);
         } else {
            $tanggal = $this->input->post('tgl_ramal');
            redirect('ramal/keluar/'.$jenis.'/'.$komp.'/'.$tanggal);
        }
        return false;
    }

    public function coba($jenis='a',$komp='WB',$tgl_ramal=null)
    {
    	
		$tgl_ramal = ($tgl_ramal==null) ? date('Y-m') : $tgl_ramal ;
		$this->load->model('Ramal_M');
		$komp = strtoupper($komp);
		$all = $this->Ramal_M->genapSebulan($komp.'%',$tgl_ramal.'-28');
		$jenis = strtoupper($jenis);
		$this->load->model('Keluar_M');
		$dd=[];
		if ($all->num_rows()>0){
            foreach ($all->result() as $row) {
                # code... 
            	$dd[]= $row->$jenis;

            }
        }
        $dd = array_replace($dd,
                array_fill_keys(
                    array_keys($dd, 0),
                    0.1
                )
            );
        $periode = 6;
		$bobot = array(6,5,4,3,2,1);
		echo "<pre>";
		print_r (implode($dd,',')).'<br>';
		print_r($bobot);
		echo $periode;
		echo "</pre><br>";
		
		$WMA = self::WMA($dd, $periode, $bobot);
        echo "<pre>";
        print_r (array_splice($WMA,0,-1));
        echo "</pre>";

	
    }

    // Rumus WMA
    public static function WMA($real, $periode, $bobot)
    {
        if (count($bobot) !== $periode) {
            throw new Exception\BadDataException('Number of weights must equal number of n-points');
        }

        $m   = count($real);
        $w  = array_sum($bobot);

        $WMA = [];
        for ($i = 0; $i <= $m-$periode; $i++) {
            $wp   = array_sum(self::multiply(array_slice($real, $i, $periode), $bobot));
            $ramal = $wp / $w;
            $r = array_slice($real, $i, $periode+1);
            $r = (count($r)==$periode) ? [$ramal] : $r ;
            
            $err = (int) end($r)-$ramal;
            $mad = abs($err);
            $mse = pow($mad,2);
            $mape = abs((int) $err / end($r))*100;
            if ($i!=$m-$periode) {
            	$WMA[] = array(
            			'ramal' => (float) round($ramal,2),
            			'err'	=> (float) round($err,2),
            			'r'		=> array_slice($real, $i, $periode),
            			'mad'	=> (float) round($mad,2),
            			'mse'	=> (float) round($mse,2),
            			'mape'	=> (float) round($mape,2)
            		);
            } else {
            	$WMA[] = array(
            			'ramal' => (float) round($ramal,2),
            			'err'	=> (float) 0,
            			'mad'	=> (float) 0,
            			'mse'	=> (float) 0,
            			'mape'	=> (float) 0
            		);
            }
            
            
        }
        return $WMA;
    }
    public static function multiply($arr1,$arr2)
    {
        self::checkArrayLengths($arr1);

        $number_of_arrays = count($arr1);

        for ($i = 0; $i < $number_of_arrays; $i++) {
            
                $arr1[$i] *= $arr2[$i];
            
        }

        return $arr1;
    }
     public static function checkArrayLengths(array $arrays)
    {
        if (count($arrays) < 2) {
            throw new Exception\BadDataException('Need at least two arrays to map over');
        }

        $n = count($arrays[0]);
        foreach ($arrays as $array) {
            if (count($array) !== $n) {
                throw new Exception\BadDataException('Lengths of arrays are not equal');
            }
        }

        return true;
    }
}

/* End of file Ramal.php */
/* Location: ./application/controllers/Ramal.php */