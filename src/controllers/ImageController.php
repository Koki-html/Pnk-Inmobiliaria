<?php

require_once __DIR__ .
    '/../models/ImagenPropiedadModel.php';

require_once __DIR__ .
    '/AuthController.php';

class ImageController
{
    private ImagenPropiedadModel $imageModel;

    public function __construct()
    {
        $this->imageModel =
            new ImagenPropiedadModel();
    }

    public function upload(): void
    {
        AuthController::requireOwner();

        $idPropiedad =
            (int) ($_POST['id_propiedad'] ?? 0);

        if (
            !isset($_FILES['imagenes'])
        ) {

            header(
                'Location: /owner'
            );

            exit;
        }

        $uploadDir =
            __DIR__ .
            '/../../public/uploads/';

        if (!is_dir($uploadDir)) {

            mkdir(
                $uploadDir,
                0777,
                true
            );
        }

        $permitidos = [

            'image/jpeg',
            'image/png',
            'image/webp'

        ];

        $imagenesActuales =
            $this->imageModel
                ->contarPorPropiedad(
                    $idPropiedad
                );

        foreach (
            $_FILES['imagenes']['tmp_name']
            as $index => $tmpName
        ) {

            if (
                $imagenesActuales >= 10
            ) {

                break;
            }

            if (
                $_FILES['imagenes']['error'][$index]
                !== UPLOAD_ERR_OK
            ) {

                continue;
            }

            $mime =
                mime_content_type(
                    $tmpName
                );

            if (
                !in_array(
                    $mime,
                    $permitidos
                )
            ) {

                continue;
            }

            $fileName =
                uniqid() .
                '_' .
                basename(
                    $_FILES['imagenes']['name'][$index]
                );

            $target =
                $uploadDir .
                $fileName;

            if (
                move_uploaded_file(
                    $tmpName,
                    $target
                )
            ) {

                $resultado =
                    $this->imageModel
                        ->agregar(
                            $idPropiedad,
                            '/uploads/' .
                            $fileName
                        );

                var_dump($resultado);
                exit;

                $imagenesActuales++;
            }

        }

        header(
            'Location: /owner'
        );

        exit;
    }
}