<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Repository\OportunidadeRepositoryInterface;

class OportunidadeRepository extends EntityRepository implements OportunidadeRepositoryInterface
{

}
