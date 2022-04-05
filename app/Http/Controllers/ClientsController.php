<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Clients/Index', [
            'clients' => Clients::all()->map(function($client){
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'website' => $client->website,
                    'monday' => $client->monday,
                    'tuesday' => $client->tuesday,
                    'wednesday' => $client->wednesday,
                    'thursday' => $client->thursday,
                    'friday' => $client->friday,
                    'status' => $client->status,
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'website' => ['required'],
        ]);
        Clients::create([
            'name' => Request::input('name'),
            'website' => Request::input('website'),
            'monday' => Request::input('monday'),
            'tuesday' => Request::input('tuesday'),
            'wednesday' => Request::input('wednesday'),
            'thursday' => Request::input('thursday'),
            'friday' => Request::input('friday'),
            'status' => 'inactive'
        ]);
        return Redirect::route('clients.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client)
    {
        return Inertia::render('Clients/Edit',[
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update( Clients $client)
    {
        $client->update([
            'name' => Request::input('name'),
            'website' => Request::input('website'),
            'monday' => Request::input('monday'),
            'tuesday' => Request::input('tuesday'),
            'wednesday' => Request::input('wednesday'),
            'thursday' => Request::input('thursday'),
            'friday' => Request::input('friday'),
            'status' => Request::input('status'),
        ]);
        return Redirect::route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        
        $client->delete();
        return Redirect::route('topics.index');
    }
}
