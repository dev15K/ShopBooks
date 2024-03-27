<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ContactStatus extends Enum
{
    /*  APPROVED, PENDING, REFUSE, COMPLETE, DELETED */
    const APPROVED = 'APPROVED';
    const PENDING = 'PENDING';
    const REFUSE = 'REFUSE';
    const COMPLETE = 'COMPLETE';
    const DELETED = 'DELETED';
}
