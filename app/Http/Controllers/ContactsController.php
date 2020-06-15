<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Blog;
use App\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $contacts = Contacts::with('parent');
        $count    = $contacts->count();
        $contacts = $contacts->paginate(10);
        return view('contacts.index', ['contacts' => $contacts, 'count' => $count]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $blogs = Blog::select('id', 'name')->get();
        return view("contacts.create", compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->mine === 'on' ? ($request->mine = true) : ($request->mine = false);
        $this->validateContact($request);

        $contact              = new Contacts();
        $contact->description = $request->description;
        $contact->old         = $request->old;
        $contact->parent_id   = $request->parent_id;
        $contact->phone       = $request->phone;
        $contact->fax         = $request->fax;
        $contact->email       = $request->email;
        $contact->website     = $request->website;
        $contact->address     = $request->address;
        $contact->ola         = $request->ola;
        $contact->order       = $request->order;
        $contact->mine        = $request->mine;

        $contact->save();

        return redirect("admin/contacts");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Contacts $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Contacts $contact
     * @return \Illuminate\View\View
     */
    public function edit(Contacts $contact): \Illuminate\View\View
    {
        $blog = Blog::select('id', 'name')->get();
        return view("contacts.edit", ["contact" => $contact, "blogs" => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contacts $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contacts $contact): \Illuminate\Http\RedirectResponse
    {
        $request->mine === 'on' ? ($request->mine = true) : ($request->mine = false);
        $this->validateContact($request);

        $contact->description = $request->description;
        $contact->old         = $request->old;
        $contact->parent_id   = $request->parent_id;
        $contact->phone       = $request->phone;
        $contact->fax         = $request->fax;
        $contact->email       = $request->email;
        $contact->website     = $request->website;
        $contact->address     = $request->address;
        $contact->ola         = $request->ola;
        $contact->order       = $request->order;
        $contact->mine        = $request->mine;

        $contact->save();

        return redirect("admin/contacts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contacts $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contacts $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->delete();
        return redirect()->back();
    }

    private function validateContact(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'parent_id'   => 'required',
            'address'     => 'required',
            'order'       => 'required',
            'phone'       => 'required',
            'email'       => 'required|email',
            'website'     => 'nullable|url',
        ]);
    }
}
