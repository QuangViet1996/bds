<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Illuminate\Support\MessageBag as MessageBag;

class PositionsValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
    );
    
    protected static $messages = [
        'required' => ':attribute required',
    ];

    public function messages() {
        self::$messages = [
            'title.required' => 'required',
        ];
    }

    public function __construct()
    {
        Event::listen('validating', function($input)
        {
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
        
        $this->errors = $this->errors?$this->errors:new MessageBag();
        
        return $flag;
    }


    
    
} 