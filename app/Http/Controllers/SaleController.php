<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\Providers\ShinServiceProvider as Shin;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $title = 'Data Penjualan';
    protected $main = 'Penjualan ';
    protected $add = 'Tambah ';
    protected $edit = 'Edit ';

    public function __construct()
    {
        $this->product = new Product();
        $this->sale = new Sale();
        $this->shin = new Shin();
    }

   
    public function index()
    {
        $title = $this->title;
        $addButton = $this->add . $this->title;
        $data = [
            'title' => $title,
            'tambah' => $addButton,
            'sale' => $this->sale->getData()
        ];
        return view('sale.list', $data);
    }

    public function add()
    {
        $data = [
            'product' => $this->product->getData(),
            'title' => $this->add . $this->title,
        ];
        return view('sale.add', $data);
    }

    public function addaction(Request $r)
    {
        $total = $this->sale->totalData();
        $getNoUrut = $this->shin->getNumber($total);
        $no_faktur = 'F' . $getNoUrut;
        $product = $this->product->getRow($r->product);
        $harga_jual = $product->harga_jual;
        $data = [
            'tgl_faktur' => date('Y-m-d'),
            'no_faktur' => $no_faktur,
            'nama_konsumen' => $r->konsumen,
            'id_produk' => $r->product,
            'jumlah' => $r->jumlah,
            'total' => $harga_jual * $r->jumlah,
        ];
        $this->sale->insertData($data);
        return redirect(route('sale'))->with($this->shin->successAdd());
    }

    public function update($id = NULL)
    {
        $getRow = $this->sale->countData($id);
        if ($getRow > 0) {
            $data = [
                'title' => "{$this->edit} {$this->title}",
                'row' => $this->sale->getRow($id),
                'main' => $this->main,
                'product' => $this->product->getData(),
            ];
            return view('sale.edit', $data);
        } else {
            return redirect(route('product'))->with($this->shin->notFound());
        }
    }

    public function updateAction($id, Request $r)
    {
        $total = $this->sale->totalData();
        $getNoUrut = $this->shin->getNumber($total);
        $no_faktur = 'F' . $getNoUrut;
        $product = $this->product->getRow($r->product);
        $harga_jual = $product->harga_jual;
        $data = [
            'tgl_faktur' => date('Y-m-d'),
            'no_faktur' => $no_faktur,
            'nama_konsumen' => $r->konsumen,
            'id_produk' => $r->product,
            'jumlah' => $r->jumlah,
            'total' => $harga_jual * $r->jumlah,
        ];
        $this->sale->updateData($id, $data);
        return redirect(route('sale'))->with($this->shin->successEdit());
    }

    public function delete($id = NULL)
    {
        $getRow = $this->sale->countData($id);
        if ($getRow > 0) {
            $this->sale->deleteData($id);
            return redirect(route('sale'))->with($this->shin->successDelete());
        } else {
            return redirect(route('sale'))->with($this->shin->notFound());
        }
    }
}
