<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class PostTag extends Enum
{
    #[Description('CLUB')]
    public const CLUB = 0;
    #[Description('Workshop')]
    public const WORKSHOP = 1;
    #[Description('School')]
    public const SCHOOL = 2;
    #[Description('Knowledge')]
    public const KNOWLEDGE = 3;
    #[Description('Experience')]
    public const EXPERIENCE = 4;
    #[Description('Review')]
    public const REVIEW = 5;

}
