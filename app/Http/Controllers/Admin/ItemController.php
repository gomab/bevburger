<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use Carbon\carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Récupere les catégories
        $categories = Category::all();

        //Return la vue du formulaire de creation
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Traitement formulaire slider.create |
         * return $request->all();
         */

        //Validation des champs
        $this->validate($request, [
            'name'        => 'required',
            'category'    => 'required',
            'price'       => 'required',
            'description' => 'required',
            'image'       => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        //Upload img
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/item')){
                mkdir('uploads/item', 0777, true);
            }
            $image->move('uploads/item',$imagename);
        }else{
            $imagename = 'default.png';
        }

        //Create item
        $item = new Item();
        $item->category_id = $request->category;
        $item->name        = $request->name;
        $item->price       = $request->price;
        $item->description = $request->description;
        $item->image       = $imagename;
        $item->save();

        return redirect()->route('item.index')->with('successMsg','Item ajouté avec succes');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
