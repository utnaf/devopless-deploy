<?php

namespace App\Service;

use App\Entity\AwesomeCandidate;

class AwesomeService
{
    const ALWAYS_AWESOME_TWITTER = "@utnaf";
    const ALWAYS_AWESOME_NAME = "davide";

    public function isCandidateAwesome(AwesomeCandidate $awesomeCandidate): bool {
        return $awesomeCandidate->getTwitterHandle() === self::ALWAYS_AWESOME_TWITTER
            || stripos($awesomeCandidate->getName(), self::ALWAYS_AWESOME_NAME) !== false;
    }

}