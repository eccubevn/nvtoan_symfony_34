<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/8/2018
 * Time: 5:22 PM
 */

namespace App\Form\Type;


use App\Annotation\Inject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginForm extends AbstractType
{

    public function __construct()
    {
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, array(
            'attr' => array(
                'max_length' => 50,
                'class' => 'form-control'
            ),
            'constraints' => array(
                new NotBlank(),
            ),
        ));
        $builder->add('password', PasswordType::class, array(
            'attr' => array(
                'max_length' => 50,
                'class' => 'form-control'
            ),
            'constraints' => array(
                new NotBlank(),
            ),
        ));
        $builder->add('remember_me', CheckboxType::class, array(
            'label' => 'Remember me'
        ));
    }


}