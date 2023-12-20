<?php

namespace App\Repositories\Contracts;

use App\Models\LottoDraw;

interface LottoDrawRepositoryInterface
{
    public function storeDrawResult($data);

    public function getLast10DrawResults();

    public function getLastResult();
}
