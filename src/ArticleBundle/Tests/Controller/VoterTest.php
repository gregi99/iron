<?php

namespace ArticleBundle\Tests\Controller;

use ArticleBundle\Service\RateService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testVoter()
    {
        $repo = $this->getMockBuilder('ArticleBundle\Repository\DoctrineORMArticleVoteRepository')
                        ->disableOriginalConstructor()
                        ->getMock();

        $repo->expects($this->once())->method('findDuplicatedVotes')->will($this->returnValue([]));

        $vote = $this->getMock('ArticleBundle\Model\ArticleVote');

        $this->setExpectedException('Exception');

        $service = new RateService($repo);
        $service->vote($vote);
    }
}
