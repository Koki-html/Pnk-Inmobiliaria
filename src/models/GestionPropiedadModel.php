<?php

require_once 'BaseModel.php';

class GestionPropiedadModel extends BaseModel
{
    protected string $table = 'gestiones_propiedad';
    protected string $primaryKey = 'id_gestion';

    public function asignarGestor(
        int $idPropiedad,
        int $idGestor,
        float $comision
    ): bool {

        $stmt = $this->db->prepare("
            INSERT INTO gestiones_propiedad (
                id_propiedad,
                id_gestor,
                fecha_asignacion,
                comision,
                estado
            )
            VALUES (
                ?, ?, CURDATE(), ?, 'Activa'
            )
        ");

        return $stmt->execute([
            $idPropiedad,
            $idGestor,
            $comision
        ]);
    }

    public function obtenerPorGestor(
        int $idGestor
    ): array {

        $stmt = $this->db->prepare("
            SELECT *
            FROM gestiones_propiedad
            WHERE id_gestor = ?
        ");

        $stmt->execute([$idGestor]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorPropiedad(
        int $idPropiedad
    ): array {

        $stmt = $this->db->prepare("
            SELECT *
            FROM gestiones_propiedad
            WHERE id_propiedad = ?
        ");

        $stmt->execute([$idPropiedad]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function marcarVendida(
        int $idGestion
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE gestiones_propiedad
            SET estado = 'Vendida'
            WHERE id_gestion = ?
        ");

        return $stmt->execute([$idGestion]);
    }
}