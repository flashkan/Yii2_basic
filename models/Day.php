<?php
namespace app\models;

class Day
{
    /**
     * Хранит информацию о том, выходной ли это день
     * @var boolean
     */
    public $isWeekend;

    /**
     * Список событий, назначенных на этот день
     * @var array
     */
    public $events;
}