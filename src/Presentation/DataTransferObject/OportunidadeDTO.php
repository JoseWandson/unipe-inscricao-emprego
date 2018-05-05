<?php

namespace Presentation\DataTransferObject;

use JMS\Serializer\Annotation as Serializer;

class OportunidadeDTO
{
    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
}
