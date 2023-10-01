<?php
namespace services\vacancy;

use services\BaseService;
use models\VacancySearch;

class Index extends BaseService
{
    private $vacancies;

    public function __construct($params)
    {
        $this->params = $params;
    }

    protected function perform()
    {
        $this->searchVacancies();
        $this->result = [
            'vacancies' => $this->vacancies,
        ];
        return;
    }

    /**
     * Serching models, set to vacancies
     */
    private function searchVacancies(): void
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search($this->params);
        $this->vacancies = $dataProvider->models;
    }

}