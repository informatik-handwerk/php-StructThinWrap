<?php

declare(strict_types = 1);

namespace ihde\php74\StructThinWrap\v10\Inline;


class StructThinWrapAPI_array
    implements I_StructThinWrapAPI {
    
    protected static self $instance;
    
    /**
     *
     */
    protected function __construct()  {
    }
    
    /**
     * @return static
     */
    public static function instance(): self  {
        if (!isset(static::$instance))  {
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function canWorkWith(&$struct): bool {
        return \is_array($struct);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function &get(&$struct, $key) {
        return $struct[$key];
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function getDefaulted(&$struct, $key, $default = null) {
        return $struct[$key] ?? $default;
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function setValue(&$struct, $key, $value): void {
        $struct[$key] = $value;
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function setReference(&$struct, $key, &$reference): void {
        $struct[$key] =& $reference;
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function unset(&$struct, $key): void {
        unset($struct[$key]);
    }
    
    /**
     * @implements I_StructThinWrapAPI
     * @inheritDoc
     */
    public function &foreach(&$struct): \Generator {
        foreach ($struct as $key => &$reference) {
            yield $key => $reference;
        }
        unset($reference);
    }
    
    
}

