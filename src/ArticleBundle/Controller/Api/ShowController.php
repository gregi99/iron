<?php

namespace ArticleBundle\Controller\Api;


use ArticleBundle\Model\Article;
use ArticleBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowController extends BaseController
{
	/**
	 * @param Article $article
	 *
	 * @return JsonResponse
	 */
	public function getArticleAction(Article $article)
	{
		$data = $this->get('jms_serializer')->serialize($article, 'json');

		return $this->buildSerializedResponse($data);
	}
}