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
use App\Models\Positions;
/**
 * Validator
 */
use App\Http\Requests\PositionsValidator;
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

class PositionController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * getPosition
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPositions(Request $request) {

        $obj_position = new Positions();
        $positons = $obj_position->getList($request->all());

        $data = array_merge($this->data, array(
            'positions' => $positons,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::admin.positions.positions')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editPosition
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editPositions(Request $request) {

        $position_id = $request->get('id');
        $obj_position = new Positions();

        $position = $obj_position->find($position_id);
        if (!empty($position)) {
            $data = array_merge($this->data, array(
                'position' => $position,
            ));
            return View::make('laravel-authentication-acl::admin.positions.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("positions.list")->withMessage(trans('positions.list_not_found'));
        }
    }

    /*     * ********************************************
     * postPosition
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postPositions(Request $request) {

        $obj_position = new Positions();
        $validator = new PositionsValidator();

        $input = $request->all();
        $position_id = $request->get('id');
        $position = NULL;

        if ($validator->validate($input)) {
            if (!empty($position_id)) {

                $position = $obj_position->findById($position_id);
            }

            //Update existing category
            if (!empty($position_id)) {

                $position = $obj_position->updatePositions($input);

                return Redirect::route("positions.list")->withMessage(trans('positions.edit_successful'));

                //Add new category
            } elseif (empty($position_id)) {

                $position = $obj_position->addPositions($input);

                return Redirect::route("positions.list")->withMessage(trans('positions.add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($position_id)) {

                return Redirect::route("positions.edit", ["id" => $position_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("positions.add")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * deletePosition
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePositions(Request $request) {

        try {

            $obj_position = new Positions();
            $position_id = $request->get('id');
            $obj_position->deletePositions($position_id);
        } catch (JacopoExceptionsInterface $e) {

            return Redirect::route('positions.list')->withErrors($e);
        }
        return Redirect::route('positions.list')->withMessage(trans('positions.delete_successfull'));
    }


    /*     * ********************************************
     * addPosition
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPositions(Request $request) {

        $data = array_merge($this->data, array(
        ));

        return View::make('laravel-authentication-acl::admin.positions.edit')->with(['data' => $data]);
    }

}
