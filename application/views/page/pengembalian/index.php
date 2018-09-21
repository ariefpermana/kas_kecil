<h3><p>Laporan Peminjaman Barang</p></h3>
<br>
<?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>

        <?php elseif($this->session->flashdata('failed')): ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('failed'); ?>
            </div>
        <?php endif; ?>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr style="background-color: rgba(231, 132, 116, 1);">
      <th class="th-sm">No.
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Nama Peminjam
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Nama Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Jumlah
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Tanggal Peminjaman
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Tanggal Pengembalian
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Dokumen Pendukung
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Status
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
 <?php $i = 1; ?>
  <tbody>
   <?php if($laporan) : foreach($laporan as $detail => $value): ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php if($value->nama_peminjam == NULL){
        echo $value->nama;
      }else{
            echo $value->nama_peminjam; 
      }?></td>
      <td><?php echo $value->nama_barang; ?></td>
      <td><?php echo $value->jumlah_barang; ?></td>
      <td><?php echo $value->tgl_peminjaman; ?></td>
      <td><?php echo $value->tgl_pengembalian; ?></td>
      <td><a href="<?php echo base_url('uploads/'.$value->upload_doc) ?>"><?php echo $value->upload_doc; ?></a></td>
      <td>
        <?php 
         if($value->status == 1) echo 'Waiting to Approve (Kaprodi or Kemahasiswaan)'; 
         elseif($value->status == 2) echo 'Waiting to Approve (BMAP)'; 
         elseif($value->status == 3) echo 'Approved'; 
         elseif($value->status == 4) echo 'Rejected'; 
         elseif($value->status == 5) echo 'Reject Other Priority'; 
         else echo 'Waiting List'
        ?>
      </td>
    </tr>
  <?php endforeach;endif; ?>
  </tbody>
</table>