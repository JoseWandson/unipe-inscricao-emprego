<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao;
use Domain\Repository\InscricaoRepositoryInterface;

class InscricaoRepository extends EntityRepository implements InscricaoRepositoryInterface
{
    public function save(Inscricao $inscricao)
    {
        $this->getEntityManager()->persist($inscricao);
        $this->getEntityManager()->flush();
    }
}
