<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Presentation\DataTransferObject\OportunidadeDTO;
use Symfony\Component\HttpFoundation\Request;

class InscricaoController extends FOSRestController
{
    /**
     * @Rest\Post("/inscrever")
     */
    public function inscreverAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
    }
}
