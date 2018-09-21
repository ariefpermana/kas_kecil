<h3><p>Data Barang</p></h3>
<br>
<?php if($this->session->flashdata('success')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
    <?php elseif($this->session->flashdata('failed')): ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
    <?php endif; ?>
    
    <?php if(validation_errors()): ?>
        <ul class="alert alert-danger">
            <?php echo validation_errors('<li>', '</li>') ?>
        </ul>
    <?php endif; ?>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr style="background-color: rgba(231, 132, 116, 1);">
      <th class="th-sm">No.
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Nama Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Kualitas Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Jumlah Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Fisik Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Action
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    if($barang) : foreach($barang as $waitings => $data) :
  ?>
    <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $data->nama_barang; ?></td>
      <td><?php echo $data->quality_barang; ?></td>
      <td><?php echo $data->jumlah_barang; ?></td>
      <td style="text-align: center;"><img src="<?php echo base_url() ?>img/<?php echo $data->gambar_barang ?>" alt="" style="width: 100px;"></td>
        <td style="text-align: center;">
          <?php echo form_open() ?>
          <button type="submit" name="submit" value="<?php echo $data->id_barang; ?>" class="btn btn-primary fa fa-edit"></button>
          <?php  echo form_close() ?>
        </td>
    </tr>

  <?php endforeach;endif;  ?>
  </tbody>
</table>