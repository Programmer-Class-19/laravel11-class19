<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DetilTransaksi;
use App\Models\Transaksi as ModelsTransaksi;
use App\Models\Produk;

class Transaksi extends Component
{
    public  $code, $total, $kembalian, $totalSemuaBelanja;
    public $transaksiAktif;
    public $bayar = 0;

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->code = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();
    }

    public function hapusProduk($id)
    {
        $detil = DetilTransaksi::find($id);
        if ($detil) {
            $produk = Produk::find($detil->produk_id);
            $produk->stock += $detil->jumlah;
            $produk->save();
        }
        $detil->delete();
    }

    public function transaksiSelesai() {
        $this->transaksiAktif->total = $this->totalSemuaBelanja;
        $this->transaksiAktif->status = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }

    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $detilTransaksi = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detilTransaksi as $detil) {
                $produk = Produk::find($detil->produk_id);
                $produk->stock += $detil->jumlah;
                $produk->save();
                $detil->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updatedCode()
    {
        $produk = Produk::where('code', $this->code)->first();
        if ($produk && $produk->stock > 0) {
            $detil = DetilTransaksi::firstOrNew([
                'transaksi_id' => $this->transaksiAktif->id,
                'produk_id' => $produk->id
            ], [
                'jumlah' => 0
            ]);
            $detil->jumlah += 1;
            $detil->save();
            $produk->stock -= 1;
            $produk->save();
            $this->reset('code');
        }
    }

    public function updatedBayar()
    {
        if ($this->bayar > 0) {
            $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
        }
    }


    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detil) {
                return $detil->produk->price * $detil->jumlah;
            });
        } else {
            $semuaProduk = [];
        }
        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }
}
