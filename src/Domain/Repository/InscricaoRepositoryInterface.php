<?php

namespace Domain\Repository;

use Domain\Model\Inscricao;

interface InscricaoRepositoryInterface
{
    public function save(Inscricao $inscricao);
}
