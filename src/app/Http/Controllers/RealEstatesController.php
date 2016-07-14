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
use App\Models\RealEstates;
use App\Models\Testimonial;
use App\Models\Categories;
/**
 * Validator
 */
use App\Http\Requests\RealEstatesValidator;
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

class RealEstatesController extends Controller {

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

        $obj_re = new RealEstates();
        $list = $obj_re->listRealEstate();

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request,
        ));

        return view('laravel-authentication-acl::admin.realestates.list')->with(['data' => $data]);
    }

    /*     * ********************************************
     * postHouses
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postHouses(Request $request) {
        $obj_re = new RealEstates();
        $validator = new RealEstatesValidator();
        $libFiles = new LibFiles();

        $input = $request->all();
        $real_estate_id = $request->get('id');
        $realestate = NULL;

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

                $realestate = $obj_re->updateRealEstate($input);

                return Redirect::route("realestates.list")->withMessage(trans('front.houses.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_id)) {

                $realestate = $obj_re->addRealEstate($input);

                return Redirect::route("realestates.list")->withMessage(trans('front.houses.add_successfull'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($real_estate_id)) {
                return Redirect::route("realestates.edit", ["id" => $real_estate_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("realestates.edit")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * addHousesl
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addHouses(Request $request) {
        $obj_cat = new Categories();
        $cat = $obj_cat->getCategories();


        $data = array_merge($this->data, array(
            'cat' => $cat,
        ));
        return View::make('laravel-authentication-acl::admin.realestates.edit')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editHouses
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editHouses(Request $request) {
        $obj_re = new RealEstates();
        $obj_cat = new Categories();
        $real_estate_id = $request->get('id');

        $realestate = $obj_re->findRealEstateId($real_estate_id);

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

            return View::make('laravel-authentication-acl::admin.realestates.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("realestates.list")->withMessage(trans('front.houses.not_table'));
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

    public function deleteHouses(Request $request) {
        try {
            $obj_re = new RealEstates();
            $obj = new Testimonial();

            $real_estate_id = $request->get('id');
            $obj_re->deleteRealEstate($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('realestates.list')->withErrors($e);
        }
        return Redirect::route('realestates.list')->withMessage(trans('front.houses.delete_successful'));
    }

}
