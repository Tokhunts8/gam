<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $blogs = Blog::with(['parent', 'types']);
        $count = $blogs->count();
        $blogs = $blogs->paginate(10);
        return view('blog.index', ['blogs' => $blogs, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $blogs = Blog::select('id', 'name')->get();
        $types = DB::table('types')->get();
        return view("blog.create", ["blogs" => $blogs, "types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validateBlog($request);

        $blog              = new Blog();
        $blog->name        = $request->name;
        $blog->description = $request->description;
        $blog->oln         = $request->oln;
        $blog->old         = $request->old;
        $blog->order       = $request->order;
        $blog->parent_id   = $request->parent_id;
        $blog->section     = $request->section;
        $blog->type        = $request->type;

        if ($request->image) {
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $blog->image = 'assets/blog/images/' . $imageName;
            $request->image->move(public_path('assets/blog/images'), $imageName);
        }
        $blog->save();

        return redirect("admin/blog");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Blog $blog
     * @return View
     */
    public function edit(Blog $blog): View
    {
        $blogs = Blog::select('id', 'name')->where('id', '<>', $blog->id)->get();
        $types = DB::table('types')->get();
        return view("blog.edit", ["blog" => $blog, "blogs" => $blogs, "types" => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $this->validateBlog($request);

        if ($request->image) {
            $image_path = public_path($blog->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $blog->image = 'assets/blog/images/' . $imageName;
            $request->image->move(public_path('assets/blog/images'), $imageName);
        }
        $blog->name        = $request->name;
        $blog->description = $request->description;
        $blog->oln         = $request->oln;
        $blog->old         = $request->old;
        $blog->order       = $request->order;
        $blog->parent_id   = $request->parent_id;
        $blog->section     = $request->section;
        $blog->type        = $request->type;
        $blog->save();

        return redirect("admin/blog");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $image_path = public_path($blog->image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $blog->delete();
        return redirect()->back();
    }

    private function validateBlog(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'order'   => 'required|integer',
            'type'    => 'required|integer',
            'section' => 'required|integer|between:1,2',
            'image'   => 'mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);
    }
}
