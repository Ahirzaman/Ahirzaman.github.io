<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    //Inisialisasi
    protected $table = 'uploads';
    protected $allowedFields = ['penulis','judul','abstrak','keyword','upload_doc','info_paper','info_review1','info_review2','info_bayar','info_terima'];

    //Query Read
    public function getData()
    {
        $query = $this->table('uploads')->query('select * from upload');
        return $query->getResult();
    }

    //Query Reset
    public function getReset()
    {
        $query = $this->table('uploads')->query('set @num := 0;');
        $query = $this->table('uploads')->query('update semnas set id = @num := (@num+1);');
        $query = $this->table('uploads')->query('alter table semnas AUTO_INCREMENT =1;');
        return $query->getResult();
    }

    //Query Main Search
    public function search($keyword){
        $query = $this->table('uploads')->like('keyword', $keyword);
        return $query;
    }

    //Query Admin Search
    public function searchAdmin($key)
    {
        $query = $this->table('uploads')->like('keyword', $key);
        return $query;
    }
}

?>