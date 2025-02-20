<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    //問い合わせ申請を全部表示します
    public function contactList() 
    {
        $contacts = Contact::latest()->get();
        return view('contactlist', compact('contacts')); 
    }

    //問い合わせ申請を作成します
    public function create()
    {
        return view('contact');
    }

    //問い合わせ申請を作成してDBに保存します
    //JavaScriptで同じくデータは正しいかどうか確認します（JavaScriptのfunctionは先に起動されます）
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'), 
        [
            'name' => 'required|max:30',
            'email' => 'required|email|max:80',
            'message' => 'required|max:500'
        ],
        [
            'name.required' => 'このフィールドを入力してください。',
            'name.max' => 'このフィールド30文字以内で入力してください。',
            'email.required' => 'このフィールドを入力してください。',
            'email.email' => '入力したメールアドレスに間違えがあります。',
            'email.max' => 'このフィールド80文字以内で入力してください。',
            'message.required' => 'このフィールドを入力してください。',
            'message.max' => 'このフィールド500文字以内で入力してください。',
        ]
    );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Contact::create($request->except('_token'));

        return redirect('/contact')->with('success', 'メッセージは送信いたしました、返答するまでしばらくお待ちください。');
    }
}
