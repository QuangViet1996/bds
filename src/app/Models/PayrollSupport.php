<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class PayrollSupport extends Model {

    protected $table = 'payroll_supports';
    protected $primaryKey = 'payroll_support_id';
    public $timestamps = true;
    protected $fillable = [ "payroll_support_title",
        "payroll_support_overview",
        "payroll_support_description",
        "payroll_support_category_id",
        "payroll_support_created_date"
    ];
    protected $guarded = ["payroll_support_id"];

    
    
    
    
    
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
        $payroll_support = self::find($id);
        return $payroll_support;
    }

    
    
    
    
    
    /*     * ********************************************
     * updatePayrollSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollSupport($input) {
        $support = self::find($input['id']);

        if (!empty($support)) {
            $support->payroll_support_title = $input['title'];
            $support->payroll_support_overview = $input['overview'];
            $support->payroll_support_description = $input['description'];
            $support->payroll_support_category_id = $input['datacat'];

            $support->save();
        } else {
            return NULL;
        }
    }

    
    
    
    
    
    /*     * ********************************************
     * addPayrollSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollSupport($input) {
        $payroll_support = self::create([
                    'payroll_support_title' => $input['title'],
                    'payroll_support_overview' => $input['overview'],
                    'payroll_support_description' => $input['description'],
                    'payroll_support_category_id' => $input['datacat'],
                    'payroll_support_created_date' => time(),
        ]);
        return $payroll_support;
    }

    
    
    
    
    
    /*     * ********************************************
     * deletePayrollSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayrollSupport($payroll_support_id) {
        $payroll_support = self::find($payroll_support_id);

        if (!empty($payroll_support)) {
            return $payroll_support->delete();
        } else {
            return FALSE;
        }
    }

    
    
    
    
    
    /*     * ********************************************
     * getPayrollSupportList
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrollSupportList($params) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $eloquent = self::orderBy('payroll_support_title', 'ASC');

        if (!empty($params['keyword'])) {
            $eloquent->where('payroll_support_title', 'LIKE', '%' . trim($params['keyword'] . '%'));
            $eloquent->orwhere('payroll_support_description', 'LIKE', '%' . $params['keyword'] . '%');
        }

        if (!empty($params['payroll_support_category_id'])) {
            $eloquent->where('payroll_support_category_id', '=', $params['payroll_support_category_id']);
        }

        $payroll_support = $eloquent->paginate($results_per_page);
        return $payroll_support;
    }

    
    
    
    
    
    /*     * ********************************************
     * viewPayrollSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayrollSupport($params = array()) {

        $payroll_support = self::where('payroll_support_id', $params['payroll_support_id'])
                ->first();

        return $payroll_support;
    }

}
