<?php

namespace App\Presenters;

use App\Models\Applicant;
use App\Models\Education;
use App\Models\Job;
use App\Models\Skill;
use Nette;


class CurriculumVitaePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @const string
     */
    const NAME = 'Brano Zvolensky';

    /**
     * @const string
     */
    const JOB_APPLIED_FOR = 'PHP Developer';


    public function beforeRender()
    {
        parent::beforeRender();

        $person = new Applicant();

        $person->name = self::NAME;
        $person->address = 'Pataš 103, 92901 Pataš, Slovakia';
        $person->phone   = '+421 903 454784';
        $person->email   = 'brano@zvolensky.info';
        $person->dateOfBirth = '1972-06-08 04:05:00';

        $this->template->applicant  = $person;
        $this->template->position        = self::JOB_APPLIED_FOR;
    }


    public function renderDefault()
    {
    }


    public function renderWorkExperience()
    {
        $container = [];

        $container[] = new Job(array(
            'company' => 'DPD Parcel Distribution',
            'position' => 'Senior IT Developer',
            'period' => '2015/04 - Presence',
            'description' => 'I work on internal systems such as Intranet, CRM, Cashcheck System, etc., with technologies such as PHP 5.5, Soap, JSON, REST, MSSQL, Postgres, CouchDB, Git, Angular',
        ));

        $container[] = new Job(array(
            'company' => 'Azet',
            'position' => 'Senior Web Developer / Team leader',
            'period' => '2015/01 - 2015/04',
            'description' => 'I worked on web sites such as cas.sk, sport.sk, aktuality.sk and more in Azet portfolio, with technologies such as PHP 5.5, HTML5, CSS3, jQuery, MySQL, Elastic Search, etc',
        ));

        $container[] = new Job(array(
            'company' => 'MB Entertainment',
            'position' => 'Senior PHP Developer / Team leader',
            'period' => '2011/02 - 2014/12',
            'description' => 'I worked on web sites for Orange Slovensko such as osporte.sk, ohudbe.sk, oskole.sk, Salespad tool for salesmen, with technologies such as PHP 5.3+, HTML5, CSS3, XML, jQuery, MySQL, etc',
        ));

        $this->template->jobs = $container;
    }


    public function renderEducation()
    {
        $container = [];

        $highSchool = new Education();
        $highSchool->period       = '1986 - 1990';
        $highSchool->school       = 'SOU Železničné, Na Pantoch 7, Bratislava';
        $highSchool->finishedWith = 'Examine Level A (maturita)';

        $container[] = $highSchool;

        $this->template->educations = $container;
    }


    public function renderSkills()
    {
        $container = [];

        $container['Languages']    = $this->getLanguageSkills();
        $container['Programming']  = $this->getProgrammingSkills();
        $container['Other Skills'] = $this->getOtherSkills();
        $container['Driving']      = $this->getDrivingSkills();

        $this->template->skills = $container;
    }


    /**
     * Returns language skills
     *
     * @return array
     */
    protected function getLanguageSkills()
    {
        return [
            new Skill(array('skill' => 'Slovak', 'level' => 'Mother\'s language')),
            new Skill(array('skill' => 'English (spoken)', 'level' => 'Intermediate')),
            new Skill(array('skill' => 'English (written)', 'level' => 'Advanced')),
            new Skill(array('skill' => 'Czech', 'level' => 'Advanced')),
        ];
    }


    /**
     * Returns Programming skills
     *
     * @return array
     */
    protected function getProgrammingSkills()
    {
        return [
            new Skill(array('skill' => 'PHP', 'level' => 'Expert', 'description' => 'OOP, Nette, Zend 2, Phalcon')),
            new Skill(array('skill' => 'JS', 'level' => 'Advanced', 'description' => 'OOP, jQuery, Angular, Bootstrap')),
            new Skill(array('skill' => 'SQL', 'level' => 'Advanced', 'description' => 'MySQL, Postgres, MSSQL, stored procedures, fx')),
            new Skill(array('skill' => 'Non-SQL', 'level' => 'Intermediate', 'description' => 'Mongo, Couch DB, Elastic')),
            new Skill(array('skill' => 'HTML/HTML5', 'level' => 'Advanced', 'description' => 'Responsive designs, Bootstrap, Semantics')),
            new Skill(array('skill' => 'CSS/CSS3', 'level' => 'Advanced', 'description' => 'Media queries, LESS, SASS, Bootstrap')),
        ];
    }


    /**
     * Returns Other skills
     *
     * @return array
     */
    protected function getOtherSkills()
    {
        return [
            new Skill(array('skill' => 'Git', 'level' => 'Advanced')),
            new Skill(array('skill' => 'SVN', 'level' => 'Advanced')),
            new Skill(array('skill' => 'Adobe Photoshop', 'level' => 'Intermediate', 'description' => 'Have no problem to extract graphics to be implemented into HTLM and CSS.')),
        ];
    }

    /**
     * Returns driving Skills
     *
     * @return array
     */
    protected function getDrivingSkills()
    {
        return [
            new Skill(array('skill' => 'Driving Licence C', 'level' => 'Over 500000 km')),
        ];
    }

}
