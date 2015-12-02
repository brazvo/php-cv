<?php
/**
 * Created by PhpStorm.
 * User: bzvolensky
 * Date: 1. 12. 2015
 * Time: 15:01
 */

namespace App\Models;


class Job
{

    /**
     * @var string
     */
    public $company;

    /**
     * @var string
     */
    public $position;

    /**
     * @var string
     */
    public $period;

    /**
     * @var string
     */
    public $description;

    /**
     * Job constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->company = isset($data['company']) ? $data['company'] : '';
        $this->position = isset($data['position']) ? $data['position'] : '';
        $this->period = isset($data['period']) ? $data['period'] : '';
        $this->description = isset($data['description']) ? $data['description'] : '';
    }

}