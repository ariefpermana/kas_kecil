<!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Input Saldo</h4>
                    </div>
                    <div class="card-body">
                       <?php echo form_open() ?>
                            <div class="form-body">
	                            <div class="col-md-12">
			                        <div class="card p-30">
			                            <div class="media">
			                                <div class="media-left media media-middle">
			                                    <span><i class="fa fa-money f-s-40 color-success"></i></span>
			                                </div>
			                                <div class="media-body media-text-right">
			                                    <h2><?php echo rupiah($saldo); ?></h2>
			                                    <p class="m-b-0">Total Saldo</p>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
                                <!-- <h3 class="card-title m-t-15">Personal Info</h3> -->
                                <hr>
                                 <?php if($this->session->flashdata('success')): ?>
                                    <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('failed')): ?>
                                    <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
                                <?php endif; ?>
                                <?php if(validation_errors()): ?>
                                    <ul class="alert alert-danger">
                                        <?php echo validation_errors('<li>', '</li>') ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-12">
	                                    <div class="form-group">
	                                        <label class="control-label">Jumlah Saldo Diinput</label>
	                                        <div class="row">
	                                            <div class="col-md-2" style="padding-left:20px;padding-top:10px;padding-right:0px">
	                                                <h4>Rp.</h4>
	                                            </div>
	                                            <div class="col-md-10">
	                                                <input type="text" name="saldo" class="form-control currency" id="currency" data-separator="," required <?php echo $intervalDay; ?>>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                            </div>
                            <div class="form-actions" style="text-align:right;">
                                <button type="submit" name="submit" value="Save" class="btn btn-success" <?php echo $intervalDay; ?>> <i class="fa fa-check"></i> Save</button>
                            </div>
                            <br>
                            <label style="color:red;">Note : Saldo hanya dapat diinput kembali setelah 11 hari dari input saldo sebelumnya.</label>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
