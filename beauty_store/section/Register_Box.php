




<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						<form class="row login_form"  id="register_form"  role="form"  method="post">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="fname" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="Lname" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
							<div class="col-md-12 form-group">
								
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="Register"  class="button button-register w-100">Register</button>
							</div>
							<div id="add_err2"><?php echo $message ?></div>                                

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>