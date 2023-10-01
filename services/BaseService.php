<?php
namespace services;
use yii\base\Model;

abstract class BaseService extends Model
{
    public $result;
    public $params;
    public $errors;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    abstract protected function perform();

    public function call()
    {
        $this->load($this->params);
        $this->validate();
        $this->errors = $this->getErrors();

        if (empty($this->errors)) {
            $this->perform();
        }

        return $this;
    }

    public function isSuccess(): bool
    {
        return empty($this->getErrors());
    }

    public function getResult(): array
    {
        return $this->result;
    }

}
