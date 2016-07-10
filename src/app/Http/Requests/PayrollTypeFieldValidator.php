<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class PayrollTypeFieldValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
        'fieldval'    => 'required',
        'listtypes'    => 'required',
        'isvisible'    => 'required',
        'isvat'    => 'required',
        'isinsurrance'    => 'required',
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
            'title.required' => '<b>Tiêu đề cột</b> yêu cầu nhập',
            'fieldval.required' => '<b>Vị trí cột số</b> yêu cầu nhập',
            'listtypes.required' => 'Cột nhân viên được yêu cầu nhập',
            'required' => ':attribute yêu cầu nhập',
        ];
    }

} 