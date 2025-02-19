<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->except('_token'));

        return redirect('/contact')->with('success', 'メッセージは送信いたしました、お返事するまでしばらくお待ちください。');
    }

    
    public function show(Contact $contact)
    {
        //
    }

    
    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    
    public function destroy(Contact $contact)
    {
        //
    }
}
