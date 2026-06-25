<?php

require_once 'BaseModel.php';

class RolModel extends BaseModel
{
    protected string $table = 'roles';
    protected string $primaryKey = 'id_rol';
}