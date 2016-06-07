<?php

$s1 = 'Jean';
$s2 = $s1;
$s2 = 'Eric';
var_dump($s1); // ???

$o1 = new stdClass();
$o1->prenom = 'Jean';
$o2 = $o1;
$o2->prenom = 'Eric';
var_dump($o1->prenom); // ???