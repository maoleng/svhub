<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class PostCategory extends Enum
{

    #[Description('Education')]
    public const EDUCATION = 0;
    public const JOB = 1;

}
