<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\maturitySummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaturitySummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $matSum = maturitySummary::with('parent');
        $count  = $matSum->count();
        $matSum = $matSum->paginate(10);
        return view('maturitySummary.index', ['maturitySummary' => $matSum, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = maturitySummary::select('parent_id')->first();
        return view("maturitySummary.create", ['blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateMaturitySummary($request);

        $maturitySummary             = new maturitySummary();
        $maturitySummary->name       = $request->name;
        $maturitySummary->oln        = $request->oln;
        $maturitySummary->value      = $request->value;
        $maturitySummary->parent_id  = $request->parent_id;
        $maturitySummary->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $maturitySummary->save();


        return redirect("admin/maturitySummary");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\maturitySummary $maturitySummary
     * @return \Illuminate\Http\Response
     */
    public function show(maturitySummary $maturitySummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\maturitySummary $maturitySummary
     * @return \Illuminate\View\View
     */
    public function edit(maturitySummary $maturitySummary): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("maturitySummary.edit", ['maturitySummary' => $maturitySummary, 'blogs' => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\maturitySummary $maturitySummary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, maturitySummary $maturitySummary): \Illuminate\Http\RedirectResponse
    {
        $this->validateMaturitySummary($request);

        $maturitySummary->name       = $request->name;
        $maturitySummary->oln        = $request->oln;
        $maturitySummary->value      = $request->value;
        $maturitySummary->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $maturitySummary->save();

        if ($maturitySummary->parent_id != $request->parent_id) {
            DB::table('maturity_summaries')->update(['parent_id' => $request->parent_id]);
        }

        return redirect("admin/maturitySummary");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\maturitySummary $maturitySummary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(maturitySummary $maturitySummary): \Illuminate\Http\RedirectResponse
    {
        $maturitySummary->delete();
        return redirect()->back();
    }

    private function validateMaturitySummary(Request $request)
    {
        $request->validate([
            'name'      => [
                'required'
            ],
            'parent_id' => [
                'required'
            ],
            'value'     => [
                'required',
                'numeric',
                'min:0.01',
                'max:100.00',
                function ($attribute, $value, $fail) use ($request) {
                    if (isset($request->id)) {
                        $todayValues = maturitySummary::where('id', '<>', $request->id)->get();
                    }
                    else {
                        $todayValues = maturitySummary::all();
                    }

                    foreach ($todayValues as $matSum) {
                        $value += $matSum->value;
                    }

                    if ($value > 100.00) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ]
        ]);
    }
}
