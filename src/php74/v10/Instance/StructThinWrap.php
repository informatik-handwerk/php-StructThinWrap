<?php

declare(strict_types = 1);

namespace ihde\php74\StructThinWrap\v10\Instance;


use ihde\php74\StructThinWrap\v10\Inline\I_StructThinWrapAPI;

class StructThinWrap
    implements I_StructThinWrap {
    
    protected I_StructThinWrapAPI $api;
    protected $struct;
    
    /**
     * @param I_StructThinWrapAPI $api
     * @param                     $struct
     */
    public function __construct(I_StructThinWrapAPI $api, &$struct) {
        $this->api = $api;
        
        if ($struct === null) {
            throw new \TypeError();
        }
        
        $this->struct($struct);
    }
    
    /**
     * @param I_StructThinWrapAPI $api
     * @param                     $struct
     * @return static
     */
    public static function instance(I_StructThinWrapAPI $api, &$struct): self {
        return new static($api, $struct);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function &struct(&$struct = null) {
        if ($struct !== null) {
            $isCompatible = $this->api->canWorkWith($struct);
            if (!$isCompatible) {
                throw new \TypeError([$struct]);
            }
            
            $this->struct =& $struct;
        }
        
        return $this->struct;
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function &get($key) {
        return $this->api->get($this->struct, $key);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function getDefaulted($key, $default = null) {
        return $this->api->getDefaulted($this->struct, $key, $default);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function setValue($key, $value): void {
        $this->api->setValue($this->struct, $key, $value);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function setReference($key, &$reference): void {
        $this->api->setReference($this->struct, $key, $reference);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function unset($key): void {
        $this->api->unset($this->struct, $key);
    }
    
    /**
     * @implements I_StructThinWrap
     * @inheritDoc
     */
    public function &foreach(): \Generator {
        $foreach = $this->api->foreach($this->struct);
        foreach ($foreach as $key => &$reference) {
            yield $key => $reference;
        }
        unset($reference);
    }
    
    
}

