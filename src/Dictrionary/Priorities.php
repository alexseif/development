<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Dictrionary;

abstract class Priorities
{
    public static array $priorityChoices = [
        'Normal' => 0,
        'Urgent' => 1,
        'Important' => 2,
        'Important Urgent' => 3
    ];
    public static array $priorityLabels = [
        0 => 'Normal',
        1 => 'Urgent',
        2 => 'Important',
        3 => 'Important Urgent'
    ];
}