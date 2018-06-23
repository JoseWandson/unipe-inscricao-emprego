<?php

namespace Presentation\DataTransferObject;

use JMS\Serializer\Annotation as Serializer;

class CargoDTO
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var descricao
     */
    private $descricao;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
}
