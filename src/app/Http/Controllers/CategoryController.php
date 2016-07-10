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
use App\Http\Requests\PayrollSupportCatValidator;
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

class CategoryController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * getCategory
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getCategory(Request $request) {

        $cat = new PayrollSupportCat();
        $categories = $cat->getPayrollSupportListCat($request->all());

        $data = array_merge($this->data, array(
            'categories' => $categories,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::admin.categories.categories')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editCategory
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editCategory(Request $request) {

        $cat_id = $request->get('id');
        $obj_cat = new PayrollSupportCat();

        $cat = $obj_cat->find($cat_id);
        if (!empty($cat)) {
            $data = array_merge($this->data, array(
                'cat' => $cat,
            ));
            return View::make('laravel-authentication-acl::admin.categories.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("categories.list")->withMessage(trans('categories.category.list_not_found'));
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

    public function postCategory(Request $request) {

        $obj_cat = new PayrollSupportCat();
        $validator = new PayrollSupportCatValidator();

        $input = $request->all();
        $cat_id = $request->get('id');
        $cat = NULL;

        if ($validator->validate($input)) {
            if (!empty($cat_id)) {

                $cat = $obj_cat->findById($cat_id);
            }

            //Update existing category
            if (!empty($cat_id)) {

                $cat = $obj_cat->updatePayrollSupportCat($input);

                return Redirect::route("categories.view", ["id" => $cat_id])->withMessage(trans('categories.category.from_edit_successful'));

                //Add new category
            } elseif (empty($cat_id)) {

                $cat = $obj_cat->addPayrollSupportCat($input);

                return Redirect::route("categories.view", ["id" => $cat->payroll_support_category_id])->withMessage(trans('categories.category.from_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($cat_id)) {

                return Redirect::route("categories.edit", ["id" => $cat_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("categories.add")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * deleteCategory
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteCategory(Request $request) {

        try {

            $obj_cat = new PayrollSupportCat();
            $cat_id = $request->get('id');
            $obj_cat->deletePayrollSupportCat($cat_id);
        } catch (JacopoExceptionsInterface $e) {

            return Redirect::route('categories.list')->withErrors($e);
        }
        return Redirect::route('categories.list')->withMessage(trans('categories.category.from_delete_successfull'));
    }

    /*     * ********************************************
     * viewCategory
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewCategory(Request $request) {

        $obj_cat = new PayrollSupportCat();

        $params = array(
            'payroll_support_category_id' => $request->get('id')
        );

        $cat = $obj_cat->viewPayrollSupportCat($params);

        if (!empty($cat)) {

            $data = array_merge($this->data, array(
                'cat' => $cat,
                'request' => $request
            ));

            return View::make('laravel-authentication-acl::admin.categories.view')->with(['data' => $data]);
        } else {

            return Redirect::route("categories.list")->withMessage(trans('categories.category.list_not_found'));
        }
    }

    /*     * ********************************************
     * addCategory
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addCategory(Request $request) {

        $data = array_merge($this->data, array(
        ));

        return View::make('laravel-authentication-acl::admin.categories.edit')->with(['data' => $data]);
    }

}
