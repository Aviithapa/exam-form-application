<?php

namespace App\Http\Controllers\Admin;

use App\Filters\MunicipalityFilter;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{


    protected  $filter;
    public function __construct(
        MunicipalityFilter $filter,
    ) {
        $this->filter = $filter;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $municipality = Municipality::join('district', 'district.id', '=', 'municipality.district_id')
            ->select(['municipality.*', 'district.name as district_name']);
        $data = $request->all();
        $this->filter->applyFilters($municipality, $data);

        $municipality->orderBy('municipality.created_at', 'desc');

        $municipalities = $municipality->paginate(50);

        return view('admin.pages.municipality.index', compact('municipalities', 'request'));
    }

    public function create()
    {
        $district = District::all();
        return view('admin.pages.municipality.create', compact('district'));
    }

    public function store(Request $request)
    {
        // Logic for storing a newly created resource
        Municipality::create($request->all());
        return redirect()->route('municipalities.index')->with('success', 'Municipality created successfully');
    }

    public function show(string $id)
    {
        // Logic for displaying a specific resource
        $municipality = Municipality::findOrFail($id);

        return view('admin.pages.municipality.show', compact('municipality'));
    }

    public function edit(string $id)
    {
        // Logic for displaying the form for editing a specific resource
        $municipality = Municipality::findOrFail($id);
        $district = District::all();
        return view('admin.pages.municipality.edit', compact('municipality', 'district'));
    }

    public function update(Request $request, string $id)
    {
        // Logic for updating a specific resource
        $municipality = Municipality::findOrFail($id);
        $municipality->update($request->all());

        return redirect()->route('municipalities.index')->with('success', 'Municipality updated successfully');
    }

    public function destroy(string $id)
    {
        // Logic for removing a specific resource
        $municipality = Municipality::findOrFail($id);
        $municipality->delete();

        return redirect()->route('municipalities.index')->with('success', 'Municipality deleted successfully');
    }
}
