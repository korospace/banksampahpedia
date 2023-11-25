<?= $this->extend('Layout/template') ?>

<!-- Css -->
<?= $this->section('contentCss'); ?>
	<style>
		/* switch */
		#toggle-switch-wraper{
			color: #7B838A;
			font-weight: lighter;
			font-size: 0.8rem;
			height: 40px;
			border-radius: 8px;
		}

		#toggle-switch-wraper .switch-section{
			cursor: pointer;
		}

		#toggle-switch-wraper .toggle-switch{
				transition: all 0.3s;
			}

		#toggle-switch-wraper .toggle-switch{
			color: #fff;
			background-color: #8EA633;
			width: 160px;
			height: 34px;
			border-radius: 7px;
		}

		.register-left .wraper_logo {
			width: 110px;
			background-color: #fff;
			border-radius: 10px;
			padding: 15px 15px 20px 15px;
		}

		.register-left img {
			width: 100%;
			/* -webkit-animation: mover 2s infinite alternate;
			animation: mover 1s infinite alternate; */
		}

		.btnRegister {
			background: #537629;
			color: #fff;
		}

		.btnRegister:hover {
			background: #c1d966;
			color: #537629;
		}
		
		.register .nav-tabs .nav-link {
			height: 34px;
			font-weight: 600;
			color: #fff;
			border-top-right-radius: 1.5rem;
			border-bottom-right-radius: 1.5rem;
		}

		.register .nav-tabs .nav-link:hover {
			border: none;
		}

		.register .nav-tabs .nav-link.active {
			width: 100px;
			color: #537629;
			border: 2px solid #537629;
			border-top-left-radius: 1.5rem;
			border-bottom-left-radius: 1.5rem;
		}

		@media (max-width:768px) {
			.register-left div {
				display: none;
			}
		} 

		@-webkit-keyframes mover {
			0% {
				transform: translateY(0);
			}

			100% {
				transform: translateY(-20px);
			}
		}

		@keyframes mover {
			0% {
				transform: translateY(0);
			}

			100% {
				transform: translateY(-20px);
			}
		}
	</style>
  	<!-- ** develoment ** -->
	<!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> -->
	<!-- ** production ** -->
	<link rel="stylesheet" href="<?= base_url('assets/css/purge/bootstrap/login.css'); ?>">
<?= $this->endSection(); ?>

<!-- JS -->
<?= $this->section('contentJs'); ?>
	<script>
		const LASTURL = '<?= $lasturl; ?>';
	</script>
  	<!-- ** develoment ** -->
	<script src="<?= base_url('assets/js/login.js'); ?>"></script>
	<!-- ** production ** -->
	<!-- <script src="<?= base_url('assets/js/login.min.js'); ?>"></script> -->
<?= $this->endSection(); ?>

<!-- Html -->
<?= $this->section('content'); ?>

	<!-- **** Loading Spinner **** -->
	<?= $this->include('Components/loadingSpinner'); ?>
	<!-- **** Alert Info **** -->
	<?= $this->include('Components/alertInfo'); ?>

	<div 
	  class="register-wraper container-fluid d-flex justify-content-center align-items-center p-0 p-md-5"
	  style="height: 100vh;">
		<div 
		  class="container register w-100 h-100 py-4 px-4"
		  style="background: -webkit-linear-gradient(left, #577b2b, #c1d966);">
			<div class="row h-100">

				<!-- side left -->
				<div class="register-left col-md-4 d-flex flex-column justify-content-center align-items-center text-white text-center">
					<div class="mt-0 wraper_logo">
						<img  
						  src="<?= base_url('assets/images/banksampah-logo.webp'); ?>" 
						  alt="logo banksampah dahlia" />
					</div>
					<div class="mt-3">
						<h3>Selamat Datang Kembali</h3>
						<p>Silahkan Login Untuk Ketampilan Dashboard</p>
					</div>
					<p class="mt-2 mt-md-4">
						Belum Memiliki Akun? <br> 
						<a style="color: #c1d966;" href="<?= base_url('register');?>">Daftar</a> | 
						<a style="color: #c1d966;" href="<?= base_url('/');?>">Home</a>
					</p>
				</div>

				<!-- side right -->
				<div 
				  class="register-right col-md-8 d-flex justify-content-center align-items-center mt-md-0"
				  style="background: #f8f9fa;border-top-left-radius: 10% 50%;border-bottom-left-radius: 10% 50%;">

				  <div id="nasabah" class="tab-pane fade show active pt-4 w-100" role="tabpanel" aria-labelledby="nasabah-tab">
						<!-- Switch -->
						<h3 class="register-heading text-center mb-4" style="color: #495057;">
							Masuk Sebagai
						</h3>
						<div class="row mb-4" style="display: flex;justify-content: center;">
							<div id="toggle-switch-wraper" class="position-relative p-0 d-flex align-items-center text-xxs" style="overflow: hidden;width: 320px;box-shadow: inset 0 0 4px 0px rgba(0, 0, 0, 0.4);">
								<div class="toggle-switch position-absolute d-flex justify-content-center align-items-center bg-success opacity-7 text-white" data-color="success" style="z-index: 10;left: 2px;">nasabah</div>
		
								<div class="switch-section h-100 d-flex justify-content-center align-items-center cursor-pointer position-relative" data-toggle="nasabah" style="flex: 1;z-index: 9;border-radius: 10px;">nasabah</div>
								<div class="switch-section h-100 d-flex justify-content-center align-items-center cursor-pointer position-relative opacity-0" data-toggle="banksampah" style="flex: 1;z-index: 9;border-radius: 10px;">pengelola</div>
							</div>
	
							<input type="hidden" id="data_toggle" name="data_toggle">
						</div>
						<form id="formLoginNasabah" class="register-form row pt-3 px-5">
							<div class="col-md-12">
								<div class="form-group position-relative px-0 px-md-5">
									<input id="username-or-email" type="text" name="username_or_email" class="form-control" placeholder="Username/email" autocomplete="off" />
									<small id="username-or-email-error" class="position-absolute text-danger"></small>
								</div>
								<div class="form-group position-relative px-0 px-md-5" style="margin-top: 30px;">
									<input id="password" type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" />
									<small id="password-error" class="position-absolute text-danger"></small>
								</div>
							</div>
							<div class="col d-flex flex-column justify-content-center align-items-center" style="margin-top: 60px;">
								<button 
								  class="btnRegister w-75 py-3 border-0 border-radius-lg" 
								  style="max-width: 374px;max-height: 54px;border-radius: 1.5rem;cursor: pointer;background-color: #628531;">
									  Login</button>
								<a id="btn-forgotpass" class="mt-3 text-secondary" href="">lupa password?</a>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>