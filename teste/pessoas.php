<?php

require 'Pessoa.php';

$pessoa = new Pessoa;
$pessoa->setNome($_GET['nome']);
$pessoa->setIdade($_GET['idade']);
$pessoa->setSalario($_GET['salario']);

echo "Nome: ". $pessoa->getNome()."<br>";
echo "Idade : ". $pessoa->getIdade()."<br>";
echo "Salário : ". $pessoa->getSalario()."<br>";
echo " Aumento de Salário : ". $pessoa->aumento($pessoa->getSalario() )."<br>";



?>