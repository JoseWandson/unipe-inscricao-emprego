<?php

namespace Domain\Repository;

use Domain\Model\Inscricao;
use Domain\Model\Oportunidade;
use Presentation\DataTransferObject\InscricaoDTO;

interface InscricaoRepositoryInterface
{
    public function save(Inscricao $inscricao);

    /**
     * @param InscricaoDTO $inscricaoDTO
     * @return Inscricao
     */
    public function findOneInscricaoByOportunidade(InscricaoDTO $inscricaoDTO);

    /**
     * @param Inscricao $inscricao
     * @return Inscricao
     */
    public function confirmar(Inscricao $inscricao);

    /**
     * @param Oportunidade $oportunidade
     * @return mixed
     */
    public function pesquisarCandidatos(Oportunidade $oportunidade);
}
