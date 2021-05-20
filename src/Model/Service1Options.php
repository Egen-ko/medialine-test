<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 21:11
 */

namespace App\Model;


class Service1Options implements Options
{
    /** @var  int */
    private $numField1;
    /** @var  string */
    private $strField2;

    public function getOptions(): array
    {
        return ['field1' => $this->numField1, 'field2' => $this->strField2];
    }

    public function setOptions(array $options): void
    {
        $this->numField1 = $options['field1'];
        $this->strField2 = $options['field2'];
    }

    /**
     * @return int
     */
    public function getNumField1()
    {
        return $this->numField1;
    }

    /**
     * @param int $numField1
     */
    public function setNumField1($numField1)
    {
        $this->numField1 = $numField1;
    }

    /**
     * @return string
     */
    public function getStrField2()
    {
        return $this->strField2;
    }

    /**
     * @param string $strField2
     */
    public function setStrField2($strField2)
    {
        $this->strField2 = $strField2;
    }

}