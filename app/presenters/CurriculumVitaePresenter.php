<?php

namespace App\Presenters;

use App\Models\Applicant;
use App\Models\Education;
use App\Models\Job;
use App\Models\Skill;
use App\Models\SkillGroup;
use Nette;


class CurriculumVitaePresenter extends Nette\Application\UI\Presenter
{

    /**
     * CV data
     *
     * @var array
     */
    protected $data = [];


    /**
     * @todo Language switch
     */
    public function beforeRender()
    {
        parent::beforeRender();

        if( file_exists(WWW_DIR . '/api/en/cv.json') ) {
            $this->data = json_decode( file_get_contents(WWW_DIR . '/api/en/cv.json'), true );
        }

    }


    public function renderDefault()
    {
        $this->template->applicant  = new Applicant($this->data);
    }


    public function renderWorkExperience()
    {
        $container = [];

        foreach($this->data['jobs'] as $item) {
            $container[] = new Job((array)$item);
        }

        $this->template->jobs = $container;
    }


    public function renderEducation()
    {
        $container = [];

        foreach($this->data['education'] as $item) {
            $container[] = new Education((array)$item);
        }

        $this->template->educations = $container;
    }


    public function renderSkills()
    {
        $container = [];

        foreach($this->data['skills'] as $item) {
            $container[] = new SkillGroup((array)$item);
        }

        $this->template->skills = $container;
    }


    public function renderAbout()
    {

    }

}
