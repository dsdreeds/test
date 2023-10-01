<?php
namespace services\vacancy;

use models\Vacancy;
use services\BaseService;

class Create extends BaseService
{
    public $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    protected function perform()
    {
        $this->createVacancy();
    }

    /**
     * Handles creating new Vacancy to database,
     * if created add vacancy id to result, else will add validation errors
     */
    private function createVacancy(): void
    {
        $vacancy = new Vacancy();

        if ($vacancy->load($this->params) && $vacancy->save()) {
            $this->result = ['id' => $vacancy->id];
            return;
        }

        $this->addErrors($vacancy->getErrors());
        return;
    }
}