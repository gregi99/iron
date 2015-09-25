<?php

namespace ArticleBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Model\User;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 22:54
 */
class Article
{
	/** @var  int */
	private $id;

	/** @var  \DateTime */
	private $createdAt;

	/** @var  string */
	private $title;

	/** @var  string */
	private $content;

	/** @var  User */
	private $createdBy;

	/** @var  float */
	private $rate = 0;

	/** @var  ArrayCollection */
	private $comments;

	public function __construct()
	{
		$this->createdAt = new \DateTime();
		$this->comments = new ArrayCollection();
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
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 *
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;

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
	 * @return User
	 */
	public function getCreatedBy()
	{
		return $this->createdBy;
	}

	/**
	 * @param User $createdBy
	 *
	 * @return $this
	 */
	public function setCreatedBy(User $createdBy)
	{
		$this->createdBy = $createdBy;

		return $this;
	}

	/**
	 * @return float
	 */
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * @param float $rate
	 *
	 * @return $this
	 */
	public function setRate($rate)
	{
		$this->rate = $rate;

		return $this;
	}

	/**
	 * @return ArrayCollection|ArticleComment[]
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 * @param ArticleComment $comment
	 *
	 * @return $this
	 */
	public function addComment(ArticleComment $comment)
	{
		if (!$this->comments->contains($comment)) {
			$this->comments->add($comment);
		}

		return $this;
	}
}