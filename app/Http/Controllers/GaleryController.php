<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class GaleryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:galery', ['only' => ['create','edit','update','destroy','index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Galery::latest()->paginate(5);
        return view('backand.galery.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backand.galery.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGaleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'avatar' => 'required',
            'judul' => 'required',
        ],[
            'avatar.required' => 'avatar is required',
            'judul' => 'judul is required'
        ]); 
        $image = $request->avatar;
        $img_new = time() . $image->getClientOriginalName();
        $image->move('images/' , $img_new);
        $galery = new Galery;
        $galery->judul = $request->judul;
        $galery->image = 'images/' .$img_new;
        $galery->save();
        return redirect()->route('galery.index')
                        ->with('success','Galery created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galery= Galery::find($id);
        return view('backand.galery.edit',compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGaleryRequest  $request
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'required',
            'judul' => 'required',
        ],[
            'avatar.required' => 'avatar is required',
            'judul' => 'judul is required'
        ]); 


        $gaelry = Galery::find($id);
        // $gaelry->update($input);
        if($request->hasFile('avatar'))
        {
            $foto = $request->avatar;
            $image_new = time() . $foto->getClientOriginalName();
            $foto->move('images' , $image_new);
            $gaelry->image = 'images/' . $image_new;
        }
        $gaelry->judul = $request->judul;
        $gaelry->save();
        return redirect()->route('galary.index')
                        ->with('success','galery updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Galery::find($id)->delete();
        return redirect()->route('galery.index')
                        ->with('success','galery deleted successfully');
    }
}
