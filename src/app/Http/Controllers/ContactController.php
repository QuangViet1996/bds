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
use App\Http\Requests\ApplyFormRequest;
use Validator;
use Response;
use Illuminate\Support\MessageBag as MessageBag;
use App\Libraries\LibFiles as LibFiles;

class ContactController extends Controller {

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

        $obj_contact = new Contact();
        $list = $obj_contact->listContact();

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request,
        ));
        return view('laravel-authentication-acl::admin.contact.list')->with(['data' => $data]);
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

            if (!empty($real_estate_contact_id)) {
                $contact = $obj_contact->find($real_estate_contact_id);
            }

            //Update existing 
            if (!empty($contact)) {

                $contact = $obj_contact->updateContact($input);

                return Redirect::route("contact.list")->withMessage(trans('front.contact.edit_successfull'));

                //Add new 
            } elseif (empty($real_estate_contact_id)) {

                $contact = $obj_contact->addContact($input);

                return Redirect::route("contact.list")->withMessage(trans('front.contact.add_successfull'));
            }
        } else {

            $errors = $validator->getErrors();

            if (!empty($real_estate_contact_id)) {

                return Redirect::route("contact.edit", ["id" => $real_estate_contact_id])->withInput()->withErrors($errors);
            } else {

                return Redirect::route("contact.edit")->withInput()->withErrors($errors);
            }
        }
    }

    /*     * ********************************************
     * addContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addContact(Request $request) {
        $data = array_merge($this->data, array(
        ));
        return View::make('laravel-authentication-acl::admin.contact.edit')->with(['data' => $data]);
    }

    /*     * ********************************************
     * editContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editContact(Request $request) {
        $obj_contact = new Contact();

        $real_estate_contact_id = $request->get('id');

        $contact = $obj_contact->find($real_estate_contact_id);
        
        if (!empty($contact)) {
            
            
            $data = array_merge($this->data, array(
                'contact' => $contact,
                'request' => $request,
            ));

            return View::make('laravel-authentication-acl::admin.contact.edit')->with(['data' => $data]);
            
        } else {
            
            return Redirect::route("contact.list")->withMessage(trans('front.contact.not_table'));
            
        }
    }

    /*     * ********************************************
     * deleteContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteContact(Request $request) {
        try {
            
            $obj_contact = new Contact();
            $obj_contact->deleteContact($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('contact.list')->withErrors($e);
        }
        return Redirect::route('contact.list')->withMessage(trans('front.contact.delete_successful'));
    }

}
