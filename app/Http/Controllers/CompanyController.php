<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $company = Company::all();
        return view('company.index', ['company' => $company, 'count' => $company->count()]);
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
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\View\View
     */
    public function edit(Company $company): \Illuminate\View\View
    {
        return view("company.edit", compact("company"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $this->validateCompany($request);

        $company->name           = $request->name;
        $company->oln            = $request->oln;
        $company->menuAbout      = $request->menuAbout;
        $company->olma           = $request->olma;
        $company->menuFoundation = $request->menuFoundation;
        $company->olmf           = $request->olmf;
        $company->news           = $request->news;
        $company->olnn           = $request->olnn;
        $company->newsMore       = $request->newsMore;
        $company->olnm           = $request->olnm;
        $company->contact        = $request->contact;
        $company->olc            = $request->olc;
        $company->links          = $request->links;
        $company->oll            = $request->oll;
        $company->settings       = $request->settings;
        $company->ols            = $request->ols;
        $company->law            = $request->law;
        $company->ollaw          = $request->ollaw;
        $company->rules          = $request->rules;
        $company->olr            = $request->olr;
        $company->settingTitle   = $request->settingTitle;
        $company->olst           = $request->olst;
        $company->work           = $request->work;
        $company->olw            = $request->olw;
        $company->education      = $request->education;
        $company->ole            = $request->ole;
        $company->save();

        return redirect("admin/company");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company): \Illuminate\Http\RedirectResponse
    {
        //
    }

    private function validateCompany(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'oln'            => 'required',
            'menuAbout'      => 'required',
            'olma'           => 'required',
            'menuFoundation' => 'required',
            'olmf'           => 'required',
            'news'           => 'required',
            'olnn'           => 'required',
            'newsMore'       => 'required',
            'olnm'           => 'required',
            'contact'        => 'required',
            'olc'            => 'required',
            'links'          => 'required',
            'oll'            => 'required',
            'settings'       => 'required',
            'ols'            => 'required',
            'law'            => 'required',
            'ollaw'          => 'required',
            'rules'          => 'required',
            'olr'            => 'required',
            'settingTitle'   => 'required',
            'olst'           => 'required',
            'work'           => 'required',
            'olw'            => 'required',
            'education'      => 'required',
            'ole'            => 'required',
        ]);
    }
}
