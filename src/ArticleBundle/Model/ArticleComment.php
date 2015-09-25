<?php

namespace ArticleBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Model\User;
use Assert\Assertion;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 22:54
 */
class ArticleComment
{
	/** @var  int */
	private $id;

	/** @var  \DateTime */
	private $createdAt;

	/** @var  User */
	private $user;

	/** @var  Article */
	private $article;

	/** @var  string */
	private $content;

	/** @var  bool */
	private $notified;

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

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setContent($content)
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isNotified()
	{
		return $this->notified;
	}

	/**
	 * @param boolean $notified
	 *
	 * @return $this
	 */
	public function setNotified($notified)
	{
		$this->notified = $notified;

		return $this;
	}
}