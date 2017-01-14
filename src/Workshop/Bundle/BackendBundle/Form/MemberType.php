<?php

namespace Workshop\Bundle\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('plain_password', 'password', array(
                'required' => false,
            ))
            ->add('plain_password', 'repeated', array(
                'required' => false,
                'type' => 'password',
                'first_options' => array(
                    'label' => 'Password'
                ),
                'second_options' => array(
                    'label' => 'Password Again'
                ),
                'invalid_message' => 'The password fields must match.',
            ))
            ->add('locked', 'checkbox', array(
                'required' => false,
                'value' => true,
            ))
            ->add('expired', 'checkbox', array(
                'required' => false,
                'value' => true,
            ))
            ->add('roles', 'choice', array(
                'choices' => array(
                    'ROLE_USER' => 'Normal User',
                    'ROLE_ADMIN' => 'Backend User',
                    'ROLE_CATEGORY' => 'Backend Category Admin User',
                    'ROLE_POST' => 'Backend Post Admin User',
                    'ROLE_SUPER_ADMIN' => 'Backend Super Admin',
                ),
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ))
            ->add('groups', 'entity', array(
                'class' => 'WorkshopBackendBundle:Group',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Workshop\Bundle\BackendBundle\Entity\Member'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'workshop_bundle_backendbundle_member';
    }


}
