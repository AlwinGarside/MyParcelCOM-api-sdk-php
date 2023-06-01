<?php

declare(strict_types=1);

namespace MyParcelCom\ApiSdk\Resources\Proxy;

use MyParcelCom\ApiSdk\Resources\Interfaces\CarrierInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ResourceInterface;
use MyParcelCom\ApiSdk\Resources\Interfaces\ResourceProxyInterface;
use MyParcelCom\ApiSdk\Resources\Traits\JsonSerializable;
use MyParcelCom\ApiSdk\Resources\Traits\ProxiesResource;
use MyParcelCom\ApiSdk\Resources\Traits\Resource;

/**
 * @method CarrierInterface getResource()
 */
class CarrierProxy implements CarrierInterface, ResourceProxyInterface
{
    use JsonSerializable;
    use ProxiesResource;
    use Resource;

    private ?string $id = null;

    private string $type = ResourceInterface::TYPE_CARRIER;

    public function setName(string $name): self
    {
        $this->getResource()->setName($name);

        return $this;
    }

    public function getName(): string
    {
        return $this->getResource()->getName();
    }

    public function setCode(string $code): self
    {
        $this->getResource()->setCode($code);

        return $this;
    }

    public function getCode(): string
    {
        return $this->getResource()->getCode();
    }

    public function setCredentialsFormat(array $format): self
    {
        $this->getResource()->setCredentialsFormat($format);

        return $this;
    }

    public function getCredentialsFormat(): array
    {
        return $this->getResource()->getCredentialsFormat();
    }

    public function setLabelMimeTypes(array $labelMimeTypes): self
    {
        $this->getResource()->setLabelMimeTypes($labelMimeTypes);

        return $this;
    }

    public function getLabelMimeTypes(): array
    {
        return $this->getResource()->getLabelMimeTypes();
    }

    /**
     * This function puts all object properties in an array and returns it.
     */
    public function jsonSerialize(): array
    {
        $values = get_object_vars($this);
        unset($values['resource']);
        unset($values['api']);
        unset($values['uri']);

        return $this->arrayValuesToArray($values);
    }
}
