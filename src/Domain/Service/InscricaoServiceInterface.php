<?php

namespace Domain\Service;

use Domain\Model\Inscricao;
use Presentation\DataTransferObject\InscricaoDTO;

interface InscricaoServiceInterface
{
    /**
     * @param InscricaoDTO $inscricaoDTO
     */
    public function inscrever(InscricaoDTO $inscricaoDTO);
}
