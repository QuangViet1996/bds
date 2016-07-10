<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class PayrollTypeValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
        'fromrow'    => 'required',
        'coluser'    => 'required',
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
            'title.required' => '<b>Tiêu đề loại lương</b> yêu cầu nhập',
            'fromrow.required' => '<b>Dữ liệu từ dòng</b> yêu cầu nhập',
            'coluser.required' => '<b>Vị trí cột nhân viên</b> yêu cầu nhập',
            'required' => ':attribute yêu cầu nhập',
        ];
    }

} 