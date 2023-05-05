<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostRemoteableEnum extends Enum
{
    public const YES = '1';
    public const NO = '2';
}
