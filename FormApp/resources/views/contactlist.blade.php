@extends('layouts.app')

@section('content')
    <h2>送信された問い合わせ申請</h2>
    <div class="table-container">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>メッセージ</th>
                <th>送信された時間</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr class="data-row">
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">問い合わせ申請はいません</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
@endsection