<?php

namespace AppBundle\Controller;

use Domain\Model\Oportunidade;
use Exception;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Presentation\DataTransferObject\OportunidadeDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OportunidadeController extends FOSRestController
{
    /**
     * @Rest\Post("oportunidade/salvar")
     * @param Request $request
     * @return Response
     */
    public function salvarAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponseService = $this->get('infra.json_response.service');
        $oportunidadeService = $this->get('app.oportunidade.service');

        try {
            $oportunidade = $serializerService->converter($request->getContent(), Oportunidade::class);
            $oportunidadeService->salvar($oportunidade);
        } catch (Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }

        return $jsonResponseService->success();
    }

    /**
     * @Rest\Post("oportunidade/buscar/{id}")
     * @param Request $request
     * @return Response
     */
    public function listarAction(int $id)
    {
        $jsonResponseService = $this->get('infra.json_response.service');
        $oportunidadeService = $this->get('app.oportunidade.service');

        return $jsonResponseService->success($oportunidadeService->buscarPorId($id), ['grupoTeste']);
    }
}
