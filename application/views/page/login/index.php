
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form" style="padding-top: 0px;padding-bottom: 0px; font-size: 14px;">
	                            <div style="text-align: center;">
	                            	<img widht="150" height="100" src="<?php base_url() ?>img/logo_header.png" alt="">
	                            </div>
                                <h4 style="margin-bottom:30px;">PT AZZAHRA TRANS UTAMA</h4>
                                <!-- Alert Validation form -->
				                <?php if($this->session->flashdata('failed')): ?>
				                    <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
				                <?php endif; ?>
				                <?php if(validation_errors()): ?>
				                    <ul class="alert alert-danger">
				                        <?php echo validation_errors('<li>', '</li>') ?>
				                    </ul>
				                <?php endif; ?>

								<?php echo form_open() ?>
                                    <div class="form-group">
                                        <!-- <label>NIK</label> -->
                                        <input name="nik" type="username" class="form-control" placeholder="NIK" required>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label>Password</label> -->
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                      <!--   <label>
        										<input type="checkbox"> Remember Me
        									</label> -->
                                      <!--   <label class="pull-right">
        										<a href="#">Forgotten Password?</a>
        									</label> -->

                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                   <!--  <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                    </div> -->
								<?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>