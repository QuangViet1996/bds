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

class ReController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * index
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function index(Request $request) {
        
        $data = array_merge($this->data, array(
            'test' => 'test'
        ));
        
        return view('laravel-authentication-acl::client.re.index.index')->with(['data' => $data]);
    }

    /*     * ********************************************
     * reList
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reList(Request $request) {
        return view('laravel-authentication-acl::client.re.list.list_houses');
    }

    /*     * ********************************************
     * reSearch
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reSearch(Request $request) {

        var_dump(2312312);
        die();
    }

    /*     * ********************************************
     * reView
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reView(Request $request) {
        return view('laravel-authentication-acl::client.re.detail.view');
    }

    /*     * ********************************************
     * reCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reCategory(Request $request) {
        return view('laravel-authentication-acl::client.re.category.cat_list');
    }

    /*     * ********************************************
     * reContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reContact(Request $request) {
        return view('laravel-authentication-acl::client.re.contact.contact');
    }

}
