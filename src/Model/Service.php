<?php

/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 20:40
 */

namespace App\Model;

interface Service
{
    /**
     * @return Options
     */
    public function getOptions(): Options;

    /**
     * @param Options $options
     */
    public function setOptions(Options $options): void;
}