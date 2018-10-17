 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- Bootstrap Core CSS -->
   
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;    
    }

    .column {
      float: left;
      /*padding: 10px;*/
    }

    /* Clear floats after the columns */
</style>
</head>
 <!-- Container fluid  -->
    <body>
        <div class="container-fluid">
       
        <hr style="height:2px;background-color:black;margin:0px;">
        <hr  style="margin-top:2px;">
            <!-- Start Page Content -->
            <div class="row">
                <div class="column">
                    <div>
                        <div>
                            <h3 style="text-align:center;">Laporan Pengeluaran Dana Karyawan Bulan <?php echo $month; ?> <?php echo date('Y') ?></h3>
                            <p>Tanggal Laporan : <?php echo date('d F Y');?></p>
                            <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                        
                            <div class="table">
                                <table class="table" cellspacing="0" width="100%">
                                        <tr style="background-color:#9479ff;">
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>No. Bukti Pengajuan</th>
                                            <th>Bukti Transaksi</th>
                                            <th>No. Akun</th>
                                            <th>Keterangan</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                        </tr>  
                                    
                                    <?php
                                    if($saldo) {
                                    $i = 1;
                                    foreach ($saldo as $key => $data) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php if(isset($data->date)) echo $data->date; ?></td>
                                            <td><?php if(isset($data->no_bukti)) echo $data->no_bukti; ?></td>
                                            <td><?php if(isset($data->doc_upload)) echo 'Terlampir'; ?></td>
                                            <td><?php if(isset($data->no_akun)) echo $data->no_akun; ?></td>
                                            <td><?php if(isset($data->keterangan)) echo $data->keterangan; ?></td>
                                            <td><?php if(isset($data->debet)) echo rupiah($data->debet); ?></td>
                                            <td><?php if(isset($data->kredit)) echo rupiah($data->kredit); ?></td>
                                            <td><?php if(isset($data->saldo)) echo rupiah($data->saldo); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><?php echo rupiah($totdebet); ?></td>
                                            <td><?php echo rupiah($totkredit); ?></td>
                                            <td><?php echo rupiah($totsaldo); ?></td>
                                        </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">--- No Data Available ---</td>
                                        </tr>
                                    <?php } ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>