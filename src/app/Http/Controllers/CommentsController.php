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
use App\Models\Comments;
/**
 * Validator
 */
use App\Http\Requests\CommentsValidator;
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

class CommentsController extends Controller {

    public $data = array(
    );

    /*     * ********************************************
     * getComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getComments(Request $request) {

        $obj_cmt = new Comments();
        $comments = $obj_cmt->getList($request->all());

        $data = array_merge($this->data, array(
            'comments' => $comments,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::admin.comments.comments')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editComments(Request $request) {

        $cmt_id = $request->get('id');
        $obj_cmt = new Comments();

        $cmt = $obj_cmt->find($cmt_id);
        if (!empty($cmt)) {
            $data = array_merge($this->data, array(
                'cmt' => $cmt,
            ));
            return View::make('laravel-authentication-acl::admin.comments.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("comments.list")->withMessage(trans('front.comments.list_not_found'));
        }
    }

    /*     * ********************************************
     * postComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postComments(Request $request) {

        $obj_cmt = new Comments();
        $validator = new CommentsValidator();

        $input = $request->all();
        $cmt_id = $request->get('id');
        $cmt = NULL;

        if ($validator->validate($input)) {
            if (!empty($cmt_id)) {

                $cmt = $obj_cmt->findById($cmt_id);
            }

            //Update existing category
            if (!empty($cmt)) {

            $cmt = $obj_cmt->updateComments($input);

                return Redirect::route("comments.list")->withMessage(trans('front.comments.edit_successful'));

                //Add new category
            } elseif (empty($cmt_id)) {

                $cmt = $obj_cmt->addComments($input);

                return Redirect::route("comments.list")->withMessage(trans('front.comments.add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($cmt_id)) {

                return Redirect::route("comments.edit", ["id" => $cmt_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("comments.add")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * deleteComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteComments(Request $request) {

        try {

            $obj_cmt = new Comments();
            $cmt_id = $request->get('id');
            $obj_cmt->deleteComments($cmt_id);
        } catch (JacopoExceptionsInterface $e) {

            return Redirect::route('comments.list')->withErrors($e);
        }
        return Redirect::route('comments.list')->withMessage(trans('front.comments.delete_successfull'));
    }

    /*     * ********************************************
     * viewComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewComments(Request $request) {

        $obj_cmt = new Comments();

        $params = array(
            'real_estate_comment_id' => $request->get('id')
        );

        $cmt = $obj_cat->viewComments($params);

        if (!empty($cmt)) {

            $data = array_merge($this->data, array(
                'cmt' => $cmt,
                'request' => $request
            ));

            return View::make('laravel-authentication-acl::admin.comments.view')->with(['data' => $data]);
        } else {

            return Redirect::route("comments.list")->withMessage(trans('comments.comment.list_not_found'));
        }
    }

    /*     * ********************************************
     * addComment
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addComments(Request $request) {

        $data = array_merge($this->data, array(
        ));

        return View::make('laravel-authentication-acl::admin.comments.edit')->with(['data' => $data]);
    }

}
