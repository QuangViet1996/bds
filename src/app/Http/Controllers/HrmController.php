<?php

namespace App\Http\Controllers;

/**
 * Lib Core
 */
use Input;
use Illuminate\Http\Request;
use View,
    Redirect,
    App,
    Config,
    Session;
/**
 * Models
 */
use App\Models\Payrolls;
use App\Models\PayrollTypes;
use App\Models\PayrollTypeFields;
use App\Models\PayrollUsers;
use App\Models\PayrollReports;
use App\Models\Users;
use App\Models\PayrollReportFields;
/**
 * Validator
 */
use App\Http\Requests\HrmPayrollFormRequest;
use App\Http\Requests\PayrollValidator;
use App\Http\Requests\PayrollTypeValidator;
use App\Http\Requests\PayrollReportsValidator;
use App\Http\Requests\PayrollTypeFieldValidator;
use App\Http\Requests\PayrollReportFieldValidator;
/**
 * Lib of vendor
 */
use \LaravelAcl\Authentication\Controllers\Controller;
use \LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use \LaravelAcl\Library\Exceptions\ValidationException;
use URL;
use Excel;
use Maatwebsite\Excel\Writers\CellWriter;
use App\Http\Requests\ApplyFormRequest;
use Validator;
use Response;
use Illuminate\Support\MessageBag as MessageBag;

class HrmController extends Controller {

    public $data = array(
    );
    private $obj_payroll = NULL;

    public function __construct() {

        $this->obj_payroll = new Payrolls();
    }

    public function index() {
        
    }

    
    
    
    
