<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori'];

    public function getData()
    {
        return $this->all();
    }

    public function insertData($data)
    {
        return $this->create($data);
    }

    public function updateData($id, $data)
    {
        return $this->where($this->primaryKey, $id)->update($data);
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }

    public function getRow($id)
    {
        return $this->find($id);
    }

    public function countData($id)
    {
        return $this->where($this->primaryKey, $id)->count();
    }
}
