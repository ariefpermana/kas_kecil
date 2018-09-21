
<div class="row" style="padding-left:20px;">
    <div class="row">
        <h1>List Barang</h1>
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>

        <?php elseif($this->session->flashdata('failed')): ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('failed'); ?>
            </div>
        <?php endif; ?>
        
        <?php if(validation_errors()): ?>
        <ul class="alert alert-danger">
            <?php echo validation_errors('<li>', '</li>') ?>
        </ul>
        <?php endif; ?>
        
        <div class="container" style="margin-bottom: 30px;margin-top: 50px;">
            <?php 
                echo form_open('barang/search');

                echo "Search By Nama Barang ". form_input('cari');

                echo form_submit('search_submit','Submit');

            ?>
            
            <a href="<?php echo site_url('barang') ?>" class="btn btn-danger" style="height: 26px;padding-top: 2px;margin-top: 3px;">Clear</a>

            <?php echo form_close(); ?>
        </div>
    </div>
    <?php echo form_open() ?>

        <!-- data Barang -->
        <?php if($barang) : foreach($barang as $detail): ?>
            <div class="col-sm-2 col-lg-3 col-md-3">
                <div class="thumbnail" style="height:370px;width:250px;">
                    <input type="checkbox" name="checklist[]" value="<?php echo $detail->id_barang; ?>" class="custom-control-input">
                    <img src="<?php echo base_url() ?>img/<?php echo $detail->gambar_barang ?>" alt="">
                    <div class="caption">
                        <h4><?php echo $detail->nama_barang ?></h4>
                        <h5>Quality  : <?php echo $detail->quality_barang ?></h5>
                        <h5>Quantity : <?php echo $detail->jumlah_barang ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>

    <div class="row">
        <div class="col-md-6">
          <?php echo $pagination ?>
        </div>
    </div>

</div>
    <?php if($this->session->userdata('privilege') == 0) : ?>
        <button name="submit" value="waiting" class="btn btn-warning mb-2">Waiting List</button>
    <?php endif; ?>
        <button name="submit" value="submit" class="btn btn-success mb-2">Submit</button>
    <?php echo form_close() ?>

