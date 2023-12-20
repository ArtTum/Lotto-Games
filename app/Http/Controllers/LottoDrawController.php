<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\LottoDrawRepositoryInterface;
use App\Services\LottoDrawService;
use Illuminate\View\View;

class LottoDrawController extends Controller
{
    protected $lottoDrawService;
    protected $lottoDrawRepository;

    public function __construct(LottoDrawService $lottoDrawService, LottoDrawRepositoryInterface $lottoDrawRepository)
    {
        $this->lottoDrawService = $lottoDrawService;
        $this->lottoDrawRepository = $lottoDrawRepository;
    }

    public function index(): View
    {
        $last10DrawResults = $this->lottoDrawRepository->getLast10DrawResults();
        $lastResult = $this->lottoDrawRepository->getLastResult();

        return view('lotto-draw', [
                'last10DrawResults' => $last10DrawResults,
                'lottoGames' => LottoDrawService::LOTTO_GAMES,
                'lastResult' => $lastResult
            ]
        );
    }

    public function play($mainSetSize, $ballsDrawn)
    {
        $this->lottoDrawService->draw($mainSetSize, $ballsDrawn);
        return redirect()->route('lotto.index');
    }
}
