<?php

require_once 'BaseModel.php';

class PropiedadModel extends BaseModel
{
    protected string $table =
        'propiedades';

    protected string $primaryKey =
        'id_propiedad';

    public function crear(array $data): bool
    {
        $sql = "
            INSERT INTO propiedades (
                codigo_publicacion,
                propietario_id,
                id_ubicacion,
                tipo_propiedad,
                descripcion,
                dormitorios,
                banos,
                area_terreno,
                area_construida,
                precio_pesos,
                precio_uf,
                fecha_publicacion,
                bodega,
                estacionamiento,
                logia,
                cocina_amoblada,
                antejardin,
                patio_trasero,
                piscina,
                latitud,
                longitud,
                activa
            )
            VALUES (
                :codigo_publicacion,
                :propietario_id,
                :id_ubicacion,
                :tipo_propiedad,
                :descripcion,
                :dormitorios,
                :banos,
                :area_terreno,
                :area_construida,
                :precio_pesos,
                :precio_uf,
                :fecha_publicacion,
                :bodega,
                :estacionamiento,
                :logia,
                :cocina_amoblada,
                :antejardin,
                :patio_trasero,
                :piscina,
                :latitud,
                :longitud,
                :activa
            )
        ";

        return $this->db
            ->prepare($sql)
            ->execute($data);
    }

    public function actualizar(
        int $id,
        array $data
    ): bool {

        $data['id_propiedad'] = $id;

        $sql = "
            UPDATE propiedades
            SET
                descripcion = :descripcion,
                precio_pesos = :precio_pesos,
                precio_uf = :precio_uf,
                activa = :activa
            WHERE id_propiedad = :id_propiedad
        ";

        return $this->db
            ->prepare($sql)
            ->execute($data);
    }

    public function desactivar(
        int $id
    ): bool {

        $stmt =
            $this->db->prepare("
                UPDATE propiedades
                SET activa = 0
                WHERE id_propiedad = ?
            ");

        return $stmt->execute([
            $id
        ]);
    }

    public function obtenerPorPropietario(
        int $idPropietario
    ): array {

        $stmt =
            $this->db->prepare("
                SELECT *
                FROM propiedades
                WHERE propietario_id = ?
            ");

        $stmt->execute([
            $idPropietario
        ]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function buscar(
        ?string $provincia = null,
        ?string $comuna = null,
        ?string $sector = null
    ): array {

        $sql = "
            SELECT
                p.*,
                u.comuna,
                u.direccion
            FROM propiedades p
            INNER JOIN ubicaciones u
                ON p.id_ubicacion =
                u.id_ubicacion
            WHERE p.activa = 1
        ";

        $params = [];

        if ($comuna) {

            $sql .= "
                AND u.comuna = ?
            ";

            $params[] =
                $comuna;
        }

        $stmt =
            $this->db->prepare(
                $sql
            );

        $stmt->execute(
            $params
        );

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function obtenerDetalle(
        int $idPropiedad
    ): ?array {

        $stmt =
            $this->db->prepare("
                SELECT
                    p.*,
                    u.comuna,
                    u.direccion
                FROM propiedades p
                INNER JOIN ubicaciones u
                    ON p.id_ubicacion =
                    u.id_ubicacion
                WHERE p.id_propiedad = ?
            ");

        $stmt->execute([
            $idPropiedad
        ]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        ) ?: null;
    }

    public function findById(
        int $id
    ): ?array {

        $stmt =
            $this->db->prepare("
                SELECT
                    p.*,
                    u.comuna,
                    u.direccion
                FROM propiedades p
                INNER JOIN ubicaciones u
                    ON p.id_ubicacion =
                    u.id_ubicacion
                WHERE p.id_propiedad = ?
            ");

        $stmt->execute([
            $id
        ]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        ) ?: null;
    }
}