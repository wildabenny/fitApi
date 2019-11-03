<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 23:21
 */

namespace App\Form;


use App\Dto\PartnerData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partnerName', TextType::class, ['required' => true])
            ->add('description', TextType::class, ['required' => true])
            ->add('nip', NipType::class, ['required' => true])
            ->add('www', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PartnerData::class
        ]);
    }
}