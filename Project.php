<?php
echo __DIR__;
require __DIR__ . "/source/Project.php";
$project = new Project(
    "Chipets",
    "Proposta de Web Services, Chip Sensor(CS) para leitura e versão mobile para a disponibilidade de dados de medição de glicose no sangue. ",
    "A diabetes é uma doença caracterizada pela incapacidade do organismo de produzir em níveis regulares a insulina no sangue.",
    "Ciências Exatas e Biológicas",
    "Bruno rodrigues, Laura Leal",
    "Thais Silveira, Hagata silva"
);

var_dump($project);
