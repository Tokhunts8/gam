<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\assetAllocation;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $asset = assetAllocation::with('parent');
        $count = $asset->count();
        $asset = $asset->paginate(10);
        return view('assetAllocation.index', ['assetAllocation' => $asset, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = assetAllocation::select('parent_id')->first();
        return view("assetAllocation.create", ['blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateAssetAllocation($request);

        $assetAllocation             = new assetAllocation();
        $assetAllocation->name       = $request->name;
        $assetAllocation->oln        = $request->oln;
        $assetAllocation->value      = $request->value;
        $assetAllocation->parent_id  = $request->parent_id;
        $assetAllocation->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $assetAllocation->save();

        return redirect("admin/assetAllocation");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\assetAllocation $assetAllocation
     * @return \Illuminate\Http\Response
     */
    public function show(assetAllocation $assetAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\assetAllocation $assetAllocation
     * @return \Illuminate\View\View
     */
    public function edit(assetAllocation $assetAllocation): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("assetAllocation.edit", ["assetAllocation" => $assetAllocation, "blogs" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\assetAllocation $assetAllocation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, assetAllocation $assetAllocation): \Illuminate\Http\RedirectResponse
    {
        $this->validateAssetAllocation($request);

        $assetAllocation->name       = $request->name;
        $assetAllocation->oln        = $request->oln;
        $assetAllocation->value      = $request->value;
        $assetAllocation->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $assetAllocation->save();

        if ($assetAllocation->parent_id != $request->parent_id) {
            DB::table('asset_allocations')->update(['parent_id' => $request->parent_id]);
        }

        return redirect("admin/assetAllocation");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\assetAllocation $assetAllocation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(assetAllocation $assetAllocation): \Illuminate\Http\RedirectResponse
    {
        $assetAllocation->delete();
        return redirect()->back();
    }

    private function validateAssetAllocation(Request $request)
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
                        $todayValues = assetAllocation::where('id', '<>', $request->id)->get();
                    }
                    else {
                        $todayValues = assetAllocation::all();
                    }

                    foreach ($todayValues as $assetAll) {
                        $value += $assetAll->value;
                    }

                    if ($value > 100.00) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ]
        ]);
    }
}
