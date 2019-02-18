<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName= $slug . '-'. $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!file_exists('public/uploads/slide')){
                mkdir('public/uploads/slide',0777,true);
            }
            $image->move('public/uploads/slide',$imageName);
        }
        else{
            $imageName = 'default.png';
        }

        $slide = new slide();
        $slide->title = $request->title;
        $slide->sub_title = $request->sub_title;
        $slide->image = $imageName;
        $slide->save();

        return redirect()->route('slide.index')->with('successMsg','Slider Sucessfully Saved');


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
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
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
            'title' => 'required',
            'sub_title' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $slide = Slide::find($id);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName= $slug . '-'. $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!file_exists('public/uploads/slide')){
                mkdir('public/uploads/slide',0777,true);
            }
            $image->move('public/uploads/slide',$imageName);
            if(file_exists('public/uploads/slide/'.$slide->image)){
                unlink('public/uploads/slide/'.$slide->image);
            }
        }
        else{
            $imageName = $slide->image;
        }


        $slide->title = $request->title;
        $slide->sub_title = $request->sub_title;
        $slide->image = $imageName;
        $slide->save();

        return redirect()->route('slide.index')->with('successMsg','Slider Sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if(file_exists('public/uploads/slide/'.$slide->image)){
            unlink('public/uploads/slide/'.$slide->image);
        }
        $slide->delete();
        return redirect()->back()->with('successMsg','Slider Sucessfully Deleted');
    }
}
