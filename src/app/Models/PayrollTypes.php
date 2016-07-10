<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class PayrollTypes extends Model {

    protected $table = 'payroll_types';
    protected $primaryKey = 'payroll_type_id';
    public $timestamps = false;
    protected $fillable = [ "payroll_type_title",
        "payroll_type_fromrow",
        "payroll_type_file_template",
        "payroll_type_col_user"];
    protected $guarded = ["payroll_type_id"];

    
    
    
    
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
                ->select('payroll_types.*', 'payroll_type_fields.payroll_type_field_title', 'payroll_type_fields.payroll_type_field_slug', 'payroll_type_fields.payroll_type_field_val', 'payroll_type_fields.payroll_type_field_id')
                ->get();

        return $payroll_type;
    }

    
    
    
    
    
    /*     * ********************************************
     * updatePayrollType
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollType($input) {
        $payroll_type = self::find($input['id']);

        if (!empty($payroll_type)) {
            $payroll_type->payroll_type_title = $input['title'];
            $payroll_type->payroll_type_fromrow = $input['fromrow'];
            $payroll_type->payroll_type_col_user = $input['coluser'];
            $payroll_type->payroll_type_file_template = $input['payroll_type_file_template'];
            $payroll_type->save();
        } else {
            
        }
    }

    
    
    
    
    /*     * ********************************************
     * addPayrollType
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollType($input) {

        $payroll = self::create([
                    'payroll_type_title' => $input['title'],
                    'payroll_type_fromrow' => $input['fromrow'],
                    'payroll_type_col_user' => $input['coluser'],
                    'payroll_type_file_template' => $input['payroll_type_file_template'],
            
        ]);
        
        return $payroll;
    }

    
    
    
    
    
    /*     * ********************************************
     * deletePayrollType
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollType($input) {
        
        $payroll = self::find($input['id']);
        
        return $payroll->delete();
    }

    
    
    
    
    
    /*     * ********************************************
     * getPayrollTypes
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollTypes($params = array()) {

        $payroll_types = self::orderBy('payroll_type_title', 'ASC')
                ->pluck('payroll_type_title', 'payroll_type_id');
        
        return $payroll_types;
    }

    
    
    
    
    
    /*     * ********************************************
     * listPayrollTypes
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listPayrollTypes($params = array()) {
        
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_types = self::leftjoin('payroll_type_fields', 'payroll_type_fields.payroll_type_id', '=', 'payroll_types.payroll_type_id')
                ->orderBy('payroll_type_title', 'ASC')
                ->select('payroll_types.*', DB::raw('COUNT(payroll_type_fields.payroll_type_id) as total_configs'))
                ->groupBy('payroll_types.payroll_type_id')
                ->paginate($results_per_page);
        return $payroll_types;
    }

    
    
    
    
    
    /*     * ********************************************
     * viewPayrollTypes
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayrollTypes($params = array()) {

        $payroll_types = self::where('payroll_type_id', $params['payroll_type_id'])
                ->first();

        return $payroll_types;
    }

}
