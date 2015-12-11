<?php
/**
 * Created by PhpStorm.
 * User: bzvolensky
 * Date: 1. 12. 2015
 * Time: 15:01
 */

namespace App\Models;


class Education extends \stdClass
{

    /**
     * Education constructor.
     * @param array $data
     */
    public function __construct($data = array())
    {
        $this->period       = isset($data['period']) ? $data['period'] : '';
        $this->school       = isset($data['school']) ? $data['school'] : '';
        $this->finishedWith = isset($data['finished_with']) ? $data['finished_with'] : '';
    }
}