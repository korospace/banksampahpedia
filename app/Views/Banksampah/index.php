<?= $this->extend('Layout/template') ?>

<!-- Css -->
<?= $this->section('contentCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/tailwind/dist/homepage.css'); ?>">

<style>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

  @font-face {
    font-family: "Montserrat", sans-serif;
  }

  * {
    font-family: "Montserrat";
  }
</style>
<?= $this->endSection(); ?>

<!-- JS -->
<?= $this->section('contentJs'); ?>
<script src="<?= base_url('assets/js/banksampah.js'); ?>"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var navbarToggle = document.querySelector('[data-collapse-toggle="navbar-default"]');
    var navbarMenu = document.getElementById('navbar-default');

    navbarToggle.addEventListener('click', function() {
      navbarMenu.classList.toggle('hidden');
    });
  });
</script>
<?= $this->endSection(); ?>

<!-- Body -->
<?= $this->section('content'); ?>

<!-- **** Loading Spinner **** -->
<?= $this->include('Components/loadingSpinner'); ?>
<!-- **** Alert info **** -->
<?= $this->include('Components/alertInfo'); ?>

<nav class="px-2 bg-white border-gray-200">
  <div class="flex flex-wrap items-center justify-between max-w-screen-xl py-6 mx-auto">
    <a href="#" class="flex items-center">
      <img src="<?= base_url('assets/images/banksampahpedia/logo.png'); ?>" class="h-8 mr-3" alt="Banksampah Logo" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
        <li>
          <a href="<?= base_url('banksampah/#beranda'); ?>" class="block py-2 pl-3 pr-4 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 " aria-current="page">Home</a>
        </li>
        <li>
          <a href="<?= base_url('banksampah/#kegiatan'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Kegiatan</a>
        </li>
        <li>
          <a href="<?= base_url('banksampah/#mitra'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Mitra</a>
        </li>
        <li>
          <a href="<?= base_url('banksampah/#penghargaan'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Penghargaan</a>
        </li>
        <li>
          <a href="<?= base_url('banksampah/#contact-us'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Contact Us</a>
        </li>
        <!--
        <li>
          <a href="<?= base_url('#pencapaian'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0">Data Sampah</a>
        </li> -->
      </ul>
    </div>
    <div class="hidden gap-4 md:flex">
      <!-- <a href="<?= base_url('login'); ?>" class="px-4 py-2 text-green-700 rounded-md bg-green-50">Masuk</a> -->
      <a href="<?= base_url('register'); ?>" class="px-4 py-2 bg-green-700 rounded-full text-green-50">Bergabung</a>
    </div>
  </div>
</nav>

