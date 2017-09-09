<?php

namespace AirwaysBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add("time", TimeType::class,
          array(
            "widget" => "choice",
            "hours" => range(6, 21)
          ))
      ->add("departure", ChoiceType::class,
          array(
            "choices" => array("Villes" => $this->getCities())
          ))
      ->add("arrival", ChoiceType::class,
          array(
            "choices" => array("Villes" => $this->getCities())
          ))
      ->add("price", IntegerType::class)
      ->add("Submit", SubmitType::class);
  }

  public function getCities() {
    return array(
      "Paris" => "Paris",
      "Bruxelles" => "Bruxelles",
      "Londres" => "Londres",
      "Madrid" => "Madrid",
      "Rome" => "Rome",
      "Berlin" => "Berlin"
    );
  }
  
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(
      array("data_class" => "AirwaysBundle\Entity\Flight")
    );
  }

  public function getBlockPrefix() {
    return "airwaysbundle_flight";
  }
}