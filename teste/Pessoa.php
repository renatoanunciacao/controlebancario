<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author Renato
 */
class Pessoa {

    public $nome;
    public $idade;
    public $salario;

    function __construct() {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->salario = $salario;
    }

    function getSalario() {
        return $this->salario;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

     function aumento($salario){
         $this->salario1 += $salario * (30/100);
         return $this->salario;
     }
}
