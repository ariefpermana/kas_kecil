<!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Form Pengajuan</h4>
                    </div>
                    <div class="card-body">
                       <?php echo form_open_multipart() ?>
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Input Pengajuan</h3>
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
                                <?php if($this->session->flashdata('image')): ?>
                                    <?php echo $this->session->flashdata('image') ?>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Permintaan</label>
                                            <input type="date" name="tglpermintaan" class="form-control" required>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Keterangan Permintaan</label>
                                        <input type="text" name="keterangan" class="form-control" required>
                                    </div>
                                </div>
                                <!--/row-->
                               <!--  <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Kategori</label>
                                        <input type="tel" name="kategori" class="form-control" placeholder="081297326740" required>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Jumlah Harga</label>
                                        <div class="row">
                                            <div class="col-md-2" style="padding-left:20px;padding-top:10px;padding-right:0px">
                                                <h4>Rp.</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="jumlah" class="form-control currency" id="currency" data-separator="," required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Upload Bukti Transaksi</label>
                                        <input type="file" name="bukti" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-actions">
                                <button type="submit" value="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
