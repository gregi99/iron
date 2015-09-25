<?php

namespace ArticleBundle\Controller\Api;

use ArticleBundle\Form\Type\RateForm;
use ArticleBundle\Model\Article;
use ArticleBundle\Model\ArticleVote;
use ArticleBundle\Controller\BaseController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RateController extends BaseController
{
	/**
	 * @param Request $request
	 * @param Article $article
	 *
	 * @return JsonResponse
	 */
	public function rateAction(Request $request, Article $article)
	{
		$data = new ArticleVote();

		$form = $this->createForm(new RateForm(), $data);
		$form->handleRequest($request);

		if ($form->isValid()) {

			if ($this->getUser()) {
				$data->setUser($this->getUser());
			}

			$data->setArticle($article);
			$data->setIp($request->getClientIp());

			try {
				$this->get('article.voter')->vote($data);
			} catch (\Exception $e) {
				return $this->buildSerializedResponse(['error' =>  $e->getMessage()]);
			}

			return $this->buildSerializedResponse([], Response::HTTP_CREATED);
		}

		return $this->buildSerializedResponse($form);
	}

}