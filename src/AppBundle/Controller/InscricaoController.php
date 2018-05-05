<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Presentation\DataTransferObject\InscricaoDTO;
use Symfony\Component\HttpFoundation\Request;

class InscricaoController extends FOSRestController
{
    /**
     * @Rest\Post("/inscrever")
     */
    public function inscreverAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponseService = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try {
            $inscricaoDTO = $serializerService->converter($request->getContent(), InscricaoDTO::class);
            dump($inscricaoDTO); die;
            $inscricaoService->inscrever($inscricaoDTO);
        } catch (\Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }
    }
}
