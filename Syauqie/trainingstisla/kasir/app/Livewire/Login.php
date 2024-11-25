<?php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('message', 'Login berhasil!');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}

