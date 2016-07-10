<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class PayrollReports extends Model {

    protected $table = 'payroll_reports';
    protected $primaryKey = 'payroll_report_id';
    public $timestamps = false;
    protected $fillable = [ "payroll_report_title",
        "payroll_report_description",
        "payroll_report_template_file",
        "payroll_report_fromrow",
        "payroll_report_user_col",
    ];
    protected $guarded = ["payroll_report_id"];

    
    
    
    
    /*     * ********************************************
     * putPayrollReportsInSelect
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function putPayrollReportsInSelect($params = array()) {

        $payroll_reports = self::orderBy('payroll_report_title', 'ASC')
                ->pluck('payroll_report_title', 'payroll_report_id');
        return $payroll_reports;
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

    
    
    
    
    
    /*     * ********************************************
     * listPayrollReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listPayrollReport($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_report = self::orderBy('payroll_report_id', 'DESC')
                ->paginate($results_per_page);
        return $payroll_report;
    }

    
    
    
    
    
    /*     * ********************************************
     * findReportId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findReportId($id) {
        $payroll_report = self::where('payroll_report_id', $id)
                ->first();

        return $payroll_report;
    }

    
    
    
    
    
    /*     * ********************************************
     * updatePayrollReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollReport($input) {
        $payroll_report = self::find($input['id']);
        if (!empty($payroll_report)) {
            $payroll_report->payroll_report_title = $input['title'];
            $payroll_report->payroll_report_description = $input['description'];
            $payroll_report->payroll_report_template_file = $input['payroll_report_template_file'];
            $payroll_report->payroll_report_fromrow = (int) $input['fromrow'];
            $payroll_report->payroll_report_user_col = $input['usercol'];
            $payroll_report->save();
        } else {
            
        }
    }
    
    
    
    
    
    /*     * ********************************************
     * addPayrollReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollReport($input) {

        $report = self::create([
                    'payroll_report_title' => $input['title'],
                    'payroll_report_description' => $input['description'],
                    'payroll_report_template_file' => $input['payroll_report_template_file'],
                    'payroll_report_fromrow' => (int) $input['fromrow'],
                    'payroll_report_user_col' => $input['usercol'],
        ]);
        return $report;
    }

    
    
    
    
    
    /*     * ********************************************
     * deletePayrollReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollReport($input) {
        $report = self::find($input['id']);
        return $report->delete();
    }

    
    
    
    
    
    /*     * ********************************************
     * viewPayrollReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayrollReport($params = array()) {

        $payroll_report = self::where('payroll_report_id', $params['payroll_report_id'])
                ->first();

        return $payroll_report;
    }

}
