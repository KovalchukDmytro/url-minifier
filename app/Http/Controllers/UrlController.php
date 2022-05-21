<?php


namespace App\Http\Controllers;


use App\Helpers\UrlFormatHelper;
use App\Http\Requests\UrlCreateRequest;
use App\Repositories\UrlRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class UrlController
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    /**
     * @param string $urlMask
     * @return Redirector|Application|RedirectResponse
     */
    public function to(string $urlMask): Redirector|Application|RedirectResponse
    {
        $urlModel = UrlRepository::getByUrlMask($urlMask);
        if (!$urlModel) {
            return redirect('/404');
        }

        $urlModel->updateViewCounter();

        return redirect($urlModel->getUrl());
    }

    /**
     * @param UrlCreateRequest $request
     * @return Factory|View|Application
     */
    public function addUrl(UrlCreateRequest $request): Factory|View|Application
    {
        $url = $request->get('url');
        $expiredAt = $request->get('expired_at');

        $encodedURL = UrlFormatHelper::encodeURL($url);

        $urlModel = UrlRepository::createUrlMask($encodedURL, $expiredAt);

        return view('pages.statistics', [
            'urlModel' => $urlModel,
        ]);
    }
}
