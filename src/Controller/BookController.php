<?php

namespace App\Controller;

use App\Exception\BookCategoryNotFoundException;
use App\Service\BookService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\BookListResponse;

class BookController extends AbstractController
{
     public function __construct(private BookService $bookService)
     {
     }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns book insede catigory",
     *     @Model(type=BookListResponse::class)
     * )
     */
     #[Route(path: '/api/v1/category/{id}/books', methods: ['GET'])]
     public function  booksByCategory(int $id): Response
     {
         try
         {
             return $this->json($this->bookService->getBookByCategory($id));
         }
         catch (BookCategoryNotFoundException $exception)
         {
             throw new HttpException($exception->getCode(), $exception->getMessage());
         }
     }
}
