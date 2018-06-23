<?php

namespace AppBundle\Controller;

use Domain\Model\Cargo;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CargoController extends FOSRestController
{
    /**
     * @Rest\Post("cargo/salvar")
     * @param Request $request
     * @return Response
     */
    public function salvarAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponseService = $this->get('infra.json_response.service');
        $cargoService = $this->get('app.cargo.service');

        try {
            $cargo = $serializerService->converter($request->getContent(), Cargo::class);
            $cargoService->salvar($cargo);
        } catch (Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }

        return $jsonResponseService->success();
    }

}
