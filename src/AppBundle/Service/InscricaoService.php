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
        $candidato = $inscricaoDTO->getCandidato();
        $anexo = $inscricaoDTO->getCandidato()->getAnexo();

        if ($anexo) {
            $fileName = $this->storageService->salvarBase64($anexo);
            $candidato->addAnexo($fileName);
        }

        if ($this->inscricaoRepository->findOneInscricaoByOportunidade($inscricaoDTO)) {
            throw new \Exception("Candidato já inscrito nesta oportunidade");
        }

        $inscricao = new Inscricao(
            $candidato,
            $inscricaoDTO->getOportunidade()
        );

        $inscricao->generateCodigoVerificacao();


    }
}
