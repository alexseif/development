<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Dictrionary;

abstract class Types
{
    public static array $typeChoices = [
        'item' => 'item',
        'development' => 'development',
        'objective' => 'objective',
        'task' => 'task'
    ];
    public static array $typeLabels = [
        'item',
        'development',
        'objective',
        'task',
    ];
}