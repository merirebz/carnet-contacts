<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index() {
        return Contact::all();


    }

    public function store(Request $request) {
        $contact = Contact::create($request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:contacts,email',
        ]));
        return response()->json($contact, 201);
    }

    public function show(Contact $contact) {
        return response()->json($contact);
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($validatedData);
        return response()->json($contact);
    }

    public function destroy($id)
    {

        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        $contact->delete();

      
        return response()->json(['message' => 'Contact deleted successfully'], 200);
    }


}

