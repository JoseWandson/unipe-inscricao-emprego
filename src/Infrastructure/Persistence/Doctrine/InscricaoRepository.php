<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao;
use Domain\Model\Oportunidade;
use Domain\Repository\ArrayCollection;
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
            JOIN inscricao.candidato candidato
            JOIN inscricao.oportunidade oportunidade
            WHERE candidato.cpf = :candidato
              AND oportunidade.idOportunidade = :oportunidade
              AND inscricao.ativa = true
        ";

        $query = $this->getEntityManager()->createQuery($dql);

        $query->setParameter('candidato', $inscricaoDTO->getCandidato()->getCpf());
        $query->setParameter('oportunidade', $inscricaoDTO->getOportunidade()->getIdOportunidade());

        return $query->getOneOrNullResult();
    }

    /**
     * @param Inscricao $inscricao
     * @return Inscricao
     */
    public function confirmar(Inscricao $inscricao)
    {
        return $this->findOneBy([
            'idInscricao' => $inscricao->getIdInscricao(),
            'codigoConfirmacao' => $inscricao->getCodigoConfirmacao()
        ]);
    }

    /**
     * @param Oportunidade $oportunidade
     * @return mixed
     */
    public function pesquisarCandidatos(Oportunidade $oportunidade)
    {
        $dql = "
            SELECT candidato FROM Domain\Model\Inscricao inscricao
            JOIN Domain\Model\Candidato candidato
            JOIN inscricao.oportunidade oportunidade
            WHERE oportunidade.idOportunidade = :oportunidade
        ";

        $query = $this->getEntityManager()->createQuery($dql);

        $query->setParameter('oportunidade', $oportunidade->getIdOportunidade());

        return $query->getResult();
    }
}
