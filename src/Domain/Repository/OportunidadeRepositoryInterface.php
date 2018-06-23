<?php

namespace Domain\Repository;

use Domain\Model\Oportunidade;

interface OportunidadeRepositoryInterface
{
    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function save(Oportunidade $oportunidade);

    /**
     * @param int $id
     * @return Oportunidade
     */
    public function findOneById(int $id);

    /**
     * @return mixed
     */
    public function buscarTodos();
}
