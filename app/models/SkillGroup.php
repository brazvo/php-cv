<?php
/**
 * Created by PhpStorm.
 * User: Branislav
 * Date: 11.12.2015
 * Time: 21:36
 */

namespace App\Models;


class SkillGroup extends \stdClass
{


    /**
     * SkillGroup constructor.
     * @param array $data
     */
    public function __construct($data = array())
    {
        $this->group = isset($data['group']) ? $data['group'] : '';
        if (isset($data['items'])) {
            $this->addSkills($data['items']);
        }
    }

    /**
     * @param Skill $skill
     * @return $this
     */
    public function addSkill( Skill $skill ) {
        $this->items[] = $skill;

        return $this;
    }


    /**
     * @param array $data
     * @return $this
     */
    public function addSkills($data = array()) {
        foreach($data as $item) {
            $this->addSkill( new Skill($item) );
        }

        return $this;
    }
}