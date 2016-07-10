<?php

namespace App\Http\Controllers;

/**
 * Lib Core
 */
use Illuminate\Http\Request;
use Input,
    View,
    Redirect,
    App,
    Config,
    URL,
    Session;
use \LaravelAcl\Authentication\Controllers\Controller;
/**
 * Models
 */
use App\Models\PayrollSupport;
use App\Models\PayrollSupportCat;
/**
 * Validator
 */
use App\Http\Requests\PayrollSupportValidator;
/**
 * Lib of vendor
 */
use \LaravelAcl\Library\Exceptions\ValidationException;
use \LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use App\Http\Requests\HrmPayrollFormRequest;
use Excel;
use Maatwebsite\Excel\Writers\CellWriter;
use App\Http\Requests\ApplyFormRequest;
use Validator;
use Response;
use Illuminate\Support\MessageBag as MessageBag;

class BdsController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * getSupports
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function index(Request $request) {

        var_dump(2312312312);
        die();
    }

    /*     * ********************************************
     * editSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editSupport(Request $request) {

        $payroll_support_id = $request->get('id');
        $obj_payroll_support = new PayrollSupport();
        $obj_cat = new PayrollSupportCat();

        $payroll_support = $obj_payroll_support->find($payroll_support_id);

        if (!empty($payroll_support)) {

            $cat = $obj_cat->getPayrollCat();

            $data = array_merge($this->data, array(
                'payroll_support' => $payroll_support,
                'cat' => $cat
            ));

            return View::make('laravel-authentication-acl::admin.support.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("support.list")->withMessage(trans('supports.support.view_support_not_found'));
        }
    }

    /*     * ********************************************
     * postSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postSupport(Request $request) {

        $obj_payroll_support = new PayrollSupport();
        $validator = new PayrollSupportValidator();

        $input = $request->all();
        $payroll_support_id = $request->get('id');
        $payroll_support = NULL;
        /**
         * Check:
         * title: required
         * description: required
         * datatype: has configs
         * filedata: required, excel typye
         */
        if ($validator->validate($input)) {
            
            if (!empty($payroll_support_id)) {
                $payroll_support = $obj_payroll_support->findById($payroll_support_id);
            }
            //Update existing payroll
            if (!empty($payroll_support)) {

                $payroll_support = $obj_payroll_support->updatePayrollSupport($input);

                return Redirect::route("support.view_support", ["id" => $payroll_support_id])->withMessage(trans('supports.support.from_edit_successful'));

                //Add new payroll
            } elseif (empty($payroll_support_id)) {

                $payroll_support = $obj_payroll_support->addPayrollSupport($input);

                return Redirect::route("support.view_support", ["id" => $payroll_support->payroll_support_id])->withMessage(trans('supports.support.from_add_successful'));
            }
        } else {

            $errors = $validator->getErrors();
            if (!empty($payroll_support_id)) {

                return Redirect::route("support.edit_support", ["id" => $payroll_support_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("support.add_support")->withInput()->withErrors($errors);
            }
            
        }
    }

    /*     * ********************************************
     * deleteSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteSupport(Request $request) {

        try {

            $obj_payroll_support = new PayrollSupport();
            $payroll_support_id = $request->get('id');
            $obj_payroll_support->deletePayrollSupport($payroll_support_id);
        } catch (JacopoExceptionsInterface $e) {

            return Redirect::route('support.list')->withErrors($e);
        }
        return Redirect::route('support.list')->withMessage(trans('supports.support.from_delete_successfull'));
    }

    /*     * ********************************************
     * viewSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewSupport(Request $request) {

        $obj_payroll_support = new PayrollSupport();
        $obj_cat = new PayrollSupportCat();

        $params = array(
            'payroll_support_id' => $request->get('id'),
        );

        $payroll_support = $obj_payroll_support->viewPayrollSupport($params);

        if (!empty($payroll_support)) {

            $cat = $obj_cat->findById($payroll_support->payroll_support_category_id);

            $data = array_merge($this->data, array(
                'payroll_support' => $payroll_support,
                'cat' => $cat,
                'request' => $request
            ));
            return View::make('laravel-authentication-acl::admin.support.view')->with(['data' => $data]);
        } else {

            return Redirect::route("support.list")->withMessage(trans('supports.support.view_support_not_found'));
        }
    }

    /*     * ********************************************
     * viewSupport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addSupport(Request $request) {

        $obj_cat = new PayrollSupportCat();

        $cat = $obj_cat->getPayrollCat();

        $data = array_merge($this->data, array(
            'cat' => $cat
        ));

        return View::make('laravel-authentication-acl::admin.support.edit')->with(['data' => $data]);
    }

}
