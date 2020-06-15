<?php

namespace App\Http\Controllers;

use App\Rules;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $rules = Rules::paginate(10);
        $count = Rules::count();
        return view('rules.index', ['rules' => $rules, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view("rules.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateRules($request);

        $rule        = new Rules();
        $rule->name  = $request->name;
        $rule->oln   = $request->oln;
        $rule->url   = $request->url;
        $rule->order = $request->order;
        $rule->type  = $request->type;

        $rule->save();

        return redirect("admin/rules");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Rules $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rules $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Rules $rule
     * @return \Illuminate\View\View
     */
    public function edit(Rules $rule): \Illuminate\View\View
    {
        return view("rules.edit", compact("rule"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Rules $rule
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Rules $rule): \Illuminate\Http\RedirectResponse
    {
        $this->validateRules($request);

        $rule->name  = $request->name;
        $rule->oln   = $request->oln;
        $rule->url   = $request->url;
        $rule->order = $request->order;
        $rule->type  = $request->type;

        $rule->save();

        return redirect("admin/rules");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Rules $rule
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rules $rule): \Illuminate\Http\RedirectResponse
    {
        $rule->delete();
        return redirect()->back();
    }

    private function validateRules(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'order' => 'required',
            'url'   => 'required|url',
            'type'  => 'required|integer|between:1,2',
        ]);
    }
}
