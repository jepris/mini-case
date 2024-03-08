<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');
        return view('admin.managecourse',[
            'kursus'=> Kursus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createcourse',[
            'category'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kursus;
        $data->cover = $request->cover;
        $data->judul = $request->judul;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->harga = $request->harga;
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
        // return redirect()->route('dashboard/kursus.index')->with('Success','Kursus Berhasil Di Tambahkan');;
        return redirect('dashboard/kursus')->with('Success','Kursus Berhasil Di Tambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function show(Kursus $kursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function edit(Kursus $kursus,$id)
    {
        //
        // return view('admin.editcourse',[
        //     'kursus'=>$kursus,
        //     'category'=> Category::all()
        // ]);
        $kursus = Kursus::findOrFail($id);
        $category= Category::all();
        return view('admin.editcourse', compact('kursus','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kursus $kursus,$id)
    {
        //
        $request->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk file gambar
            'judul' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $kursus = Kursus::findOrFail($id);
        if ($request->hasFile('cover')) {
            // Jika ada file gambar yang diunggah, proses dan simpan gambar
            $imagePath = $request->file('cover')->store('cover', 'public');
            $kursus->cover = $imagePath;
        }
        $kursus->judul = $request->input('judul');
        $kursus->category_id = $request->input('category');
        $kursus->description = $request->input('description');
        $kursus->save();

    return redirect('dashboard/kursus')->with('success', 'Postingan berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kursus  $kursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kursus $kursus,$id)
    {
        //
        // Kursus::destroy($kursus->id);
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();
        return redirect('dashboard/kursus')->with('success','New posat  has been deleted');
    }
}
