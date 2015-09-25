<?php

namespace ArticleBundle\Service;


use ArticleBundle\Model\ArticleVote;
use ArticleBundle\Repository\DoctrineORMArticleVoteRepository;

class RateService
{
	/** @var  DoctrineORMArticleVoteRepository */
	private $repository;

	/**
	 * @param DoctrineORMArticleVoteRepository $repository
	 */
	public function __construct(DoctrineORMArticleVoteRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * @param ArticleVote $vote
	 *
	 * @throws \Exception
	 */
	public function vote(ArticleVote $vote)
	{
		$duplicates = $this->repository->findDuplicatedVotes($vote);

		if ($duplicates !== null) {
			throw new \Exception('You have already voted this article');
		}

		$this->rate($vote);
	}

	/**
	 * @param ArticleVote $vote
	 */
	public function rate(ArticleVote $vote)
	{
		$articleVotes = $this->repository->getAllVotesByArticle($vote->getArticle());

		$count = count($articleVotes) + 1;
		$sum = 0 + $vote->getScore();

		foreach($articleVotes as $vote) {
			++$count;
			$sum = $sum + $vote->getScore();
		}

		$article = $vote->getArticle();
		$article->setRate($sum / $count);

		$em = $this->repository->getEntityManager();
		$em->persist($vote);
		$em->persist($article);

		$em->flush();
	}
}