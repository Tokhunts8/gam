<?php

namespace App\Http\Controllers;

use App\Blog;
use App\navChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NavChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        if ($request->start || $request->end) {
            $request->validate([
                'start' => 'required|date',
                'end'   => 'required|date|after_or_equal:start',
            ]);
            $start     = \DateTime::createFromFormat("d/m/Y", $request->start);
            $end       = \DateTime::createFromFormat("d/m/Y", $request->end);
            $nav       = navChart::with('parent')->whereDate('created_at', '<=', $end->format('Y-m-d'))
                ->whereDate('created_at', '>=', $start->format('Y-m-d'))->orderBy('created_at', 'desc');
            $count     = $nav->count();
            $navValues = $nav->paginate(10)->appends(request()->query());
        }
        else {
            $navValues = navChart::with('parent')->orderBy('created_at', 'desc');
            $count     = $navValues->count();
            $navValues = $navValues->paginate(10);
        }
        return view('nav.index', ['nav' => $navValues, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = navChart::select('parent_id')->first();
        return view("nav.create", ['blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateNavChart($request);

        $nav             = new navChart();
        $nav->value      = $request->value;
        $nav->parent_id  = $request->parent_id;
        $nav->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $nav->save();
        Cache::forget('nav');

        return redirect("admin/nav");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\navChart $nav
     * @return \Illuminate\Http\Response
     */
    public function show(navChart $nav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\navChart $nav
     * @return \Illuminate\View\View
     */
    public function edit(navChart $nav): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("nav.edit", ['nav' => $nav, 'blogs' => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\navChart $nav
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, navChart $nav): \Illuminate\Http\RedirectResponse
    {
        $this->validateNavChart($request);

        $nav->value      = $request->value;
        $nav->created_at = $request->created_at;
        $nav->save();

        if ($nav->parent_id != $request->parent_id) {
            DB::table('nav_charts')->update(['parent_id' => $request->parent_id]);
        }
        Cache::forget('nav');

        return redirect("admin/nav");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\navChart $nav
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(navChart $nav): \Illuminate\Http\RedirectResponse
    {
        $nav->delete();
        Cache::forget('nav');
        return redirect()->back();
    }

    private function validateNavChart(Request $request)
    {
        $request->validate([
            'value'     => 'required|numeric',
            'parent_id' => 'required|numeric',
        ]);
    }


    public function apiInsert(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'apiKey' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value !== 'hash') {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ],
            'value'  => 'required',
            'date'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        $nav             = new navChart();
        $nav->value      = $request->value;
        $nav->created_at = $request->date;
        $nav->save();

        return response()->json(['msg' => 'success'], 200);

    }

    public function navChartApi(Request $request)
    {
        $nav = navChart::select(['value', 'created_at'])->orderBy('created_at', 'desc');

        if (empty($request->start) && empty($request->end)) {
            $nav = Cache::rememberForever('nav', function () use ($nav) {
                return $nav->get()->toArray();
            });
        }
        else {
            if ($request->start) {
                $start = \DateTime::createFromFormat("d-m-Y", $request->start);
                $nav   = $nav->whereDate('created_at', '>=', $start->format('Y-m-d'));
            }
            if ($request->end) {
                $end = \DateTime::createFromFormat("d-m-Y", $request->end);
                $nav = $nav->whereDate('created_at', '<=', $end->format('Y-m-d'));
            }
            $nav = $nav->get()->toArray();
        }

        foreach ($nav as &$value) {
            $value['created_at'] = date('d-m-Y', strtotime($value['created_at']));
        }

        return response()->json($nav, 200);
    }


}
