<?php

declare(strict_types=1);

namespace App\Model;


use Nette\Database\Explorer;
use Nette\Database\Table\ActiveRow;

class Movies
{


    private Explorer $explorer;

    public function __construct(Explorer $explorer)
    {

        $this->explorer = $explorer;

    }

    public function fetchAll(): array
    {
        return $this->explorer->table('movies')->fetchAll();
    }

    public function fetch(int $id): ActiveRow
    {
        return $this->explorer->table('movies')->fetch(['id' => $id]);
    }

    public function create(mixed $data)
    {
        $this->explorer->table('movies')->insert($data);
    }

    public function update(int $id, mixed $data)
    {
        $this->explorer->table('movies')->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        $this->explorer->table('movies')->where('id', $id)->delete();
    }


}