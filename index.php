<?php


require './config/autoload.php';
require './config/connexion.php';

// $qcm = new Qcm();
// $question1 = new Question('POO signifie :');
// $question1->addAnswer(new Answer('Php Orienté Objet'));
// $question1->addAnswer(new Answer('ProgrammatiOn Orientée Outil'));
// $question1->addAnswer(new Answer('Programmation Orientée Objet', Answer::BONNE_REPONSE));
// $question1->addAnswer(new Answer('Papillon Onirique Ostentatoire'));
// // $question1->setExplications('Sans commentaires si vous avez eu faux :-°');
// $qcm->addQuestion($question1);
// $qcm->generate();


$qcm = new Qcm($db);
$qcm->getQuestions();
// echo "<pre>";
// var_dump($qcm);
// echo "</pre>";
$qcm->generate();
