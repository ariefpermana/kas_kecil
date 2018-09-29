<!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Ubah Password</h4>
                    </div>
                    <div class="card-body">
                       <?php echo form_open() ?>
                            <div class="form-body">
                            <br>
                                <h3 class="card-title m-t-15">User Password</h3>
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
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="new" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Confirm Password</label>
                                            <input type="password" name="confirm" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Change</button>
                                <a href="<?php echo site_url('admin') ?>" class="btn btn-danger">Cancel</a>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
