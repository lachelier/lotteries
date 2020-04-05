@extends('layouts.app')

@section('title', 'くじを入れよう')
@section('content')
<div class="container">
    <div>
        <p>{{ date('H:i', $lottery->deadline_at) }}までクジを入れられるよ！</p>
        <img src="https://placehold.jp/150x150.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
        <lot uname="{{ $lottery->uname }}"></lot>
        <share-box url="{{ secure_url("/k/{$lottery->uname}/edit")  }}"></share-box>
    </div>
</div>
@endsection