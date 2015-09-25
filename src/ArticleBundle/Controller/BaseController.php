<?php

namespace ArticleBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Author: grzegorzniewiadomski
 * Date: 25.09.15 00:53
 */
class BaseController extends FOSRestController
{
	public function buildSerializedResponse($data, $status = Response::HTTP_OK)
	{
		$view = new View();
		$view->setStatusCode($status);
		$view->setData($data);
		$view->setFormat('json');

		$handler = $this->get('fos_rest.view_handler');

		return $handler->handle($view);
	}
}