<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\PostFacade;
use Nette;
//use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /* Původní
	private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

	// ...
    public function renderDefault(): void
    {
        $this->template->posts = $this->database
            ->table('posts')
            ->order('created_at DESC')
            ->limit(5);
    }
    */

	 /**
     * @var \Nette\Security\User
     */
    public $user;

    private PostFacade $facade;

	public function __construct(PostFacade $facade, \Nette\Security\User $user)
	{
		$this->facade = $facade;
		$this->user = $user;
	}

	public function renderDefault(): void
	{
		$this->template->posts = $this->facade
			->getPublicArticles()
			->limit(5);

		//$this->template->username = $this->user->getIdentity()->data["username"];
		//$this->template->posts = $this->user->getIdentity()->data["password"];
	}

}


