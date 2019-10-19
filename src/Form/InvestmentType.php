<?php

namespace App\Form;

use App\Entity\Investment;
use App\Entity\TypeContract;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InvestmentType
 * @package Orca\BackendBundle\Form
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class InvestmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime('now');
        $currentYear = $now->format('Y');

        $builder
            ->add('numberContract')
            ->add('numberContractSap')
            ->add('numberRc')
            ->add('year', TextType::class, [
                'data' => $currentYear,
                'attr' => [
                    'placeholder' => $currentYear
                ]
            ])
            ->add('unit')
            ->add('typeContract', EntityType::class, array(
                'class' => TypeContract::class,
                'query_builder' => function (EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('s')
                        ->where('s.type = :type')
                        ->setParameter('type', TypeContract::TYPE_INVESTMENT);
                }
            ))
            ->add('resourceSource')
            ->add('program')
            ->add('period', TextType::class, [
                'label' => 'Período (em meses)',
            ])
            ->add('initialDate', new DateType())
            ->add('endDate', new DateType())
            ->add('smallObject')
            ->add('object')
            ->add('type', ChoiceType::class, array(
                    'choices' => array(
                        'Financed' => Investment::TYPE_FINANCED,
                        'Own' => Investment::TYPE_OWN),
                    'choices_as_values' => true,
                    'label' => 'Tipo de Recurso'
                )
            )
            ->add('status', ChoiceType::class, array(
                    'choices' => array(
                        'Active' => Investment::STATUS_ACTIVE,
                        'Inactive' => Investment::STATUS_INACTIVE),
                    'choices_as_values' => true
                )

            )
            ->add('owner')
            ->add('save', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => Investment::class,
                'csrf_protection' => false
            )
        );
    }
}