<div class="mx-8 space-y-32 sm:mx-12">

  <section id="beranda">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <div class="flex flex-col place-content-center">
        <h2 class="mb-4 text-4xl font-extrabold text-gray-800">Nama Bank Sampah</h2>
        <p class="mb-6 text-gray-600">
          (Deskripsi Bank Sampah) Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Except
        </p>
        <div class="flex space-x-4">
          <a href="<?= base_url('login'); ?>" class="px-8 py-2 text-green-700 rounded-full bg-green-50">Masuk</a>
          <a href="<?= base_url('register'); ?>" class="px-8 py-2 bg-green-700 rounded-full text-green-50">Bergabung</a>
        </div>
      </div>
      <div class="md:mt-32">
        <img src="<?= base_url('assets/images/banksampahpedia/Gambar.png'); ?>" alt="">
      </div>
    </div>
  </section>

  <section id="data" class="py-12 space-y-4 text-white bg-green-700 rounded-lg">
    <p class="mb-8 text-4xl font-extrabold text-center">Data Sampah</p>
    <div class="grid grid-cols-2 gap-12 p-4 md:grid-cols-3 lg:grid-cols-4">
      <div class="flex place-content-center">
        <div class="flex flex-col p-4 bg-yellow-600 rounded-lg place-content-center place-items-center">
          <div class="transform -translate-y-12">
            <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/1.png'); ?>" alt="">
          </div>
          <div class="transform -translate-y-6">
            <p class="text-lg font-bold">6 Kg</p>
            <p class="text-lg font-bold">Kertas</p>
          </div>
        </div>
      </div>
      <div class="flex place-content-center">
        <div class="flex flex-col p-4 bg-blue-600 rounded-lg place-content-center place-items-center">
          <div class="transform -translate-y-12">
            <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/2.png'); ?>" alt="">
          </div>
          <div class="transform -translate-y-6">
            <p class="text-lg font-bold">6 Kg</p>
            <p class="text-lg font-bold">Plastik</p>
          </div>
        </div>
      </div>
      <div class="flex place-content-center">
        <div class="flex flex-col p-4 bg-pink-600 rounded-lg place-content-center place-items-center">
          <div class="transform -translate-y-12">
            <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/3.png'); ?>" alt="">
          </div>
          <div class="transform -translate-y-6">
            <p class="text-lg font-bold">6 Kg</p>
            <p class="text-lg font-bold">Logam</p>
          </div>
        </div>
      </div>
      <div class="flex place-content-center">
        <div class="flex flex-col p-4 bg-indigo-600 rounded-lg place-content-center place-items-center">
          <div class="transform -translate-y-12">
            <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/4.png'); ?>" alt="">
          </div>
          <div class="transform -translate-y-6">
            <p class="text-lg font-bold">6 Kg</p>
            <p class="text-lg font-bold">Lain Lain</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="kegiatan">
    <p class="mb-8 text-4xl font-extrabold text-center">Kegiatan Bank Sampah</p>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
      <div class="flex flex-col gap-6 py-12 border-2 rounded-lg shadow-lg place-content-center place-items-center">
        <div class="">
          <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/Frame.png'); ?>" alt="">
        </div>
        <p class="text-lg font-bold">Kategori</p>
        <p class="text-lg font-bold">Lain Lain</p>
        <button class="px-6 py-3 text-white bg-green-700 rounded-full hover:bg-green-900">Read More</button>
      </div>
      <div class="flex flex-col gap-6 py-12 border-2 rounded-lg shadow-lg place-content-center place-items-center">
        <div class="">
          <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/Frame.png'); ?>" alt="">
        </div>
        <p class="text-lg font-bold">Kategori</p>
        <p class="text-lg font-bold">Lain Lain</p>
        <button class="px-6 py-3 text-white bg-green-700 rounded-full hover:bg-green-900">Read More</button>
      </div>
      <div class="flex flex-col gap-6 py-12 border-2 rounded-lg shadow-lg place-content-center place-items-center">
        <div class="">
          <img class="w-24" src="<?= base_url('assets/images/banksampahpedia/Frame.png'); ?>" alt="">
        </div>
        <p class="text-lg font-bold">Kategori</p>
        <p class="text-lg font-bold">Lain Lain</p>
        <button class="px-6 py-3 text-white bg-green-700 rounded-full hover:bg-green-900">Read More</button>
      </div>
    </div>
  </section>

  <section id="mitra">
    <div class="p-4 mx-8 border-2 rounded-md shadow-lg">
      <p class="mb-8 text-4xl font-extrabold text-center">Mitra Kami</p>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
        <img src="<?= base_url('assets/images/banksampahpedia/image24.png'); ?>" alt="">
        <img src="<?= base_url('assets/images/banksampahpedia/image25.png'); ?>" alt="">
        <img src="<?= base_url('assets/images/banksampahpedia/image26.png'); ?>" alt="">
        <img src="<?= base_url('assets/images/banksampahpedia/image27.png'); ?>" alt="">
        <img src="<?= base_url('assets/images/banksampahpedia/image28.png'); ?>" alt="">
        <img src="<?= base_url('assets/images/banksampahpedia/image29.png'); ?>" alt="">
      </div>
    </div>
  </section>

  <section id="penghargaan">
    <div class="p-4 mx-8">
      <p class="mb-8 text-4xl font-extrabold text-center">Penghargaan</p>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
        <div class="max-w-sm p-6 mb-6 overflow-hidden bg-white shadow-md rounded-xl">
          <img src="<?= base_url("assets/images/logos/banksampah-logo.png"); ?>" alt="Card Image" class="h-32 mb-4 ">
          <div class="mb-2 text-xl font-semibold">Penghargaan 1</div>
          <p class="text-gray-600">Penghargaan yang diraih</p>
        </div>
        <div class="max-w-sm p-6 mb-6 overflow-hidden bg-white shadow-md rounded-xl">
          <img src="<?= base_url("assets/images/logos/banksampah-logo.png"); ?>" alt="Card Image" class="h-32 mb-4 ">
          <div class="mb-2 text-xl font-semibold">Penghargaan 1</div>
          <p class="text-gray-600">Penghargaan yang diraih</p>
        </div>
        <div class="max-w-sm p-6 mb-6 overflow-hidden bg-white shadow-md rounded-xl">
          <img src="<?= base_url("assets/images/logos/banksampah-logo.png"); ?>" alt="Card Image" class="h-32 mb-4 ">
          <div class="mb-2 text-xl font-semibold">Penghargaan 1</div>
          <p class="text-gray-600">Penghargaan yang diraih</p>
        </div>
        <div class="max-w-sm p-6 mb-6 overflow-hidden bg-white shadow-md rounded-xl">
          <img src="<?= base_url("assets/images/logos/banksampah-logo.png"); ?>" alt="Card Image" class="h-32 mb-4 ">
          <div class="mb-2 text-xl font-semibold">Penghargaan 1</div>
          <p class="text-gray-600">Penghargaan yang diraih</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact-us" class="space-y-8">
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
      <div class="p-4 m-4 space-y-8 rounded-lg shadow-lg">
        <div class="flex gap-2 place-items-center place-content-between">
          <input type="text" placeholder="Nama" class="w-2/3 h-12 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-green-500 ">
          <input type="text" placeholder="Email" class="w-2/3 h-12 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-green-500">
        </div>
        <div>
          <textarea placeholder="Your Message" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none h-36 focus:outline-none focus:ring focus:border-green-500"></textarea>
        </div>
      </div>
      <div class="flex m-4 place-content-center place-items-center">
        <div class="space-y-4">
          <p class="text-5xl font-extrabold"><span class="text-green-300">Hubungi</span> Kami!</p>
          <p>Jika anda perlu menghubungi kami melalui email, anda
            dapat mengisi form ini</p>
          <div class="flex gap-8 place-items-center">
            <img src="<?= base_url("assets/images/banksampahpedia/facebook.png") ?>" alt="">
            <img src="<?= base_url("assets/images/banksampahpedia/instagram.png") ?>" alt="">
            <img src="<?= base_url("assets/images/banksampahpedia/youtube.png") ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<footer>
  <p class="my-8 text-center">Copyright 2023</p>
</footer>

<?= $this->endSection(); ?>