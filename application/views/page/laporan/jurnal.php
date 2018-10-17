 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Laporan Jurnal Pengeluaran Dana Karyawan</h1>
                                <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                                <br>
                                <br>
                                <?php echo form_open() ?>
                                <div class="row">
                                    <div class="col-md-12">
                                         <div class="form-group" style="text-align:right;margin-bottom:5px;">
                                            
                                            <button type="submit" name="submit" value="print" class="btn btn-info" style="font-color:white;"><i class="fa fa-print"></i> print</button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close() ?>

                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>No. Bukti Pengajuan</th>
                                                <th>No. Akun</th>
                                                <th>Keterangan</th>
                                                <th>Debet</th>
                                                <th>Kredit</th>
                                                <th>Saldo</th>
                                            </tr>  
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        if($saldo) : foreach ($saldo as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php if(isset($data->date)) echo $data->date; ?></td>
                                                <td><?php if(isset($data->no_bukti)) echo $data->no_bukti; ?></td>
                                                <td><?php if(isset($data->no_akun)) echo $data->no_akun; ?></td>
                                                <td><?php if(isset($data->keterangan)) echo $data->keterangan; ?></td>
                                                <td><?php if(isset($data->debet)) echo rupiah($data->debet); ?></td>
                                                <td><?php if(isset($data->kredit)) echo rupiah($data->kredit); ?></td>
                                                <td><?php if(isset($data->saldo)) echo rupiah($data->saldo); ?></td>
                                            </tr>
                                        <?php endforeach;endif; ?>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th>Total</th>
                                                <th><?php if(isset($totdebet)) echo rupiah($totdebet); ?></th>
                                                <th><?php if(isset($totkredit)) echo rupiah($totkredit); ?></th>
                                                <th><?php if(isset($totsaldo)) echo rupiah($totsaldo); ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>