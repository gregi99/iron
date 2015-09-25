<?php

namespace ArticleBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 23:11
 */
class DoctrineORMArticleRepository extends EntityRepository
{
	public function getArticlesWithAwaitingNotification(\DateTime $marginDate)
	{
		return $this->createQueryBuilder('a')
			->select('a')
			->innerJoin('a.comments', 'b' , 'with', 'a.id = b.article')
			->where('b.notified = 0')
			->andWhere('b.createdAt > :date')
			->setParameter('date', $marginDate)
			->getQuery()
			->execute();
	}
}