 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Cetak Bukti Dana Keluar</h1>
                                <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                                <br>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>No. Pengajuan</th>
                                                <th>NIK</th>
                                                <th>Keterangan</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th style="text-align: left;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        if($cetak) : foreach ($cetak as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data->tgl_pengajuan; ?></td>
                                                <td><?php echo $data->no_pengajuan; ?></td>
                                                <td><?php echo $data->nik; ?></td>
                                                <td><?php echo $data->keterangan; ?></td>
                                                <td><?php echo rupiah($data->harga); ?></td>
                                                <td><?php 
                                                    if($data->status == 4)
                                                    {
                                                        echo 'Ready to Cashout';
                                                    }
                                                ?></td>
                                                <?php echo form_open() ?>
                                                <td style="text-align: center;">
                                                        <?php echo form_hidden('no_pengajuan', $data->no_pengajuan) ?>
                                                        <button type="submit" name="submit" value="print" class="btn-primary fa fa-print"></button>
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