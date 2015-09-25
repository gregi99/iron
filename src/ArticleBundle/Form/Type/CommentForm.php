<?php

namespace ArticleBundle\Form\Type;

use ArticleBundle\Model\ArticleComment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentForm extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('content', 'text');

		return $builder;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults([
			'csrf_protection' => false,
			'data_class'      => ArticleComment::class
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return 'article_comment';
	}
}