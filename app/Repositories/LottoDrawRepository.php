<?php

namespace App\Repositories;

use App\Models\LottoDraw;
use App\Repositories\Contracts\LottoDrawRepositoryInterface;

class LottoDrawRepository implements LottoDrawRepositoryInterface
{
    public function storeDrawResult($data)
    {
        return LottoDraw::create($data);
    }

    public function getLast10DrawResults()
    {
        return LottoDraw::orderBy('draw_time', 'DESC')->take(10)->get();
    }

    public function getLastResult()
    {
        return LottoDraw::latest()->first();
    }

}
