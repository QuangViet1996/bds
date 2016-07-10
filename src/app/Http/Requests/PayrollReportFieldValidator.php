<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class PayrollReportFieldValidator extends AbstractValidator
{
    protected static $rules = array(
    );
    
    protected static $messages = [
    ];


    public function __construct()
    {
        Event::listen('validating', function($input)
        {
        });
        $this->messages();
    }
    public function validate($input) {
        
        $flag = parent::validate($input);

        return $flag;
    }


    public function messages() {
        self::$messages = [
            'title.required' => 'Tiêu đề được yêu cầu nhập',
            'fieldval.required' => 'Từ dòng được yêu cầu nhập',
            'listtypes.required' => 'Cột nhân viên được yêu cầu nhập',
            'required' => ':attribute yêu cầu nhập',
        ];
    }

} 