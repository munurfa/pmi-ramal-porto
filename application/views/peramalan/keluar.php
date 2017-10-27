<div class="row">
	<div class="col-md-4">
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
			<?php echo form_open('ramal/carikeluar/'.$jenis.'/'.$komp.'/'.$tgl_ramal); ?>
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
								<a href="<?php echo base_url('ramal/keluar/'.$a.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ) ?>">
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
								<a href="<?php echo base_url('ramal/keluar/'.$this->uri->segment(3).'/'.substr($a->nama_komponen,0,2).'/'.$this->uri->segment(5) ) ?>">
									<?php echo $a->nama_komponen ?>
								</a>
							</li>
							
							<?php endforeach ?>
							
						</ul>
					</div>
				</td>
			</tr>
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bulan ke</th>
					<th>Tahun</th>
					<th>Jumlah Stok</th>
				</tr>
				
			</thead>
			<tbody>
				<?php if (in_array($jenis, $sample->list_fields())): ?>
				<?php if ($sample->num_rows() >=12): ?>
				<?php foreach ( $sample->result() as $a): ?>
				<tr>
					<td><?php echo $a->bulan ?></td>
					<td><?php echo $a->tahun ?></td>
					<td><?php echo $a->$jenis ?></td>
				</tr>
				<?php endforeach ?>
				<?php else: ?>
				<tr>
					<td colspan="3" class="text-center">Data tidak memenuhi</td>
				</tr>
				<?php endif ?>
				<?php else: ?>
				<tr>
					<td colspan="3" class="text-center">TIDAK ADA JENIS DARAH SEPERTI ITU</td>
				</tr>
				<?php endif ?>
				
			</tbody>
		</table>
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
			$date=date_create($tgl_ramal)
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
					<h5>Hasil Peramalan Goldar <?php echo $this->uri->segment(3) ?>(<?php echo $this->uri->segment(4) ?>) Bulan <?php echo date_format($date,'F Y')  ?> Dengan Tingkat Galat <?php echo $galat ?></h5>
				</div>
		<!-- 	</div>
		</div> -->
		<?php else: ?>
			<p><strong>Tidak Ada Data</strong></p>
		<?php endif ?>
	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-6">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="5" class="text-center">Peramalan 3 Bobot</th>
						</tr>
						<tr>
							<th>Peramalan</th>
							<th>Error</th>
							<th>MAD</th>
							<th>MSE</th>
							<th>MAPE (%)</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($sample->num_rows() >=12): ?>
						<?php foreach (range(1,3) as $k): ?>
						<tr>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
						<?php endforeach ?>
						<?php foreach ($W3 as $w3): ?>
						
						<tr>
							<td><?php echo $w3['ramal']; ?></td>
							<td><?php echo $w3['err']; ?></td>
							<td><?php echo $w3['mad']; ?></td>
							<td><?php echo $w3['mse']; ?></td>
							<td><?php echo $w3['mape']; ?></td>
							<?php
								$err[]= floatval($w3['err']);
								$mad[]= floatval($w3['mad']);
								$mse[]= floatval($w3['mse']);
								$mape[]= floatval($w3['mape']);
							?>
						</tr>
						<?php endforeach ?>
						<tr>
							<td>JUMLAH</td>
							<td><?php echo round(array_sum($err),2);?></td>
							<td><?php echo round(array_sum($mad),2);?></td>
							<td><?php echo round(array_sum($mse),2);?></td>
							<td><?php echo round(array_sum($mape),2);?></td>
						</tr>
						<tr>
							<td>RATA-RATA</td>
							<td><?php echo round(array_sum($err)/count($err),2);?></td>
							<td><?php echo round(array_sum($mad)/count($mad),2);?></td>
							<td><?php echo round(array_sum($mse)/count($mse),2);?></td>
							<td><?php echo round(array_sum($mape)/count($mape),2);?></td>
						</tr>
						<?php $peramalan = end($WMA3) ;?>
						<tr style="background-color: darkcyan;color: #fff;">
							<td><?php echo $peramalan['ramal']; ?></td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
						<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">Data tidak memenuhi</td>
						</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="5" class="text-center">Peramalan 6 Bobot</th>
						</tr>
						<tr>
							<th>Peramalan</th>
							<th>Error</th>
							<th>MAD</th>
							<th>MSE</th>
							<th>MAPE (%)</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($sample->num_rows() >=12): ?>
						<?php foreach (range(1,6) as $k): ?>
						<tr>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
						<?php endforeach ?>
						
						<?php foreach ($W6 as $w6): ?>
						
						<tr>
							<td><?php echo $w6['ramal']; ?></td>
							<td><?php echo $w6['err']; ?></td>
							<td><?php echo $w6['mad']; ?></td>
							<td><?php echo $w6['mse']; ?></td>
							<td><?php echo $w6['mape']; ?></td>
							<?php
								$err[]= floatval($w6['err']);
								$mad[]= floatval($w6['mad']);
								$mse[]= floatval($w6['mse']);
								$mape[]= floatval($w6['mape']);
							?>
						</tr>
						<?php endforeach ?>
						<tr>
							<td>JUMLAH</td>
							<td><?php echo round(array_sum($err),2);?></td>
							<td><?php echo round(array_sum($mad),2);?></td>
							<td><?php echo round(array_sum($mse),2);?></td>
							<td><?php echo round(array_sum($mape),2);?></td>
						</tr>
						<tr>
							<td>RATA-RATA</td>
							<td><?php echo round(array_sum($err)/count($err),2);?></td>
							<td><?php echo round(array_sum($mad)/count($mad),2);?></td>
							<td><?php echo round(array_sum($mse)/count($mse),2);?></td>
							<td><?php echo round(array_sum($mape)/count($mape),2);?></td>
						</tr>
						<?php $peramalan = end($WMA6) ;?>
						<tr style="background-color: brown;color: #fff;">
							<td><?php echo $peramalan['ramal']; ?></td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
						<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">Data tidak memenuhi</td>
						</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>