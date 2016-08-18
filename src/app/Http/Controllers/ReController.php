<?php namespace App\Http\Controllers;

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
use App\Models\Testimonials;
use App\Models\RealEstates;
use App\Models\Categories;
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
use App\Http\Requests\ApplyFormRequest;
use Validator;
use Response;
use Illuminate\Support\MessageBag as MessageBag;


/**
 * FRONT PAGE USER
 */
class ReController extends Controller {

    public $data = array(
    );

    /***************************************************************************
     * index
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 04/08/2016
     *
     * @status: REVIEWED
     */

    public function index(Request $request) {
        $obj_testimonials = new Testimonials();
        $obj_real_estates = new RealEstates();
        $obj_categories = new Categories();

        $testimonials = $obj_testimonials->listTestimonial();
        $real_estates = $obj_real_estates->listRealEstate();
        $hightlight_re = $obj_real_estates->getHighlightRe();

        $categories = $obj_categories->getTop();

        $more_re = $obj_real_estates->getMoreByCategories($categories);

        $configs = config('app.libfiles');

        $data = array_merge($this->data, array(
            'testimonial' => $testimonials,
            'config_testimonial' => $configs['testimonial'],
            'real_estates' => $real_estates,
            'request' => $request,
            'hightlight_re' => $hightlight_re,
            'more_re' => $more_re
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
        $obj_re = new RealEstates();

        $params = array(
            'real_estate_id' => $request->get('id')
        );

        $re = $obj_re->viewRe($params);
        if (!empty($re)) {

            $data = array_merge($this->data, array(
                're' => $re,
                'request' => $request
            ));
            return view('laravel-authentication-acl::client.re.detail.view')->with(['data' => $data]);
        } else {

            return Redirect::route("re.list")->withMessage(trans('categories.category.list_not_found'));
        }
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

    public function reCategories(Request $request) {

        $obj_categories = new Categories();

        $categories = $obj_categories->getList(array());
        $data = array_merge($this->data, array(
            'categories' => $categories,
            'request' => $request
        ));
        return view('laravel-authentication-acl::client.re.category.cat_list')->with(['data' => $data]);
    }

    public function reCategory(Request $request) {

        $obj_categories = new Categories();
        $obj_real_estates = new RealEstates();

        $category_id = $request->get('id');

        $category = $obj_categories->find($category_id);

        if ($category) {
            $real_estates  = $obj_real_estates->getByCategory($category);
            $data = array_merge($this->data, array(
                'category' => $category,
                'request' => $request,
                'real_estates' => $real_estates
            ));
            return view('laravel-authentication-acl::client.re.category.list-by-category')->with(['data' => $data]);
        }
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
     * reAdd
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function regAdd(Request $request) {
        return view('laravel-authentication-acl::client.re.reg.add');
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
