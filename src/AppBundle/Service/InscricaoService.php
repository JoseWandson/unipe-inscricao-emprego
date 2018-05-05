<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao;
use Domain\Repository\InscricaoRepositoryInterface;
use Domain\Service\InscricaoServiceInterface;
use Infrastructure\Service\StorageService;
use Presentation\DataTransferObject\InscricaoDTO;

class InscricaoService implements InscricaoServiceInterface
{
    /**
     * @var InscricaoRepositoryInterface
     */
    private $inscricaoRepository;

    /**
     * @var StorageService
     */
    private $storageService;

    /**
     * InscricaoService constructor.
     * @param InscricaoRepositoryInterface $inscricaoRepository
     * @param StorageService $storageService
     */
    public function __construct(
        InscricaoRepositoryInterface $inscricaoRepository,
        StorageService $storageService
    ) {
        $this->inscricaoRepository = $inscricaoRepository;
        $this->storageService = $storageService;
    }

    /**
     * @param InscricaoDTO $inscricaoDTO
     */
    public function inscrever(InscricaoDTO $inscricaoDTO)
    {
        $anexo = $inscricaoDTO->getCandidato()->getAnexo();
        $fileName = $this->storageService->salvarBase64($anexo);
        $candidato = $inscricaoDTO->getCandidato();
        $candidato->addAnexo($fileName);

        $inscricao = new Inscricao(
            $candidato,
            $inscricaoDTO->getOportunidade()
        );

        $inscricao->generateCodigoVerificacao();

        dump($inscricao); die;
    }
}
