<?php
namespace services\vacancy;

use models\Vacancy;
use services\BaseService;

class View extends BaseService
{
    private $vacancy;
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function rules()
    {
        return [
            ['id', 'required'],
            ['id', 'exist', 'targetClass' => Vacancy::class],
        ];
    }

    protected function perform()
    {
        $this->findModel();
        $this->result = [
            'vacancy' => $this->vacancy,
        ];
        return;
    }

    /**
     * Serching model, set to vacancies
     */
    private function findModel(): void
    {
        $this->vacancy = Vacancy::findOne($this->id);
    }

}