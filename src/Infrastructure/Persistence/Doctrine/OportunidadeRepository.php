<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Oportunidade;
use Domain\Repository\OportunidadeRepositoryInterface;

class OportunidadeRepository extends EntityRepository implements OportunidadeRepositoryInterface
{

    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function save(Oportunidade $oportunidade)
    {
        $this->getEntityManager()->persist($oportunidade);
        $this->getEntityManager()->flush();
    }
}
