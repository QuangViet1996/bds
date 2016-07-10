<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Payrolls extends Model {

    protected $table = 'payrolls';
    protected $primaryKey = 'payroll_id';
    public $timestamps = true;
    protected $fillable = [ "payroll_title",
        "payroll_description",
        "payroll_excel_filename",
        "payroll_type_id",
        "payroll_date_trans",
        "payroll_date"];
    protected $guarded = ["payroll_id"];

    
    
    
    
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
        $payroll = self::find($id);
        return $payroll;
    }

    
    
    
    
    /*     * ********************************************
     * updatePayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayroll($input, $filedata = array()) {
        
        $payroll = self::find($input['id']);

        $payroll->payroll_title = $input['title'];
        $payroll->payroll_description = $input['description'];
        $payroll->payroll_date = $input['payroll_date'];
        $payroll->payroll_date_trans = $input['payroll_date_trans'];

        if (!empty($filedata)) {
            $payroll->payroll_excel_filename = $filedata['fileinfo']['filename'];
            $payroll->payroll_type_id = $filedata['fileinfo']['payroll_type_id'];
        }
        return $payroll->save();
    }

    
    
    
    
    /*     * ********************************************
     * addPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayroll($input, $filedata) {
        
        $payroll = self::create([
                    'payroll_title' => $input['title'],
                    'payroll_description' => $input['description'],
                    'payroll_excel_filename' => $filedata['fileinfo']['filename'],
                    'payroll_type_id' => $filedata['fileinfo']['payroll_type_id'],
                    'payroll_date' => $input['payroll_date'],
                    'payroll_date_trans' => $input['payroll_date_trans'],
        ]);
        
        return $payroll;
    }

    
    
    
    
    /*     * ********************************************
     * deletePayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayroll($payroll_id) {
        
        $payroll = self::find($payroll_id);

        if (!empty($payroll)) {
            
            return $payroll->delete();
            
        } else {
            return FALSE;
        }
    }

    
    
    
    
    
    /*     * ********************************************
     * getPayrolls
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrolls($params) {
        
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $eloquent = self::orderBy('payrolls.payroll_id', 'DESC');

        if (!empty($params['user_uid'])) {
            $eloquent->join('payroll_users', 'payroll_users.payroll_id', '=', 'payrolls.payroll_id');
            $eloquent->where('payroll_users.user_uid', '=', $params['user_uid']);
            $eloquent->groupBy('payrolls.payroll_id');
        }

        if (!empty($params['fromdate']) && !empty($params['todate'])) {

            $eloquent->where('payroll_date', '>=', $params['fromdate']);
            $eloquent->where('payroll_date', '<=', $params['todate']);
        } elseif (!empty($params['fromdate'])) {

            $eloquent->where('payroll_date', '>=', $params['fromdate']);
        } elseif (!empty($params['todate'])) {

            $eloquent->where('payroll_date', '<=', $params['todate']);
        }

        $payrolls = $eloquent->paginate($results_per_page);
        
        return $payrolls;
    }

    
    
    
    
    
    /*     * ********************************************
     * confirmPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function confirmPayroll($input) {
        $payroll = self::find($input['id']);
        if (!empty($payroll)) {
            $payroll->payroll_status = $input['status'];
            return $payroll->save();
        }
        return FALSE;
    }

}
