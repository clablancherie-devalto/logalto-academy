<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('country');
	}

	public function getParent() {
		return 'FOS\UserBundle\Form\Type\ProfileFormType';
	}

	public function getBlockPrefix() {
		return 'app_user_profile';
	}
}