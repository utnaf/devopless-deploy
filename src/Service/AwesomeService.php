<?php

namespace App\Service;

use App\Entity\AwesomeCandidate;

class AwesomeService
{
    const ALWAYS_AWESOME_TWITTER = "@utnaf";
    const BEST_CHANCE_AWESOME_NAME = "davide";

    public function isCandidateAwesome(AwesomeCandidate $awesomeCandidate): bool {
        return $awesomeCandidate->getTwitterHandle() === self::ALWAYS_AWESOME_TWITTER
            || stripos($awesomeCandidate->getName(), self::BEST_CHANCE_AWESOME_NAME) !== false;
    }

}