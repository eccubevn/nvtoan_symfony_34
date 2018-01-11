<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/9/2018
 * Time: 10:51 AM
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                ],
                'label' => 'Username',
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                ],
                'label' => 'Email',
                'attr' => ['class' => 'form-control']
            ])
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('label' => 'Password', 'attr' => ['class' => 'form-control']),
                'second_options' => array('label' => 'Repeat Password', 'attr' => ['class' => 'form-control'])
            ))
            ->add('first_name', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
                'label' => 'First name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('last_name', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
                'label' => 'Last name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('gender', ChoiceType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
                'label' => 'Gender',
                'attr' => ['class' => 'form-control'],
                'choices'  => array(
                    '-- No sex determination --' => 0,
                    'Male' => 1,
                    'Female' => 2,
                ),
            ]);
    }

    public function getName(){
        return 'registration';
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User',
        ]);
    }
}