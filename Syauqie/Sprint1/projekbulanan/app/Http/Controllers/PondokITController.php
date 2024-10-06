<?php
// app/Http/Controllers/PondokITController.php
namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Divisi;
use App\Models\Mentor;
use App\Models\Ujian;
use Illuminate\Http\Request;

class PondokITController extends Controller
{
    public function showSantri()
    {
        $santris = Santri::with('divisi')->get();
        return view('pondok_it.santri', compact('santris'));
    }

    public function showDivisi()
    {
        $divisis = Divisi::all();
        return view('pondok_it.divisi', compact('divisis'));
    }

    public function showMentor()
    {
        $mentors = Mentor::with('spesialis')->get();
        return view('pondok_it.mentor', compact('mentors'));
    }

    public function showUjian()
    {
        $ujians = Ujian::with(['santri', 'spesialis'])->get();
        return view('pondok_it.ujian', compact('ujians'));
    }
}
