<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\ShinServiceProvider as Shin;
use App\Category;

class CategoryController extends Controller
{

    public $title = 'Data Kategori';
    protected $add = 'Tambah ';
    protected $edit = 'Edit ';
    protected $main = 'Kategori';

    public function __construct()
    {
        $this->category = new Category();
        $this->shin = new Shin();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'category' => $this->category->getData()
        ];
        return view('category.list', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->add . $this->title,
        ];
        return view('category.add', $data);
    }

    public function addAction(Request $r)
    {
        $data = [
            'nama_kategori' => $r->category
        ];
        $this->category->insertData($data);
        return redirect(route('category'))->with($this->shin->successAdd());
    }

    public function update($id = NULL)
    {
        $getRow = $this->category->countData($id);
        if ($getRow > 0) {
            $data = [
                'title' => "{$this->edit} {$this->title}",
                'row' => $this->category->getRow($id),
                'main' => $this->main
            ];
            return view('category.edit', $data);
        } else {
            return redirect(route('category'))->with($this->shin->notFound());
        }
    }

    public function updateAction(Request $r, $id)
    {
        $data = [
            'nama_kategori' => $r->category
        ];
        $this->category->updateData($id, $data);
        return redirect(route('category'))->with($this->shin->successEdit());
    }

    public function delete($id = NULL)
    {
        $getRow = $this->category->countData($id);
        if ($getRow > 0) {
            $this->category->deleteData($id);
            return redirect(route('category'))->with($this->shin->successDelete());
        } else {
            return redirect(route('category'))->with($this->shin->notFound());
        }
    }
}
