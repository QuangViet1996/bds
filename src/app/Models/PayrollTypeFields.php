<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class PayrollTypeFields extends Model {

    protected $table = 'payroll_type_fields';
    protected $primaryKey = 'payroll_type_field_id';
    public $timestamps = false;
    protected $fillable = [ "payroll_type_id",
        "payroll_type_field_title",
        "payroll_type_field_slug",
        "payroll_type_field_val",
        "payroll_type_field_isvat",
        "payroll_type_field_isvisible",
        "payroll_type_field_isinsurrance",
    ];
    public $is = [ "yes" => 1,
        "no" => 0,
        "show" => 1,
        "hide" => 0,
    ];
    protected $guarded = ["payroll_type_field_id"];
    public $fields_in_report = [
        "payroll_type_field_isvat" => 'Tổng thu nhập chịu thuế',
        "payroll_type_field_isinsurrance" => 'Tổng bảo hiểm',
    ];

    
    
    
    
    /*     * ********************************************
     * findById
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findById($id) {
        $payroll_type = self::join('payroll_type_fields', 'payroll_types.payroll_type_id', '=', 'payroll_type_fields.payroll_type_id')
                ->where('payroll_types.payroll_type_id', $id)
                ->select('payroll_types.*', 'payroll_type_fields.payroll_type_field_title', 'payroll_type_fields.payroll_type_field_slug', 'payroll_type_fields.payroll_type_field_val', 'payroll_type_fields.payroll_type_field_isvat', 'payroll_type_fields.payroll_type_field_isvisible', 'payroll_type_fields.payroll_type_field_isinsurrance', 'payroll_type_fields.payroll_type_field_id')
                ->get();

        return $payroll_type;
    }

    
    
    
    
    
    /*     * ********************************************
     * updatePayrollTypeField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollTypeField($input) {
        $payroll_type_field = self::find($input['id']);

        if (!empty($payroll_type_field)) {
            $payroll_type_field->payroll_type_field_title = $input['title'];
            $payroll_type_field->payroll_type_field_val = (int) $input['fieldval'];
            $payroll_type_field->payroll_type_id = (int) $input['listtypes'];
            $payroll_type_field->payroll_type_field_isvisible = (int) $input['isvisible'];
            $payroll_type_field->payroll_type_field_isvat = (int) $input['isvat'];
            $payroll_type_field->payroll_type_field_isinsurrance = (int) $input['isinsurrance'];
            $payroll_type_field->save();
            return $payroll_type_field;
        } else {
            
        }
    }
    
    
    
    

    /*     * ********************************************
     * addPayrollTypeField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollTypeField($input) {
        $payroll_type_field = self::create([
                    'payroll_type_field_title' => $input['title'],
                    'payroll_type_field_val' => (int) $input['fieldval'],
                    'payroll_type_field_isvisible' => (int) $input['isvisible'],
                    'payroll_type_field_isvat' => (int) $input['isvat'],
                    'payroll_type_field_isinsurrance' => (int) $input['isinsurrance'],
                    'payroll_type_id' => (int) $input['listtypes'],
        ]);
        return $payroll_type_field;
    }

    
    
    
    
    
    /*     * ********************************************
     * deletePayrollTypeField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollTypeField($input) {
        $payroll_type_field = self::find(@$input['id']);

        if (!empty($payroll_type_field)) {
            $payroll_type_id = $payroll_type_field->payroll_type_id;
            $payroll_type_field->delete();
            return $payroll_type_id;
        } else {
            return null;
        }
    }

    
    
    
    
    
    /*     * ********************************************
     * putPayrollTypeFieldsInSelect
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function putPayrollTypeFieldsInSelect($params = array()) {

        $payroll_type_fields = self::orderBy('payroll_type_field_title', 'ASC')
                ->pluck('payroll_type_field_title', 'payroll_type_field_id');
        return $payroll_type_fields;
    }

    
    
    
    
    
    /*     * ********************************************
     * listPayrollTypeFields
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listPayrollTypeFields($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_types = self::join('payroll_types', 'payroll_type_fields.payroll_type_id', '=', 'payroll_types.payroll_type_id')
                ->orderBy('payroll_type_field_id', 'DESC')
                ->select('payroll_type_fields.*', 'payroll_types.payroll_type_title')
                ->paginate($results_per_page);
        return $payroll_types;
    }

    
    
    
    
    
    /*     * ********************************************
     * findByPayrollTypeID
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findByPayrollTypeID($payroll_type_id) {
        $item = self::where('payroll_type_id', '=', $payroll_type_id)
                ->get();
        return $item;
    }

    
    
    
    
    /*     * ********************************************
     * getPayrollTypeFieldsByTypeId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollTypeFieldsByTypeId($params = array()) {
        $payroll_type_fields = self::where('payroll_type_id', '=', $params['payroll_type_id'])
                ->orderBy('payroll_type_field_title', 'ASC')
                ->get();
        return $payroll_type_fields;
    }

}
