<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Active()
 * @method static static Pending()
 * @method static static Inactive()
 */
final class ProductStatus extends Enum
{
    const Active = 1;

    const Pending = 2;

    const Inactive = 3;
}
