<?php

require_once 'BaseModel.php';

class ImagenPropiedadModel extends BaseModel
{
    protected string $table =
        'imagenes_propiedad';

    protected string $primaryKey =
        'id_imagen';

    public function agregar(
        int $idPropiedad,
        string $rutaImagen
    ): bool {

        if (
            $this->contarPorPropiedad(
                $idPropiedad
            ) >= 10
        ) {

            return false;
        }

        $stmt = $this->db->prepare("
            INSERT INTO imagenes_propiedad (
                id_propiedad,
                ruta_imagen
            )
            VALUES (?, ?)
        ");

        return $stmt->execute([
            $idPropiedad,
            $rutaImagen
        ]);
    }

    public function obtenerPorPropiedad(
        int $idPropiedad
    ): array {

        $stmt = $this->db->prepare("
            SELECT *
            FROM imagenes_propiedad
            WHERE id_propiedad = ?
            ORDER BY id_imagen ASC
        ");

        $stmt->execute([
            $idPropiedad
        ]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function contarPorPropiedad(
        int $idPropiedad
    ): int {

        $stmt = $this->db->prepare("
            SELECT COUNT(*)
            FROM imagenes_propiedad
            WHERE id_propiedad = ?
        ");

        $stmt->execute([
            $idPropiedad
        ]);

        return (int)
            $stmt->fetchColumn();
    }

    public function eliminar(
        int $idImagen
    ): bool {

        $stmt = $this->db->prepare("
            DELETE
            FROM imagenes_propiedad
            WHERE id_imagen = ?
        ");

        return $stmt->execute([
            $idImagen
        ]);
    }
}