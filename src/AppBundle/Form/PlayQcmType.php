<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 19/06/2017
 * Time: 18:36
 */

namespace AppBundle\Form;


class PlayQcmType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('public', CheckboxType::class, array(
            'label' => 'Show this entry publicly?',
            'required' => false,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_mapping' => array(
                'matchingCityAndZipCode' => 'city',
            ),
        ));


    }
}