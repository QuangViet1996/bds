<?php namespace App\Http\Requests;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Illuminate\Support\MessageBag as MessageBag;

class PayrollValidator extends AbstractValidator
{
    protected static $rules = array(
        'title' => 'required',
        'description'    => 'required',
    );
    
    protected static $messages = [
        'required' => ':attribute yêu cầu nhập',
    ];

    public function messages() {
        self::$messages = [
            'title.required' => 'Tiêu đề được yêu cầu nhập',
            'description.required' => 'Mô tả được yêu cầu nhập',
            'filedata.required' => 'File excel được yêu cầu nhập',
            'required' => ':attribute yêu cầu nhập',
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
        
        $this->is_valid_file_excel($input, $flag);
        
        
        return $flag;
    }


    /**
     * Check excel
     * @param type $input
     * @return boolean
     */
    public function is_valid_file_excel($input, &$flag) {
        //Required
        if ($input['filedata']) {
            //Is excel type
            $ex = $input['filedata']->getClientOriginalExtension();
            if ($ex == 'xlsx' || $ex == 'xls') {
                return true;
            } else {
                $this->errors->add('filedata', trans('front.excel.invalid_type'));
                $flag = false;
                return false;
            }
        } elseif (isset($input['is_filedata']) && ((int)$input['is_filedata'] == 1)) {
            //Is excel type
            return true;
        } else{
            $this->errors->add('filedata', trans('front.excel.required'));
            $flag = false;
            return false;
        }
        
    }
    
} 