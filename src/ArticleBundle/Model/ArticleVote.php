<?php

namespace ArticleBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Model\User;
use Assert\Assertion;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 22:54
 */
class ArticleVote
{
	/** @var  int */
	private $id;

	/** @var  \DateTime */
	private $createdAt;

	/** @var  string */
	private $ip;

	/** @var  int */
	private $score;

	/** @var  User */
	private $user;

	/** @var  Article */
	private $article;

	public function __construct()
	{
		$this->createdAt = new \DateTime();
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * @param \DateTime $createdAt
	 *
	 * @return $this
	 */
	public function setCreatedAt(\DateTime $createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getIp()
	{
		return $this->ip;
	}

	/**
	 * @param string $ip
	 *
	 * @return $this
	 */
	public function setIp($ip)
	{
		$this->ip = $ip;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getScore()
	{
		return $this->score;
	}

	/**
	 * @param int $score
	 *
	 * @return $this
	 */
	public function setScore($score)
	{
		$this->score = $score;

		return $this;
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @param User $user
	 *
	 * @return $this
	 */
	public function setUser(User $user)
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * @return Article
	 */
	public function getArticle()
	{
		return $this->article;
	}

	/**
	 * @param Article $article
	 *
	 * @return $this
	 */
	public function setArticle(Article $article)
	{
		$this->article = $article;

		return $this;
	}

}