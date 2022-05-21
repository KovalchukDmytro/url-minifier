@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/form.css')}}" media="all">
    <main class="form-signin w-100 m-auto">
        <form action="/url/create" method="post">
            <h1 class="h3 mb-3 fw-normal">Create Your short URL!</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-floating">
                <input
                    type="text"
                    name="url"
                    value="{{ old('url') }}"
                    class="form-control @error('url') is-invalid @enderror input-border-top-radius"
                    id="urlInput"
                    placeholder="https://google.com.ua"
                >
                <label for="urlInput">URL</label>
            </div>
            <div class="form-floating">
                <input
                    type="date"
                    name="expired_at"
                    value="{{ old('expired_at') }}"
                    class="form-control @error('expired_at') is-invalid @enderror input-border-bot-radius"
                    id="expiredAtInput"
                    placeholder="https://google.com.ua"
                >
                <label for="expiredAtInput">Expired At</label>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
        </form>
    </main>
@endsection
