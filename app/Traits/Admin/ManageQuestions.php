<?php

namespace App\Traits\Admin;

trait ManageQuestions
{
    protected function questionInput(string $picture = null): array
    {
        return [
            'title' => request('title'),
            'unit_id' => request('unit_id'),
            'picture' => $picture,
        ];
    }
}
