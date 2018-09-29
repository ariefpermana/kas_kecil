<!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
        <br>
            <?php if($this->session->flashdata('success')): ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
            <?php endif; ?>
            <?php if($this->session->flashdata('failed')): ?>
                <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
            <?php endif; ?>
            <?php if(validation_errors()): ?>
                <ul class="alert alert-danger">
                    <?php echo validation_errors('<li>', '</li>') ?>
                </ul>
            <?php endif; ?>
            
                    <div class="col-12">
                        <div class="card" style="font-family: Arial, Helvetica, sans-serif;background-color:#f6a623;">
                            <div class="card-body" style="text-align:center;">
                            <img src="<?php echo base_url() ?>img/logo_header.png" alt="">
                            <h3><p style="color:white;">PT. AZZAHRA TRANS UTAMA</p></h3>
                            <br>
                            <h2><p class="top-profile">PROFILE</p></h2>
                            <p class="profile">PT. AZZAHRA TRANS UTAMA (ATU) didirikan pada 20 APRIL 2015 yang bergerak khusus dalam pengadaan Jasa Alih Daya (Outsourcing).</p>

                             <p class="profile">PT. AZZAHRA TRANS UTAMA berdiri sebagai respon atas kebutuhan
                            perusahaan-perusahaan akan pengadaan Jasa Alih Daya yang memiliki
                            Standar Mutu yang berkualitas.</p>

                             <p class="profile">PT. AZZAHRA TRANS UTAMA, perusahaan pengelola Sumber Daya Manusia
                            menjadi mediator yang handal dalam mempertemukan dua kepentingan yang saling membutuhkan antara Pemberi Kerja dengan Pencari Kerja.
                            Titik temu antar keduanya dikelola secara baik dan benar serta profesional sehingga dapat memberikan keuntungan dan kepuasan berlipat bagi keduanya.</p>

                             <p class="profile">Dengan prinsip mengutamakan kualitas yang ditunjang oleh SDM
                            yang profesional serta perbaikan-perbaikan yang berkesinambungan
                            PT. AZZAHRA TRANS UTAMA akan senantiasa berusaha memberikan
                            pelayanan yang memuaskan bagi pelanggan.</p>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
