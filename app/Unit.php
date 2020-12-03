<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'tb_unit';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['nama_unit'];

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
