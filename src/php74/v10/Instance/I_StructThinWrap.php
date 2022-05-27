<?php

declare(strict_types = 1);

namespace ihde\php74\StructThinWrap\v10\Instance;


interface I_StructThinWrap {
    
    /**
     * Getter/Setter
     *
     * @param mixed|null $struct
     * @return mixed
     */
    public function &struct(&$struct = null);
    
    /**
     * @param $key
     * @return mixed
     */
    public function &get($key);
    
    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function getDefaulted($key, $default);
    
    /**
     * @param $key
     * @param $value
     */
    public function setValue($key, $value): void;
    
    /**
     * @param $key
     * @param $reference
     */
    public function setReference($key, &$reference): void;
    
    /**
     * @param $key
     */
    public function unset($key): void;
    
    /**
     * @return \Generator
     */
    public function &foreach(): \Generator;
    
    
}

