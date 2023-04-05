<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

enum CourseStatus: int
{
    case PUBLICADO = 1;
    case PENDIENTE = 2;
    case RECHAZADO = 3;
}
