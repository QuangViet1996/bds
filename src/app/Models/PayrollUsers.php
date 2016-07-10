<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class PayrollUsers extends Model {

    protected $table = 'payroll_users';
    protected $primaryKey = 'payroll_user_id';
    public $timestamps = false;
    protected $fillable = [ "payroll_id",
        "user_id",
        "user_uid",
        "payroll_type_id",
        "payroll_type_field_id",
        "payroll_user_received"];
    protected $guarded = ["payroll_user_id"];

    
    
    
    
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
     * findFilter
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findFilter($params) {
        
        $where = array();
        
        if (!empty($params['payroll_id'])) {
            $where['payroll_id'] = $params['payroll_id'];
        }
        
        if (!empty($params['user_id'])) {
            $where['user_id'] = $params['user_id'];
        }
        
        if (!empty($params['payroll_type_id'])) {
            $where['payroll_type_id'] = $params['payroll_type_id'];
        }
        
        if (!empty($params['payroll_type_field_id'])) {
            $where['payroll_type_field_id'] = $params['payroll_type_field_id'];
        }
        
        $payroll_user = self::where($where)->first();
        
        return $payroll_user;
    }

    
    
    
    
    /*     * ********************************************
     * updatePayrollUsers
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollUsers($filedata) {

        //Delete existing payroll_user
        $this->deletePayrollUsersByPayrollId($filedata['payroll_id']);

        foreach ($filedata['data'] as $value) {

            foreach ($value['data'] as $item) {
                $input = array(
                    
                    'payroll_id' => $filedata['payroll_id'],
                    'user_id' => $item['user_id'],
                    'user_uid' => $item['uid'],
                    'payroll_type_id' => $filedata['fileinfo']['payroll_type_id'],
                    'payroll_type_field_id' => $value['payroll_type_field_id'],
                    'payroll_user_received' => $item['payroll_user_received'],
                    'payroll_date' => $filedata['fileinfo']['payroll_date'],
                    'payroll_date_trans' => $filedata['fileinfo']['payroll_date_trans'],
                    
                );

                $this->addPayrollUsers($input);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * deletePayrollUsersByPayrollId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollUsersByPayrollId($payroll_id) {
        
        $payroll_user = self::where('payroll_id', '=', $payroll_id)->delete();
        
        return $payroll_user;
    }

    
    
    
    
    /*     * ********************************************
     * addPayrollUsers
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollUsers($input) {

        $payroll_user = self::create($input);
        
        return $payroll_user;
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

    public function deletePayroll($input) {
        
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

        $payroll_types = self::orderBy('payroll_type_title', 'DESC')
                ->pluck('payroll_type_title', 'payroll_type_id');
        
        return $payroll_types;
    }

    
    
    
    
    /*     * ********************************************
     * getPayrollByUser
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollByUser($input, $user, $filters = array()) {
        
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_user = self::join('payrolls', 'payroll_users.payroll_id', '=', 'payrolls.payroll_id')
                ->join('payroll_types', 'payrolls.payroll_type_id', '=', 'payroll_types.payroll_type_id')
                ->join('payroll_type_fields', 'payroll_users.payroll_type_field_id', '=', 'payroll_type_fields.payroll_type_field_id')
                ->where('payrolls.payroll_status', 1)
                ->where('payroll_users.user_id', $user['id'])
                ->where('payroll_type_fields.payroll_type_field_isvisible', 1)
                ->orderBy('payroll_user_id', 'DESC')
                ->select('payroll_users.*', 'payrolls.payroll_title', 'payrolls.payroll_description', 'payrolls.payroll_date', 'payrolls.payroll_date_trans','payroll_types.payroll_type_title', 'payroll_type_fields.payroll_type_field_title')
        ;

        if (!empty($filters['fromdate']) && !empty($filters['todate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '>=', $filters['fromdate']);
            $payroll_user->where('payrolls.payroll_date', '<=', $filters['todate']);
            
        } elseif (!empty($filters['fromdate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '>=', $filters['fromdate']);
            
        } elseif (!empty($filters['todate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '<=', $filters['todate']);
            
        }

        return $payroll_user->paginate($results_per_page);
    }

    
    /*     * ********************************************
     * getPayrollByUser
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollByUserTrans($input, $user, $filters = array()) {
        
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_user = self::join('payrolls', 'payroll_users.payroll_id', '=', 'payrolls.payroll_id')
                ->join('payroll_types', 'payrolls.payroll_type_id', '=', 'payroll_types.payroll_type_id')
                ->join('payroll_type_fields', 'payroll_users.payroll_type_field_id', '=', 'payroll_type_fields.payroll_type_field_id')
                ->where('payrolls.payroll_status', 1)
                ->where('payroll_users.user_id', $user['id'])
                ->where('payroll_type_fields.payroll_type_field_isvisible', 1)
                ->orderBy('payroll_user_id', 'DESC')
                ->select('payroll_users.*', 'payrolls.payroll_title', 'payrolls.payroll_description', 'payrolls.payroll_date','payrolls.payroll_date_trans', 'payroll_types.payroll_type_title', 'payroll_type_fields.payroll_type_field_title')
        ;

        if (!empty($filters['fromdate']) && !empty($filters['todate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '>=', $filters['fromdate']);
            $payroll_user->where('payrolls.payroll_date', '<=', $filters['todate']);
            
        } elseif (!empty($filters['fromdate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '>=', $filters['fromdate']);
            
        } elseif (!empty($filters['todate'])) {
            
            $payroll_user->where('payrolls.payroll_date', '<=', $filters['todate']);
            
        }

        return $payroll_user->paginate($results_per_page);
    }
    
    
    
    
    /*     * ********************************************
     * filterPayrollUser
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function filterPayrollUser($params = array()) {

        $arr_vat = $this->_getReportVAT($params);
        $arr_insu = $this->_getReportINSU($params);

        $payroll_user = $this->arr_merge_vat_insu($arr_vat, $arr_insu);

        return $payroll_user;
    }

    
    
    
    
    /*     * ********************************************
     * _getReportVAT
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function _getReportVAT($params) {
        $arr_vat = array();

        $eloquent = self::join('user_profile', 'payroll_users.user_id', '=', 'user_profile.user_id')
                ->join('payrolls', 'payrolls.payroll_id', '=', 'payroll_users.payroll_id')
                ->join('payroll_type_fields', 'payroll_type_fields.payroll_type_field_id', '=', 'payroll_users.payroll_type_field_id')
                ->groupBy('payroll_users.user_id')
                ->orderBy('payroll_users.user_id', 'ASC');

        if (!empty($params['fromdate'])) {
            $eloquent->where('payroll_date', '>=', $params['fromdate']);
        }
        
        if (!empty($params['todate'])) {
            $eloquent->where('payroll_date', '<=', $params['todate']);
        }
        
        if (!empty($params['user_uid'])) {
            $eloquent->where('payroll_users.user_uid', '=', $params['user_uid']);
        }

        if (!empty($params['export_vat'])) {

            $eloquent->where('payrolls.payroll_status', '=', 1);
            $eloquent->where('payroll_type_fields.payroll_type_field_isvat', '=', 1);
            $eloquent->select('payroll_users.*', DB::raw('sum(payroll_user_received) AS total_vat'), 'user_profile.first_name', 'user_profile.last_name');
            $arr_vat = $eloquent->get();
        }

        return $arr_vat;
    }

    
    
    
    
    /*     * ********************************************
     * _getReportINSU
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function _getReportINSU($params) {
        $arr_insu = array();

        $eloquent = self::join('user_profile', 'payroll_users.user_id', '=', 'user_profile.user_id')
                ->join('payrolls', 'payrolls.payroll_id', '=', 'payroll_users.payroll_id')
                ->join('payroll_type_fields', 'payroll_type_fields.payroll_type_field_id', '=', 'payroll_users.payroll_type_field_id')
                ->groupBy('payroll_users.user_id')
                ->orderBy('payroll_users.user_id', 'ASC');

        if (!empty($params['fromdate'])) {
            $eloquent->where('payroll_date', '>=', $params['fromdate']);
        }
        
        if (!empty($params['todate'])) {
            $eloquent->where('payroll_date', '<=', $params['todate']);
        }
        
        if (!empty($params['export_insu'])) {

            $eloquent->where('payrolls.payroll_status', '=', 1);
            $eloquent->where('payroll_type_fields.payroll_type_field_isinsurrance', '=', 1);
            $eloquent->select('payroll_users.*', DB::raw('sum(payroll_user_received) AS total_insu'), 'user_profile.first_name', 'user_profile.last_name');
            $arr_insu = $eloquent->get();
        }

        return $arr_insu;
    }

    
    
    
    
    
    /*     * ********************************************
     * arr_merge_vat_insu
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function arr_merge_vat_insu($arr_vat, $arr_insu) {
        
        if (empty($arr_vat))
            return $arr_insu;
        if (empty($arr_insu))
            return $arr_vat;

        $arr_vat = $arr_vat->toArray();
        $arr_insu = $arr_insu->toArray();
        
        foreach ($arr_vat as $key => $item) {
            foreach ($arr_insu as $_key => $jitem) {
                
                if ($item['user_id'] == $jitem['user_id']) {
                    
                    $arr_vat[$key]['total_insu'] = $jitem['total_insu'];
                    break;
                }
            }
        }

        return $arr_vat;
    }

    
    
    
    
    
    /*     * ********************************************
     * viewPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayroll($params = array()) {

        $payroll_user = self::join('payroll_type_fields', 'payroll_type_fields.payroll_type_field_id', '=', 'payroll_users.payroll_type_field_id')
                ->join('user_profile', 'user_profile.user_id', '=', 'payroll_users.user_id')
                ->where('payroll_id', $params['payroll_id'])
                ->select('payroll_users.user_uid', 'user_profile.first_name', 'user_profile.last_name', 'payroll_type_fields.payroll_type_field_title', 'payroll_type_fields.payroll_type_field_id', 'payroll_users.payroll_user_received'
                )
                ->get();

        return $payroll_user;
    }

}
