<?php

namespace App\Controllers;
use App\Models\SemnasModel;
use App\Models\UploadModel;

class Admin extends BaseController
{

    //Inheritance
    protected $adminSemnasModel;
    protected $adminUploadModel;
    public function __construct(){
        $this->adminSemnasModel = new SemnasModel();
        $this->adminUploadModel = new UploadModel();
    }

    //Method Read
    public function index()
    {
        $curpage = $this->request->getVar('page_semnas') ? $this->request->getVar('page_semnas') : 1;

        $key = $this->request->getVar('key');
        if ($key){
            $semnas = $this->adminSemnasModel->searchAdmin($key);
        }
        else{
            $semnas = $this->adminSemnasModel;
        }
        
        $data = [
            'semnas' => $semnas->paginate(5, 'semnas'),
            'pager' => $this->adminSemnasModel->pager,
            'curpage' => $curpage
        ];
        return view('main/admin', $data);
    }

    public function index_uploads()
    {
        $curpage = $this->request->getVar('page_uploads') ? $this->request->getVar('page_uploads') : 1;

        $key = $this->request->getVar('key');
        if ($key){
            $uploads = $this->adminUploadModel->searchAdmin($key);
        }
        else{
            $uploads = $this->adminUploadModel;
        }
        
        $data = [
            'uploads' => $uploads->paginate(5, 'uploads'),
            'pager' => $this->adminUploadModel->pager,
            'curpage' => $curpage
        ];
        return view('main/admin_uploads', $data);
    }

    //Method Save
    public function save()
    {
        $this->adminSemnasModel->save([
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'insek' => $this->request->getVar('insek'),
            'wa' => $this->request->getVar('wa'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesanAdd', 'Data berhasil ditambahkan..');
        return redirect()->to('/admin');
    }

    public function save_uploads()
    {
        $this->adminUploadModel->save([
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

        session()->setFlashdata('pesanAdd', 'Data berhasil ditambahkan..');
        return redirect()->to('/admin_uploads');
    }

    //Method Update
    public function update($id)
    {
        $this->adminSemnasModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'insek' => $this->request->getVar('insek'),
            'wa' => $this->request->getVar('wa'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesanUpdate', 'Data berhasil dirubah..');
        return redirect()->to('/admin');    
    }

    public function update_uploads($id)
    {
        $this->adminUploadModel->save([
            'id' => $id,
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

        session()->setFlashdata('pesanUpdate', 'Data berhasil dirubah..');
        return redirect()->to('/admin');    
    }

    //Method Delete
    public function delete($id)
    {
        $this->adminSemnasModel->delete($id);
        $this->adminSemnasModel->getReset();

        session()->setFlashdata('pesanDelete', 'Data berhasil dihapus..');
        return redirect()->to('/admin');
    }

    public function delete_uploads($id)
    {
        $this->adminUploadModel->delete($id);
        $this->adminUploadModel->getReset();

        session()->setFlashdata('pesanDelete', 'Data berhasil dihapus..');
        return redirect()->to('/admin');
    }

    //Method Export Excel
    public function excel()
    {
        $data = [
            'semnas' => $this->adminSemnasModel->getData()
        ];

        return view('admin/excel', $data);
    }

    public function excel_uploads()
    {
        $data = [
            'uploads' => $this->adminUploadModel->getData()
        ];

        return view('admin/excel', $data);
    }

    //Method Print
    public function print()
    {
        $data = [
            'semnas' => $this->adminSemnasModel->getData()
        ];

        return view('admin/print', $data);
    }

    public function print_uploads()
    {
        $data = [
            'uploads' => $this->adminUploadModel->getData()
        ];

        return view('admin/print', $data);
    }
}
