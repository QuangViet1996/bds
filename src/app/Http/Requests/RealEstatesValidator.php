<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

class RealEstatesValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
        'description' => 'required',
        'sq' => 'required',
        'bedroom' => 'required',
        'bathroom' => 'required',
        'build_year' => 'required',
        'cost' => 'required',
        'datacat' => 'required',
    );
    
    protected static $messages = [
        'required' => ':attribute required',
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
            'description.required' => 'Required',
            'sq.required' => 'Required',
            'bedroom.required' => 'Required',
            'bathroom.required' => 'Required',
            'build_year.required' => 'Required',
            'datacat.required' => 'Required',
            'cost.required' => 'Required',
            'required' => ':attribute required',
        ];
    }

} 