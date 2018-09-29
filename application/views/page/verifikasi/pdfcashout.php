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
    table {
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
                            <h3 style="text-align:center;">Bukti Penerimaan Dana</h3>
                            <!-- <h6 class="card-subtitle">Untuk menambah dan mengedit user</h6> -->
                            <div class="table">
                                <table class="table" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>No Bukti Pengajuan</td>
                                            <td>:</td>
                                            <td style="border-bottom: 1px solid #9479ff;padding-bottom:0px;"><?php echo $cetak['no_bukti']; ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pengajuan</td>
                                            <td>:</td>
                                            <td style="border-bottom: 1px solid #9479ff;padding-bottom:0px;"><?php echo $cetak['date']; ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penerima</td>
                                            <td>:</td>
                                            <td style="border-bottom: 1px solid #9479ff;padding-bottom:0px;"><?php echo $cetak['nama_lengkap'].'('.$cetak['nik'].')'; ?></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>Total Dana yang Diterima</td>
                                            <td>:</td>
                                            <td style="border-bottom: 1px solid #9479ff;padding-bottom:0px;background-color:lightgrey;"><?php echo rupiah($cetak['kredit']); ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right;"><p><?php echo date('d F Y'); ?></p></td>
                                            <td></td>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <td style="text-align:center;">Penerima</td>
                                            <td></td>
                                            <td style="text-align:center;">Pemberi Dana</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <td style="text-align:center;">(<?php echo $cetak['nama_lengkap']; ?>)</td>
                                            <td></td>
                                            <td style="text-align:center;">(Cashier)</td>
                                            <td></td>
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