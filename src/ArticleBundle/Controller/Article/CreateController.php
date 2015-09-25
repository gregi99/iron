<?php

namespace ArticleBundle\Controller\Article;

use ArticleBundle\Form\Type\ArticleForm;
use ArticleBundle\Model\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateController extends Controller
{
	/**
	 * @param Request $request
	 *
	 * @Security("has_role('ROLE_USER')")
	 *
	 * @return Response
	 */
	public function createAction(Request $request)
	{
		$data = new Article();

		$form = $this->createForm(new ArticleForm(), $data);
		$form->handleRequest($request);

		if ($form->isValid()) {

			$data->setCreatedBy($this->getUser());

			return $this->render('ArticleBundle:Default:created.html.twig', [
				'form' => $form->createView()
			]);
		}

		return $this->render('ArticleBundle:Default:index.html.twig', [
			'form' => $form->createView()
		]);
	}
}