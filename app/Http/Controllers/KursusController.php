<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Carbon\Carbon;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Kursus::latest()->paginate(3);
        $category= Category::all();
        return view('dashboard', compact(['data','category']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahdata()
    {
        //
        return view('tambahdata',[
            'category'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertdata(Request $request)
    {
        //
        $data = new Kursus;
        $data->cover = $request->cover;
        $data->judul = $request->judul;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        if ( $request->hasFile( 'cover' ) ) {
            $file = $request->file( 'cover' );
            $name = 'cover-'.date('ymdhis'). '.' . $file->getClientOriginalExtension();
            $request->cover->move( public_path('/cover_image'), $name );
            $gambar = $name;
        } else {

            $gambar = $request->cover;
        }
       
        $data->cover = $gambar;
        $data->save();
        return redirect()->route('dashboard')->with('Success','Kursus Berhasil Di Tambahkan');;
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function show(kursus $kursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function edit(kursus $kursus,$id)
    {
        //
        $kursus = Kursus::find($id);
        return view('kursus.edit', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kursus $kursus,$id)
    {
        //
        $kursus = Kursus::find($id);
        $kursus->cover = $request->cover;
        $kursus->judul = $request->judul;
        $kursus->category_id = $request->category_id;
        $kursus->description = $request->description;
        if ( $request->hasFile( 'cover' ) ) {
            $file = $request->file( 'cover' );
            $name = 'cover-'.date('ymdhis'). '.' . $file->getClientOriginalExtension();
            $request->cover->move( public_path('/cover_image'), $name );
            $gambar = $name;
        } else {

            $gambar = $request->cover;
        }
       
        $kursus->cover = $gambar;
        $kursus->update();
        // $request->validate([
        //     'nama' => 'required',
        //     'deskripsi' => 'required',
        // ]);

        // $kursus->update($request->all());

        return redirect()->route('kursus.index')->with('status', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(kursus $kursus)
    {
        //
        $kursus->delete();

        return redirect()->route('kursus.index')->with('status', 'Class deleted successfully');
    }
}
