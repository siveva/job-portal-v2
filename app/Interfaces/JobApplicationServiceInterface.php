<?php

namespace App\Interfaces;

interface JobApplicationServiceInterface
{
    public function updateApplicationStatus($id, $type);
}
