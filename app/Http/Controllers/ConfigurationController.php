<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Models\configuration;
use Illuminate\Http\Request;
use Exception;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allConfigurations = configuration::latest()->paginate(10);
        return view('Config.index', compact('allConfigurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Config.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfigRequest $request)
    {
        try {
            $inputs = Configuration::create($request->all());
            if($inputs){
              return redirect()->route('configuration.index')->with('success_message', 'Configuration enregistrée');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $configuration)
    {
        try {
            $configuration->delete();
            return redirect()->route('configuration.index')->with('success_message', 'configuration supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
