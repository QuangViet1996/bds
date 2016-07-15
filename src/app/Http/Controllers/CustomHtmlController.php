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
use App\Models\CustomHtml;
use App\Models\Positions;
/**
 * Validator
 */
use App\Http\Requests\CustomHtmlValidator;
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

class CustomHtmlController extends Controller {

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

        $obj_custom = new CustomHtml();
        $list = $obj_custom->listCustomHtml();

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request,
        ));
        return view('laravel-authentication-acl::admin.custom.list')->with(['data' => $data]);
    }

    /*     * ********************************************
     * postCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postCustomHtml(Request $request) {

        $obj_custom = new CustomHtml();
        $validator = new CustomHtmlValidator();

        $input = $request->all();
        $real_estate_custom_html_id = $request->get('id');
        $custom = NULL;

        if ($validator->validate($input)) {

            if (!empty($real_estate_custom_html_id)) {
                $custom = $obj_custom->find($real_estate_custom_html_id);
            }
            //Update existing 
            if (!empty($custom)) {

                $custom = $obj_custom->updateCustomHtml($input);

                return Redirect::route("custom.list")->withMessage(trans('front.custom.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_custom_html_id)) {

                $custom = $obj_custom->addCustomHtml($input);

                return Redirect::route("custom.list")->withMessage(trans('front.custom.add_successfull'));
            }
        } else {

            $errors = $validator->getErrors();

            if (!empty($real_estate_custom_html_id)) {

                return Redirect::route("custom.edit", ["id" => $real_estate_custom_html_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("custom.edit")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * addCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addCustomHtml(Request $request) {
        $obj_position = new Positions();

        $positions = $obj_position->getPositions();

        $data = array_merge($this->data, array(
            'positions' => $positions,
        ));
        return View::make('laravel-authentication-acl::admin.custom.edit')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editCustomHtml(Request $request) {
        $obj_custom = new CustomHtml();
        $obj_position = new Positions();

        $real_estate_custom_html_id = $request->get('id');

        $custom = $obj_custom->find($real_estate_custom_html_id);

        if (!empty($custom)) {
            $positions = $obj_position->getPositions();

            $data = array_merge($this->data, array(
                'custom' => $custom,
                'positions' => $positions,
                'request' => $request,
            ));

            return View::make('laravel-authentication-acl::admin.custom.edit')->with(['data' => $data]);
        } else {

            return Redirect::route("custom.list")->withMessage(trans('front.custom.not_table'));
        }
    }

    /*     * ********************************************
     * deleteCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteCustomHtml(Request $request) {
        try {

            $obj_custom = new CustomHtml();
            $obj_custom->deleteCustomHtml($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('custom.list')->withErrors($e);
        }
        return Redirect::route('custom.list')->withMessage(trans('front.custom.delete_successful'));
    }

}
