<?php

namespace Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Candidato
{
    /**
     * @var int
     */
    private $idCandidato;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $anexo;

    /**
     * @var string
     */
    private $link;

    /**
     * @var ArrayCollection
     */
    private $habilidadeTecnica;

    /**
     * @var ArrayCollection
     */
    private $experienciaProfissional;

    /**
     * @return string
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * @param string $fileName
     */
    public function addAnexo(string $fileName)
    {
        $this->anexo = $fileName;
    }
}
