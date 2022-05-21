<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a
                    href="/"
                    class="nav-link {!! !\Illuminate\Support\Facades\Request::segment(1) ? 'active' : ''!!}"
                    aria-current="page"
                >
                    Create Short URL
                </a>
            </li>
            <a
                href="/statistics"
                class="nav-link {!! \Illuminate\Support\Facades\Request::segment(1) === 'statistics' ? 'active' : ''!!}"
                aria-current="page"
            >
                Statistics
            </a>
        </ul>
    </header>
</div>
