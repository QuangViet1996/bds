<?php

namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Illuminate\Support\MessageBag as MessageBag;

class PayrollSupportValidator extends AbstractValidator {

    protected static $rules = array(
        'title' => 'required',
        'datacat' => 'required',
        'overview' => 'required',
        'description' => 'required',
    );
    protected static $messages = [
        'required' => ':attribute yêu cầu nhập',
    ];

    public function messages() {
        self::$messages = [
            'title.required' => 'Tiêu đề được yêu cầu nhập',
            'datacat.required' => 'Danh mục được yêu cầu tạo',
            'overview.required' => 'Mô tả được yêu cầu nhập',
            'description.required' => 'Chi tiết được yêu cầu nhập',
        ];
    }

    public function __construct() {
        Event::listen('validating', function($input) {
            
        });
        $this->messages();
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors ? $this->errors : new MessageBag();

        return $flag;
    }

}
