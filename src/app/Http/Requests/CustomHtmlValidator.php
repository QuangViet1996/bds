<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class CustomHtmlValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
        'slug' => 'required',
        'content' => 'required',
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
            'title.required' => 'Required',
            'slug.required' => 'Required',
            'content.required' => 'Required',
            'required' => ':attribute required',
        ];
    }

} 