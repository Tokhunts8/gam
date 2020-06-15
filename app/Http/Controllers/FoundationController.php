<?php

namespace App\Http\Controllers;

use App\foundation;
use Illuminate\Http\Request;

class FoundationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $foundation = foundation::all();
        return view('foundation.index', ['foundation' => $foundation, 'count' => $foundation->count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\foundation $foundation
     * @return \Illuminate\Http\Response
     */
    public function show(foundation $foundation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\foundation $foundation
     * @return \Illuminate\View\View
     */
    public function edit(foundation $foundation): \Illuminate\View\View
    {
        return view("foundation.edit", compact("foundation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\foundation $foundation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, foundation $foundation): \Illuminate\Http\RedirectResponse
    {
        $this->validateCompany($request);

        $foundation->asset    = $request->asset;
        $foundation->ola      = $request->ola;
        $foundation->areas    = $request->areas;
        $foundation->ols      = $request->ols;
        $foundation->currency = $request->currency;
        $foundation->oly      = $request->oly;
        $foundation->country  = $request->country;
        $foundation->olc      = $request->olc;
        $foundation->maturity = $request->maturity;
        $foundation->olm      = $request->olm;
        $foundation->lastText = $request->lastText;
        $foundation->ollt     = $request->ollt;
        $foundation->save();

        return redirect("admin/foundation");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\foundation $foundation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(foundation $foundation): \Illuminate\Http\RedirectResponse
    {
        //
    }

    private function validateCompany(Request $request)
    {
        $request->validate([
            'asset'    => 'required',
            'ola'      => 'required',
            'areas'    => 'required',
            'ols'      => 'required',
            'currency' => 'required',
            'oly'      => 'required',
            'country'  => 'required',
            'olc'      => 'required',
            'maturity' => 'required',
            'olm'      => 'required',
            'lastText' => 'required',
            'ollt'     => 'required',
        ]);
    }
}
