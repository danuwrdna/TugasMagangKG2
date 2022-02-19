<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perpus;

class CrudController extends Controller {

    public function index() {
        // get data dari table
        $perpus = Perpus::all();

        return view( 'master', compact( 'perpus' ) );
    }

    public function store( Request $request ) {
        // Simpan Data
        Perpus::create( $request->all() );

        return redirect()->route( 'home' )->with( 'success', 'Berhasil menambahkan buku' );
    }

}