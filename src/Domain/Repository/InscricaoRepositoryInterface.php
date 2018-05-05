<?php

namespace Domain\Repository;

use Domain\Model\Inscricao;
use Presentation\DataTransferObject\InscricaoDTO;

interface InscricaoRepositoryInterface
{
    public function save(Inscricao $inscricao);

    /**
     * @param InscricaoDTO $inscricaoDTO
     * @return Inscricao
     */
    public function findOneInscricaoByOportunidade(InscricaoDTO $inscricaoDTO);
}
