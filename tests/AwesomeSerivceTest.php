<?php

namespace App\Tests;

use App\Entity\AwesomeCandidate;
use App\Service\AwesomeService;
use PHPUnit\Framework\TestCase;

class AwesomeServiceTest extends TestCase
{
    public function testItShouldAlwaysReturnTrueIfTwitterHandleIsUtnaf(): void
    {
        $candidate = new AwesomeCandidate();
        $candidate->setName("Robert");
        $candidate->setTwitterHandle("@utnaf");

        $service = new AwesomeService();

        $this->assertTrue($service->isCandidateAwesome($candidate));
    }

    public function testItShouldAlwaysReturnTrueIfNameIsDavide(): void
    {
        $candidate = new AwesomeCandidate();
        $candidate->setName("dAvIdE");
        $candidate->setTwitterHandle("");

        $service = new AwesomeService();

        $this->assertTrue($service->isCandidateAwesome($candidate));
    }

    public function testItShouldAlwaysReturnTrueIfNameContainsDavide(): void
    {
        $candidate = new AwesomeCandidate();
        $candidate->setName("Mr. Davide Piccionaia");
        $candidate->setTwitterHandle("");

        $service = new AwesomeService();

        $this->assertTrue($service->isCandidateAwesome($candidate));
    }

    public function testItShouldAlwaysReturnFalseIfTwitterNameDoesntContainsDavide(): void
    {
        $candidate = new AwesomeCandidate();
        $candidate->setName("Miss JJ Username");
        $candidate->setTwitterHandle("");

        $service = new AwesomeService();

        $this->assertFalse($service->isCandidateAwesome($candidate));
    }
}
