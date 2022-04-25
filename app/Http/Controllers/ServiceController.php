<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getServices = Service::all();
        return view('panel.service.index',compact('getServices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'protocol' => 'required',
            'country' => 'required',
            'flag' => 'required'
        ]);
        //Validate flag icon image
        if(request()->hasFile('flag')){
            $data['flag'] = request()->file('flag')->store('imagesFlag','public');
        }

        Service::create($data);
        return redirect()->back()->with('status','Agregado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('panel.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = request()->validate([
            'protocol' => 'required',
            'country' => 'required',
        ]);

        if (request()->hasFile('flag')) {
            Storage::delete('public/' . $service['image']);
            $data['flag'] = $request->file('flag')->store('imagesFlag', 'public');
        }
        $service->update($data);
        return redirect()->route('service.index')->with('status','Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        
        Storage::delete('public/' . $service['flag']);
        $service->delete();
        return redirect()->back()->with('status','Eliminado!!');
    }
}
