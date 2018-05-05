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
}
