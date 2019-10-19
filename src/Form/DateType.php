<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DateType
 * @package App\Form
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class DateType extends AbstractType
{

    /**
     * @var Boolean
     */
    private $now;

    /**
     * DateType constructor.
     * @param bool $now
     */
    public function __construct($now = false)
    {
        $this->now = $now;
    }

    /**
     * @param OptionsResolver $resolver
     * @throws \Exception
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $arrValue = array();
        if ($this->now) {
            $now = new \DateTime('now');
            $arrValue = array('value' => $now->format('d/m/Y'));
        }

        $resolver->setDefaults(
            array(
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr' => array_merge(array('class' => 'date-picker input-medium'), $arrValue),
            )
        );
    }

    /**
     * @return string|null
     */
    public function getParent()
    {
        return \Symfony\Component\Form\Extension\Core\Type\DateType::class;
    }
}
