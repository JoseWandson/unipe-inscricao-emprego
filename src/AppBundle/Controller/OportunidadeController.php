<?php

namespace AppBundle\Controller;

use Domain\Model\Oportunidade;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Presentation\DataTransferObject\OportunidadeDTO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class OportunidadeController extends FOSRestController
{
    /**
     * @Rest\Post("oportunidade/salvar")
     * @param Request $request
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
}
