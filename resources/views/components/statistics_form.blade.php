<link rel="stylesheet" href="{{ asset('css/form.css')}}" media="all">
<main class="form-signin w-100 m-auto">
    <form action="/statistics/check" method="post">
        <h1 class="h3 mb-3 fw-normal">Enter URL MASK</h1>
        <h3 class="h6 mb-3 fw-normal">{{config('app.url')}}/to/{your_mask}</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-floating mb-2">
            <input
                type="text"
                name="url_mask"
                value="{{ $urlModel ? $urlModel->getUrlMask() : old('url_mask') }}"
                class="form-control @error('url_mask') is-invalid @enderror"
                id="urlInput"
                placeholder="1234567890"
            >
            <label for="urlInput">{your_mask}</label>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Search</button>
    </form>
</main>
