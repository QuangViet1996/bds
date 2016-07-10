<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class PayrollSupportCat extends Model {

    protected $table = 'payroll_support_categories';
    protected $primaryKey = 'payroll_support_category_id';
    public $timestamps = false;
    protected $fillable = [ "payroll_support_category_title",
        "payroll_support_category_description",
    ];
    protected $guarded = ["payroll_support_category_id"];

    
    
    
    
    
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
        $payroll_support_cat = self::find($id);
        return $payroll_support_cat;
    }

    
    
    
    
    /*     * ********************************************
     * updatePayrollSupportCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePayrollSupportCat($input) {

        $payroll_support_cat = self::find($input['id']);

        if (!empty($payroll_support_cat)) {

            $payroll_support_cat->payroll_support_category_title = $input['title'];
            $payroll_support_cat->payroll_support_category_description = $input['description'];

            $payroll_support_cat->save();
        } else {
            return null;
        }
    }

    
    
    
    
    
    /*     * ********************************************
     * addPayrollSupportCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayrollSupportCat($input) {
        
        $payroll_support_cat = self::create([
                    'payroll_support_category_title' => $input['title'],
                    'payroll_support_category_description' => $input['description'],
        ]);
        return $payroll_support_cat;
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

    public function deletePayrollSupportCat($payroll_support_cat_id) {
        $payroll_support_cat = self::find($payroll_support_cat_id);

        if (!empty($payroll_support_cat)) {
            return $payroll_support_cat->delete();
        } else {
            return FALSE;
        }
    }

    
    
    
    
      /*     * ********************************************
     * getPayrollSupportListCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */
    
    public function getPayrollSupportListCat($params) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.payrolls_per_page');

        $payroll_support_cat = self::orderBy('payroll_support_category_title', 'ASC')
                ->paginate($results_per_page);

        return $payroll_support_cat;
    }

    
    
    
    
      /*     * ********************************************
     * viewPayrollSupportCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */
    
    public function viewPayrollSupportCat($params = array()) {

        $payroll_support_cat = self::where('payroll_support_category_id', $params['payroll_support_category_id'])
                ->first();

        return $payroll_support_cat;
    }

    
    
    
    
     /*     * ********************************************
     * getPayrollCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */
    
    public function getPayrollCat($params = array()) {

        $payroll_support_cat = self::orderBy('payroll_support_category_title', 'ASC')
                ->pluck('payroll_support_category_title', 'payroll_support_category_id');
        return $payroll_support_cat;
    }

}
