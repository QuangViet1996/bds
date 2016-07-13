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
use App\Models\Testimonial;
/**
 * Validator
 */
use App\Http\Requests\TestimonialValidator;
/**
 * Lib of vendor
 */
use \LaravelAcl\Library\Exceptions\ValidationException;
use \LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use App\Http\Requests\ApplyFormRequest;
use Validator;
use Response;
use Illuminate\Support\MessageBag as MessageBag;

use App\Libraries\LibFiles as LibFiles;

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
        $list = $obj_testimonial->listTestimonial();

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request,
        ));
        return view('laravel-authentication-acl::admin.testimonial.list')->with(['data' => $data]);
    }

    /*     * ********************************************
     * postTestimonial
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postTestimonial(Request $request) {
        
        $libFiles = new LibFiles();
        
        $obj_testimonial = new Testimonial();
        $validator = new TestimonialValidator();

        $input = $request->all();
        $real_estate_testimonial_id = $request->get('id');
        $testimonial = NULL;
        if ($validator->validate($input)) {
            $fileinfo = array();
            if (!empty($input['image'])) {
                $configs = config('app.libfiles');
                $file = $request->file('image');
                $fileinfo = $libFiles->upload($configs['testimonial'], $file);
                
            }
            
            var_dump($fileinfo);
            die();
            if (!empty($real_estate_testimonial_id)) {
                $testimonial = $obj_testimonial->find($real_estate_testimonial_id);
            }

            //Update existing 
            if (!empty($testimonial)) {

                $testimonial = $obj_testimonial->updateTestimonial($input);

                return Redirect::route("testimonials.list")->withMessage(trans('front.testimonial.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_testimonial_id)) {

                $testimonial = $obj_testimonial->addTestimonial($input);

                return Redirect::route("testimonials.list")->withMessage(trans('front.testimonial.add_successfull'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_report_id)) {
                return Redirect::route("testimonials.edit", ["id" => $real_estate_testimonial_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("testimonials.edit")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * addTestimonial
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addTestimonial(Request $request) {
        $data = array_merge($this->data, array(
        ));
        return View::make('laravel-authentication-acl::admin.testimonial.edit')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editTestimonial
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editTestimonial(Request $request) {
        $obj_testimonial = new Testimonial();

        $real_estate_testimonial_id = $request->get('id');
        
        $testimanial = $obj_testimonial->find($real_estate_testimonial_id);
        if (!empty($testimanial)) {
            $data = array_merge($this->data, array(
                'testimanial' => $testimanial,
                'request' => $request,
            ));

            return View::make('laravel-authentication-acl::admin.testimonial.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("testimonials.list")->withMessage(trans('front.testimonial.not_table'));
        }
    }

    /*     * ********************************************
     * deleteTestimonial
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteTestimonial(Request $request) {
        try {
            $obj_testimonial = new Testimonial();
            $obj_testimonial->deleteTestimonial($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('testimonials.list')->withErrors($e);
        }
        return Redirect::route('testimonials.list')->withMessage(trans('front.testimonial.delete_successful'));
    }

}
