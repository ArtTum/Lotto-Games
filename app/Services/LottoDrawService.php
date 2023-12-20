<?php

namespace App\Services;

use App\Repositories\LottoDrawRepository;

class LottoDrawService
{
    protected $lottoDrawRepository;

    const LOTTO_GAMES = [
        ['mainSetSize' => 40, 'ballsDrawn' => 5],
        ['mainSetSize' => 49, 'ballsDrawn' => 7],
    ];

    public function __construct(LottoDrawRepository $lottoDrawRepository)
    {
        $this->lottoDrawRepository = $lottoDrawRepository;
    }

    public function draw(int $mainSetSize, int $ballsDrawn): array
    {
        $lottoEngineNumbers = $this->simulateDraw($mainSetSize, $ballsDrawn);
        $userGeneratedNumbers = $this->simulateDraw($mainSetSize, $ballsDrawn);
        $matchedNumbers = array_intersect($lottoEngineNumbers, $userGeneratedNumbers);
        $isWinner = $this->determineWin($ballsDrawn, $matchedNumbers);

        $drawResult = [
            'lotto_engine_numbers' => $lottoEngineNumbers,
            'user_generated_numbers' => $userGeneratedNumbers,
            'matched_numbers' => $matchedNumbers,
            'is_winner' => $isWinner,
            'draw_time' => now(),
        ];

        $this->lottoDrawRepository->storeDrawResult($drawResult);

        return $drawResult;
    }

    private function simulateDraw(int $mainSetSize, int $ballsDrawn): array
    {
        $allNumbers = range(1, $mainSetSize);
        shuffle($allNumbers);
        return array_slice($allNumbers, 0, $ballsDrawn);
    }

    private function determineWin(int $ballsDrawn, array $matchedNumbers): bool
    {
        if ($ballsDrawn == 5 && count($matchedNumbers) >= 3) {
            return true;
        } elseif ($ballsDrawn == 7 && count($matchedNumbers) >= 2) {
            return true;
        }

        return false;
    }
}
