<?php


namespace App\Http\Controllers;


use App\Http\Requests\StatisticsRequest;
use App\Repositories\UrlRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class StatisticsController
 * @package App\Http\Controllers
 */
class StatisticsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('pages.statistics');
    }

    /**
     * @param StatisticsRequest $request
     * @return Factory|View|Application
     */
    public function check(StatisticsRequest $request): Factory|View|Application
    {
        $urlModel = UrlRepository::getByUrlMask($request->get('url_mask'), false);

        return view('pages.statistics', [
            'urlModel' => $urlModel,
        ]);
    }
}
