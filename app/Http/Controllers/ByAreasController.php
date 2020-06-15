<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\byAreas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ByAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $area  = byAreas::with('parent');
        $count = $area->count();
        $area  = $area->paginate(10);
        return view('areas.index', ['areas' => $area, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = byAreas::select('parent_id')->first();
        return view("areas.create", ['blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateCurrencies($request);

        $area             = new byAreas();
        $area->name       = $request->name;
        $area->oln        = $request->oln;
        $area->oln        = $request->oln;
        $area->value      = $request->value;
        $area->parent_id  = $request->parent_id;
        $area->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $area->save();

        return redirect("admin/areas");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\byAreas $area
     * @return \Illuminate\Http\Response
     */
    public function show(byAreas $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\byAreas $area
     * @return \Illuminate\View\View
     */
    public function edit(byAreas $area): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("areas.edit", ["area" => $area, "blogs" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\byAreas $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, byAreas $area): \Illuminate\Http\RedirectResponse
    {
        $this->validateCurrencies($request);

        $area->name       = $request->name;
        $area->oln        = $request->oln;
        $area->oln        = $request->oln;
        $area->value      = $request->value;
        $area->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $area->save();

        if ($area->parent_id != $request->parent_id) {
            DB::table('by_areas')->update(['parent_id' => $request->parent_id]);
        }

        return redirect("admin/areas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\byAreas $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(byAreas $area): \Illuminate\Http\RedirectResponse
    {
        $area->delete();
        return redirect()->back();
    }

    private function validateCurrencies(Request $request)
    {
        $request->validate([
            'name'      => [
                'required'
            ],
            'parent_id' => [
                'required'
            ],
            'oln'       => [
                'required'
            ],
            'value'     => [
                'required',
                'numeric',
                'min:0.01',
                'max:100.00',
                function ($attribute, $value, $fail) use ($request) {
                    if (isset($request->id)) {
                        $todayValues = byAreas::where('id', '<>', $request->id)->get();
                    }
                    else {
                        $todayValues = byAreas::all();
                    }

                    foreach ($todayValues as $area) {
                        $value += $area->value;
                    }

                    if ($value > 100.00) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ]
        ]);
    }
}
