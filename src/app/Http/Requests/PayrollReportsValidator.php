<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class PayrollReportsValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
    );
    
    protected static $messages = [
        'required' => ':attribute yêu cầu nhập',
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
            'description.required' => 'Mô tả được yêu cầu nhập',
            'template_file.required' => 'Mẫu file được yêu cầu nhập',
            'required' => ':attribute yêu cầu nhập',
        ];
    }

} 