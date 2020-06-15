<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\byCurrencies;
use App\Http\Helpers\CurrenciesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ByCurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $currency = byCurrencies::with('parent');
        $count    = $currency->count();
        $currency = $currency->paginate(10);
        return view('currencies.index', ['currencies' => $currency, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $currencies = CurrenciesList::$currencies_list;
        $blogs      = Blog::select('id', 'name')->get();
        $belongsTo  = byCurrencies::select('parent_id')->first();
        return view("currencies.create", ["currencies" => $currencies, 'blogs' => $blogs, 'parent' => $belongsTo]);
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

        $currencies             = new byCurrencies();
        $currencies->currency   = $request->currency;
        $currencies->value      = $request->value;
        $currencies->parent_id  = $request->parent_id;
        $currencies->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $currencies->save();

        return redirect("admin/currencies");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\byCurrencies $currency
     * @return \Illuminate\Http\Response
     */
    public function show(byCurrencies $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\byCurrencies $currency
     * @return \Illuminate\View\View
     */
    public function edit(byCurrencies $currency): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("currencies.edit", ['currency' => $currency, 'currencies' => CurrenciesList::$currencies_list, 'blogs' => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\byCurrencies $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, byCurrencies $currency): \Illuminate\Http\RedirectResponse
    {
        $this->validateCurrencies($request);

        $currency->currency   = $request->currency;
        $currency->value      = $request->value;
        $currency->created_at = \DateTime::createFromFormat("d/m/Y", $request->created_at);
        $currency->save();

        if ($currency->parent_id != $request->parent_id) {
            DB::table('by_currencies')->update(['parent_id' => $request->parent_id]);
        }

        return redirect("admin/currencies");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\byCurrencies $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(byCurrencies $currency): \Illuminate\Http\RedirectResponse
    {
        $currency->delete();
        return redirect()->back();
    }

    private function validateCurrencies(Request $request)
    {
        $request->validate([
            'currency'  => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!array_key_exists($value, CurrenciesList::$currencies_list)) {
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
                        $todayValues = byCurrencies::where('id', '<>', $request->id)->get();
                    }
                    else {
                        $todayValues = byCurrencies::all();
                    }

                    foreach ($todayValues as $currency) {
                        $value += $currency->value;
                    }

                    if ($value > 100.00) {
                        return $fail($attribute . ' is invalid.');
                    }
                }
            ]
        ]);
    }
}
