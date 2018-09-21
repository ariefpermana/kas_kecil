<h3><p>Daftar Waiting List Barang</p></h3>
<br>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">No.
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Nama Peminjam
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Nama Barang
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Status
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i = 1;
    if($waiting) : foreach($waiting as $waitings => $data) :
  ?>
    <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $data->nama_peminjam; ?></td>
      <td><?php echo $data->nama_barang; ?></td>
      <td>
        <?php 
         if($data->status == 0) echo 'Waiting List'; 
         elseif($data->status == 1) echo 'Ready'; 
        ?>
      </td>
    </tr>
  <?php endforeach;endif; ?>
  </tbody>
</table>