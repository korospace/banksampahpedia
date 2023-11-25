<?php

namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public $artikelModel;

	public function __construct()
    {
        $this->artikelModel = new ArtikelModel;
    }

    // Add artikel
	public function addArtikel(): object
    {
        $result = $this->checkToken();
        $this->checkPrivilege($result['data']['privilege'],['admin','superadmin']);

        $data              = $this->request->getPost(); 
        $data['thumbnail'] = $this->request->getFile('thumbnail'); 

        $this->validation->run($data,'addArtikelValidate');
        $errors = $this->validation->getErrors();

        if($errors) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => $errors,
            ];
    
            return $this->respond($response,400);
        } 
        else {
            $idBerita    = '';
            $lastArtikel  = $this->artikelModel->getLastArtikel();

            if ($lastArtikel['error'] == false) {
                $lastID    = $lastArtikel['data']['id'];
                $lastID    = (int)substr($lastID,2)+1;
                $lastID    = sprintf('%03d',$lastID);
                $idBerita  = 'BA'.$lastID;
            }
            else if ($lastArtikel['status'] == 404) {
                $idBerita = 'BA001';
            } 
            else {
                return $this->respond($lastArtikel,$lastArtikel['status']);
            }
        
            $file        = $data['thumbnail'];
            // $newFileName = $file->getRandomName();
            $newFileName = uniqid().'.jpeg';

            $data = [
                "id"           => $idBerita,
                "title"        => strtolower(trim($data['title'])),
                "slug"         => preg_replace('/ /i', '-',strtolower(trim($data['title']))),
                // "thumbnail"   => $this->base64Decode($_FILES['thumbnail']['tmp_name'],$_FILES['thumbnail']['type']),
                "thumbnail"    => $newFileName,
                "content"      => $data['content'],
                "id_kategori"  => trim($data['id_kategori']),
                "created_at"   => (int)time(),
                "published_at" => (int)strtotime($data['published_at']),
                "id_banksampah"=> $this->detil_banksampah($result['data']['token'])['id_banksampah']
            ];

            if ($file->move('assets/images/thumbnail-berita/',$newFileName)) {
                $dbresponse = $this->artikelModel->addArtikel($data);

                if ($dbresponse['error'] == true) {
                    unlink('./assets/images/thumbnail-berita/'.$newFileName);
                } 

                return $this->respond($dbresponse,$dbresponse['status']);
            } 
            else {
                $response = [
                    'status'   => 500,
                    'error'    => false,
                    'messages' => 'storage thumbnail berita penuh',
                ];
                
                unlink('./assets/images/thumbnail-berita/'.$newFileName);
                return $this->respond($response,500);
            }
        }
    }

    // edit artikel
	public function editArtikel(): object
    {
        $result = $this->checkToken();
        $this->checkPrivilege($result['data']['privilege'],['admin','superadmin']);

        $this->_methodParser('data');
        global $data;

        $this->validation->run($data,'editArtikelValidate');
        $errors = $this->validation->getErrors();

        if($errors) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => $errors,
            ];
    
            return $this->respond($response,400);
        } 
        else {
            $data = [
                "id"           => trim($data['id']),
                "title"        => strtolower(trim($data['title'])),
                "slug"         => preg_replace('/ /i', '-',strtolower(trim($data['title']))),
                "content"      => trim($data['content']),
                "id_kategori"  => trim($data['id_kategori']),
                "created_at"   => (int)time(),
                "published_at" => (int)strtotime($data['published_at']),
                "id_banksampah"=> $this->detil_banksampah($result['data']['token'])['id_banksampah']
            ];

            if ($this->request->getFile('new_thumbnail')) {
                $xx['new_thumbnail'] = $this->request->getFile('new_thumbnail');

                $this->validation->run($xx,'newArtikelThumbnail');
                $errors = $this->validation->getErrors();

                if($errors) {
                    $response = [
                        'status'   => 400,
                        'error'    => true,
                        'messages' => $errors,
                    ];
            
                    return $this->respond($response,400);
                }  

                $file              = $xx['new_thumbnail'];
                $newFileName       = uniqid().'.jpeg';
                $old_thumbnail     = $this->artikelModel->getOldThumbnail($data['id']);
                $data['thumbnail'] = $newFileName;
            }

            $unlinkOldThumb = false;
            if (isset($xx['new_thumbnail'])) {
                if (rename($file->getRealPath(),'./assets/images/thumbnail-berita/'.$newFileName)) {
                    $unlinkOldThumb = true;
                    chmod("./assets/images/thumbnail-berita/".$newFileName, 644);
                } 
                else {
                    $response = [
                        'status'   => 500,
                        'error'    => false,
                        'messages' => 'storage thumbnail berita penuh',
                    ];
                    
                    return $this->respond($response,500);
                }
            }

            $dbresponse = $this->artikelModel->editArtikel($data);

            if ($dbresponse['error'] == false) {
                if ($unlinkOldThumb) {
                    unlink('./assets/images/thumbnail-berita/'.$old_thumbnail);
                }
            } 
            else {
                if ($unlinkOldThumb) {
                    unlink('./assets/images/thumbnail-berita/'.$newFileName);
                }
            }

            return $this->respond($dbresponse,$dbresponse['status']);
        }
    }

    // delete artikel
	public function deleteArtikel(): object
    {
        $result = $this->checkToken();
        $this->checkPrivilege($result['data']['privilege'],['admin','superadmin']);

        if($this->request->getGet('id') == null) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => 'required parameter id',
            ];
    
            return $this->respond($response,400);
        } 
        else {
            $id_banksampah = $this->detil_banksampah($result['data']['token'])['id_banksampah'];    
            $old_thumbnail = $this->artikelModel->getOldThumbnail($this->request->getGet('id'));
            $dbresponse    = $this->artikelModel->deleteArtikel($this->request->getGet('id'),$id_banksampah);

            if ($dbresponse['error'] == false) {
                // delete local thumbnail
                unlink('./assets/images/thumbnail-berita/'.$old_thumbnail);
            } 

            return $this->respond($dbresponse,$dbresponse['status']);
        }
    }

    // get all artikel
    public function getArtikel(): object
    {
        $result  = [];
        $isAdmin = false;
        if ($this->request->getHeader('token')) {
            $result     = $this->checkToken();
            $isAdmin    = (in_array($result['data']['privilege'],['admin','superadmin'])) ? true : false ;
        }

        $param_get = $this->request->getGet();
        $param_get['id_banksampah'] = count($result) > 0 ? $this->detil_banksampah($result['data']['token'])['id_banksampah'] : null;

        $dbResponse = $this->artikelModel->getArtikel($param_get,$isAdmin);
    
        return $this->respond($dbResponse,$dbResponse['status']);
    }

    // get related artikel
    public function getRelatedArtikel(): object
    {
        $this->validation->run($this->request->getGet(),'getRelatedArtikel');
        $errors = $this->validation->getErrors();

        if($errors) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => $errors,
            ];
        
            return $this->respond($response,400);
        }

        $slugBANKNAME = ($this->request->getGet('slugBANKNAME')) ? $this->request->getGet('slugBANKNAME') : '';
        $slugTITLE    = ($this->request->getGet('slugTITLE')) ? $this->request->getGet('slugTITLE') : '';

        $dbResponse = $this->artikelModel->getRelatedArtikel($slugBANKNAME, $slugTITLE);
    
        return $this->respond($dbResponse,$dbResponse['status']);
    }
}
