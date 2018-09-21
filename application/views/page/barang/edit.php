<div class="row">
	<h3><p>Edit Data Barang</p></h3>
<br>
 <!-- Alert Validation form -->
    <?php if($this->session->flashdata('success')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
    <?php elseif($this->session->flashdata('failed')): ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
    <?php endif; ?>
    
    <?php if(validation_errors()): ?>
        <ul class="alert alert-danger">
            <?php echo validation_errors('<li>', '</li>') ?>
        </ul>
    <?php endif; ?>
    
<?php echo form_open_multipart()  ?>
	<div class="col-md-4">
		<div class="container">
		<?php if($barang) : foreach($barang as $data => $detail) : ?>
			<div class="form-group">
			<fieldset disabled>
			   <label for="exampleFormControlInput1">Nama Barang</label>
			   <input type="text" class="form-control" name="nama_peminjam" value="<?php echo $detail->nama_barang ?>">
			</fieldset>
			</div>
			<div class="form-group">
				   <label for="exampleFormControlInput1">Kualitas Barang</label>
			   	  <input type="text" class="form-control" name="kualitas" placeholder="ex: bagus, rusak" value="<?php echo $detail->quality_barang; ?>">
			   <label for="exampleFormControlInput1">Jumlah Barang</label>
			   <input type="text" class="form-control" name="jumlah" placeholder="ex: 1, 2" value="<?php echo $detail->jumlah_barang; ?>">
			</div>
			<div class="form-group">
			   	<label for="exampleFormControlInput1">Fisik Barang</label>
			   	<br>
				<img src="<?php echo base_url() ?>img/<?php echo $detail->gambar_barang ?>" alt="" style="width: 100px;">
			</div>
             <br>
            <a href="<?php echo site_url('barang/dataBarang') ?>" class="btn btn-danger">Back</a>
			<button name="submit" type="submit" value="<?php echo $detail->id_barang; ?>" class="btn btn-primary mb-2">Submit</button>
		<?php endforeach;endif; ?>
		</div>
	</div>
<?php echo form_close() ?>
</div>
