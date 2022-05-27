<?php

declare(strict_types = 1);

namespace ihde\php74\StructThinWrap\v10\Inline;


class StructThinWrapAPI_object_getSet
    implements I_StructThinWrapAPI {
    
    /** @var static[] $instances */
    protected static array $instances = [];
    
    protected array $properties;
    protected array $getters;
    protected array $setters;
    
    /**
     * @param array $properties
     */
    protected function __construct(array $properties)  {
        $this->properties = $properties;
        
        foreach ($this->properties as $property)  {
            $ucProperty = \ucfirst($property);
            $this->getters[$property] = "get$ucProperty";
            $this->setters[$property] = "set$ucProperty";
        }
    }
    
    /**
     * @param array $properties
     * @return static
     */
    public static function instance(array $properties): self {
        $instanceKey = \implode("\0", $properties);
        
        if (!\array_key_exists($instanceKey, static::$instances))  {
            static::$instances[$instanceKey] = new static($properties);
        }
        
        return static::$instances[$instanceKey];
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function canWorkWith(&$struct): bool {
        return \is_object($struct);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function &get(&$struct, $key) {
        $getter = $this->getters[$key];
        return $struct->{$getter}();
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function getDefaulted(&$struct, $key, $default = null) {
        $getter = $this->getters[$key];
        return $struct->{$getter}() ?? $default;
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function setValue(&$struct, $key, $value): void {
        $setter = $this->setters[$key];
        $struct->{$setter}($value);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function setReference(&$struct, $key, &$reference): void {
        $setter = $this->setters[$key];
        $struct->{$setter}($reference);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function unset(&$struct, $key): void {
        $setter = $this->setters[$key];
        $struct->{$setter}(null);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function &foreach(&$struct): \Generator {
        foreach ($this->properties as $property) {
            $referenceOrValue = $this->get($struct, $property);
            yield $property => $referenceOrValue;
        }
        unset($referenceOrValue);
    }
    
    
}

