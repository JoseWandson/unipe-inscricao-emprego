<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao;
use Domain\Model\Oportunidade;
use Domain\Repository\InscricaoRepositoryInterface;
use Domain\Service\ArrayCollection;
use Domain\Service\InscricaoServiceInterface;
use Infrastructure\Service\StorageService;
use OneSignal\OneSignal;
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
     * @var OneSignal
     */
    private $onesignal;

    /**
     * InscricaoService constructor.
     * @param InscricaoRepositoryInterface $inscricaoRepository
     * @param StorageService $storageService
     * @param OneSignal $onesignal
     */
    public function __construct(
        InscricaoRepositoryInterface $inscricaoRepository,
        StorageService $storageService,
        OneSignal $onesignal
    ) {
        $this->inscricaoRepository = $inscricaoRepository;
        $this->storageService = $storageService;
        $this->onesignal = $onesignal;
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

        $this->api->notifications->add([
            'contents' => [
                'en' => 'Notification message'
            ],
            'included_segments' => ['All'],
            'data' => ['foo' => 'bar'],
            'isChrome' => true,
            'send_after' => new \DateTime('1 hour'),
            'filters' => [
                [
                    'field' => 'tag',
                    'key' => 'is_vip',
                    'relation' => '!=',
                    'value' => 'true',
                ],
                [
                    'operator' => 'OR',
                ],
                [
                    'field' => 'tag',
                    'key' => 'is_admin',
                    'relation' => '=',
                    'value' => 'true',
                ],
            ],
            // ..other options
        ]);

        $this->inscricaoRepository->save($inscricao);
    }

    /**
     * @param Inscricao $inscricao
     * * @return Inscricao
     */
    public function confirmar(Inscricao $inscricao)
    {
        if ($inscricao->getIdInscricao() && $inscricao->getCodigoConfirmacao()) {
            return $this->inscricaoRepository->confirmar($inscricao);
        }
        throw new \Exception("Dados inválidos!");
    }

    /**
     * @param Oportunidade $oportunidade
     * @return ArrayCollection
     */
    public function pesquisarCandidatos(Oportunidade $oportunidade)
    {
        $this->onesignal->notifications->add([
            'contents' => [
                'en' => 'Notification message'
            ],
            'included_segments' => ['All'],
            'data' => ['foo' => 'bar'],
            'isChrome' => true,
            'send_after' => new \DateTime('1 hour'),
            'filters' => [
                [
                    'field' => 'tag',
                    'key' => 'is_vip',
                    'relation' => '!=',
                    'value' => 'true',
                ],
                [
                    'operator' => 'OR',
                ],
                [
                    'field' => 'tag',
                    'key' => 'is_admin',
                    'relation' => '=',
                    'value' => 'true',
                ],
            ],
            // ..other options
        ]);

        var_dump($this->onesignal->apps->getAll()); die;

        if ($oportunidade->getIdOportunidade()) {
            return $this->inscricaoRepository->pesquisarCandidatos($oportunidade);
        }
        throw new \Exception("Dados inválidos!");
    }
}
