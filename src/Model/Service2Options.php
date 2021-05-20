<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 21:11
 */

namespace App\Model;


class Service2Options implements Options
{
    /** @var  string */
    private $strField1;
    /** @var  int */
    private $numField2;

    public function getOptions(): array
    {
        return ['field1' => $this->strField1, 'field2' => $this->numField2];
    }

    public function setOptions(array $options): void
    {
        $this->strField1 = $options['field1'];
        $this->numField2 = $options['field2'];
    }

    /**
     * @return int
     */
    public function getStrField1()
    {
        return $this->strField1;
    }

    /**
     * @param int $strField1
     */
    public function setStrField1($strField1)
    {
        $this->strField1 = $strField1;
    }

    /**
     * @return string
     */
    public function getNumField2()
    {
        return $this->numField2;
    }

    /**
     * @param string $numField2
     */
    public function setNumField2($numField2)
    {
        $this->numField2 = $numField2;
    }

}