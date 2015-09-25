<?php

namespace ArticleBundle\Controller\Api;

use ArticleBundle\Form\Type\CommentForm;
use ArticleBundle\Model\Article;
use ArticleBundle\Model\ArticleComment;
use ArticleBundle\Controller\BaseController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;

/**
 * Author: grzegorzniewiadomski
 * Date: 24.09.15 22:32
 */
class CommentController extends BaseController
{
	/**
	 * @param Request $request
	 * @param Article $article
	 *
	 * @Security("has_role('ROLE_USER')")
	 * @return JsonResponse
	 */
	public function commentAction(Request $request, Article $article)
	{
		$data = new ArticleComment();

		$form = $this->createForm(new CommentForm(), $data);
		$form->handleRequest($request);

		if ($form->isValid()) {

			if ($this->getUser()) {
				$data->setUser($this->getUser());
			}

			$data->setArticle($article);


			return $this->buildSerializedResponse([], Response::HTTP_CREATED);
		}

		return $this->buildSerializedResponse($form);
	}
}