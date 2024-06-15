<?php

namespace App\Model;

class Aluno
{
    private $id, $nome, $curso, $periodo;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getCurso()
    {
        return $this->curso;
    }
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }
    public function getPeriodo()
    {
        return $this->periodo;
    }
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }
}