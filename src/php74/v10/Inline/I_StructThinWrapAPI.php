<?php

declare(strict_types = 1);

namespace ihde\php74\StructThinWrap\v10\Inline;


interface I_StructThinWrapAPI {
    
    /**
     * @param $struct
     * @return bool
     */
    public function canWorkWith(&$struct): bool;
    
    /**
     * @param $struct
     * @param $key
     * @return mixed
     */
    public function &get(&$struct, $key);
    
    /**
     * @param $struct
     * @param $key
     * @param $default
     * @return mixed
     */
    public function getDefaulted(&$struct, $key, $default);
    
    /**
     * @param $struct
     * @param $key
     * @param $value
     */
    public function setValue(&$struct, $key, $value): void;
    
    /**
     * @param $struct
     * @param $key
     * @param $reference
     */
    public function setReference(&$struct, $key, &$reference): void;
    
    /**
     * @param $struct
     * @param $key
     */
    public function unset(&$struct, $key): void;
    
    /**
     * @param $struct
     * @return \Generator
     */
    public function &foreach(&$struct): \Generator;
    
    
}

