<?php

declare(strict_types=1);

namespace DashboardContext\Post\Domain;

use DashboardContext\Post\Domain\ValueObject\PostTitle;
use Shared\Domain\ValueObject\IdValueObject;
use Shared\Domain\ValueObject\IntValueObject;

final class Post
{
    public function __construct(
        private readonly PostTitle $title,
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
        PostTitle $title,
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
