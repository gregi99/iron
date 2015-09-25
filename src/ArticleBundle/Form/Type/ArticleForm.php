<?php

namespace ArticleBundle\Form\Type;

use ArticleBundle\Model\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleForm extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title', 'text');
		$builder->add('content', 'textarea');
		$builder->add('save', 'submit');

		return $builder;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults([
			'data_class'      => Article::class
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return 'article_create';
	}
}