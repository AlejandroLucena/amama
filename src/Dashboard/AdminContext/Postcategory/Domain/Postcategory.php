<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Domain;

use DashboardContext\Postcategory\Domain\ValueObject\PostcategoryTitle;
use Shared\Domain\ValueObject\IdValueObject;
use Shared\Domain\ValueObject\IntValueObject;

final class Postcategory
{
    public function __construct(
        private readonly PostcategoryTitle $title,
        private readonly IntValueObject $correct,
        private readonly IdValueObject $questionId,
    ) {
    }

    public function title()
    {
        return $this->title;
    }

    public function correct()
    {
        return $this->correct;
    }

    public function questionId()
    {
        return $this->questionId;
    }

    public static function create(
        PostcategoryTitle $title,
        IntValueObject $correct,
        IdValueObject $questionId,
    ) {
        return new self(
            $title,
            $correct,
            $questionId,
        );
    }
}
