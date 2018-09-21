	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
						<span class="login100-form-title">
							Sign In 
							Information System of BMAP
						</span>
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

						<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
							<input class="input100" type="text" name="username" placeholder="Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Please enter password">
							<input class="input100" type="password" name="password" placeholder="Password">
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
									Sign in
								</button>
							</div>
					<?php echo form_close() ?>

						<div class="flex-col-c p-t-170 p-b-40">
							<span class="txt1 p-b-9">
								Don’t have an account?
							</span>

							<a href="<?php echo base_url('signup/index') ?>" class="txt3">
								Sign up now
							</a>
						</div>
				</div>
			</div>
		</div>
	</div>
	
