<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Inertia\Inertia;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Suppliers/Index', [
            'suppliers' => Supplier::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Inertia::render('Suppliers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ]);

        $suppliers = Supplier::create($request->all());

        return redirect()->route('suppliers.index');
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
    public function edit(Supplier $supplier)
    {
        return Inertia::render('Suppliers/Edit', ['supplier' => $supplier]);
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
    public function destroy(string $id)
    {
        //
    }

    public function createSuppliers(Request $request){
        // $request->validate([
        //     'name'=> 'required',
        // ]);

        $suppliers = Supplier::create($request->all());

        $respuesta = [
            'suppliers' => $suppliers,
            'status' => true,
        ];

        return response()->json($respuesta);
    }
}
