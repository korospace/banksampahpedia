<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Banksampah extends BaseController
{
  /**
   * Home Page Bank Sampah - partner
   */
  public function HomePageIndex(string $slug)
  {
    $dbConnect = \Config\Database::connect();

    $data_banksampah = $dbConnect->table('banksampah')->select('*')->where('slug',$slug)->get()->getResultArray();
    
    if (empty($data_banksampah)) {
      $data = [
        'title' => '404 page not found'
      ];

      return view('NotFound/index',$data);
    }

    // mapping
    $data_banksampah[0]['logo'] = base_url()."/assets/images/logo-banksampah/".$data_banksampah[0]['logo'];
    
    // kategori artikel
    $data_kat_artikel_new = [];
    $data_kat_artikel_old = $dbConnect->table('kategori_artikel')->select('*')->where('id_banksampah',$data_banksampah[0]['id'])->get()->getResultArray();
    foreach ($data_kat_artikel_old as $row) {
      $row['icon'] = base_url()."/assets/images/icon-kategori-artikel/".$row['icon'];
      $data_kat_artikel_new[] = $row;
    }

    // mitra
    $data_mitra_new = [];
    $data_mitra_old = $dbConnect->table('mitra')->select('*')->where('id_banksampah',$data_banksampah[0]['id'])->get()->getResultArray();
    foreach ($data_mitra_old as $row) {
      $row['icon'] = base_url()."/assets/images/icon-mitra/".$row['icon'];
      $data_mitra_new[] = $row;
    }

    // penghargaan
    $data_penghargaan_new = [];
    $data_penghargaan_old = $dbConnect->table('penghargaan')->select('*')->where('id_banksampah',$data_banksampah[0]['id'])->get()->getResultArray();
    foreach ($data_penghargaan_old as $row) {
      $row['icon'] = base_url()."/assets/images/icon-penghargaan/".$row['icon'];
      $data_penghargaan_new[] = $row;
    }

    $data = [
      'title'   => ucwords($data_banksampah[0]['name']),
      'baseUrl' => base_url(),
      'data_banksampah'  => $data_banksampah[0],
      'data_kat_artikel' => $data_kat_artikel_new,
      'data_mitra'       => $data_mitra_new,
      'data_penghargaan' => $data_penghargaan_new,
    ];

    return view('Banksampah/index', $data);
  }

  /**
   * List Artikel - partner
   */
  public function ArtikelList(string $slugBankName, string $slugKategori)
  {
    $dbConnect = \Config\Database::connect();

    $data_banksampah = $dbConnect->table('banksampah')->select('*')->where('slug',$slugBankName)->get()->getResultArray();
    
    if (empty($data_banksampah)) {
      $data = [
        'title' => '404 page not found'
      ];

      return view('NotFound/index',$data);
    }

    // mapping
    $data_banksampah[0]['logo'] = base_url()."/assets/images/logo-banksampah/".$data_banksampah[0]['logo'];
    
    // kategori artikel
    $data_kat_artikel_new = [];
    $data_kat_artikel_old = $dbConnect->table('kategori_artikel')->select('*')->where('id_banksampah',$data_banksampah[0]['id'])->get()->getResultArray();
    foreach ($data_kat_artikel_old as $row) {
      $row['icon'] = base_url()."/assets/images/icon-kategori-artikel/".$row['icon'];
      $data_kat_artikel_new[] = $row;
    }

    $data = [
      'title'   => ucwords($data_banksampah[0]['name']),
      'baseUrl' => base_url(),
      'data_banksampah'  => $data_banksampah[0],
      'data_kat_artikel' => $data_kat_artikel_new,
      'slugBankName'     => $slugBankName,
      'slugKategori'     => $slugKategori,
    ];

    return view('Banksampah/listArtikel', $data);
  }

  /**
   * Detil Artikel - partner
   */
  public function ArtikelDetil(string $slugBankName, string $slugKategori, string $slugTitle)
  {
    $dbConnect = \Config\Database::connect();

    $data_banksampah = $dbConnect->table('banksampah')->select('*')->where('slug',$slugBankName)->get()->getResultArray();
    
    if (empty($data_banksampah)) {
      $data = [
        'title' => '404 page not found'
      ];

      return view('NotFound/index',$data);
    }
    
    // kategori artikel
    $data_kat_artikel_new = [];
    $data_kat_artikel_old = $dbConnect->table('kategori_artikel')->select('*')->where('id_banksampah',$data_banksampah[0]['id'])->get()->getResultArray();
    foreach ($data_kat_artikel_old as $row) {
      $row['icon'] = base_url()."/assets/images/icon-kategori-artikel/".$row['icon'];
      $data_kat_artikel_new[] = $row;
    }

    // artikel
    $data_artikel = $dbConnect->table('artikel')->select('thumbnail')
      ->where('id_banksampah',$data_banksampah[0]['id'])
      ->where("slug",$slugTitle)
      ->get()->getFirstRow();

    if (empty($data_artikel)) {
      $data = [
        'title' => '404 page not found'
      ];

      return view('NotFound/index',$data);
    }

    // mapping
    $data_banksampah[0]['logo'] = base_url()."/assets/images/logo-banksampah/".$data_banksampah[0]['logo'];
    $thumbnail                  = base_url()."/assets/images/thumbnail-berita/$data_artikel->thumbnail";

    $data = [
      'title'   => ucwords($data_banksampah[0]['name']),
      'baseUrl' => base_url(),
      'data_banksampah'  => $data_banksampah[0],
      'data_kat_artikel' => $data_kat_artikel_new,
      'slugBankName'     => $slugBankName,
      'slugKategori'     => $slugKategori,
      'slugTitle'        => $slugTitle,
      'thumbnail'        => $thumbnail,
    ];

    return view('Banksampah/detilArtikel', $data);
  }

  public function listBankSampah()
  {
    $dbConnect = \Config\Database::connect();
    
    $data_mapped = [];

    $data_banksampah = $dbConnect->table('banksampah')->select('*')->get()->getResultArray();

    foreach ($data_banksampah as $row) {
      $row['name']   = ucwords($row['name']);
      $row['logo']   = base_url()."/assets/images/logo-banksampah/".$row['logo'];

      $data_mapped[] = $row;
    }

    return $this->respond($data_mapped,200);
  }
}
