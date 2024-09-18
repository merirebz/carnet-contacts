<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contact;

class ContactWebController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:contacts',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index');
    }
    public function edit(Contact $contact)
{
    return view('contacts.edit', compact('contact'));
}

public function update(Request $request, Contact $contact)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|unique:contacts,email,' . $contact->id,
    ]);

    $contact->update($validatedData);

    return redirect()->route('contacts.index');
}
public function destroy(Contact $contact)
{
    $contact->delete();
    return redirect()->route('contacts.index');
}

}
