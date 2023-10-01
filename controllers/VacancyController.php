<?php

namespace controllers;

use api\services\contracts\documents\Index;
use services\vacancy\Create;
use services\vacancy\View;
use Yii;
use yii\web\Controller;

/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
{
    /**
     * Lists all Vacancy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $service = (new Index($_GET))->call();

        if ($service->isSuccess()) {
            return $service->getResult();
        }

        return $this->renderValidationFailed($service->getErrors());
    }

    /**
     * Displays a single Vacancy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $service = (new View($_GET))->call();

        if ($service->isSuccess()) {
            return $service->getResult();
        }

        return $this->renderValidationFailed($service->getErrors());
    }

    /**
     * Creates a new Vacancy model.
     * If creation is successful, will return Id.
     * @return mixed
     */
    public function actionCreate()
    {
        $service = (new Create($_GET))->call();

        if ($service->isSuccess()) {
            return $service->getResult();
        }

        return $this->renderValidationFailed($service->getErrors());
    }

    private function renderValidationFailed($errors)
    {
        Yii::$app->response->statusCode = 422;
        return ['status' => 'Validation failed', 'errors' => $errors];
    }
}
