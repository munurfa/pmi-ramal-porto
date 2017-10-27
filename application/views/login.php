<?php
// $data['title']="SIA";
$this->load->view('tpl/header');
$this->load->view('tpl/menu');
?>

<div class="row">
    <div class="col-md-6">
        <?php if ($this->session->flashdata('sukses')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('sukses') ?>
            
        </div>
        <?php endif ?>
        <?php echo form_open('login'); ?>
        <label>Masukkan Username : </label>
        <input type="text" class="form-control" name="username" />
        <label>Masukkan Password :  </label>
        <input type="password" class="form-control"  name="password" />
        <br>
        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Login </button>&nbsp;
        <?php echo form_close(); ?>
    </div>
    <div class="col-md-6">
        
        <div class="alert alert-info">
            Login hanya untuk petugas PMI Tegal
            
        </div>
        
    </div>
</div>
<?php
$this->load->view('tpl/footer');
?>