<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'tb_penjualan';
    protected $fillable = [
        'tgl_faktur',
        'no_faktur',
        'nama_konsumen',
        'id_produk',
        'jumlah',
        'total',
    ];
    protected $primaryKey = 'id_penjualan';

    public function getData()
    {
        return $this
            ->leftJoin('tb_produk', 'tb_produk.id_produk', '=', 'tb_penjualan.id_produk')
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

    public function totalData()
    {
        return $this->count();
    }
}
