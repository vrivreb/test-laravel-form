@extends('layouts.app')

@section('content')

    <div class="title-container">
        <image id="toiawase-icon" src="{{ asset('toiawase.png') }}">
        <h2>お問い合わせフォーム</h2> 
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/contact" method="POST">
        @csrf
        <div class="mb-3">
            <label class="required">お名前</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="山田 太郎" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="required">メールアドレス</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="yamadatarou@gmail.com" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="required">メッセージ</label>
            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="ここに質問を書いてください" required></textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror       
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>
@endpush