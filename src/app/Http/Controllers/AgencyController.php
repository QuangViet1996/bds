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
use App\Models\Agencys;
use App\Models\Testimonial;
use App\Models\Categories;
use App\Models\Agency;
/**
 * Validator
 */
use App\Http\Requests\AgencyValidator;
use App\Http\Requests\AgencysValidator;
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

class AgencyController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * getList
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getList(Request $request) {


        $obj_re = new Agency();
        $authentication = App::make('authenticator');

        $current_user = $authentication->getLoggedUser()->toArray();
        $userId = $current_user['id'];
        $list = $obj_re->listAgency($userId);
        

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request,
        ));

        return view('laravel-authentication-acl::admin.agency.list')->with(['data' => $data]);
    }

    /*     * ********************************************
     * postAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postAgency(Request $request) {
        $obj_re = new Agency();
        $validator = new AgencysValidator();
        $libFiles = new LibFiles();

        $input = $request->all();
        $real_estate_id = $request->get('id');
        $realestate = NULL;
        $authentication = App::make('authenticator');

        $current_user = $authentication->getLoggedUser()->toArray();
        $userId = $current_user['id'];
        if ($validator->validate($input)) {

            /**
             * Upload file image
             * @Check: extension, size
             */
            $fileinfo = array();
            if (!empty($input['image'])) {
                $configs = config('app.libfiles');
                $file = $request->file('image');
                $fileinfo = $libFiles->upload($configs['realestate'], $file);
            }
            //TODO: check
            $input = array_merge($input, $fileinfo);


            if (!empty($real_estate_id)) {
                $realestate = $obj_re->find($real_estate_id);
            }

            //Update existing 
            if (!empty($realestate)) {

                $realestate = $obj_re->updateAgency($input);

                return Redirect::route("agency.list")->withMessage(trans('re.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_id)) {
                $realestate = $obj_re->addAgency($input, $userId);

                return Redirect::route("agency.list")->withMessage(trans('re.add_successfull'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($real_estate_id)) {
                return Redirect::route("agency.edit", ["id" => $real_estate_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("agency.edit")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * addAgencyl
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addAgency(Request $request) {
        $obj_cat = new Categories();
        $cat = $obj_cat->getCategories();


        $data = array_merge($this->data, array(
            'cat' => $cat,
        ));
        return View::make('laravel-authentication-acl::admin.agency.edit')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editAgency(Request $request) {
        $obj_re = new Agency();
        $obj_cat = new Categories();
        $real_estate_id = $request->get('id');

        $realestate = $obj_re->findAgencyId($real_estate_id);

        if (!empty($realestate)) {
            $categories = $obj_cat->getCategories();

            $libFiles = new LibFiles();
            $configs = config('app.libfiles');

            $data = array_merge($this->data, array(
                'realestate' => $realestate,
                'configs' => $configs['realestate'],
                'cat' => $categories,
                'request' => $request,
            ));

            return View::make('laravel-authentication-acl::admin.agency.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("agency.list")->withMessage(trans('re.not_found'));
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

    public function deleteAgency(Request $request) {
        try {
            $obj_re = new Agency();
            $obj = new Testimonial();
            $authentication = App::make('authenticator');

            $current_user = $authentication->getLoggedUser()->toArray();
            $userId = $current_user['id'];

            $real_estate_id = $request->get('id');
            $obj_re->deleteAgency($request->all(),$userId);
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('agency.list')->withErrors($e);
        }
        return Redirect::route('agency.list')->withMessage(trans('re.delete_successful'));
    }

}
