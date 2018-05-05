<?php
namespace Infrastructure\Service;

use Exception;
use Infrastructure\Exception\SerializerServiceException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializationContext;
use Presentation\DataTransferObject\DtoInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SerializerService
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * SerializerService constructor.
     * @param Serializer $serializer
     * @param ValidatorInterface $validator
     */
    public function __construct(
        Serializer $serializer
    ) {
        $this->serializer = $serializer;
    }
    /**
     * @param $json
     * @param $tipo
     * @return object
     * @throws SerializerServiceException
     */
    public function converter($json, $tipo)
    {
        try {
            return $this->serializer->deserialize($json, $tipo, 'json');
        } catch (Exception $exception) {
            dump($exception->getMessage()); die;
            throw new SerializerServiceException();
        }
    }

    public function toJson($data, SerializationContext $context = null)
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    public function toJsonByGroups($data, array $groups = ['default'])
    {
        return $this->serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->setGroups($groups)
        );
    }
}