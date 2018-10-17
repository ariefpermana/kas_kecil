 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Laporan Pengeluaran Dana Karyawan Perbagian</h1>
                                <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                                <br>
                                <br>
                                <?php echo form_open() ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group" style="margin-bottom:0px;">
                                            <label class="control-label">Pilih Bagian</label>
                                            <select class="form-control" name="bagian">
                                             <option value="0">Silahkan Pilih Bagian ...</option>
                                                <?php foreach ($bagian as $key => $value) : ?>
                                                    <?php if($kode_dept == $value->kode_department) { ?>
                                                        <option value="<?php echo $kode_dept; ?>" selected><?php echo $value->dept; ?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $value->kode_department; ?>"><?php echo $value->dept; ?></option>
                                                <?php } endforeach; ?>
                                            </select>
                                            
                                        </div> 
                                        <br>
                                        
                                    </div>  
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
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
                                                <th>Bagian</th>
                                                <th>No. Bukti Pengajuan</th>
                                                <th>No. Akun</th>
                                                <th>Keterangan</th>
                                                <th>Harga</th>
                                            </tr>  
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        if($saldo) : foreach ($saldo as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php if(isset($data->date)) echo $data->date; ?></td>
                                                <td><?php echo $dept[$data->kode_dept]['dept']; ?></td>
                                                <td><?php if(isset($data->no_bukti)) echo $data->no_bukti; ?></td>
                                                <td><?php if(isset($data->no_akun)) echo $data->no_akun; ?></td>
                                                <td><?php if(isset($data->keterangan)) echo $data->keterangan; ?></td>
                                                <td><?php if(isset($data->kredit)) echo rupiah($data->kredit); ?></td>
                                            </tr>
                                        <?php endforeach;endif; ?>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <tH>Total</tH>
                                                <th><?php if(isset($total)) echo rupiah($total); ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>