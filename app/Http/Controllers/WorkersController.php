<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\Workers;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $workers = Workers::with('parent');
        $count   = $workers->count();
        $workers = $workers->paginate(10);
        return view('workers.index', ['workers' => $workers, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("workers.create", compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateWorkers($request);

        $workers            = new Workers();
        $workers->name      = $request->name;
        $workers->surname   = $request->surname;
        $workers->position  = $request->position;
        $workers->oln       = $request->oln;
        $workers->ols       = $request->ols;
        $workers->olp       = $request->olp;
        $workers->order     = $request->order;
        $workers->parent_id = $request->parent_id;

        if ($request->hasFile('image')) {
            $imageName      = time() . '.' . $request->image->getClientOriginalExtension();
            $workers->image = 'assets/workers/images/' . $imageName;
            $request->image->move(public_path('assets/workers/images'), $imageName);
        }

        $workers->save();

        return redirect("admin/workers");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Workers $workers
     * @return \Illuminate\Http\Response
     */
    public function show(Workers $workers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Workers $worker
     * @return \Illuminate\View\View
     */
    public function edit(Workers $worker): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("workers.edit", ["workers" => $worker, "blogs" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Workers $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workers $worker): \Illuminate\Http\RedirectResponse
    {
        $this->validateWorkers($request, '');

        if ($request->hasFile('image')) {
            $image_path = public_path($worker->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $imageName     = time() . '.' . $request->image->getClientOriginalExtension();
            $worker->image = 'assets/workers/images/' . $imageName;
            $request->image->move(public_path('assets/workers/images'), $imageName);
        }

        $worker->name      = $request->name;
        $worker->surname   = $request->surname;
        $worker->position  = $request->position;
        $worker->oln       = $request->oln;
        $worker->ols       = $request->ols;
        $worker->olp       = $request->olp;
        $worker->order     = $request->order;
        $worker->parent_id = $request->parent_id;

        $worker->save();

        return redirect("admin/workers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Workers $worker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Workers $worker): \Illuminate\Http\RedirectResponse
    {
        $image_path = public_path($worker->image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $worker->delete();
        return redirect()->back();
    }

    private function validateWorkers(Request $request, $required = 'required|')
    {
        $request->validate([
            'name'      => 'required',
            'surname'   => 'required',
            'position'  => 'required',
            'order'     => 'required',
            'parent_id' => 'required|integer',
            'image'     => $required . 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
