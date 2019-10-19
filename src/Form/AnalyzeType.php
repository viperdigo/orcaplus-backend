<?php

namespace App\Form;

use App\Entity\Analyze;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AnalyzeType
 * @package App\Form
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class AnalyzeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('files', CollectionType::class, [
                'entry_type' => FileType::class,
                'entry_options' => ['label' => false]
            ])
            ->add('note')
            ->add('save', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => Analyze::class,
                'csrf_protection' => false
            )
        );
    }

}
