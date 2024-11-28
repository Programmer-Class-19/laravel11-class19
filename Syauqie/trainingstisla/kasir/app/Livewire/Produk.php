<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk as ModelProduk;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Produk as ImporProduk;

class Produk extends Component
{
    use WithFileUploads;

    public $pilihanMenu = 'lihat';
    public $name;
    public $code;
    public $price;
    public $stock;
    public $fileExcel;
    public $produkTerpilih;


    public function imporExcel()
    {
        Excel::import(new ImporProduk, $this->fileExcel);
        $this->reset();
    }

    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->name = $this->produkTerpilih->name;
        $this->code = $this->produkTerpilih->code;
        $this->price = $this->produkTerpilih->price;
        $this->stock = $this->produkTerpilih->stock;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|unique:produks,code,' . $this->produkTerpilih->id,
            'price' => 'required',
            'stock' => 'required'
        ], [
            'name.required' => 'Nama harus diisi', //untuk pesan
            'code.required' => 'Kode harus diisi',
            'code.unique' => 'Kode sudah digunakan',
            'price.required' => 'Harga harus diisi',
            'stock.required' => 'Stock harus diisi',
        ]);

        $simpan = $this->produkTerpilih;
        $simpan->name = $this->name;
        $simpan->code = $this->code;
        $simpan->stock = $this->stock;
        $simpan->price = $this->price;
        $simpan->save();

        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function batal()
    {
        $this->reset();
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
    }

    public function simpan()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|unique:produks,code',
            'price' => 'required',
            'stock' => 'required'
        ], [
            'name.required' => 'Nama harus diisi', //untuk pesan
            'code.required' => 'Kode harus diisi',
            'code.unique' => 'Kode sudah digunakan',
            'price.required' => 'Harga harus diisi',
            'stock.required' => 'Stock harus diisi',
        ]);

        $simpan = new ModelProduk();
        $simpan->name = $this->name;
        $simpan->code = $this->code;
        $simpan->stock = $this->stock;
        $simpan->price = $this->price;
        $simpan->save();

        $this->reset(['name', 'code', 'stock', 'price']);
        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }
    public function render()
    {
        return view('livewire.produk')->with([
            'semuaProduk' => ModelProduk::all()
        ]);
    }
}
