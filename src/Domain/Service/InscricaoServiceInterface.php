<?php

namespace Domain\Service;

use Domain\Model\Inscricao;

interface InscricaoServiceInterface
{
    /**
     * @param Inscricao $inscricao
     * @return mixed
     */
    public function inscrever(Inscricao $inscricao);
}
