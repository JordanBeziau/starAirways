<?php

namespace AirwaysBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

class AirwaysType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add("time", DateTimeType::class,
          array(
            "widget" => "choice",
            "format" => "H:i"
          ))
      ->add("departure", ChoiceType::class,
          array(
            "choices" => array($this->getCities())
          ))
      ->add("arrival", ChoiceType::class,
          array(
            "choices" => array($this->getCities())
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
}