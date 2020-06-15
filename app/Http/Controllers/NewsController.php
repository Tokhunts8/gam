<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $news  = News::paginate(10);
        $count = News::count();
        return view('news.index', ['news' => $news, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view("news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateNews($request);

        $news              = new News();
        $news->title       = $request->title;
        $news->description = $request->description;
        $news->olt         = $request->olt;
        $news->old         = $request->old;

        if ($request->hasFile('image')) {
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $news->image = 'assets/news/images/' . $imageName;
            $request->image->move(public_path('assets/news/images'), $imageName);
        }

        $news->save();

        return redirect("admin/news");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\View\View
     */
    public function edit(News $news): \Illuminate\View\View
    {
        return view("news.edit", ["news" => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, News $news): \Illuminate\Http\RedirectResponse
    {
        $this->validateNews($request, '');

        if ($request->hasFile('image')) {
            $image_path = public_path($news->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $news->image = 'assets/news/images/' . $imageName;
            $request->image->move(public_path('assets/news/images'), $imageName);
        }

        $news->title       = $request->title;
        $news->description = $request->description;
        $news->olt         = $request->olt;
        $news->old         = $request->old;
        $news->save();

        return redirect("admin/news");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news): \Illuminate\Http\RedirectResponse
    {
        $image_path = public_path($news->image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $news->delete();
        return redirect()->back();
    }

    private function validateNews(Request $request, $required = 'required|')
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'image'       => $required . 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
