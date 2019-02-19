<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Category;
use App\Item;
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
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,bmp',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName= $slug . '-'. $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!file_exists('public/uploads/item')){
                mkdir('public/uploads/item',0777,true);
            }
            $image->move('public/uploads/item',$imageName);
        }
        else{
            $imageName = 'default.png';
        }

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image=$imageName;
        $item->save();

        return redirect()->route('item.index')->with('successMsg','Item Sucessfully Saved');


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
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
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
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $item = Item::find($id);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName= $slug . '-'. $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!file_exists('public/uploads/item')){
                mkdir('public/uploads/item',0777,true);
            }
            $image->move('public/uploads/item',$imageName);
            if(file_exists('public/uploads/item/'.$item->image)){
                unlink('public/uploads/item/'.$item->image);
            }
        }
        else{
            $imageName = $item->image;
        }


        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image=$imageName;
        $item->save();

        return redirect()->route('item.index')->with('successMsg','Item Sucessfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(file_exists('public/uploads/item/'.$item->image)){
            unlink('public/uploads/item/'.$item->image);
        }
        $item->delete();
        return redirect()->back()->with('successMsg','Item Sucessfully Deleted');
    }
}
