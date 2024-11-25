<?php

namespace App\Livewire;

use App\Models\User as ModelUser;
use Livewire\Component;

class User extends Component
{
    public $pilihanMenu = 'lihat';
    public $name;
    public $email;
    public $peran;
    public $password;
    public $penggunaTerpilih;

    public function mount()
    {
        if (auth()->user()->peran != 'admin') {
            abort(403);
        }
    }

    public function pilihEdit($id)
    {
        $this->penggunaTerpilih = ModelUser::findOrFail($id);
        $this->name = $this->penggunaTerpilih->name;
        $this->email = $this->penggunaTerpilih->email;
        $this->peran = $this->penggunaTerpilih->peran;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->penggunaTerpilih->id,
            'peran' => 'required',
        ], [
            'name.required' => 'Nama harus diisi', //untuk pesan
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email formatnya kudu email',
            'email.unique' => 'Email sudah digunakan',
            'peran.required' => 'Peran harus diisi',
        ]);

        $simpan = $this->penggunaTerpilih;
        $simpan->name = $this->name;
        $simpan->email = $this->email;
        if ($this->password) {
            $simpan->password = bcrypt($this->password);
        }
        $simpan->peran = $this->peran;
        $simpan->save();

        $this->reset(['name', 'email', 'password', 'peran', 'penggunaTerpilih']);
        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->penggunaTerpilih = ModelUser::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function batal()
    {
        $this->reset();
    }

    public function hapus()
    {
        $this->penggunaTerpilih->delete();
        $this->reset();
    }

    public function simpan()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'peran' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi', //untuk pesan
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email formatnya kudu email',
            'email.unique' => 'Email sudah digunakan',
            'peran.required' => 'Peran harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $simpan = new ModelUser();
        $simpan->name = $this->name;
        $simpan->email = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->peran = $this->peran;
        $simpan->save();

        $this->reset(['name', 'email', 'password', 'peran']);
        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna' => ModelUser::all()
        ]);
    }
}
