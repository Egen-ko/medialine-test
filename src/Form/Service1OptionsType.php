<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 21:22
 */

namespace App\Form;


use App\Model\Service1Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Service1OptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numField1', NumberType::class, [
                'html5' => true,
            ])
            ->add('strField2', TextType::class, [
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Сохранить'
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Service1Options::class,
        ));
    }
}