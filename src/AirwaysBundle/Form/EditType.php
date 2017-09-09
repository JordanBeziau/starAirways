<?php

namespace AirwaysBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class EditType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add("time", TimeType::class,
          array(
            "widget" => "choice",
            "hours" => range(6, 21)
          ))
      ->add("seat", IntegerType::class)
      ->add("price", IntegerType::class)
      ->add("information", CheckboxType::class, array("required" => false))
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