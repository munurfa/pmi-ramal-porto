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
		
		<?php echo form_open('masuk/cari/'.$tgl_masuk); ?>
		<!-- <input type="text" value="<?php echo $tgl_masuk ?>" id="datetimepicker" name="tanggal"> -->
		<input  class="tgl" id="tgl" name="tanggal" value="<?php echo $tgl_masuk ?>"/>
		<button type="submit" class="btn btn-danger">Lihat Data</button>
		<?php echo form_close(); ?>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Goldar</th>
					<th>WB-MU</th>
					<th>WB-UTDC</th>
					<th>PRC-PRC</th>
					<th>TC</th>
				</tr>
			</thead>
			<?php
				$a1 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,1)->row();
				if ($a1!=null) {
					$action = 'masuk/update';
				} else {
					$action = 'masuk/insert';
				}
				
				echo form_open($action.'/'.$tgl_masuk);
			?>
			<tbody>
				<tr>
					<td>A</td>
					<td><?php
						$a1 = ($a1 != null) ? $a1->jenis_A : 0 ;
						echo form_input('a1', $a1, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$a2 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,2)->row();
						$a2 = ($a2 != null) ? $a2->jenis_A : 0 ;
						echo form_input('a2', $a2, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$a3 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,3)->row();
						$a3 = ($a3 != null) ? $a3->jenis_A : 0 ;
						echo form_input('a3', $a3, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$a4 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,4)->row();
						$a4 = ($a4 != null) ? $a4->jenis_A : 0 ;
						echo form_input('a4', $a4, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>B</td>
					<td><?php
							$b1 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,1)->row();
							$b1 = ($b1 != null) ? $b1->jenis_B : 0 ;
						echo form_input('b1', $b1, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b2 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,2)->row();
						$b2 = ($b2 != null) ? $b2->jenis_B : 0 ;
						echo form_input('b2', $b2, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b3 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,3)->row();
						$b3 = ($b3 != null) ? $b3->jenis_B : 0 ;
						echo form_input('b3', $b3, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$b4 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,4)->row();
						$b4 = ($b4 != null) ? $b4->jenis_B : 0 ;
						echo form_input('b4', $b4, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>O</td>
					<td><?php
							$o1 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,1)->row();
							$o1 = ($o1 != null) ? $o1->jenis_O : 0 ;
						echo form_input('o1', $o1, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$o2 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,2)->row();
						$o2 = ($o2 != null) ? $o2->jenis_O : 0 ;
						echo form_input('o2', $o2, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$o3 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,3)->row();
						$o3 = ($o3 != null) ? $o3->jenis_O : 0 ;
						echo form_input('o3', $o3, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$o4 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,4)->row();
						$o4 = ($o4 != null) ? $o4->jenis_O : 0 ;
						echo form_input('o4', $o4, ['class'=>'form-control']); ?>
					</td>
				</tr>
				<tr>
					<td>AB</td>
					<td><?php
							$ab1 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,1)->row();
							$ab1 = ($ab1 != null) ? $ab1->jenis_AB : 0 ;
						echo form_input('ab1', $ab1, ['class'=>'form-control']); ?>
						
					</td>
					<td>
						<?php
						$ab2 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,2)->row();
						$ab2 = ($ab2 != null) ? $ab2->jenis_AB : 0 ;
						echo form_input('ab2', $ab2, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$ab3 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,3)->row();
						$ab3 = ($ab3 != null) ? $ab3->jenis_AB : 0 ;
						echo form_input('ab3', $ab3, ['class'=>'form-control']); ?>
					</td>
					<td>
						<?php
						$ab4 =$this->Masuk_M->master($tgl_masuk,$this->session->shift,4)->row();
						$ab4 = ($ab4 != null) ? $ab4->jenis_AB : 0 ;
						echo form_input('ab4', $ab4, ['class'=>'form-control']); ?>
					</td>
				</tr>
			</tbody>
			
		</table>
		<?php if ($ab4 != null): ?>
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
					<a href="<?php echo base_url('masuk/master/'.$tgl_masuk.'/'.$a->id_komponen_darah) ?>">
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
