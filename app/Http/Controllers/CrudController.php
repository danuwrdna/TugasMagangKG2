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

    public function editData( Request $request, $id ) {
        if ( $request->isMethod( 'post' ) ) {
            $data = $request->all();

            Perpus::where( [ 'id' => $id ] )->update( [
                'buku' => $data[ 'buku' ],
                'pengarang' => $data[ 'pengarang' ],
                'tahun_terbit' => $data[ 'tahun_terbit' ],
            ] );

            return redirect()->route( 'home' )->with( 'success', 'Berhasil mengubah data' );
        }
    }

    public function delete( $id ) {
        $perpus = Perpus::find( $id );
        $perpus->delete();

        return redirect()->route( 'home' )->with( 'successDelete', 'Berhasil menghapus buku' );
    }

}