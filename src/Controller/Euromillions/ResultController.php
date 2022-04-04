<?php
namespace App\Controller\Euromillions;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Euromillions\UseCase\UseCase;

class ResultController extends AbstractController
{

    private $euroMillionUseCase;

    public function __construct()
    {
        $this->euroMillionUseCase = new UseCase();
    }

    /**
    * @Route("/")
    */
    public function result(): Response
    {
        $result = $this->euroMillionUseCase->getResult();

        return $this->render('euromillions/result.html.twig', [
            'result' => $result
        ]);
    }
}