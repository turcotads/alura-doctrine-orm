<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$phone1 = new Phone('(53) 9999-999999');
$phone2 = new Phone('(53) 2222-222222');
$entityManager->persist($phone1);
$entityManager->persist($phone2);

$student = new Student('Aluno com Telefone');
$student->addPhone($phone1);
$student->addPhone($phone2);
$entityManager->persist($student);
$entityManager->flush();
