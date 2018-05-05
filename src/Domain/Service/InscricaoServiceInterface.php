<?php

namespace Domain\Service;

use Domain\Model\Inscricao;
use Presentation\DataTransferObject\InscricaoDTO;

interface InscricaoServiceInterface
{
    /**
     * @param InscricaoDTO $inscricaoDTO
     * @return mixed
     */
    public function inscrever(InscricaoDTO $inscricaoDTO);
}
