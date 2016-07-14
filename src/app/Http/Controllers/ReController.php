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
use App\Models\RealEstates;
use App\Models\Contact;
/**
 * Validator
 */
use App\Http\Requests\ContactValidator;
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
        $obj_testimonial = new Testimonial();
        $obj_real_estates = new RealEstates();
        
        $testimonial = $obj_testimonial->listTestimonial();
        $real_estates = $obj_real_estates->listRealEstate();

        $configs = config('app.libfiles');
        
        $data = array_merge($this->data, array(
            'testimonial' => $testimonial,
            'config_testimonial' => $configs['testimonial'],
            'real_estates' => $real_estates,
            'request' => $request
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

    /*     * ********************************************
     * postContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postContact(Request $request) {

        $obj_contact = new Contact();
        $validator = new ContactValidator();

        $input = $request->all();
        $real_estate_contact_id = $request->get('id');
        $contact = NULL;
        if ($validator->validate($input)) {

            if (empty($real_estate_contact_id)) {

                $contact = $obj_contact->addContact($input);

                return view('laravel-authentication-acl::client.re.contact.contact')->withMessage(trans('front.contact.add_successfull'));

            }
        } else {

            $errors = $validator->getErrors();

            if (!empty($real_estate_contact_id)) {

                return Redirect::route("re.contact")->withInput()->withErrors($errors);
            } else {

                return Redirect::route("re.contact")->withInput()->withErrors($errors);
            }
        }
    }

}