    /*     * ********************************************
     * getPayrolls
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPayrolls(Request $request) {

        $input = $request->all();
        $filters = array();

        if (!empty($input)) {
            $filters = array(
                'fromdate' => @strtotime($input['fromdate']),
                'todate' => @strtotime($input['todate']),
            );
        }

        if (!empty($filters['todate'])) {
            $filters['todate'] += 86399;
        }

        if (!empty($input['filter'])) {

            $obj_payroll_user = new PayrollUsers();
            $obj_payroll_report = new PayrollReports();
            $obj_payroll_report_fields = new PayrollReportFields();


            $filters = array_merge($filters, array(
                'payroll_type_id' => $input['report_type']
            ));
            
            $payroll_report = $obj_payroll_report->find($filters['payroll_type_id']);
            $payroll_report_fields = $obj_payroll_report_fields->getByTypeVal($payroll_report->payroll_report_id);

            $filters = array_merge($filters, array(
                'export_vat' => @$payroll_report_fields['payroll_type_field_isvat'],
                'export_insu' => @$payroll_report_fields['payroll_type_field_isinsurrance'],
                'user_uid' => @$input['uid']
            ));
            
            $payroll_users = $obj_payroll_user->filterPayrollUser($filters);
            
            $destinationPath = realpath(app_path('template_reports') . '/' . $payroll_report->payroll_report_template_file); // upload path

            Excel::load($destinationPath, function($doc) use($payroll_users, $payroll_report, $payroll_report_fields) {

                $sheet = $doc->setActiveSheetIndex(0);

                $fromRow = $payroll_report->payroll_report_fromrow;
                $colNameTNTT = @$payroll_report_fields['payroll_type_field_isvat'];
                $colNameINSU = @$payroll_report_fields['payroll_type_field_isinsurrance'];
                $colFullName = $payroll_report->payroll_report_user_col;

                foreach ($payroll_users as $payroll_user) {
                    $sheet->setCellValue($colFullName . $fromRow, $payroll_user['first_name'] . ' ' . $payroll_user['last_name']);
                    if (!empty($colNameTNTT)) {
                        $sheet->setCellValue($colNameTNTT . $fromRow, @$payroll_user['total_vat']);
                    }
                    if (!empty($colNameINSU)) {
                        $sheet->setCellValue($colNameINSU . $fromRow, @$payroll_user['total_insu']);
                    }
                    $fromRow++;
                }
            })->download('xlsx');
        } else {
            
            $filters['user_uid'] = @$input['uid'];
            
            $payrolls = $this->obj_payroll->getPayrolls($filters);
            
            $obj_payroll_reports = new PayrollReports();
            
            $data = array_merge($this->data, array(
                'payrolls' => $payrolls,
                'request' => $request,
                'payroll_reports' => $obj_payroll_reports->putPayrollReportsInSelect()
            ));

            return View::make('laravel-authentication-acl::admin.hrm.payrolls')->with(['data' => $data]);
        }
    }

    
    
    
    
    /*     * ********************************************
     * viewPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayroll(Request $request) {
        
        $params = array(
            'payroll_id' => $request->get('id')
        );

        $obj_payroll_users = new PayrollUsers();
        $obj_payroll_type_fields = new PayrollTypeFields();

        $payroll_users = $obj_payroll_users->viewPayroll($params);
        $payroll = $this->obj_payroll->findById($params['payroll_id']);

        if (!empty($payroll)) {
            
            $payroll_type_fields = $obj_payroll_type_fields->findByPayrollTypeID($payroll->payroll_type_id);

            $payroll_id = $request->get('id');
            $data = array_merge($this->data, array(
                'payroll' => $payroll,
                'payroll_user' => $payroll_users,
                'payroll_type_fields' => $payroll_type_fields,
                'request' => $request
            ));

            return View::make('laravel-authentication-acl::admin.hrm.view')->with(['data' => $data]);
            
        } else {

            return Redirect::route("hrm.payrolls")->withMessage(trans('front.payrolls.not_found_payroll_table'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * viewPayrollType
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewPayrollType(Request $request) {

        $obj_payroll_types = new PayrollTypes();
        $obj_payroll_type_fields = new PayrollTypeFields();

        $params = array(
            'payroll_type_id' => $request->get('id')
        );

        $payroll_types = $obj_payroll_types->viewPayrollTypes($params);

        if (!empty($payroll_types)) {
            $payroll_type_fields = $obj_payroll_type_fields->getPayrollTypeFieldsByTypeId(array('payroll_type_id' => $payroll_types->payroll_type_id));

            $data = array_merge($this->data, array(
                'payroll_types' => $payroll_types,
                'payroll_type_fields' => $payroll_type_fields,
                'is' => $obj_payroll_type_fields->is,
                'request' => $request
            ));

            return View::make('laravel-authentication-acl::admin.payroll_types.view')->with(['data' => $data]);
        } else {
            return Redirect::route("hrm.payrolltypes")->withMessage(trans('front.payrolls.types_not_found'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * addPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPayroll(Request $request) {
        
        $obj_payroll_types = new PayrollTypes();

        $payroll_types = $obj_payroll_types->getPayrollTypes();

        $data = array_merge($this->data, array(
            'payroll_types' => $payroll_types
        ));
        return View::make('laravel-authentication-acl::admin.hrm.edit')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * editPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editPayroll(Request $request) {
        $payroll_id = $request->get('id');

        $payroll = $this->obj_payroll->find($payroll_id);

        if (!empty($payroll)) {
            $obj_payroll_types = new PayrollTypes();
            $payroll_types = $obj_payroll_types->getPayrollTypes();

            $data = array_merge($this->data, array(
                'payroll' => $payroll,
                'payroll_types' => $payroll_types
            ));
            return View::make('laravel-authentication-acl::admin.hrm.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("hrm.payrolls")->withMessage(trans('front.payrolls.not_found_payroll_table'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * postPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postPayroll(Request $request) {

        $validator = new PayrollValidator();

        $input = $request->all();

        $input['filedata'] = $request->file('filedata');

        $payroll_id = $request->get('id');

        $payroll = NULL;

        /**
         * Check:
         * title: required
         * description: required
         * datatype: has configs
         * filedata: required, excel typye
         */
        if ($validator->validate($input)) {
            $filedata = array();

            //Payroll date
            $payroll_date = @$input['fromdate'] ? @strtotime(@$input['fromdate']) : time();
            $input['payroll_date'] = $payroll_date;
            
            //Payroll date trans
            $payroll_date_trans = @$input['todate'] ? @strtotime(@$input['todate']) : time();
            $input['payroll_date_trans'] = $payroll_date_trans;

            if (!empty($payroll_id)) {
                $payroll = $this->obj_payroll->findById($payroll_id);
            }

            //Update existing payroll
            if (!empty($payroll)) {
                if ($input['filedata']) {
                    $filedata = $this->uploadParseExcel($request);

                    if ($filedata['data'] == 'error_file') {
                        $errors = new MessageBag();
                        $errors->add('filedata', (trans('front.payrolls.file_error')));
                        return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                    } elseif ($filedata['data'] == 'not_config_payroll_type') {

                        $errors = new MessageBag();
                        $errors->add('datatype', (trans('front.excel.not_config_payroll_type')));
                        return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                    } elseif ($filedata['data'] == 'empty_data') {

                        $errors = new MessageBag();
                        $errors->add('filedata', (trans('front.excel.empty_data')));
                        return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                    }

                    $obj_payroll_user = new PayrollUsers();

                    $filedata['payroll_id'] = $payroll_id;
                    $filedata['fileinfo']['payroll_date'] = $input['payroll_date'];
                    $filedata['fileinfo']['payroll_date_trans'] = $input['payroll_date_trans'];
                    $obj_payroll_user->updatePayrollUsers($filedata);
                }

                $payroll = $this->obj_payroll->updatePayroll($input, $filedata);

                return Redirect::route("hrm.view_payroll", ["id" => $payroll_id])->withMessage(trans('front.form_edit_successful'));


                //Add new payroll
            } elseif (empty($payroll_id)) {

                $filedata = $this->uploadParseExcel($request);
                if ($filedata['data'] == 'error_file') {

                    $errors = new MessageBag();
                    $errors->add('filedata', (trans('front.payrolls.file_error')));
                    return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                } elseif ($filedata['data'] == 'not_config_payroll_type') {

                    $errors = new MessageBag();
                    $errors->add('datatype', (trans('front.excel.not_config_payroll_type')));
                    return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                } elseif ($filedata['data'] == 'empty_data') {

                    $errors = new MessageBag();
                    $errors->add('filedata', (trans('front.excel.empty_data')));
                    return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
                }

                $payroll = $this->obj_payroll->addPayroll($input, $filedata);

                $obj_payroll_user = new PayrollUsers();

                $filedata['payroll_id'] = $payroll->payroll_id;
                $filedata['fileinfo']['payroll_date'] = $input['payroll_date'];
                $filedata['fileinfo']['payroll_date_trans'] = $input['payroll_date_trans'];
                $obj_payroll_user->updatePayrollUsers($filedata);
                return Redirect::route("hrm.view_payroll", ["id" => $payroll->payroll_id])->withMessage(trans('front.form_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_id)) {
                return Redirect::route("hrm.edit_payroll", ["id" => $payroll_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("hrm.add_payroll")->withInput()->withErrors($errors);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * deletePayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePayroll(Request $request) {
        try {
            $payroll_id = $request->get('id');

            //Delete payroll
            $this->obj_payroll->deletePayroll($payroll_id);

            //Delete payroll user by payroll id
            $obj_payroll_users = new PayrollUsers();
            $obj_payroll_users->deletePayrollUsersByPayrollId($payroll_id);
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('hrm.payrolls')->withErrors($e);
        }
        return Redirect::route('hrm.payrolls')->withMessage(trans('front.form_delete_successful'));
    }

    
    
    
    
    /*     * ********************************************
     * confirmPayroll
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function confirmPayroll(Request $request) {
        try {
            $this->obj_payroll->confirmPayroll($request->all());
            return Redirect::route("hrm.view_payroll", ["id" => $request->get('id')])->withMessage(trans('front.form_edit_successful'));
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('hrm.payrolls')->withErrors($e);
        }
    }

    
    
    
    
    /*     * ********************************************
     * logPayrolls
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function logPayrolls() {
        
    }

    
    
    
    
    /*     * ********************************************
     * uploadParseExcel
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    private function uploadParseExcel($request, $params = array()) {
        
        $filedata = array();
        // getting all of the post data
        $file = array('fileexcel' => $request->file('filedata'));

        //destination path
        $destinationPath = app_path('upload'); // upload path
        if (!empty($params['destination_path'])) {
            $destinationPath = app_path($params['destination_path']);
        }

        $extension = $file['fileexcel']->getClientOriginalExtension(); // getting image extension
        $fileName = time() . '.' . $extension; // renameing image
        $file['fileexcel']->move($destinationPath, $fileName); // uploading file to given path
        // sending back with message
        $file_path = $destinationPath . '/' . $fileName;

        //get data in file
        if (empty($params['not_getData'])) {
            $data = Excel::selectSheetsByIndex(0)->load($file_path, function($reader) {
                        $reader->noHeading();
                        $reader->formatDates(false);
                    }, 'UTF-8')->get();
            $results = $data->toArray();
            $filedata['data'] = $this->parseExcel($request, $results);
        }

        $filedata['fileinfo'] = array(
            'filename' => $fileName,
            'filepath' => $destinationPath,
            'fullpath' => $file_path,
            'payroll_type_id' => $request->get('datatype'),
        );
        return $filedata;
    }

    
    
    
    
    /*     * ********************************************
     * parseExcel
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    private function parseExcel($request, $filedata) {
        
        $input = $request->all();
        $obj_users = new Users();
        $obj_payroll_types = new PayrollTypes();

        $payroll_types = $obj_payroll_types->findById($input['datatype']);

        $temp_array = $payroll_types->toArray();
        
        if (empty($temp_array)) {
            return 'not_config_payroll_type';
        }
        
        $data = array();
        foreach ($payroll_types as $payroll_type) {
            
            $vals = array();
            $has_value = FALSE;
            $is_continue = TRUE;
            
            for ($index = ($payroll_type['payroll_type_fromrow'] - 1); $index < count($filedata); $index++) {
                
                $key1 = $payroll_type['payroll_type_col_user'] - 1;
                $key2 = $payroll_type['payroll_type_field_val'] - 1;
                
                if (array_key_exists($key1, $filedata[$index]) &&
                        array_key_exists($key2, $filedata[$index])) {
                    
                    $item = array(
                        'uid' => $filedata[$index][$payroll_type['payroll_type_col_user'] - 1],
                        'payroll_user_received' => $filedata[$index][$payroll_type['payroll_type_field_val'] - 1]
                    );
                    
                    if ($item['uid']) {
                        $user = $obj_users->getUserByUID($item['uid']);
                        
                        if (!empty($user)) {
                            $item['user_id'] = $user->id;
                            $vals[] = $item;
                            $has_value = TRUE;
                        }
                    } else {
                        $is_continue = FALSE;
                        break;
                    }
                    //Invalid file   
                } else {
                    return 'error_file';
                }
            }
            if (!$is_continue && !$has_value) {
                
            } else {
                $data[] = array(
                    'payroll_type_field_id' => $payroll_type['payroll_type_field_id'],
                    'data' => $vals
                );
            }
        }
        if (empty($data)) {
            return 'empty_data';
        }
        return $data;
    }

    
    
    
    
    /*     * ********************************************
     * userPayrolls
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function userPayrolls(Request $request) {
        $authentication = App::make('authenticator');

        $input = $request->all();
        $filters = array();

        if (!empty($input)) {
            $filters = array(
                'fromdate' => @strtotime($input['fromdate']),
                'todate' => @strtotime($input['todate']),
            );
        }

        if (!empty($filters['todate'])) {
            $filters['todate'] += 86399;
        }

        $current_user = $authentication->getLoggedUser()->toArray();
        $obj_payroll_usre = new PayrollUsers();

        $payroll_users = $obj_payroll_usre->getPayrollByUser($request->all(), $current_user, $filters);
        $data = array_merge($this->data, array(
            'payroll_users' => $payroll_users,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::userhrm.payrolls')->with(['data' => $data]);
    }
    
    /*     * ********************************************
     * userTrans
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

   public function userTrans(Request $request) {
        $obj_user = new Users();
        $obj_payroll_user = new PayrollUsers();

        $input = $request->all();
        $filters = array();

        if (!empty($input)) {
            $filters = array(
                'fromdate' => @strtotime($input['fromdate']),
                'todate' => @strtotime($input['todate']),
            );
        }

        if (!empty($filters['todate'])) {
            $filters['todate'] += 86399;
        }
        $user = array();
        if (!empty($input['uid'])) {
            $user = $obj_user->getUserProfileByUID(@$input['uid']);
            if (!empty($user)) {
                $user = $user->toArray();
            }
        }

        if (!empty($user)) {

            $payroll_users = $obj_payroll_user->getPayrollByUserTrans($request->all(), $user, $filters);

            if (!empty($input['report'])) {

                Excel::create($user['uid'], function($excel) use($payroll_users) {

                    $excel->sheet('Transactions', function($sheet) use($payroll_users) {

                        $row = array(
                            'stt' => 'A',
                            'trans' => 'B',
                            'date' => 'C',
                            'recevied' => 'D'
                        );

                        $trans = $payroll_users->toArray();
                        $trans = @$trans['data'];
                        
                        if (!empty($trans)) {
                            
                            $fromRow = 1;
                            foreach ($trans as $index => $payroll_user) {

                                $sheet->setCellValue($row['stt'] . $fromRow, $fromRow);

                                $sheet->setCellValue($row['trans'] . $fromRow, $payroll_user['payroll_title'] . ' ' . $payroll_user['payroll_type_field_title']);

                                $sheet->setCellValue($row['date'] . $fromRow, date('d-m-Y', $payroll_user['payroll_date_trans']));

                                $sheet->setCellValue($row['recevied'] . $fromRow, number_format($payroll_user['payroll_user_received'], 0));

                                $fromRow++;
                            }
                        }
                    });

                })->download('xlsx');
            } else {

                $data = array_merge($this->data, array(
                    'payroll_users' => $payroll_users,
                    'request' => $request,
                    'user' => $user,
                ));
            }

            return View::make('laravel-authentication-acl::admin.trans.trans')->with(['data' => $data]);
        } else {
            $data = array_merge($this->data, array(
                'request' => $request,
                'error' => 'Yêu cầu nhập mã nhân viên cần tìm'
            ));
            return View::make('laravel-authentication-acl::admin.trans.trans')->with(['data' => $data]);
        }
    }


    
    
    
    
    /*     * ********************************************
     * payrollTypes
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypes(Request $request) {
        
        $obj_payroll_type = new PayrollTypes();
        $payroll_types = $obj_payroll_type->listPayrollTypes($request->all());
        
        $data = array_merge($this->data, array(
            'payroll_types' => $payroll_types,
            'request' => $request
        ));
        return View::make('laravel-authentication-acl::admin.payroll_types.payroll-types')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeEdit
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeEdit(Request $request) {
        
        $obj_payroll_type = new PayrollTypes();
        
        $payroll_type_id = $request->get('id');
        $payroll_type = $obj_payroll_type->find($payroll_type_id);
        
        if (!empty($payroll_type)) {
            $data = array_merge($this->data, array(
                'payroll_type' => $payroll_type
            ));
            return View::make('laravel-authentication-acl::admin.payroll_types.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("hrm.payrolltypes")->withMessage(trans('front.payrolls.types_not_found'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeAdd
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeAdd(Request $request) {
        $data = array_merge($this->data, array(
        ));
        return View::make('laravel-authentication-acl::admin.payroll_types.edit')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeDelete
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeDelete(Request $request) {
        try {
            $obj_payroll_type = new PayrollTypes();
            $obj_payroll_type->deletePayrollType($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('hrm.payrolltypes')->withErrors($e);
        }
        return Redirect::route('hrm.payrolltypes')->withMessage(trans('front.form_types_delete_successful'));
    }

    
    
    
    
    /*     * ********************************************
     * postPyrollType
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postPyrollType(Request $request) {
        $obj_payroll_type = new PayrollTypes();
        $validator = new PayrollTypeValidator();
        $input = $request->all();
        $payroll_type_id = $request->get('id');
        $payroll_type = NULL;

        if ($validator->validate($input)) {
            if (!empty($payroll_type_id)) {
                $payroll_type = $obj_payroll_type->find($payroll_type_id);
            }

            //Upload load file excel
            $filedata = array();
            if (!empty($input['filedata'])) {
                $params = array(
                    'not_getData' => true,
                    'destination_path' => 'template_reports',
                );
                $filedata = $this->uploadParseExcel($request, $params);
            }


            $input = array_merge($input, array(
                'payroll_type_file_template' => @$filedata['fileinfo']['filename']
            ));


            //Update existing payroll
            if (!empty($payroll_type)) {

                if (empty($filedata) && $input['is_filedata']) {
                    $input['payroll_type_file_template'] = $payroll_type->payroll_type_file_template;
                }

                $payroll_type = $obj_payroll_type->updatePayrollType($input);

                return Redirect::route("hrm.view_payrolltype", ["id" => $payroll_type_id])->withMessage(trans('front.form_types_edit_successful'));

                //Add new payroll
            } elseif (empty($payroll_type_id)) {

                $payroll_type = $obj_payroll_type->addPayrollType($input);

                return Redirect::route("hrm.view_payrolltype", ["id" => $payroll_type->payroll_type_id])->withMessage(trans('front.form_types_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_type_id)) {
                return Redirect::route("hrm.edit_payrolltype", ["id" => $payroll_type_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("hrm.add_payrolltype")->withInput()->withErrors($errors);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeFields
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeFields(Request $request) {
        
        $obj_payroll_type_field = new PayrollTypeFields();
        
        $list = $obj_payroll_type_field->listPayrollTypeFields($request->all());
        
        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::admin.payroll_type_fields.list')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeFieldEdit
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeFieldEdit(Request $request) {
        
        $obj_payroll_type = new PayrollTypes();
        $obj_payroll_type_field = new PayrollTypeFields();
        
        $payroll_type_field_id = $request->get('id');
        $payroll_type_field = $obj_payroll_type_field->find($payroll_type_field_id);
        
        if (!empty($payroll_type_field)) {
            
            $data = array_merge($this->data, array(
                'payroll_type_field' => $payroll_type_field,
                'listtypes' => $obj_payroll_type->getPayrollTypes()
            ));
            return View::make('laravel-authentication-acl::admin.payroll_type_fields.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("hrm.payrolltypes")->withMessage(trans('front.payrolls.not_found_payroll_types_field_table'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeFieldAdd
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeFieldAdd(Request $request) {

        $obj_payroll_type = new PayrollTypes();

        $data = array_merge($this->data, array(
            'listtypes' => $obj_payroll_type->getPayrollTypes()
        ));
        return View::make('laravel-authentication-acl::admin.payroll_type_fields.edit')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * payrollTypeFieldDelete
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollTypeFieldDelete(Request $request) {
        $payroll_type_id = null;
        try {
            $obj_payroll_type_field = new PayrollTypeFields();
            $payroll_type_id = $obj_payroll_type_field->deletePayrollTypeField($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('hrm.payrolltypefields')->withErrors($e);
        }
        if (!empty($payroll_type_id)) {
            return Redirect::route("hrm.view_payrolltype", ["id" => $payroll_type_id])->withMessage(trans('front.form_types_delete_field_successful'));
        } else {
            return Redirect::route('hrm.payrolltypes')->withMessage(trans('front.form_types_delete_field_unsuccessful'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * postPyrollTypeField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postPyrollTypeField(Request $request) {
        $obj_payroll_type_field = new PayrollTypeFields();

        $input = $request->all();
        $validator = new PayrollTypeFieldValidator();

        $payroll_type_field_id = $request->get('id');
        $payroll_type_field = NULL;

        if ($validator->validate($input)) {
            if (!empty($payroll_type_field_id)) {
                $payroll_type_field = $obj_payroll_type_field->find($payroll_type_field_id);
            }
            //Update existing payroll
            if (!empty($payroll_type_field)) {

                $payroll_type_field = $obj_payroll_type_field->updatePayrollTypeField($input);
                return Redirect::route("hrm.view_payrolltype", ["id" => $payroll_type_field->payroll_type_id])->withMessage(trans('front.form_types_edit_field_successful'));

                //Add new payroll
            } elseif (empty($payroll_type_field_id)) {

                $payroll_type_field = $obj_payroll_type_field->addPayrollTypeField($input);

                return Redirect::route("hrm.view_payrolltype", ["id" => $payroll_type_field->payroll_type_id])->withMessage(trans('front.form_types_field_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_type_field_id)) {
                return Redirect::route("hrm.edit_payrolltypefield", ["id" => $payroll_type_field_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("hrm.add_payrolltypefield")->withInput()->withErrors($errors);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * reportList
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function reportList(Request $request) {
        $obj_payroll_reports = new PayrollReports();
        $list = $obj_payroll_reports->listPayrollReport($request->all());

        $data = array_merge($this->data, array(
            'list' => $list,
            'request' => $request
        ));

        return View::make('laravel-authentication-acl::admin.payroll_reports.list')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * editReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function editReport(Request $request) {
        
        $obj_payroll_reports = new PayrollReports();
        
        $payroll_report_id = $request->get('id');

        $payroll_report = $obj_payroll_reports->find($payroll_report_id);
        if (!empty($payroll_report)) {
            $data = array_merge($this->data, array(
                'payroll_report' => $payroll_report
            ));

            return View::make('laravel-authentication-acl::admin.payroll_reports.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("report.list")->withMessage(trans('front.payrolls.not_found_report_table'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * addReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addReport(Request $request) {
        $data = array_merge($this->data, array(
        ));
        return View::make('laravel-authentication-acl::admin.payroll_reports.edit')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * deleteReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteReport(Request $request) {

        try {
            $obj_payroll_reports = new PayrollReports();
            $obj_payroll_reports->deletePayrollReport($request->all());
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('report.list')->withErrors($e);
        }
        return Redirect::route('report.list')->withMessage(trans('front.form_report_delete_successful'));
    }

    
    
    
    
    /*     * ********************************************
     * viewReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewReport(Request $request) {
        
        $obj_payroll_reports = new PayrollReports();
        $obj_payroll_report_fields = new PayrollReportFields();
        $obj_payroll_type_fields = new PayrollTypeFields();

        $params = array(
            'payroll_report_id' => $request->get('id')
        );

        $payroll_report = $obj_payroll_reports->viewPayrollReport($params);

        if (!empty($payroll_report)) {
            $data = array_merge($this->data, array(
                
                'payroll_report' => $payroll_report,
                'payroll_report_fields' => $obj_payroll_report_fields->getPayrollReportFields($params),
                'payroll_type_fields_in_report' => $obj_payroll_type_fields->fields_in_report,
                'request' => $request
                    
            ));
            return View::make('laravel-authentication-acl::admin.payroll_reports.view')->with(['data' => $data]);
        } else {
            return Redirect::route("report.list")->withMessage(trans('front.payrolls.not_found_report_table'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * postReport
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postReport(Request $request) {
        
        $obj_payroll_report = new PayrollReports();
        $validator = new PayrollReportsValidator();

        $input = $request->all();
        $payroll_report_id = $request->get('id');

        $payroll_report = NULL;

        if ($validator->validate($input)) {
            if (!empty($payroll_report_id)) {
                $payroll_report = $obj_payroll_report->find($payroll_report_id);
            }

            //Upload load file excel
            $filedata = array();
            if (!empty($input['filedata'])) {
                $params = array(
                    'not_getData' => true,
                    'destination_path' => 'template_reports',
                );
                $filedata = $this->uploadParseExcel($request, $params);
            }


            $input = array_merge($input, array(
                'payroll_report_template_file' => @$filedata['fileinfo']['filename']
            ));

            //Update existing payroll
            if (!empty($payroll_report)) {
                if (empty($filedata) && $input['is_filedata']) {
                    $input['payroll_report_template_file'] = $payroll_report->payroll_report_template_file;
                }
                $payroll_report = $obj_payroll_report->updatePayrollReport($input);

                return Redirect::route("report.view",["id" => $payroll_report_id])->withMessage(trans('front.form_report_edit_successful'));

                //Add new payroll
            } elseif (empty($payroll_report_id)) {

                $payroll_report = $obj_payroll_report->addPayrollReport($input);

                return Redirect::route("report.view", ["id" => $payroll_report->payroll_report_id])->withMessage(trans('front.form_report_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_report_id)) {
                return Redirect::route("report.edit", ["id" => $payroll_report_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("report.edit")->withInput()->withErrors($errors);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * payrollReportFieldEdit
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollReportFieldEdit(Request $request) {
        
        $obj_payroll_reports = new PayrollReports();
        $obj_payroll_type_fields = new PayrollTypeFields();
        $obj_payroll_report_field = new PayrollReportFields();

        $payroll_report_field_id = $request->get('id');

        $payroll_report_field = $obj_payroll_report_field->find($payroll_report_field_id);

        if (!empty($payroll_report_field)) {
            $data = array_merge($this->data, array(
                'payroll_type_fields' => $obj_payroll_type_fields->fields_in_report,
                'payroll_reports' => $obj_payroll_reports->putPayrollReportsInSelect(),
                'payroll_report_fields' => $payroll_report_field,
                'request' => $request,
            ));
            return View::make('laravel-authentication-acl::admin.payroll_report_fields.edit')->with(['data' => $data]);
        } else {
            return Redirect::route("report.list")->withMessage(trans('front.payrolls.not_found_report_field'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * payrollReportFieldAdd
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollReportFieldAdd(Request $request) {
        
        $obj_payroll_type_fields = new PayrollTypeFields();
        $obj_payroll_reports = new PayrollReports();

        $data = array_merge($this->data, array(
            'payroll_type_fields' => $obj_payroll_type_fields->fields_in_report,
            'payroll_reports' => $obj_payroll_reports->putPayrollReportsInSelect(),
            'request' => $request,
        ));

        return View::make('laravel-authentication-acl::admin.payroll_report_fields.edit')->with(['data' => $data]);
    }

    
    
    
    
    /*     * ********************************************
     * payrollReportFieldDelete
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function payrollReportFieldDelete(Request $request) {
        $payroll_report_id = null;

        try {
            $obj_payroll_report_field = new PayrollReportFields();
            $payroll_report_id = $obj_payroll_report_field->deletePayrollReportField($request->all());
            
        } catch (JacopoExceptionsInterface $e) {
            return Redirect::route('report.view')->withErrors($e);
        }
        if (!empty($payroll_report_id)) {
            return Redirect::route("report.view", ["id" => $payroll_report_id])->withMessage(trans('front.form_types_delete_field_successful'));
        } else {
            return Redirect::route('report.list')->withMessage(trans('front.payrolls.form_types_field_delete_field_unsuccessful'));
        }
    }

    
    
    
    
    /*     * ********************************************
     * postReportTypeField
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function postReportTypeField(Request $request) {

        $obj_report_fields = new PayrollReportFields();

        $input = $request->all();
        $validator = new PayrollReportFieldValidator();

        $payroll_report_field_id = $request->get('id');
        $payroll_report_fields = NULL;

        if ($validator->validate($input)) {
            if (!empty($payroll_report_field_id)) {
                $payroll_report_fields = $obj_report_fields->find($payroll_report_field_id);
            }
            //Update existing payroll
            if (!empty($payroll_report_fields)) {

                $payroll_report_fields = $obj_report_fields->updatePayrollReportField($input);
                return Redirect::route("report.view", ["id" => $payroll_report_fields->payroll_report_id])->withMessage(trans('front.form_types_edit_field_successful'));

                //Add new payroll
            } elseif (empty($payroll_report_field_id)) {

                $payroll_report_fields = $obj_report_fields->addPayrollReportField($input);

                return Redirect::route("report.view", ["id" => $payroll_report_fields->payroll_report_id])->withMessage(trans('front.form_types_field_add_successful'));
            }
        } else {
            $errors = $validator->getErrors();
            if (!empty($payroll_report_field_id)) {
                return Redirect::route("hrm.edit_payrollreportfield", ["id" => $payroll_report_field_id])->withInput()->withErrors($errors);
            } else {
                return Redirect::route("hrm.add_payrollreportfield")->withInput()->withErrors($errors);
            }
        }
    }

    
    
    
    
    /*     * ********************************************
     * exportListUser
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function exportListUser(Request $request) {
        $obj_users = new Users();
        $list_users = $obj_users->exportListUser($request->all());
        Excel::create('danhSachNhanVien', function($excel) use($list_users) {

            $excel->sheet('NhanVien', function($sheet) use($list_users) {

                foreach ($list_users as $item) {
                    $sheet->appendRow(array(
                        $item->uid, $item->first_name . ' ' . $item->last_name, $item->email
                    ));
                }
            });
        })->download('xlsx');
    }
    
    
    
    
    
    /*********************************************
     * downloadFile
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */
    public function downloadFile(Request $request) {
        $file_name = $request->get('fn');
        $file_path = $request->get('fp');
        
        $file_dir = app_path($file_path) . '/' . $file_name;
        if (file_exists ($file_dir)) {
            
            Excel::load($file_dir, function($reader) {
                
            })->download('xlsx');
    
        } else {
            return NULL;
        }
    }

}
