<?php

namespace App\Http\Controllers;

use App\ExperienceEducation;
use App\Workers;
use Illuminate\Http\Request;

class ExperienceEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $expEd = ExperienceEducation::with('parent');
        $count = $expEd->count();
        $expEd = $expEd->paginate(10);
        return view('about.index', ['expEd' => $expEd, 'count' => $count]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $workers = Workers::select('id', 'name', 'surname')->get();
        return view("about.create", compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateExp($request);

        $expEd              = new ExperienceEducation();
        $expEd->description = $request->description;
        $expEd->old         = $request->old;
        $expEd->from        = \DateTime::createFromFormat("d/m/Y", $request->from);
        $expEd->parent_id   = $request->parent_id;
        $expEd->type        = $request->type;

        if ($request->to) {
            $expEd->to = \DateTime::createFromFormat("d/m/Y", $request->to);
        }

        $expEd->save();

        return redirect("admin/about");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ExperienceEducation $about
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienceEducation $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ExperienceEducation $about
     * @return \Illuminate\View\View
     */
    public function edit(ExperienceEducation $about): \Illuminate\View\View
    {
        $workers = Workers::select('id', 'name')->get();
        return view("about.edit", ["expEd" => $about, "workers" => $workers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ExperienceEducation $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ExperienceEducation $about): \Illuminate\Http\RedirectResponse
    {
        $this->validateExp($request);

        $about->description = $request->description;
        $about->old         = $request->old;
        $about->from        = \DateTime::createFromFormat("d/m/Y", $request->from);
        $about->parent_id   = $request->parent_id;
        $about->type        = $request->type;


        if ($request->to) {
            $about->to = \DateTime::createFromFormat("d/m/Y", $request->to);
        }

        $about->save();

        return redirect("admin/about");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ExperienceEducation $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ExperienceEducation $about): \Illuminate\Http\RedirectResponse
    {
        $about->delete();
        return redirect()->back();
    }

    private function validateExp(Request $request)
    {
        $request->validate([
            'parent_id'   => 'required',
            'type'        => 'required|integer|between:1,2',
            'from'        => 'required|date',
        ]);
    }
}
