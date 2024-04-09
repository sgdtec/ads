<?php

namespace App\Requests;

class BaseRequest
{
    protected $validation;
    protected $request;
    protected $response;

    public function __construct()
    {
        $this->validation = service('validation');
        $this->response   = service('response');
        $this->request    = service('request');
    }

    protected function validate(string $ruleGroup, bool $respondWithRedirect = false)
    {
        $this->validation->setRuleGroup($ruleGroup);
        
        if (!$this->validation->withRequest($this->request)->run()) {
            // form do not valided
            if ($respondWithRedirect) {
                $this->respondWithRedirect();
            }
        }

        $this->respondWithValidationErrors();
    }

    private function respondWithRedirect()
    {
        redirect()->back()->with('danger', lang('App.danger_validantions'))
            ->with('errors_model', $this->validation->getErrors())
            ->withInput()
            ->send();
        exit; // don't forget exit
    }

    private function respondWithValidationErrors(): array
    {
        $response = [
            'success' => false,
            'token'   => csrf_hash(),
            'errors'  => $this->validation->getErrors()
        ];

        // if (url_is('api*')) {
        //     unset($response['token']);
        // }
        $this->urlApi();

        $this->response->setJSON($response)->send();
        exit; //don't forget exit
    }

    public function respondWithMessage(bool $success = true, string $message = '', int $statusCode = 200): array
    {
        $response = [
            'code'    => $statusCode,
            'success' => $success,
            'token'   => csrf_hash(),
            'message' => $message
        ];

        // if (url_is('api*')) {
        //     unset($response['token']);
        // }
        $this->urlApi();

        return $response;
    }

    private function urlApi()
    {
        if(url_is('api*')) {
            unset($response['token']);
        }

        return;
    }
}
