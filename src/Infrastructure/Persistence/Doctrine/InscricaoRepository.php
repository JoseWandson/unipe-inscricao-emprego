<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao;
use Domain\Repository\InscricaoRepositoryInterface;
use Presentation\DataTransferObject\InscricaoDTO;

class InscricaoRepository extends EntityRepository implements InscricaoRepositoryInterface
{
    public function save(Inscricao $inscricao)
    {
        $this->getEntityManager()->persist($inscricao);
        $this->getEntityManager()->flush();
    }

    /**
     * @param InscricaoDTO $inscricaoDTO
     * @return Inscricao
     */
    public function findOneInscricaoByOportunidade(InscricaoDTO $inscricaoDTO)
    {
        $dql = "
            SELECT inscricao FROM Domain\Model\Inscricao inscricao
            inscricao.candidato candidato
            inscricao.oportunidade oportunidade
            WHERE candidato = :candidato
              AND oportunidade = :oportunidade
              AND inscricao.ativa = true
        ";

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getOneOrNullResult();
    }
}
