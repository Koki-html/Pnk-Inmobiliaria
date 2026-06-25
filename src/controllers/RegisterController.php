public function registerOwner()
{
    $data = [
        ...
    ];

    $this->userModel->crear(
        $data
    );

    header(
        'Location: /register-owner?success=1'
    );

    exit;
}