<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Unit;
use App\Providers\ShinServiceProvider as Shin;

class ProductController extends Controller
{
    protected $title = 'Data Produk';
    protected $main = 'Produk ';
    protected $add = 'Tambah ';
    protected $edit = 'Edit ';


    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->unit = new Unit();
        $this->shin = new Shin();
    }

    public function index()
    {
        $title = $this->title;
        $addButton = $this->add . $this->title;
        $data = [
            'title' => $title,
            'tambah' => $addButton,
            'product' => $this->product->getData()
        ];
        return view('product.list', $data);
    }

    public function add()
    {
        $data = [
            'category' => $this->category->getData(),
            'unit' => $this->unit->getData(),
            'title' => $this->add . $this->title,
        ];
        return view('product.add', $data);
    }

    public function addaction(Request $r)
    {
        $category = $this->category->getRow($r->category);
        $total = $this->product->getKode($r->category);
        $nama_kategori = $category->nama_kategori;
        $huruf = substr($nama_kategori, 0, 1);
        $getNoUrut = $this->shin->getNumber($total);
        $kode_barang = $huruf.$getNoUrut;
        $data = [
            'kode_produk' => $kode_barang,
            'nama_produk' => $r->product,
            'id_kategori' => $r->category,
            'harga_jual' => $r->harga_jual,
            'harga_beli' => $r->harga_beli,
            'id_unit' => $r->unit,
        ];
        $this->product->insertData($data);
        return redirect(route('product'))->with($this->shin->successAdd());
    }

    public function edit($id = NULL)
    {
        $getRow = $this->product->countData($id);
        if ($getRow > 0) {
            $data = [
                'title' => "{$this->edit} {$this->title}",
                'row' => $this->product->getRow($id),
                'main' => $this->main,
                'category' => $this->category->getData(),
                'unit' => $this->unit->getData(),
            ];
            return view('product.edit', $data);
        } else {
            return redirect(route('product'))->with($this->shin->notFound());
        }
    }

    public function editaction($id, Request $r)
    {
        
        $category = $this->category->getRow($r->category);
        $total = $this->product->getKode($r->category);
        $nama_kategori = $category->nama_kategori;
        $huruf = substr($nama_kategori, 0, 1);
        $getNoUrut = $this->shin->getNumber($total);
        $kode_barang = $huruf.$getNoUrut;
        $data = [
            'kode_produk' => $kode_barang,
            'nama_produk' => $r->product,
            'id_kategori' => $r->category,
            'harga_jual' => $r->harga_jual,
            'harga_beli' => $r->harga_beli,
            'id_unit' => $r->unit,
        ];
        $this->product->updateData($id, $data);
        return redirect(route('product'))->with($this->shin->successEdit());
    }

    public function delete($id = NULL)
    {
        $getRow = $this->product->countData($id);
        if ($getRow > 0) {
            $this->product->deleteData($id);
            return redirect(route('product'))->with($this->shin->successDelete());
        } else {
            return redirect(route('product'))->with($this->shin->notFound());
        }
    }
}
