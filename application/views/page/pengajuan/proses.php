 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Proses Pengajuan</h1>
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
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Pengajuan</th>
                                                <th>NIK</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Keterangan</th>
                                                <th>Jumlah</th>
                                                <th>Bukti Transaksi</th>
                                                <th>Reason</th>
                                                <th style="text-align: left;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        if($pengajuan) : foreach ($pengajuan as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data->no_pengajuan; ?></td>
                                                <td><?php echo $data->nik; ?></td>
                                                <td><?php echo $data->tgl_pengajuan; ?></td>
                                                <td><?php echo $data->keterangan; ?></td>
                                                <td><?php echo rupiah($data->harga); ?></td>
                                                <td><a href="<?php echo base_url() ?>uploads/<?php echo $data->doc_upload; ?>" target="_blank"><img width="50px" src="<?php echo base_url() ?>uploads/<?php echo $data->doc_upload; ?>"></a></td>
                                                <td><?php echo $data->reason; ?></td>
                                                <td style="text-align: left;"><?php 
                                                    if($data->status == 1)
                                                    {
                                                        echo 'Waiting To Approve GA';
                                                    }elseif ($data->status == 2) {
                                                        echo 'Waiting To Approve Finance/Finance Manager';
                                                    }elseif ($data->status == 3) {
                                                        //echo 'Waiting To Approve Cashier';
                                                        echo 'Waiting To Cashout.';
                                                    }elseif($data->status == 5)
                                                    {
                                                        echo 'Rejected By GA';
                                                    }elseif ($data->status == 6) {
                                                        echo 'Rejected By Finance/Finance Manager';
                                                    }elseif ($data->status == 7) {
                                                        echo 'Rejected By Cashier';
                                                    }elseif ($data->status == 8) {
                                                        echo 'Pending Less Saldo';
                                                    }else{
                                                        echo 'Approved for Cashout.';
                                                    }
                                                ?></td>
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