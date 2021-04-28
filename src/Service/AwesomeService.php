<?php

namespace App\Service;

use App\Entity\AwesomeCandidate;

class AwesomeService
{
    const MIN_CHANCE = 0;
    const MAX_CHANCE = 100;
    const ALWAYS_AWESOME_TWITTER = "@utnaf";
    const BEST_CHANCE_AWESOME_NAME = "davide";

    public function isCandidateAwesome(AwesomeCandidate $awesomeCandidate): bool {
        $threshold = 0;

        $threshold+= strlen($awesomeCandidate->getName()) % 2 === 0 ? 10 : 3;
        $threshold+= strlen($awesomeCandidate->getName()) === 9 ? 40 : 0;
        $threshold+= strlen($awesomeCandidate->getName()) > 11 ? 20 : 10;
        $threshold+= $awesomeCandidate->getTwitterHandle() !== null ? 20 : 0;
        $threshold+= stripos($awesomeCandidate->getName(), self::BEST_CHANCE_AWESOME_NAME) !== false ? 80 : 1;
        $threshold+= $awesomeCandidate->getTwitterHandle() === self::ALWAYS_AWESOME_TWITTER ? 1000 : 0;

        return rand(self::MIN_CHANCE, self::MAX_CHANCE) <= $threshold;
    }

}