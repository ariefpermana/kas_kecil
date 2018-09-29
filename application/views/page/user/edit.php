<!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Edit Data User</h4>
                    </div>
                    <div class="card-body">
                       <?php echo form_open() ?>
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Personal Info</h3>
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
                                            <label class="control-label">Nama</label>
                                            <input type="text" name="name" value="<?php echo $user->nama_lengkap; ?>" class="form-control" placeholder="Agis Puspita" required>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Bagian</label>
                                        <select class="form-control" name="bagian" required>
                                            <option value="0">Pilih Bagian</option>}
                                            <?php foreach ($department as $key => $value) : 
                                                if($user->kode_department == $value->kode_department) :
                                            ?>
                                            <option value="<?php echo $value->kode_department; ?>" selected><?php echo $value->dept; ?></option>
                                            <?php continue; else : ?>
                                            <option value="<?php echo $value->kode_department; ?>"><?php echo $value->dept; ?></option>
                                        <?php endif; endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">No. Telepon</label>
                                        <input type="tel" name="notelepon" value="<?php echo $user->gsm; ?>" class="form-control" placeholder="081297326740" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="agis@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-actions">
                                <?php echo form_hidden('nik', $user->nik); ?>
                                <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
