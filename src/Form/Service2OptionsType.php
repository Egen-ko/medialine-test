<?php
/**
 * Created by PhpStorm.
 * User: Egen
 * Date: 19.05.2021
 * Time: 21:22
 */

namespace App\Form;


use App\Model\Service2Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Service2OptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('strField1', TextType::class, [
            ])
            ->add('numField2', NumberType::class, [
                'html5' => true,
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
            'data_class' => Service2Options::class,
        ));
    }
}