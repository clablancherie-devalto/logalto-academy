<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Cosplayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CosplayerType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('username', TextType::class)
			->add('email', TextType::class)
			->add('password', PasswordType::class);
	}

	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults([
			'data_class' => Cosplayer::class
		]);
	}

	public function getBlockPrefix() {
		return 'cosplayer_type';
	}
}