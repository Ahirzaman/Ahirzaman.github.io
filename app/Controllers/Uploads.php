<?php

namespace App\Controllers;
use App\Models\UploadModel;

class Uploads extends BaseController
{

    //Inheritance
    protected $uploadsModel;
    public function __construct(){
        $this->uploadsModel = new UploadModel();
    }

    //Method Read
    public function index()
    {
        $curpage = $this->request->getVar('page_uploads') ? $this->request->getVar('page_uploads') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $uploads = $this->uploadsModel->search($keyword);
        }
        else{
            $uploads = $this->uploadsModel;
        }
        
        $data = [
            'uploads' => $uploads->paginate(5, 'uploads'),
            'pager' => $this->uploadsModel->pager,
            'curpage' => $curpage
        ];
        return view('main/uploads', $data);
    }

    //Method Save
    public function save()
    {
        $this->uploadsModel->save([
            'penulis' => $this->request->getVar('penulis'),
            'judul' => $this->request->getVar('judul'),
            'abstrak' => $this->request->getVar('abstrak'),
            'keyword' => $this->request->getVar('keyword'),
            'upload_doc'=> $this->request->getVar('upload_doc'),
            'info_paper'=> $this->request->getVar('info_paper'),
            'info_review1'=> $this->request->getVar('info_review1'),
            'info_review2'=> $this->request->getVar('info_review2'),
            'info_bayar'=> $this->request->getVar('info_bayar'),
            'info_terima'=> $this->request->getVar('info_terima'),
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('/uploads');
    }
}
