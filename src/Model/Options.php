<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 20:46
 */

namespace App\Model;


interface Options
{
    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @param array $options
     */
    public function setOptions(array $options): void;
}