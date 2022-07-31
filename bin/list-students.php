<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();
foreach ($studentList as $student) {
	echo "ID: $student->id\nNome: $student->name\n";

	$phones = $student->phones();

	if ($phones->count()) {
		echo "Telefone(s):\n";

		echo implode(', ', ($phones
			->map(fn (Phone $phone) => $phone->number)
			->toArray())) . PHP_EOL;
	}
	echo PHP_EOL;
}

echo 'Count: ' . $studentRepository->count([]) . PHP_EOL . PHP_EOL;

/* @var Student $student */
$student = $studentRepository->find(2);
echo "ID: $student->id Nome: $student->name\n\n";

/* @var Student $student */
$student = $studentRepository->findOneBy([
	'name' => 'Fabio Madeira Peres',
]);
echo "ID: $student->id Nome: $student->name\n\n";
