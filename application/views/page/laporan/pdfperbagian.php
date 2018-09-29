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
                            <h3 style="text-align:center;">Laporan Pengeluaran Dana Karyawan Perbagian</h3>
                            <p>Tanggal Laporan : <?php echo date('d F Y');?></p>
                            <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                            <div class="table">
                                <table class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr style="background-color:#9479ff;">
                                            <th>No.</th>
                                            <th>Bagian</th>
                                            <th>No. Bukti Pengajuan</th>
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
                                            <td><?php echo $dept[$data->kode_dept]['dept']; ?></td>
                                            <td><?php if(isset($data->no_bukti)) echo $data->no_bukti; ?></td>
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
                                            <td>Total</td>
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
    </body>
</html>