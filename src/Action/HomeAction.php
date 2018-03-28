<?php

namespace App\Action;

use App\Entity\Trick;
use App\Action\Interfaces\HomeActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class HomeAction.
 */
class HomeAction implements HomeActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * IndexAction constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param Environment            $environment
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        Environment $environment
    ) {
        $this->entityManager = $entityManager;
        $this->environment = $environment;
    }

    /**
     * @Route(
     *     "/",
     *     name="home",
     *     methods={"GET"}
     * )
     *
     * @param Request $request
     *
     * @return string
     */
    public function __invoke(Request $request)
    {
        $tricks = $this->entityManager->getRepository(Trick::class)
                                      ->findAllTrick();

        return new Response(
            $this->environment->render(
                'home.html.twig',
                [
                    'tricks' => $tricks
                ]
            )
        );
    }
}
