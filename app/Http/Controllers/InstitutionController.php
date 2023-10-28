<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use Inertia\Inertia;

class InstitutionController extends Controller
{
    // Variables
    private string $routeName;
    private string $source;
    private Institution $model;

    // Constructor
    public function __construct()
    {
        $this->source = 'Institutions/';
        $this->routeName = 'institution.';
        $this->model = new Institution();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("{$this->source}Index", [
            'instituciones' => $this->model->paginate(5),
            'titulo' => 'Catalogo de instituciones',
            'routeName' => $this->routeName,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("{$this->source}Create", [
            'titulo' => 'Crear Instituciones',
            'routeName' => $this->routeName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        Institution::create($request->validated());
        return redirect()->route("institution.index")->with('message', 'Institucion agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {

    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        return Inertia::render("{$this->source}Edit", [
            'instituciones' => $institution,
            'titulo' => 'Editando ' . strtolower($institution->name),
            'routeName' => $this->routeName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->validated());
        return redirect()->route("institution.index")->with('message', 'Institucion actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return redirect()->route("institution.index")->with('message', 'Institucion eliminada correctamente');
    }
}
