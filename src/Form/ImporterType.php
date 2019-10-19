<?php

namespace App\Form;

use App\Entity\Importer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ImporterType
 * @package App\Form
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class ImporterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeContract', ChoiceType::class, array(
                    'choices' => array(
                        'Despesas' => Importer::TYPE_CONTRACT_EXPENSE,
                        'Investimentos' => Importer::TYPE_CONTRACT_INVESTMENT,
                    ),
                    'choices_as_values' => true,
                    'label' => 'Tipo de Contrato'
                )
            )
            ->add('file', FileType::class)
            ->add('type', ChoiceType::class, array(
                    'choices' => array(
                        'Novos Contratos' => Importer::TYPE_NEW_CONTRACTS,
                        'Atualizar Contratos' => Importer::TYPE_UPDATE_CONTRACTS,
                    ),
                    'choices_as_values' => true,
                    'label' => 'Tipo de Importação'
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
                'data_class' => Importer::class,
                'csrf_protection' => false
            )
        );
    }
}
