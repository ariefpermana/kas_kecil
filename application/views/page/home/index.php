<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('<?php echo base_url('img/perbanasbackori.jpeg'); ?>');">
      <div class="overlay"></div>
    </div>

    <!-- home wrapper -->
    <div class="home-wrapper">
      <div class="container">
        <div class="row">

          <!-- home content -->
          <div class="col-md-10 col-md-offset-1">
            <div class="home-content">
              <h1 class="white-text">Welcome To Information System of BMAP</h1>
              <p class="white-text">To borrow items to the BMAP please login first, click the button bellow
              </p>
              <?php echo form_open() ?>
              <button name="submit" value="submit" class="main-btn">Login</button>
              <?php echo form_close() ?>
          </div>
          <!-- /home content -->

        </div>
      </div>
    </div>
    <!-- /home wrapper -->

</header>