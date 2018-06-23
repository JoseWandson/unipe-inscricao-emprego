<?php

namespace Presentation\DataTransferObject;

use Domain\Model\Candidato;
use Domain\Model\Oportunidade;
use JMS\Serializer\Annotation as Serializer;

class InscricaoDTO
{
    /**
     * @var Candidato
     */
    private $candidato;

    /**
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @return Candidato
     */
    public function getCandidato()
    {
        return $this->candidato;
    }

    /**
     * @return Oportunidade
     */
    public function getOportunidade()
    {
        return $this->oportunidade;
    }

    /**
     * @param Oportunidade $oportunidade
     */
    public function setOportunidade($oportunidade)
    {
        $this->oportunidade = $oportunidade;
    }
}
