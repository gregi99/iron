<?php

namespace ArticleBundle\Command;

use ArticleBundle\Model\Article;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NotifyCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName('article:send-notification')
			->setDescription('Notifies article author About new comments')
			->setHelp('help');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \DateTime('- 1 day');

		/** @var Article[] $articles */
		$articles = $this->getContainer()->get('iron.article_repository.article.doctrine_orm')->getArticlesWithAwaitingNotification($date);

		$em = $this->getContainer()->get('doctrine.orm.default_entity_manager');

		foreach($articles as $article) {

			$message = \Swift_Message::newInstance()
				->setSubject('New Comment !')
				->setFrom('send@example.com')
				->setTo($article->getCreatedBy()->getEmail())
				->setBody('you have new comment on your article');

			$this->getContainer()->get('mailer')->send($message);

			foreach ($article->getComments() as $comment) {

				if ($comment->getCreatedAt() > $date && $comment->isNotified() === false) {
					$comment->setNotified(true);

					$em->persist($comment);
				}
			}

			$em->flush();
		}
	}
}