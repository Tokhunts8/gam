<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\CountriesTable;
use App\Http\Helpers\CountriesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountriesTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $countries = CountriesTable::with('parent');
        $count     = $countries->count();
        $countries = $countries->paginate(10);
        return view('countries.index', ['countries' => $countries, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $countries = CountriesList::$country_array;
        $blogs     = Blog::select('id', 'name')->get();
        $belongsTo = CountriesTable::select('parent_id')->first();
        return view("countries.create", ["countries" => $countries, 'blogs' => $blogs, 'parent' => $belongsTo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validateCountries($request);

        $countries              = new CountriesTable();
        $countries->countryCode = $request->country;
        $countries->country     = CountriesList::$country_array[$request->country];
        $countries->value       = $request->value;
        $countries->parent_id   = $request->parent_id;
        $countries->created_at  = \DateTime::createFromFormat("d/m/Y", $request->created_at);

        $countries->save();

        return redirect("admin/countriesTable");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CountriesTable $countriesTable
     * @return \Illuminate\Http\Response
     */
    public function show(CountriesTable $countriesTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\CountriesTable $countriesTable
     * @return \Illuminate\View\View
     */
    public function edit(CountriesTable $countriesTable): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("countries.edit", ["country" => $countriesTable, "countries" => CountriesList::$country_array, "blogs" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CountriesTable $countriesTable
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CountriesTable $countriesTable): \Illuminate\Http\RedirectResponse
    {
        $this->validateCountries($request);

        $countriesTable->country     = CountriesList::$country_array[$request->country];
        $countriesTable->countryCode = $request->country;
        $countriesTable->value       = $request->value;
        $countriesTable->created_at  = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $countriesTable->save();

        if ($countriesTable->parent_id != $request->parent_id) {
            DB::table('countries_tables')->update(['parent_id' => $request->parent_id]);
        }

        return redirect("admin/countriesTable");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CountriesTable $countriesTable
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CountriesTable $countriesTable): \Illuminate\Http\RedirectResponse
    {
        $countriesTable->delete();
        return redirect()->back();
    }

    private function validateCountries(Request $request)
    {
        $request->validate([
            'country'   => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!array_key_exists($value, CountriesList::$country_array)) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
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
                        $todayValues = CountriesTable::where('id', '<>', $request->id)->get();
                    }
                    else {
                        $todayValues = CountriesTable::all();
                    }

                    foreach ($todayValues as $country) {
                        $value += $country->value;
                    }

                    if ($value > 100.00) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ]
        ]);
    }

    public function countriesTableApi()
    {
        $countries = CountriesTable::select(['country AS name', 'value', 'countryCode'])->get()->toArray();
        foreach ($countries as &$country) {
            $country['id'] = $country['countryCode'];
            unset($country['countryCode']);
        }
        return response()->json($countries, 200);
    }
}
