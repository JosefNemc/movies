<?php

declare(strict_types=1);

namespace App\Services;

use App\Model\Movies;
use Nette\Application\Responses\JsonResponse;
use Nette\Http\Request;
use Nette\Utils\Json;

class ApiController
{

    private Movies $movies;
    public function __construct(Movies $movies)
    {
        $this->movies = $movies;
    }


    public function movies(): JsonResponse
    {
        $movies = $this->movies->fetchAll();
        return new JsonResponse($movies);
    }

    public function movie(int $id): JsonResponse
    {
        $movie = $this->movies->fetch($id);
        return new JsonResponse($movie);
    }

    public function create(Request $request): JsonResponse
    {
        $data = Json::decode($request->getRawBody());
        $this->movies->create($data);
        return new JsonResponse(['status' => 'ok']);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $data = Json::decode($request->getRawBody());
        $this->movies->update($id, $data);
        return new JsonResponse(['status' => 'ok']);
    }

    public function delete(int $id): JsonResponse
    {
        $this->movies->delete($id);
        return new JsonResponse(['status' => 'ok']);
    }

}