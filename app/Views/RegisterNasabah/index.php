<?= $this->extend('Layout/template') ?>

<!-- Css -->
<?= $this->section('contentCss'); ?>
    <style>
      /* left side */
      @media (max-width:768px) {
        #img-phone {
          display: none;
        }
      } 

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

      /* form */
      #formRegister #description-regist{
        height: 200px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
      }

      #formRegister #preview-logo{
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        width: 150px;
      }

      .form-control::placeholder {
        color: #ccc;
        font-weight: lighter;
        font-size: 0.9rem;
      }

      #search-kodepos::placeholder {
        color: #ccc;
        font-weight: lighter;
        font-size: 14px;
      }

      .kodepos-list.active{
        background-color: #E9ECEF !important;
      }
    </style>
  	<!-- ** develoment ** -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> -->
    <!-- ** production ** -->
	  <link rel="stylesheet" href="<?= base_url('assets/css/purge/bootstrap/signup.css'); ?>">
<?= $this->endSection(); ?>

<!-- JS -->
<?= $this->section('contentJs'); ?>
  	<script src="<?= base_url('assets/js/plugins/font-awesome.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/nikparse.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/registerNasabah.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/js/registerNasabah.min.js'); ?>"></script> -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

  <!-- **** Loading Spinner **** -->
  <?= $this->include('Components/loadingSpinner'); ?>
  <!-- **** Alert Info **** -->
  <?= $this->include('Components/alertInfo'); ?>

  <div class="container">
    <div class="row py-5 mt-4 align-items-center">

      <!-- **** side left **** -->
      <div id="left_side" class="col-md-5 pr-lg-5 mb-5 mb-md-0 text-center">
        <img 
          id="img-phone"
          src="<?= base_url('assets/images/left-image.webp'); ?>" 
          alt="banksampah budiluhur apk" class="img-fluid mb-3" />
        <h1>Buat Akun Nasabah</h1>
        <p class="font-italic text-muted mb-0">
          Mari bergabung bersama kami demi lingkungan yang lebih baik
        </p>
      </div>

      <!-- **** right left **** -->
      <div class="col-md-7 col-lg-6 ml-auto">
        <form id="formRegister">
          <!-- Switch -->
          <div class="row" style="display: flex;justify-content: center;margin-bottom: 80px;">
            <div id="toggle-switch-wraper" class="position-relative p-0 d-flex align-items-center text-xxs" style="overflow: hidden;width: 320px;box-shadow: inset 0 0 4px 0px rgba(0, 0, 0, 0.4);">
              <div class="toggle-switch position-absolute d-flex justify-content-center align-items-center bg-success opacity-7 text-white" data-color="success" style="z-index: 10;left: 2px;">nasabah</div>

              <div class="switch-section h-100 d-flex justify-content-center align-items-center cursor-pointer position-relative" data-toggle="nasabah" style="flex: 1;z-index: 9;border-radius: 10px;">nasabah</div>
              <div class="switch-section h-100 d-flex justify-content-center align-items-center cursor-pointer position-relative opacity-0" data-toggle="banksampah" style="flex: 1;z-index: 9;border-radius: 10px;">pengelola</div>
            </div>

            <input type="hidden" id="data_toggle" name="data_toggle">
          </div>

          <div class="row">
            <!-- **** logo preview **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_banksampah">
						  <img src="<?= base_url('assets/images/default-logo.webp'); ?>" alt="logo" id="preview-logo" class="img-thumbnail" style="width: 150px;height: 150px;">
            </div>

            <!-- **** input logo **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_banksampah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fa fa-image text-muted"></i>
                  </span>
                </div>
						    <input type="file" class="form-control mt-1" id="logo-regist" name="logo" style="min-height: 40px;" autocomplete="off" placeholder="logo banksampah" onchange="changeThumbPreview(this);">
              </div>
              <small id="logo-regist-error" class="text-danger"></small>
            </div>

            <!-- <div class="col-lg-12 form-group mb-4 form-group only_for_banksampah">
              <i class="far fa-image text-muted"></i>
              <h6 class="text-muted" style="display:inline;">Logo</h6>
              <input type="file" class="form-control" id="logo" name="logo" autocomplete="off" style="min-height: 40px;margin-top: 10px;" placeholder="logo banksampah" onchange="changeThumbPreview(this);">
              <small id="logo-error" class="text-danger"></small>
            </div> -->

            <!-- **** nama lengkap **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fa fa-user text-muted"></i>
                  </span>
                </div>
                <input id="nama-regist" type="text" class="form-control pb-4 pt-4" name="nama_lengkap" autocomplete="off" placeholder="Masukan nama lengkap">
              </div>
              <small id="nama-regist-error" class="text-danger"></small>
            </div>

            <!-- **** nama bank sampah **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_banksampah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fa fa-home text-muted"></i>
                  </span>
                </div>
                <input id="nama_banksampah-regist" type="text" class="form-control pb-4 pt-4" name="nama_banksampah" autocomplete="off" placeholder="Masukan nama bank sampah">
              </div>
              <small id="nama_banksampah-regist-error" class="text-danger"></small>
            </div>

            <!-- **** email **** -->
            <div class="input-group col-lg-12 mb-4 form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fa fa-envelope text-muted"></i>
                  </span>
                </div>
                <input id="email-regist" type="text" class="form-control pb-4 pt-4" name="email" autocomplete="off" placeholder="Masukan email">
              </div>
              <small id="email-regist-error" class="text-danger"></small>
            </div>

            <!-- **** username **** -->
            <div class="input-group col-lg-12 mb-4 form-group">
              <div class="input-group">
                <div class="input-group-prepend" style="max-width: 64px;">
                  <span 
                   class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fas fa-at text-muted"></i>
                  </span>
                </div>
                <input id="username-regist" type="text" class="form-control pb-4 pt-4" name="username" autocomplete="off" placeholder="Masukan username">
              </div>
              <small id="username-regist-error" class="text-danger"></small>
            </div>

            <!-- **** password **** -->
            <div class="input-group col-lg-12 mb-4 form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fa fa-lock text-muted"></i>
                  </span>
                </div>
                <input id="password-regist" type="password" class="form-control pb-4 pt-4" name="password" autocomplete="off" placeholder="Masukan password">
              </div>
              <small id="password-regist-error" class="text-danger"></small>
            </div>

            <!-- **** no telp **** -->
            <div class="input-group col-lg-12 mb-4 form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;">
                      <i class="fa fa-phone-square"></i>
                  </span>
                </div>
                <input id="notelp-regist" type="text" class="form-control pb-4 pt-4" name="notelp" autocomplete="off" placeholder="Masukan no.telp">
              </div>
              <small id="notelp-regist-error" class="text-danger"></small>
            </div>

            <!-- **** NIK **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;">
                      <i class="fa fa-id-card"></i>
                  </span>
                </div>
                <input id="nik-regist" type="text" class="form-control pb-4 pt-4" name="nik" autocomplete="off" placeholder="Masukan Nomor induk KTP">
              </div>
              <small id="nik-regist-error" class="text-danger"></small>
            </div>

            <!-- **** tgl lahir **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
                <input id="tgllahir-regist" type="date" class="form-control h-100 pb-3 pt-3" name="tgl_lahir" style="max-height: 50px;">
              </div>
              <small id="tgllahir-regist-error" class="text-danger"></small>
            </div>

            <!-- **** kelamin laki **** -->
            <div class="input-group col-lg-6 mb-4 form-group only_for_nasabah">
              <div class="form-check">
                <input id="kelamin-laki" class="form-check-input" type="radio" name="kelamin" value="laki-laki" />
                <label class="form-check-label" for="kelamin-laki">
                  Laki Laki
                </label>
              </div>
            </div>

            <!-- **** kelamin perempuan **** -->
            <div class="input-group col-lg-6 mb-4 form-group only_for_nasabah">
              <div class="form-check">
                <input id="kelamin-perempuan" class="form-check-input" type="radio" name="kelamin" value="perempuan" />
                <label class="form-check-label" for="kelamin-perempuan">
                  Perempuan
                </label>
              </div>
            </div>

            <!-- **** RT **** -->
            <div class="input-group col-lg-6 mb-4 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="max-height: 50px;max-width: 62px;border-width: 2px;">
                      <i class="fas fa-home"></i>
                  </span>
                </div>
                <input id="rt-regist" type="text" class="form-control pb-4 pt-4" name="rt" autocomplete="off" placeholder="RT: 01">
              </div>
              <small id="rt-regist-error" class="text-danger"></small>
            </div>

            <!-- **** RW **** -->
            <div class="input-group col-lg-6 mb-4 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="max-height: 50px;max-width: 62px;border-width: 2px;">
                      <i class="fas fa-home"></i>
                  </span>
                </div>
                <input id="rw-regist" type="text" class="form-control pb-4 pt-4" name="rw" autocomplete="off" placeholder="RW: 01">
              </div>
              <small id="rw-regist-error" class="text-danger"></small>
            </div>

            <!-- **** alamat **** -->
            <div class="input-group col-lg-12 mb-4 form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;">
                      <i class="fas fa-map-marker-alt"></i>
                  </span>
                </div>
                <input id="alamat-regist" type="text" class="form-control pb-4 pt-4" name="alamat" autocomplete="off" placeholder="Masukan alamat lengkap">
              </div>
              <small id="alamat-regist-error" class="text-danger"></small>
            </div>

            <!-- **** deskripsi bank sampah **** -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_banksampah">
              <div class="input-group">
                <textarea id="description-regist" name="description" class="form-control" placeholder="Masukan deskripsi tentang banksampah anda"></textarea>
              </div>
              <small id="description-regist-error" class="text-danger"></small>
            </div>

            <!-- **** CODE POS **** -->
            <!-- <div class="input-group col-lg-12 mb-3 form-group only_for_nasabah">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span 
                    class="input-group-text bg-gray px-4 border-md border-right-0" style="border-width: 2px;max-width: 62px;">
                      <i class="fas fa-mail-bulk text-muted"></i>
                  </span>
                </div>
                <input id="kodepos-regist" type="text" class="form-control pb-4 pt-4" name="kodepos" autocomplete="off" placeholder="KODE POS (pilih kodepos dibawah)" disabled>
              </div>
              <small id="kodepos-regist-error" class="text-danger"></small>
            </div> -->

            <!-- LIST kodepos -->
  					<div class="input-group col-lg-12 mb-4 form-group only_for_nasabah mt-4" style="display: flex;align-items: center;justify-content: center;position: relative;">
              <div style="border-bottom: 2px solid #7B838A;width: 100%;"></div>
              <p style="padding: 0 10px;background-color: white;position: absolute;bottom: -25px;color: #7B838A;">Kode Post</p>
            </div>

            <input type="hidden" name="kodepos" id="kodepos-regist" class="only_for_nasabah">
            <input type="hidden" name="kelurahan" class="only_for_nasabah">
            <input type="hidden" name="kecamatan" class="only_for_nasabah">
            <input type="hidden" name="kota" class="only_for_nasabah">
            <input type="hidden" name="provinsi" class="only_for_nasabah">
            <div class="input-group col-lg-12 mb-4 mt-4 form-group only_for_nasabah">
              <div class="container-fluid border-radius-sm p-2" style="border: 0.5px solid #D2D6DA;">
                <!-- header -->
                <div class="add-item container-fluid input-group mb-2 d-flex p-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text d-flex justify-content-center p-0 bg-gray border-md border-right-0" style="width: 52px;max-height: 39px;">
                      <i class="fas fa-search text-muted"></i>
                    </span>
                  </div>
                  <input id="search-kodepos" type="text" class="form-control px-2 text-xxs border-radius-sm" placeholder="ketik provinsi/kota/kecamatan/kelurahan" style="max-height: 30px;border: 0.5px solid #D2D6DA;" autocomplete="off" onkeyup="searchKodepos(this);">
                </div>
                <!-- body -->
                <div id="kodepos-wraper" class="container-fluid border-radius-sm p-0 position-relative" style="min-height: 150px;max-height: 150px;overflow: auto;border: 0.5px solid #D2D6DA;">
                  
                </div>
              </div>
            </div>

            <!-- Bank Sampah -->
            <div class="input-group col-lg-12 mb-4 form-group only_for_nasabah mt-4" style="display: flex;align-items: center;justify-content: center;position: relative;">
              <div style="border-bottom: 2px solid #7B838A;width: 100%;"></div>
              <p style="padding: 0 10px;background-color: white;position: absolute;bottom: -25px;color: #7B838A;">Bank Sampah</p>
            </div>

            <input type="hidden" name="id_banksampah" id="id_banksampah-regist" class="only_for_nasabah">

            <div class="input-group col-lg-12 mb-4 mt-4 form-group only_for_nasabah">
              <div class="container-fluid border-radius-sm p-2" style="border: 0.5px solid #D2D6DA;">
                <!-- header -->
                <div class="add-item container-fluid input-group mb-2 d-flex p-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text d-flex justify-content-center p-0 bg-gray border-md border-right-0" style="width: 52px;max-height: 39px;">
                      <i class="fas fa-search text-muted"></i>
                    </span>
                  </div>
                  <input id="search-banksampah" type="text" class="form-control px-2 text-xxs border-radius-sm" placeholder="cari bank sampah" style="max-height: 30px;border: 0.5px solid #D2D6DA;" autocomplete="off" onkeyup="searchBanksampah(this);">
                </div>
                <!-- body -->
                <div id="banksampah-wraper" class="container-fluid border-radius-sm p-0 position-relative" style="min-height: 150px;max-height: 150px;overflow: auto;border: 0.5px solid #D2D6DA;">
                  
                </div>
              </div>
            </div>

            <!-- **** BUTTON **** -->
            <div class="form-group col-lg-12 mx-auto mb-0">
              <button type="submit" class="btn btn-success btn-block py-2 btn-costum border-0" style="background: #8EA633;">
                <span class="font-weight-bold">Buat Akun</span>
              </button>
            </div>
            <div class="text-center w-100 mt-4">
              <p class="text-muted font-weight-bold">
                Apakah Sudah Memiliki Akun? 
                <a href="login" class="text-primary ml-2">Login</a>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection(); ?>