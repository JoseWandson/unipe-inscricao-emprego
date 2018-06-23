<?php

namespace AppBundle\Controller;

use Domain\Model\Inscricao;
use Domain\Model\Oportunidade;
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
        $oportunidadeService = $this->get('app.oportunidade.service');

        try {
            $inscricaoDTO = $serializerService->converter($request->getContent(), InscricaoDTO::class);
            if ($inscricaoDTO->getOportunidade()->getIdOportunidade()) {
                $oportunidade = $oportunidadeService->buscarPorId($inscricaoDTO->getOportunidade()->getIdOportunidade());
                if ($oportunidade) {
                    $inscricaoDTO->setOportunidade($oportunidade);
                }
            }
            $inscricaoService->inscrever($inscricaoDTO);
            return $jsonResponseService->success();
        } catch (\Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }
    }

    /**
     * @Rest\Put("/inscricao/confirmar")
     */
    public function confirmarAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponseService = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try {
            $inscricao = $serializerService->converter($request->getContent(), Inscricao::class);
            $inscricao = $inscricaoService->confirmar($inscricao);
            if ($inscricao) {
                return $jsonResponseService->success();
            }
            return $jsonResponseService->badRequest("Código de confirmação inválido.");
        } catch (\Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }
    }

    /**
     * @Rest\Post("/inscricao/candidatos")
     */
    public function pesquisarCandidatosAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponseService = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try {
            $oportunidade = $serializerService->converter($request->getContent(), Oportunidade::class);
            $candidatos = $inscricaoService->pesquisarCandidatos($oportunidade);
            if ($candidatos) {
                return $jsonResponseService->success($candidatos);
            }
            return $jsonResponseService->badRequest("Nenhum registro encontrado");
        } catch (\Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }
    }

    /**
     * @Rest\Get("/inscricao/{uuidArquivo}/download")
     */
    public function downloadAnexoAction(string $uuidArquivo)
    {
        $jsonResponseService = $this->get('infra.json_response.service');
        $storageService = $this->get('infra.storage.service');

        try {
            $storageService->download($uuidArquivo);
        } catch (\Exception $exception) {
            return $jsonResponseService->notFound($exception->getMessage());
        }
    }
}
