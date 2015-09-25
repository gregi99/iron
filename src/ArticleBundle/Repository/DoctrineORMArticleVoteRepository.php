<?php

namespace ArticleBundle\Repository;

use ArticleBundle\Model\Article;
use ArticleBundle\Model\ArticleVote;
use Doctrine\ORM\EntityRepository;
use UserBundle\Model\User;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 23:11
 */
class DoctrineORMArticleVoteRepository extends EntityRepository
{
	/**
	 * @param ArticleVote $vote
	 *
	 * @return ArticleVote|null
	 * @throws \Doctrine\ORM\NonUniqueResultException
	 */
	public function findDuplicatedVotes(ArticleVote $vote)
	{
		return $this->createQueryBuilder('a')
				->select('a')
				->where('a.ip = :ip')
				->orWhere('a.user = :user')
				->andWhere('a.article = :article')
				->setParameter('ip', $vote->getIp())
				->setParameter('user', $vote->getUser())
				->setParameter('article', $vote->getArticle())
				->getQuery()
				->getOneOrNullResult();
	}

	/**
	 * @param Article $article
	 *
	 * @return ArticleVote[]
	 * @throws \Doctrine\ORM\NonUniqueResultException
	 */
	public function getAllVotesByArticle(Article $article)
	{
		return $this->createQueryBuilder('a')
			->select('a')
			->Where('a.article = :article')
			->setParameter('article', $article)
			->getQuery()
			->execute();
	}

	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager()
	{
		return $this->_em;
	}
}