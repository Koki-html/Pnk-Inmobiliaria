<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    protected string $table = 'usuarios';
    protected string $primaryKey = 'id_usuario';

    public function crear(array $data): bool
    {
        $sql = "
            INSERT INTO usuarios (
                rut,
                nombre_completo,
                fecha_nacimiento,
                correo,
                password_hash,
                sexo,
                telefono,
                estado,
                penka_id,
                certificado_antecedentes,
                id_rol
            )
            VALUES (
                :rut,
                :nombre_completo,
                :fecha_nacimiento,
                :correo,
                :password_hash,
                :sexo,
                :telefono,
                :estado,
                :penka_id,
                :certificado_antecedentes,
                :id_rol
            )
        ";

        return $this->db
            ->prepare($sql)
            ->execute($data);
    }

    public function actualizar(int $id, array $data): bool
    {
        $data['id_usuario'] = $id;

        $sql = "
            UPDATE usuarios
            SET
                nombre_completo = :nombre_completo,
                correo = :correo,
                telefono = :telefono,
                estado = :estado
            WHERE id_usuario = :id_usuario
        ";

        return $this->db
            ->prepare($sql)
            ->execute($data);
    }

    public function login(string $correo): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM usuarios
            WHERE correo = ?
            LIMIT 1
        ");

        $stmt->execute([$correo]);

        return $stmt->fetch(PDO::FETCH_ASSOC)
            ?: null;
    }

    public function findByEmail(string $correo): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM usuarios
            WHERE correo = ?
            LIMIT 1
        ");

        $stmt->execute([$correo]);

        return $stmt->fetch(PDO::FETCH_ASSOC)
            ?: null;
    }

    public function buscarPorCorreo(
        string $correo
    ): ?array {

        $stmt = $this->db->prepare("
            SELECT *
            FROM usuarios
            WHERE correo = ?
        ");

        $stmt->execute([$correo]);

        return $stmt->fetch(PDO::FETCH_ASSOC)
            ?: null;
    }

    public function listarPendientes(): array
    {
        $stmt = $this->db->query("
            SELECT *
            FROM usuarios
            WHERE estado = 'Pendiente'
        ");

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function listarGestores(): array
    {
        $stmt = $this->db->query("
            SELECT *
            FROM usuarios
            WHERE penka_id IS NOT NULL
        ");

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function listarPropietarios(): array
    {
        $stmt = $this->db->query("
            SELECT *
            FROM usuarios
            WHERE id_rol = 2
        ");

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function cambiarEstado(
        int $id,
        string $estado
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE usuarios
            SET estado = ?
            WHERE id_usuario = ?
        ");

        return $stmt->execute([
            $estado,
            $id
        ]);
    }

    public function asignarPenkaId(
        int $id,
        string $penkaId
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE usuarios
            SET penka_id = ?
            WHERE id_usuario = ?
        ");

        return $stmt->execute([
            $penkaId,
            $id
        ]);
    }

    public function obtenerPorId(
        int $id
    ): ?array {

        $stmt = $this->db->prepare("
            SELECT *
            FROM usuarios
            WHERE id_usuario = ?
            LIMIT 1
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC)
            ?: null;
    }

    public function eliminar(
        int $id
    ): bool {

        $stmt = $this->db->prepare("
            DELETE FROM usuarios
            WHERE id_usuario = ?
        ");

        return $stmt->execute([$id]);
    }
}