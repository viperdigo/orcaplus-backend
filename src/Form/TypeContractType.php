<?php

namespace App\Form;

use App\Entity\TypeContract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TypeContractType
 * @package App\Form
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class TypeContractType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', ChoiceType::class, array(
                    'choices' => array(
                        'Expense' => TypeContract::TYPE_EXPENSE,
                        'Investment' => TypeContract::TYPE_INVESTMENT),
                    'choices_as_values' => true
                )
            )
            ->add('save', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => TypeContract::class,
                'csrf_protection' => false
            )
        );
    }
}
