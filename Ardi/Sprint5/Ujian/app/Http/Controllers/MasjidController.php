<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    function index() {
        $masjids = Masjid::with(['jamaahs', 'kegiatan'])->get();
        $title = "Data Masjid";
        return view('masjid.index', compact('masjids', 'title'));
    }
}
