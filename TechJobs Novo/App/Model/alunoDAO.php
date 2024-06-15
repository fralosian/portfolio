<?php
namespace App\Model;

class AlunoDao
{
    public function create(Aluno $a)
    {
        $sql = 'INSERT INTO aluno (nome,curso,periodo) VALUES (?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getCurso());
        $stmt->bindValue(3, $a->getPeriodo());
        $stmt->execute();
    }
    public function read()
    {
        $sql = 'SELECT * FROM aluno';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }
    public function update(Aluno $a)
    {
        $sql = 'UPDATE aluno SET nome = ?, curso = ?, periodo = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getCurso());
        $stmt->bindValue(3, $a->getPeriodo());
        $stmt->bindValue(4, $a->getId());
        $stmt->execute();
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM aluno WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }
}