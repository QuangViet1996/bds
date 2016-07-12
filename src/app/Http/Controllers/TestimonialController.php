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
use App\Models\Testimonial;
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

class TestimonialController extends Controller {

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

    public function getList(Request $request) {
        $obj_testimonial = new Testimonial();
        $list = $obj_testimonial->listTestimonial($request->all());
        
        $data = array_merge($this->data, array(
            'list' => $list,
        ));
        return view('laravel-authentication-acl::admin.testimonial.list')->with(['data' => $data]);
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

    public function postTestimonial(Request $request) {
        
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

    public function editTestimonial(Request $request) {

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

    public function deleteTestimonial(Request $request) {
        
    }

}
