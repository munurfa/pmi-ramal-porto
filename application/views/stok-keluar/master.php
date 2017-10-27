<div class="row">
	<div class="col-md-6">
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
		
		<?php echo form_open('keluar/cari/'.$tgl_keluar); ?>
		<!-- <input type="text" value="<?php echo $tgl_masuk ?>" id="datetimepicker" name="tanggal"> -->
		<input  class="tgl" id="tgl" name="tanggal" value="<?php echo $tgl_keluar ?>"/>
		<button type="submit" class="btn btn-danger">Lihat Data</button>
		<?php echo form_close(); ?>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Goldar</th>
					<th>LP</th>
					<th>PRC</th>
					<th>TC</th>
					<th>WB-PRC</th>
					<th>WB-WB</th>
				</tr>
			</thead>
			<?php
				$a9 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,9)->row();
				if ($a9!=null) {
					$action = 'keluar/update';
				} else {
					$action = 'keluar/insert';
				}
				
				echo form_open($action.'/'.$tgl_keluar);
			?>
			<tbody>
				<tr>
					<td>A</td>
					<td><?php
						$a9 = ($a9 != null) ? $a9->jenis_A : 0 ;
						echo form_input('a9', $a9, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$a7 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,7)->row();
						$a7 = ($a7 != null) ? $a7->jenis_A : 0 ;
						echo form_input('a7', $a7, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$a4 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,4)->row();
						$a4 = ($a4 != null) ? $a4->jenis_A : 0 ;
						echo form_input('a4', $a4, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$a6 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,6)->row();
						$a6 = ($a6 != null) ? $a6->jenis_A : 0 ;
						echo form_input('a6', $a6, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$a5 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,5)->row();
						$a5 = ($a5 != null) ? $a5->jenis_A : 0 ;
						echo form_input('a5', $a5, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>B</td>
					<td><?php
							$b9 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,9)->row();
							$b9 = ($b9 != null) ? $b9->jenis_B : 0 ;
						echo form_input('b9', $b9, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b7 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,7)->row();
						$b7 = ($b7 != null) ? $b7->jenis_B : 0 ;
						echo form_input('b7', $b7, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b4 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,4)->row();
						$b4 = ($b4 != null) ? $b4->jenis_B : 0 ;
						echo form_input('b4', $b4, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b6 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,6)->row();
						$b6 = ($b6 != null) ? $b6->jenis_B : 0 ;
						echo form_input('b6', $b6, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b5 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,5)->row();
						$b5 = ($b5 != null) ? $b5->jenis_B : 0 ;
						echo form_input('b5', $b5, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>O</td>
					<td><?php
							$o9 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,9)->row();
							$o9 = ($o9 != null) ? $o9->jenis_O : 0 ;
						echo form_input('o9', $o9, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$o7 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,7)->row();
						$o7 = ($o7 != null) ? $o7->jenis_O : 0 ;
						echo form_input('o7', $o7, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$o4 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,4)->row();
						$o4 = ($o4 != null) ? $o4->jenis_O : 0 ;
						echo form_input('o4', $o4, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$o6 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,6)->row();
						$o6 = ($o6 != null) ? $o6->jenis_O : 0 ;
						echo form_input('o6', $o6, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$o5 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,5)->row();
						$o5 = ($o5 != null) ? $o5->jenis_O : 0 ;
						echo form_input('o5', $o5, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>AB</td>
					<td><?php
							$ab9 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,9)->row();
							$ab9 = ($ab9 != null) ? $ab9->jenis_AB : 0 ;
						echo form_input('ab9', $ab9, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$ab7 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,7)->row();
						$ab7 = ($ab7 != null) ? $ab7->jenis_AB : 0 ;
						echo form_input('ab7', $ab7, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$ab4 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,4)->row();
						$ab4 = ($ab4 != null) ? $ab4->jenis_AB : 0 ;
						echo form_input('ab4', $ab4, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$ab6 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,6)->row();
						$ab6 = ($ab6 != null) ? $ab6->jenis_AB : 0 ;
						echo form_input('ab6', $ab6, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$ab5 =$this->Keluar_M->master($tgl_keluar,$this->session->shift,5)->row();
						$ab5 = ($ab5 != null) ? $ab5->jenis_AB : 0 ;
						echo form_input('ab5', $ab5, ['class'=>'form-control']); ?>
					</td>
				</tr>
			</tbody>
			
		</table>
		<?php if ($ab5 != null): ?>
		<button class="btn btn-danger" type="submit">Ubah Data</button>
		<?php else: ?>
		<button class="btn btn-danger" type="submit">Simpan Data</button>
		<?php endif ?>
		<?php echo form_close(); ?>
	</div>
	<div class="col-md-6">
		<div class="btn-group" style="padding: 5px;">
			<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			KOMPONEN DARAH <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<?php foreach ($allkomdar as $a): ?>
				<li>
					<a href="<?php echo base_url('keluar/master/'.$tgl_keluar.'/'.$a->id_komponen_darah) ?>">
						<?php echo $a->nama_komponen ?>
					</a>
				</li>
				
				<?php endforeach ?>
				
			</ul>
		</div><br><br>
		<table class="table">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th colspan="4" class="text-center"><?php echo $komdar->nama_komponen ?></th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th class="text-center">Shift</th>
					<th class="text-center">A</th>
					<th class="text-center">B</th>
					<th class="text-center">O</th>
					<th class="text-center">AB</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td class="text-center">PG</td>
					<?php if ($pg==null): ?>
					<?php
						$A_PG = 0;
						$B_PG = 0;
						$O_PG = 0;
						$AB_PG = 0;
					?>
					<td colspan="4" class="text-center">Data Tidak Ada</td>
					<?php else: ?>
					<td class="text-center"><?php echo $A_PG = $pg->jenis_A ?></td>
					<td class="text-center"><?php echo $B_PG = $pg->jenis_B ?></td>
					<td class="text-center"><?php echo $O_PG = $pg->jenis_O ?></td>
					<td class="text-center"><?php echo $AB_PG = $pg->jenis_AB ?></td>
					<?php endif ?>
				</tr>
				
				
				<tr>
					<td class="text-center">SG</td>
					<?php if ($sg==null): ?>
					<?php
						$A_SG = 0;
						$B_SG = 0;
						$O_SG = 0;
						$AB_SG = 0;
					?>
					<td colspan="4"></td>
					<?php else: ?>
					<td class="text-center"><?php echo $A_SG = $sg->jenis_A ?></td>
					<td class="text-center"><?php echo $B_SG = $sg->jenis_B ?></td>
					<td class="text-center"><?php echo $O_SG = $sg->jenis_O ?></td>
					<td class="text-center"><?php echo $AB_SG = $sg->jenis_AB ?></td>
					<?php endif ?>
				</tr>
				
				
				
				<tr>
					<td class="text-center">MLM</td>
					<?php if ($mlm==null): ?>
					<?php
						$A_MLM = 0;
						$B_MLM = 0;
						$O_MLM = 0;
						$AB_MLM = 0;
					?>
					<td colspan="4"></td>
					<?php else: ?>
					<td class="text-center"><?php echo $A_MLM = $mlm->jenis_A ?></td>
					<td class="text-center"><?php echo $B_MLM = $mlm->jenis_B ?></td>
					<td class="text-center"><?php echo $O_MLM = $mlm->jenis_O ?></td>
					<td class="text-center"><?php echo $AB_MLM = $mlm->jenis_AB ?></td>
					<?php endif ?>
				</tr>
				
			</tbody>
			<tfoot>
			<tr>
				<td class="text-center">Jumlah</td>
				
				<td class="text-center"><?php echo (int) $A_PG+$A_SG+$A_MLM ?></td>
				<td class="text-center"><?php echo (int) $B_PG+$B_SG+$B_MLM ?></td>
				<td class="text-center"><?php echo (int) $O_PG+$O_SG+$O_MLM ?></td>
				<td class="text-center"><?php echo (int) $AB_PG+$AB_SG+$AB_MLM ?></td>
				
			</tr>
			</tfoot>
		</table>
		
	</div>
</div>
