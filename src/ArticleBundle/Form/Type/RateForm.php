<?php

namespace ArticleBundle\Form\Type;

use ArticleBundle\Model\ArticleComment;
use ArticleBundle\Model\ArticleVote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RateForm extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('score', 'integer');

		return $builder;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults([
			'csrf_protection' => false,
			'data_class'      => ArticleVote::class
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return 'article_vote';
	}
}