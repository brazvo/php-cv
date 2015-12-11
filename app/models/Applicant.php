<?php
/**
 * Created by PhpStorm.
 * User: bzvolensky
 * Date: 1. 12. 2015
 * Time: 14:59
 */

namespace App\Models;


class Applicant extends \stdClass
{

    public function __construct( $data = array() )
    {
        $this->name = isset($data['name']) ? $data['name'] : '';
        $this->position = isset($data['position']) ? $data['position'] : '';
        $this->dateOfBirth = isset($data['date_of_birth']) ? $data['date_of_birth'] : '';
        $this->placeOfBirth = isset($data['place_of_birth']) ? $data['place_of_birth'] : '';
        $this->address = isset($data['address']) ? $data['address'] : '';
        $this->description = isset($data['description']) ? $data['description'] : [];
        $this->contacts = isset($data['contacts']) ? $data['contacts'] : [];
    }

}