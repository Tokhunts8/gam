<?php

namespace App\Http\Controllers;

use App\Blog;
use App\fundPerformance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $fund  = fundPerformance::with('parent');
        $count = $fund->count();
        $fund  = $fund->paginate(10);
        return view('fund.index', ['funds' => $fund, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = fundPerformance::select('parent_id')->first();
        return view("fund.create", ['blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateFundPerformance($request);

        $fund             = new fundPerformance();
        $fund->name       = $request->name;
        $fund->oln        = $request->oln;
        $fund->value      = $request->value;
        $fund->parent_id  = $request->parent_id;
        $fund->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $fund->save();

        return redirect("admin/fund");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\fundPerformance $fund
     * @return \Illuminate\Http\Response
     */
    public function show(fundPerformance $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\fundPerformance $fund
     * @return \Illuminate\View\View
     */
    public function edit(fundPerformance $fund): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("fund.edit", ["fund" => $fund, "blogs" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\fundPerformance $fund
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, fundPerformance $fund): \Illuminate\Http\RedirectResponse
    {
        $this->validateFundPerformance($request);

        $fund->name       = $request->name;
        $fund->oln        = $request->oln;
        $fund->value      = $request->value;
        $fund->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $fund->save();

        if ($fund->parent_id != $request->parent_id) {
            DB::table('fund_performances')->update(['parent_id' => $request->parent_id]);
        }


        return redirect("admin/fund");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\fundPerformance $fund
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(fundPerformance $fund): \Illuminate\Http\RedirectResponse
    {
        $fund->delete();
        return redirect()->back();
    }

    private function validateFundPerformance(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'parent_id' => 'required',
            'oln'       => 'required',
            'value'     => 'required',
        ]);
    }
}
