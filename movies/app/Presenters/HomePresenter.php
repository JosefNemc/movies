<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Movies;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private Movies $movies;
    public function __construct(Movies $movies)
    {
        parent::__construct();
        $this->movies = $movies;
    }

    public function renderDefault(): void
    {
        $this->template->title = 'Nakouknutí do DB';
        $this->template->movies = $this->movies->fetchAll();

    }

    public function actionMovie(int $id): void
    {
        $movie = $this->movies->fetch($id);
        if ($movie === null) {
            $this->error('Film nebyl nalezen');
        }
        $this->template->movie = $movie;
    }
}
