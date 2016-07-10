<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class PayrollReportFields extends Model {

    protected $table = 'payroll_report_fields';
    protected $primaryKey = 'payroll_report_field_id';
    public $timestamps = false;
    protected $fillable = [
        "payroll_report_field_val",
        "payroll_type_field_name",
        "payroll_report_id",
    ];
    protected $guarded = ["payroll_report_field_id"];

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
     * updatePayrollReportField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollReportField($input) {
        $payroll_report_field = self::find($input['id']);

        if (!empty($payroll_report_field)) {

            $payroll_report_field->payroll_report_field_val = $input['report_field_val'];
            $payroll_report_field->payroll_report_id = $input['payroll_report_id'];
            $payroll_report_field->payroll_type_field_name = $input['payroll_type_field_name'];
            $payroll_report_field->save();

            return $payroll_report_field;
        } else {
            
        }
    }

    /*     * ********************************************
     * addPayrollReportField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollReportField($input) {
        $payroll_report_field = self::create([
                    'payroll_report_field_val' => $input['report_field_val'],
                    'payroll_report_id' => $input['payroll_report_id'],
                    'payroll_type_field_name' => $input['payroll_type_field_name'],
        ]);
        return $payroll_report_field;
    }

    /*     * ********************************************
     * deletePayrollReportField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollReportField($input) {
        $payroll_report_field = self::find(@$input['id']);
        if (!empty($payroll_report_field)) {
            $payroll_report_id = $payroll_report_field->payroll_report_id;
            $payroll_report_field->delete();
            return $payroll_report_id;
        } else {
            return null;
        }
    }

    /*     * ********************************************
     * getPayrollTypeFields
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollTypeFields($params = array()) {

        $payroll_types = self::orderBy('payroll_type_title', 'DESC')
                ->pluck('payroll_type_field_title', 'payroll_type_field_id');
        return $payroll_types;
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
     * getPayrollReportFields
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollReportFields($params = array()) {
        $payroll_report_fields = self::where('payroll_report_id', '=', $params['payroll_report_id'])
                ->select('payroll_report_fields.*')
                ->get();
        return $payroll_report_fields;
    }

    /*     * ********************************************
     * getByReportId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getByReportId($report_id) {
        $payroll_report_fields = self::where('payroll_report_id', '=', $report_id)
                ->get();
        return $payroll_report_fields;
    }

    /*     * ********************************************
     * getByTypeVal
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getByTypeVal($report_id) {
        $payroll_report_fields = $this->getByReportId($report_id);
        $arr = array();
        foreach ($payroll_report_fields as $item) {
            $arr[$item['payroll_type_field_name']] = $item['payroll_report_field_val'];
        }

        return $arr;
    }

}
