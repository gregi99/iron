<?php

namespace UserBundle\Model;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
	/** @var  int */
	protected $id;

	public function __construct()
	{
		parent::__construct();
	}
	
}