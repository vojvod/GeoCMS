<?php

namespace App\Http\Controllers;

use App\Map;

use App\Category;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.maps.index')->with('maps', Map::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0)
        {

          toastr()->info('You must have a map category before attempting to create a map.');

          return redirect()->back();

        }

        return view('admin.maps.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'content' => 'required',
          'category_id' => 'required',
          'featured' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/maps', $featured_new_name);

        $service = Map::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'featured' => 'uploads/maps/' . $featured_new_name
        ]);

        toastr()->success('Map created succesfully!');

        return redirect()->route('maps');
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
        $map = Map::find($id);

        $map->delete();

        toastr()->success('The map was just trashed!');

        return redirect()->back();
    }

   public function trashed()
   {
       $maps = Map::onlyTrashed()->get();

       return view('admin.maps.trashed')->with('maps', $maps);
   }

  public function kill($id)
  {
      $map = Map::withTrashed()->where('id', $id)->first();

      $map->forceDelete();

      toastr()->success('Map deleted permanently.');

      return redirect()->back();
  }

 public function restore($id)
 {
     $map = Map::withTrashed()->where('id', $id)->first();

     $map->restore();

     toastr()->success('Map restored successfully!');

     return redirect()->route('maps');
 }
}
