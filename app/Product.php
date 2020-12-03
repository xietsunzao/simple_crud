<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'id_kategori',
        'harga_jual',
        'harga_beli',
        'id_unit'
    ];
    protected $primaryKey = 'id_produk';

    public function getData()
    {
        return $this
            ->leftJoin('tb_kategori', 'tb_kategori.id_kategori', '=', 'tb_produk.id_kategori')
            ->leftJoin('tb_unit', 'tb_unit.id_unit', '=', 'tb_produk.id_unit')
            ->select('*')
            ->get();
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

    public function getKode($id)
    {
        return $this->where('id_kategori', $id)->count();
    }
}
