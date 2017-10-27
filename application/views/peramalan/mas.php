<div class="row">
	<div class="col-md-5">
		<?php if ($this->session->flashdata('sukses')): ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('sukses') ?>
			
		</div>
		<?php endif ?>
		<?php if (validation_errors()){ ?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo validation_errors(); ?>
		</div>
		<?php } ?>
		<table border="0">
			<?php echo form_open('masramal/carikeluar/'.$jenis.'/'.$komp.'/'.$tgl_ramal); ?>
			<tr>
				<td style="padding: 5px">
					<input name="tgl_ramal" id="tgl_ramal" class="date-picker" value="<?php echo $tgl_ramal ?>" />
				</td>
				<td style="padding: 5px">
					<button class="btn btn-danger" type="submit">Lihat</button>
				</td>
			</tr>
			<?php echo form_close(); ?>
			<tr>
				<td style="padding: 5px">
					<div class="btn-group">
						<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						JENIS DARAH <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php foreach (["A","B","O","AB"] as $a): ?>
							<li>
								<a href="<?php echo base_url('masramal/butuh/'.$a.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ) ?>">
									<?php echo $a ?>
								</a>
							</li>
							
							<?php endforeach ?>
							
						</ul>
					</div>
				</td>
				<td style="padding: 5px">
					<div class="btn-group">
						<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						KOMPONEN DARAH <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php foreach ($allkomdar as $a): ?>
							<li>
								<a href="<?php echo base_url('/masramal/butuh/'.$this->uri->segment(3).'/'.substr($a->nama_komponen,0,2).'/'.$this->uri->segment(5) ) ?>">
									<?php echo substr($a->nama_komponen,0,2) ?>
								</a>
							</li>
							
							<?php endforeach ?>
							
						</ul>
					</div>
				</td>
			</tr>
		</table>
		<?php 
		$goldar  = ($this->uri->segment(3)==null) ? "A" : $this->uri->segment(3);
		$date=date_create($tgl_ramal);
		 ?>
		<div class="dashboard-div-wrapper bk-clr-four">
			<h1><?php echo $masuk->$goldar ;?> Kantong</h1>
			<!-- <i  class="fa fa-venus dashboard-div-icon" ></i> -->
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
				</div>
				
			</div>
			
			<h5>Jumlah Darah Masuk Goldar <?php echo $goldar ?>(<?php echo $this->uri->segment(4) ?>) Bulan <?php echo date_format($date,'F Y')  ?></h5>
		</div>
		
	</div>
	<div class="col-md-7">
		<?php if ($sample->num_rows() >=12): ?>
		<?php $W3 =  array_splice($WMA3,0,-1);?>
		<?php $W6 =  array_splice($WMA6,0,-1);?>
		<?php foreach ($W3 as $w3): ?>
		<?php
			$dterr3[]= floatval($w3['err']);
			$dtmad3[]= floatval($w3['mad']);
			$dtmse3[]= floatval($w3['mse']);
			$dtmape3[]= floatval($w3['mape']);
		?>
		<?php endforeach ?>
		<?php foreach ($W6 as $w6): ?>
		<?php
			$dterr6[]= floatval($w6['err']);
			$dtmad6[]= floatval($w6['mad']);
			$dtmse6[]= floatval($w6['mse']);
			$dtmape6[]= floatval($w6['mape']);
		?>
		<?php endforeach ?>
		<?php
			$err3 = round(array_sum($dterr3)/count($dterr3),2);
			$mad3 = round(array_sum($dtmad3)/count($dtmad3),2);
			$mse3 = round(array_sum($dtmse3)/count($dtmse3),2);
			$mape3 = round(array_sum($dtmape3)/count($dtmape3),2);
			$err6 = round(array_sum($dterr6)/count($dterr6),2);
			$mad6 = round(array_sum($dtmad6)/count($dtmad6),2);
			$mse6 = round(array_sum($dtmse6)/count($dtmse6),2);
			$mape6 = round(array_sum($dtmape6)/count($dtmape6),2);
			// $mse6 = 4000;
			$ramal3 = end($WMA3) ;
			$ramal6 = end($WMA6) ;
			$r3 = $ramal3['ramal'];
			$r6 = $ramal6['ramal'];
			if (($mse3<$mse6) && ($mape3<$mape6)) {
				$r = $r3;
				$galat = $mape3;
			} else {
				$r = $r6;
				$galat = $mape6;
			}
			
		?>
		
		<!-- <div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6"> -->
				<div class="dashboard-div-wrapper bk-clr-four">
					<h1><?php echo round($r) ;?> Kantong</h1>
					<!-- <i  class="fa fa-venus dashboard-div-icon" ></i> -->
					<div class="progress progress-striped active">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
						</div>
						
					</div>
					<h5>Prakiraan Kebutuhan Darah Goldar <?php echo $goldar ?>(<?php echo $this->uri->segment(4) ?>) Bulan <?php echo date_format($date,'F Y')  ?> Dengan Tingkat Galat <?php echo $galat ?></h5>
				</div>
		<!-- 	</div>
		</div> -->
		<?php else: ?>
			<p><strong>Tidak Ada Data</strong></p>
		<?php endif ?>
	</div>
</div>