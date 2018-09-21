    <div class="limiter">
        <div class="container-login100" background="<?php echo base_url('img/') ?>perbanasback.png">
            <div class="wrap-login100">
                    <div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                        <span class="login100-form-title">
                            Sign Up to 
                            information System of BMAP
                        </span>
                         <!-- Alert Validation form -->
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

                    <?php echo form_open() ?>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter name">
                            <input class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please enter No. Handphone">
                            <input class="input100" type="text" name="nocontact" placeholder="Contact">
                            <span class="focus-input100"></span>
                        </div>

                         <div class="wrap-input100 validate-input" data-validate = "Please enter correct Email">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>

                         <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Please confirm password">
                            <input class="input100" type="password" name="konfirmasi_pass" placeholder="Password Confirm">
                            <span class="focus-input100"></span>
                        </div>

                        <!-- <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Forgot
                            </span>

                            <a href="#" class="txt2">
                                Username / Password?
                            </a>
                        </div> -->
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn">
                                    Sign Up
                                </button>
                            </div>
                            <br>
                            <br>
                            <br>

                    <?php echo form_close() ?>
                       <div class="container" style="text-align: center;">
                            <a href="<?php echo base_url('login') ?>" class="btn" name="backbtn" style="font-size: 33px;"> 
                            <i class="fa fa-angle-double-left" style="font-size:36px;"> <p style="font-family: Ubuntu-Bold">Back</p></i>
                        </a>
                       </div>
                       

                        <div class="flex-col-c p-t-20 p-b-20">
                        </div>
                </div>
            </div>
        </div>
    </div>