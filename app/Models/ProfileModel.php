<?php


namespace App\Models;


class ProfileModel extends BaseModel
{

    public $person; //Person
    public $stats; //Stats
    public $strengths; //array(Strength)
    public $interests; //array(Interest)
    public $experiences; //array(Experience)
    public $achievements; //array(Object)
    public $jobs; //array(Job)
    public $projects; //array(Project)
    public $publications; //array(Object)
    public $education; //array(Education)
    public $opportunities; //array(Opportunity)
    public $languages; //array(Language)
    public $personalityTraitsResults; //PersonalityTraitsResults
    public $professionalCultureGenomeResults; //ProfessionalCultureGenomeResults


}