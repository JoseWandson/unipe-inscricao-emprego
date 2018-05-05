<?php

namespace Domain\Service;

use Domain\Model\Oportunidade;

interface OportunidadeServiceInterface
{
    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function salvar(Oportunidade $oportunidade);
}
