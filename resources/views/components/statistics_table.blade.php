<link rel="stylesheet" href="{{ asset('css/grid.css')}}" media="all">
<main>
    <div class="container">
        <div class="row mb-3">
            <div class="col-4 themed-grid-col"><b>Short URL</b></div>
            <div class="col-8 themed-grid-col" style="word-break: break-all;">{{$urlModel->getShortUrl()}}</div>
            <div class="col-4 themed-grid-col">URL</div>
            <div class="col-8 themed-grid-col" style="word-break: break-all;">{{$urlModel->getUrl()}}</div>
            <div class="col-4 themed-grid-col">Views</div>
            <div class="col-8 themed-grid-col">{{$urlModel->getViews()}}</div>
            <div class="col-4 themed-grid-col">Last view</div>
            <div class="col-8 themed-grid-col">{{$urlModel->getViews() > 0 ? $urlModel->getUpdatedAt() : '-'}}</div>
            <div class="col-4 themed-grid-col">Expired At</div>
            <div class="col-8 themed-grid-col">{{$urlModel->getExpiredAt()}}</div>
        </div>
        <div class="row mb-3">
        </div>
    </div>
</main>
