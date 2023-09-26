<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Isi ini sesuai dengan logika halaman utama
        return view('dashboard.home');
    }

    public function profile()
    {
        // Isi ini sesuai dengan logika halaman "profile"
        return view('dashboard.profile');
    }

    public function contact()
    {
        // Isi ini sesuai dengan logika halaman "contact"
        return view('dashboard.contact');
    }

    public function produk()
    {
        // Isi ini sesuai dengan logika halaman "produk"
        return view('produk.index');
    }

    public function myControllerMethod(Request $request)
    {
    // Menggunakan kelas Request untuk mengelola permintaan HTTP
    $inputData = $request->input('input_name');
    // ...

    return response()->json(['message' => 'Request processed successfully']);
    }
}

