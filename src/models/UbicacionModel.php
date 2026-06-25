<?php

require_once 'BaseModel.php';

class UbicacionModel extends BaseModel
{
    protected string $table =
        'ubicaciones';

    protected string $primaryKey =
        'id_ubicacion';

    public function crear(
        array $data
    ): int {

        $stmt =
            $this->db->prepare("
                INSERT INTO ubicaciones (
                    comuna,
                    direccion
                )
                VALUES (
                    :comuna,
                    :direccion
                )
            ");

        $stmt->execute([

            'comuna' =>
                $data['comuna'],

            'direccion' =>
                $data['direccion']
        ]);

        return (int)
            $this->db
                ->lastInsertId();
    }

    public function findById(
        int $id
    ): ?array {

        $stmt =
            $this->db->prepare("
                SELECT *
                FROM ubicaciones
                WHERE id_ubicacion = ?
            ");

        $stmt->execute([
            $id
        ]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        ) ?: null;
    }
}