<div class="row">
<?php if(uri_string() == 'form'): ?>
	<h3><p>Input Form Peminjaman Barang</p></h3>
<?php else: ?>
	<h3><p>Input Waiting List Peminjaman Barang</p></h3>
<?php endif; ?>
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
			<div class="form-group">
			   <label for="exampleFormControlInput1">Nama Peminjam</label>
			   <input type="text" class="form-control" name="nama_peminjam" placeholder="ex: Nia, Titi, Sarina">
			</div>

			<?php foreach ($barang as $result): ?>
			<div class="form-group">
				
			 	<fieldset disabled>
				   <label for="exampleFormControlInput1">Nama Barang</label>
                      <input value="<?php  echo $result->nama_barang; ?>">
				</fieldset>
			   <label for="exampleFormControlInput1">Jumlah Barang</label>
			   <input type="text" class="form-control" name="jumlah[<?php echo $result->id_barang; ?>]" placeholder="ex: 1, 2">
			</div>
	        <?php endforeach; ?>

			 <div class="form-group">
                    <label>Ormawa</label>
                    <select class="form-control" name="group">
                        <option>Pilih Ormawa</option>
                        <?php foreach ($ormawa as $result): ?>
                            <option value="<?php echo $result->kode_ormawa ?>"><?php echo $result->nama_ormawa ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
			<div class="form-group">
			   <label for="exampleFormControlInput1">Tanggal Peminjaman</label>
			   <input type="date" class="form-control" name="tgl_peminjaman">
			</div>
			<div class="form-group">
			   <label for="exampleFormControlInput1">Tanggal Pengembalian</label>
			   <input type="date" class="form-control" name="tgl_pengembalian">
			</div>
			<div class="form-group">
			   <label for="exampleFormControlInput1">Keterangan</label>
			   <textarea name="keterangan" class="form-control" id="exampleFormControlInput1" placeholder="ex: untuk keperluan ...."></textarea>
			</div>
			 <div class="form-group">
			 	<label for="exampleFormControlInput1">Upload Surat Peminjaman</label>
                <?php echo form_upload('doc')?>
             </div>
             <br>
            <a href="<?php echo site_url('barang') ?>" class="btn btn-danger">Back</a>
			<button name="submit" type="submit" class="btn btn-primary mb-2">Submit</button>
		</div>
	</div>
<?php echo form_close() ?>
</div>
