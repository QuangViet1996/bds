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
use App\Models\RealEstates;
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

class   RealEstatesController extends Controller {

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
       
        return view('laravel-authentication-acl::admin.houses.list')->with(['data' => $data]);
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

        $input = $request->all();
        $real_estate_id = $request->get('id');
        $houses = NULL;

        if ($validator->validate($input)) {
            if (!empty($real_estate_id)) {
                $houses = $obj_re->find($real_estate_id);
            }

            //Update existing 
            if (!empty($houses)) {

                $houses = $obj_re->updateRealEstate($input);

                return Redirect::route("houses.list")->withMessage(trans('front.houses.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_id)) {

                $houses = $obj_re->addRealEstate($input);

                return Redirect::route("houses.list")->withMessage(trans('front.houses.add_successfull'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($real_estate_id)) {
                return Redirect::route("houses.edit", ["id" => $real_estate_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("houses.edit")->withInput()->withErrors($errors);
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
      
        $data = array_merge($this->data, array(
        ));
        return View::make('laravel-authentication-acl::admin.houses.edit')->with(['data' => $data]);
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

        $real_estate_id = $request->get('id');
        
        $houses = $obj_re->findRealEstateId($real_estate_id);
         
        if (!empty($houses)) {
            $data = array_merge($this->data, array(
                'houses' => $houses,
                'request' => $request,
            ));

            return View::make('laravel-authentication-acl::admin.houses.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("houses.list")->withMessage(trans('front.houses.not_table'));
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
            
             $real_estate_id = $request->get('id');
            
            $obj_re->deleteRealEstate($request->all());
         
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('houses.list')->withErrors($e);
        }
        return Redirect::route('houses.list')->withMessage(trans('front.houses.delete_successful'));
    }

}
