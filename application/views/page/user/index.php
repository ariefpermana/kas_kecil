 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Data User</h1>
                                <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                                <br>
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
                                <div class="table-responsive m-t-40">
                                <button class="btn-primary" type="submit">Add User</button>
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Department</th>
                                                <th>Email</th>
                                                <th>No. Handphone</th>
                                                <th style="text-align: left;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        if($user) : foreach ($user as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data->nik; ?></td>
                                                <td><?php echo $data->nama_lengkap; ?></td>
                                                <td><?php 
                                                    if($data->kode_department == 1)
                                                    {
                                                        echo 'Manager';
                                                    }else if($data->kode_department == 2)
                                                    {
                                                        echo 'Cashier';
                                                    }else if($data->kode_department == 3)
                                                    {
                                                        echo 'GA';
                                                    }else{
                                                        echo 'Developer';
                                                    }
                                                ?></td>
                                                <td><?php echo $data->email; ?></td>
                                                <td><?php echo $data->gsm; ?></td>
                                                <td style="text-align: center;">
                                                <?php echo form_open() ?>
                                                <?php echo form_hidden('nik', $data->nik) ?>
                                                    <input name="submit" type="submit" value="Edit" class="btn btn-info">
                                                    <input name="submit" type="submit" value="Reset Password" class="btn btn-danger">
                                                <?php echo form_close() ?>
                                                </td>
                                            </tr>
                                        <?php endforeach;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>