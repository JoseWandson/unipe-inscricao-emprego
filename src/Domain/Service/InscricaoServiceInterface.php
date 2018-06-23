<?php

namespace Domain\Service;

use Domain\Model\Candidato;
use Domain\Model\Inscricao;
use Domain\Model\Oportunidade;
use Presentation\DataTransferObject\InscricaoDTO;

interface InscricaoServiceInterface
{
    /**
     * @param InscricaoDTO $inscricaoDTO
     */
    public function inscrever(InscricaoDTO $inscricaoDTO);

    /**
     * @param Inscricao $inscricao
     * @return Inscricao
     */
    public function confirmar(Inscricao $inscricao);

    /**
     * @param Oportunidade $oportunidade
     * @return ArrayCollection
     */
    public function pesquisarCandidatos(Oportunidade $oportunidade);
}
