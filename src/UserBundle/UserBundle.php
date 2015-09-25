<?php

namespace UserBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container)
	{
		$container->addCompilerPass($this->buildMappingCompilerPass());
	}

	private function buildMappingCompilerPass()
	{
		return DoctrineOrmMappingsPass::createXmlMappingDriver([
				__DIR__ . '/Resources/config/doctrine/orm/' => 'UserBundle\Model'
		]);
	}
}
