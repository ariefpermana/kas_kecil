<h3><p>Status Peminjaman Barang</p></h3>
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
      <!-- <?php// if($this->session->userdata('privilege') == 1 || $this->session->userdata('privilege') == 3) : ?> -->
      <th class="th-sm">Action
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    <?php //endif; ?>
    </tr>
  </thead>
 <!-- <?php $i = 1; ?> -->
  <tbody>
  <?php if($listPeminjaman) : foreach($listPeminjaman as $detail => $value): ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td>
      <?php 
      if(empty($value->nama_peminjam)){
        echo $value->nama; 
      }else{
        echo $value->nama_peminjam; 
      }
      ?></td>
      <td><?php echo $value->nama_barang; ?></td>
      <td><?php echo $value->jumlah_barang; ?></td>
      <td><?php echo $value->tgl_peminjaman; ?></td>
      <td><?php echo $value->tgl_pengembalian; ?></td>
      <td><a href="<?php echo base_url('uploads/'.$value->upload_doc) ?>"><?php echo $value->upload_doc; ?></a></td>
      <td>
        <?php 
         if($value->status == 2) echo 'Waiting to Approve'; 
         elseif($value->status == 3) echo 'Approved'; 
         elseif($value->status == 4) echo 'Rejected'; 
        ?>
      </td>
      <?php if(($this->session->userdata('privilege') == 3 || $this->session->userdata('privilege') == 1) && $value->status == 2) : ?>
      <td>
        <?php echo form_open() ?>
        <?php echo form_hidden('id_peminjaman', $value->id_peminjaman) ?>
          <input name="submit" type="submit" value="reject" class="btn btn-danger">
          <input name="submit" type="submit" value="approve" class="btn btn-success">
        <?php echo form_close() ?>
      </td>
      <?php else :  ?>
      <td>
        <input name="submit" type="submit" value="reject" class="btn btn-danger" disabled="true">
        <input name="submit" type="submit" value="approve" class="btn btn-success" disabled="true">
      </td>
    <?php endif; ?>
    </tr>
  <?php endforeach;endif; ?>
  </tbody>
</table>