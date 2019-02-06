<?php

namespace App\Http\Controllers;

use App\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index')->with('services', Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exits = Service::where('serviceUrl', '=', $request->serviceUrl)->get()->first();

        if($exits)
        {
          toastr()->info('Service exists!');

          return redirect()->route('services');
        }
        else {
          $this->validate($request, [
            'serviceUrl' => 'required|max:255',
            'serviceType' => 'required|max:4'
          ]);

          if($request->authenticationCheck == 'on'){
            $service = Service::create([
                'serviceUrl' => $request->serviceUrl,
                'serviceType' => $request->serviceType,
                'slug' => str_slug($request->serviceUrl),
                'username' => $request->username,
                'password' => $request->password
            ]);
          }
          else
          {
            $service = Service::create([
                'serviceUrl' => $request->serviceUrl,
                'serviceType' => $request->serviceType,
                'slug' => str_slug($request->serviceUrl),
                'username' => '',
                'password' => ''
            ]);
          }

          toastr()->success('Service created succesfully!');

          return redirect()->route('services');
        }
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
      $service = Service::find($id);

      return view('admin.services.edit')->with('service', $service);
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
      $this->validate($request, [
        'serviceUrl' => 'required|max:255',
        'serviceType' => 'required|max:4'
      ]);

      $service = Service::find($id);

      $service->serviceUrl = $request->serviceUrl;
      $service->serviceType = $request->serviceType;
      $service->slug = str_slug($request->serviceUrl);
      if($request->username && $request->password)
      {
        $service->username = $request->username;
        $service->password = $request->password;
      }

      $service->save();

      toastr()->success('Service updated succesfully!');

      return redirect()->route('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $service = Service::find($id);

      $service->delete();

      toastr()->success('The service was just trashed!');

      return redirect()->back();
    }

   public function trashed()
   {
       $services = Service::onlyTrashed()->get();

       return view('admin.services.trashed')->with('services', $services);
   }

  public function kill($id)
  {
      $service = Service::withTrashed()->where('id', $id)->first();

      $service->forceDelete();

      toastr()->success('Service deleted permanently.');

      return redirect()->back();
  }

 public function restore($id)
 {
     $service = Service::withTrashed()->where('id', $id)->first();

     $service->restore();

     toastr()->success('Service restored successfully!');

     return redirect()->route('services');
 }
}
