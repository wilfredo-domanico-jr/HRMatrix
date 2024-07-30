<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FormTypeModel;
use CodeIgniter\HTTP\Request;
use App\Models\OvertimeTypeModel;
use App\Models\RequestHeaderModel;
use App\Models\HalfdayRequestModel;
use App\Models\OvertimeRequestModel;
use App\Models\UndertimeRequestModel;
use App\Models\LeaveRequestPerHourModel;
use App\Models\LeaveRequestMandatoryModel;
use App\Models\MandatoryLeaveTypeModel;
use App\Models\UserOvertimeModel;

class RequestFormController extends BaseController
{


    public function index()
    {
        $formTypes = new FormTypeModel();
        $data['formTypes'] = $formTypes->findAll();
        $userId = session('id');
        $data['userRequest'] = (new RequestHeaderModel())->getRequestByUser($userId);

        echo view('layout/authenticated/header');
        echo view('request-form/index', $data);
        echo view('layout/authenticated/footer');
    }


    public function create($formType)
    {


        //Check if form Type exist

        $formTypes = new FormTypeModel();
        $isFormTypeExisting = $formTypes->where('FORM_ID',$formType)->first();

        if(!$isFormTypeExisting){
            return redirect()->to('/request-forms');
        }

        echo view('layout/authenticated/header');
        helper(['form']);

        $data['formDetail'] = $isFormTypeExisting;
        switch ($formType) {
            case 'FRM-00001':

                $data['overtimeTypes'] = (new OvertimeTypeModel())->findAll();
                echo view('request-form/forms/FRM-00001',$data);
              break;
            case 'FRM-00002':
                echo view('request-form/forms/FRM-00002',$data);
              break;

            case 'FRM-00003':

                echo view('request-form/forms/FRM-00003',$data);
              break;
            case 'FRM-00004':
                $data['credits'] = (new UserModel())->getUserCredits(session()->get('id'));
                echo view('request-form/forms/FRM-00004',$data);
              break;
            case 'FRM-00005':
                $data['mandatoryLeaveTypes'] = (new MandatoryLeaveTypeModel())->findAll();
                echo view('request-form/forms/FRM-00005',$data);
              break;
            case 'FRM-00006':
                $data['ordinaryWorkingOT'] = (new UserOvertimeModel())->getUserOrdinaryWorkingDayOvertime(session()->get('id'));
                $data['restDayOT'] = (new UserOvertimeModel())->getUserRestDayOvertime(session()->get('id'));
                $data['specialOT'] = (new UserOvertimeModel())->getUserSpecialOvertime(session()->get('id'));
                echo view('request-form/forms/FRM-00006',$data);
              break;
            default:
                return redirect()->to('/request-forms');
          }

        echo view('layout/authenticated/footer');
    }

    public function show($request_id)
    {
        //Check if form Type exist
        $isRequestExisting = (new RequestHeaderModel())->isRequestExisting($request_id);

        if(!$isRequestExisting){
            return redirect()->to('/request-forms');
        }

        $formType = $isRequestExisting['FORM_TYPE'];

        echo view('layout/authenticated/header');

        switch ($formType) {
            case 'FRM-00001':
                $data['formDetail'] = (new OvertimeRequestModel())->getOvertimeRequestByID($request_id);
                $data['overtimeTypes'] = (new OvertimeTypeModel())->findAll();
                echo view('request-form/display-form/FRM-00001',$data);
              break;
            case 'FRM-00002':
                $data['formDetail'] = (new UndertimeRequestModel())->getUndertimeRequestByID($request_id);
                echo view('request-form/display-form/FRM-00002',$data);
              break;
            case 'FRM-00003':
                $data['formDetail'] = (new HalfdayRequestModel())->getHalfdayRequestByID($request_id);
                echo view('request-form/display-form/FRM-00003',$data);
              break;
            case 'FRM-00004':
                $data['formDetail'] = (new LeaveRequestPerHourModel())->getLeaveRequestPerHourByID($request_id);
                echo view('request-form/display-form/FRM-00004',$data);
              break;
              case 'FRM-00005':
                $data['formDetail'] = (new LeaveRequestMandatoryModel())->getLeaveRequestMandatoryByID($request_id);
                $data['mandatoryLeaveTypes'] = (new MandatoryLeaveTypeModel())->findAll();
                echo view('request-form/display-form/FRM-00005',$data);
              break;
            default:
                return redirect()->to('/request-forms');
          }

        echo view('layout/authenticated/footer');
    }

    public function store($formType){

        helper(['form']);

        switch ($formType) {
            case 'FRM-00001':
                $this->insertOvertimeRequest($formType);
              break;
            case 'FRM-00002':
                $this->insertUndertimeRequest($formType);
              break;
              case 'FRM-00003':
                $this->insertHalfdayRequest($formType);
              break;

              case 'FRM-00004':
                $this->insertLeavePerHourRequest($formType);
              break;

              case 'FRM-00005':
                $this->insertLeaveMandatoryRequest($formType);
              break;
          }

          session()->setFlashdata('msg', 'Request Created Successfully.');
          session()->setFlashdata('icon', 'success');
          return redirect()->to('/request-forms');

    }

    public function delete($request_id){

        $requestHeaderModel = new RequestHeaderModel();
        $requestHeaderModel->where('REQUEST_ID', $request_id)
        ->delete();


        session()->setFlashdata('msg', 'Request Deleted Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/request-forms');

    }

    public function update($request_id){

            helper(['form']);

         //Check if form Type exist
         $isRequestExisting = (new RequestHeaderModel())->isRequestExisting($request_id);
         if(!$isRequestExisting){
             return redirect()->to('/request-forms');
         }

         $formType = $isRequestExisting['FORM_TYPE'];

          switch ($formType) {
            case 'FRM-00001':
                $this->updateOvertimeRequest($request_id);
                $message = "Overtime Request Updated Successfully.";
              break;
            case 'FRM-00002':
                $this->updateUndertimeRequest($request_id);
                $message = "Undertime Request Updated Successfully.";
              break;
            case 'FRM-00003':
                $this->updateHalfdayRequest($request_id);
                $message = "Halfday Request Updated Successfully.";
              break;
            case 'FRM-00004':
                $this->updateLeavePerHourRequest($request_id);
                $message = "Per Hour Leave Request Updated Successfully.";
              break;
              case 'FRM-00005':
                $this->updateLeaveMandatoryRequest($request_id);
                $message = "Mandatory Leave Request Updated Successfully.";
              break;
          }

          session()->setFlashdata('msg', $message);
          session()->setFlashdata('icon', 'success');
          return redirect()->to('/request-forms');

    }


    private function insertOvertimeRequest($formType){

        $requestHeaderModel = new RequestHeaderModel();
        $overtimeRequestModel = new OvertimeRequestModel();


        try {

            // Generate Request ID
            $maxId = $requestHeaderModel->getMaxId() + 1;

            $reqID = 'RQ-'. str_pad($maxId, 8, '0', STR_PAD_LEFT);

            // Request Header Data
            $requestHeaderData = [
                'REQUEST_ID'    => $reqID,
                'FORM_TYPE'     => $formType,
                'USER_ID'       => session()->get('id'),
                'STATUS'        => 'CREATED',
                'DATE_CREATED'  => date('Y-m-d')
            ];

            $requestHeaderModel->insert($requestHeaderData);
            // Overtime Request Data
            $overtimeRequestData = [
                'REQUEST_ID'    => $reqID,
                'OT_DATE'       => $this->request->getVar('date'),
                'OT_TYPE'       => $this->request->getVar('overtime_type'),
                'HOUR'          => $this->request->getVar('hour'),
                'MINUTE'        => $this->request->getVar('minute'),
                'PURPOSE'       => $this->request->getVar('purpose') // Use appropriate field
            ];

            $overtimeRequestModel->insert($overtimeRequestData);


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function updateOvertimeRequest($request_id){

        $overtimeRequestModel = new OvertimeRequestModel();

        try {



            // Overtime Request Data
            $overtimeRequestData = [
                'OT_DATE'       => $this->request->getVar('date'),
                'OT_TYPE'       => $this->request->getVar('overtime_type'),
                'HOUR'          => $this->request->getVar('hour'),
                'MINUTE'        => $this->request->getVar('minute'),
                'PURPOSE'       => $this->request->getVar('purpose')
            ];

            $overtimeRequestModel->set($overtimeRequestData)
            ->where('REQUEST_ID', $request_id)
            ->update();



        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function insertUndertimeRequest($formType){

        $requestHeaderModel = new RequestHeaderModel();
        $undertimeRequestModel = new UndertimeRequestModel();


        try {

            // Generate Request ID
            $maxId = $requestHeaderModel->getMaxId() + 1;

            $reqID = 'RQ-'. str_pad($maxId, 8, '0', STR_PAD_LEFT);

            // Request Header Data
            $requestHeaderData = [
                'REQUEST_ID'    => $reqID,
                'FORM_TYPE'     => $formType,
                'USER_ID'       => session()->get('id'),
                'STATUS'        => 'CREATED',
                'DATE_CREATED'  => date('Y-m-d')
            ];

            $requestHeaderModel->insert($requestHeaderData);
            // Overtime Request Data
            $undertimeRequestData = [
                'REQUEST_ID'    => $reqID,
                'UT_DATE'       => $this->request->getVar('date'),
                'REASON'       => $this->request->getVar('reason') // Use appropriate field
            ];

            $undertimeRequestModel->insert($undertimeRequestData);


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function updateUndertimeRequest($request_id){

        $undertimeRequestModel = new UndertimeRequestModel();

        try {


            $undertimeRequestData = [
                'UT_DATE'       => $this->request->getVar('date'),
                'REASON'       => $this->request->getVar('reason') // Use appropriate field
            ];

            $undertimeRequestModel->set($undertimeRequestData)
            ->where('REQUEST_ID', $request_id)
            ->update();


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function insertHalfdayRequest($formType){

        $requestHeaderModel = new RequestHeaderModel();
        $halfDayRequestModel = new HalfdayRequestModel();


        try {

            // Generate Request ID
            $maxId = $requestHeaderModel->getMaxId() + 1;

            $reqID = 'RQ-'. str_pad($maxId, 8, '0', STR_PAD_LEFT);

            // Request Header Data
            $requestHeaderData = [
                'REQUEST_ID'    => $reqID,
                'FORM_TYPE'     => $formType,
                'USER_ID'       => session()->get('id'),
                'STATUS'        => 'CREATED',
                'DATE_CREATED'  => date('Y-m-d')
            ];

            $requestHeaderModel->insert($requestHeaderData);
            // Overtime Request Data

            $time = 0;

            if($this->request->getVar('Time') == 'PM'){
                $time = 1;
            }

            $halfdayRequestData = [
                'REQUEST_ID' => $reqID,
                'DATE' => $this->request->getVar('date'),
                'TIME' => $time,
                'REASON'  => $this->request->getVar('reason') // Use appropriate field
            ];

            $halfDayRequestModel->insert($halfdayRequestData);


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function updateHalfdayRequest($request_id){

        $halfDayRequestModel = new HalfdayRequestModel();

        try {

            $time = 0;

            if($this->request->getVar('Time') == 'PM'){
                $time = 1;
            }

            $halfdayRequestData = [
                'DATE' => $this->request->getVar('date'),
                'TIME' => $time,
                'REASON'  => $this->request->getVar('reason') // Use appropriate field
            ];

            $halfDayRequestModel->set($halfdayRequestData)
            ->where('REQUEST_ID', $request_id)
            ->update();


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function insertLeavePerHourRequest($formType){


        $requestHeaderModel = new RequestHeaderModel();
        $leaveRequestPerHourModel = new LeaveRequestPerHourModel();


        try {

            // Generate Request ID
            $maxId = $requestHeaderModel->getMaxId() + 1;

            $reqID = 'RQ-'. str_pad($maxId, 8, '0', STR_PAD_LEFT);

            // Request Header Data
            $requestHeaderData = [
                'REQUEST_ID'    => $reqID,
                'FORM_TYPE'     => $formType,
                'USER_ID'       => session()->get('id'),
                'STATUS'        => 'CREATED',
                'DATE_CREATED'  => date('Y-m-d')
            ];

            $requestHeaderModel->insert($requestHeaderData);
            // Overtime Request Data



            $leaveRequestPerHourData = [
                'REQUEST_ID' => $reqID,
                'LEAVE_TYPE' => $this->request->getVar('Type'),
                'DATE' => $this->request->getVar('date'),
                'FROM' => $this->request->getVar('from'),
                'TO' => $this->request->getVar('to'),
                'REASON'  => $this->request->getVar('reason')
            ];

            $leaveRequestPerHourModel->insert($leaveRequestPerHourData);


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function updateLeavePerHourRequest($request_id){


        $leaveRequestPerHourModel = new LeaveRequestPerHourModel();

        try {


            $halfdayRequestData = [
                'LEAVE_TYPE' => $this->request->getVar('Type'),
                'DATE' => $this->request->getVar('date'),
                'FROM' => $this->request->getVar('from'),
                'TO' => $this->request->getVar('to'),
                'REASON'  => $this->request->getVar('reason')
            ];



            $leaveRequestPerHourModel->set($halfdayRequestData)
            ->where('REQUEST_ID', $request_id)
            ->update();


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function insertLeaveMandatoryRequest($formType){


        $requestHeaderModel = new RequestHeaderModel();
        $leaveRequestMandatoryModel = new LeaveRequestMandatoryModel();


        try {

            // Generate Request ID
            $maxId = $requestHeaderModel->getMaxId() + 1;

            $reqID = 'RQ-'. str_pad($maxId, 8, '0', STR_PAD_LEFT);

            // Request Header Data
            $requestHeaderData = [
                'REQUEST_ID'    => $reqID,
                'FORM_TYPE'     => $formType,
                'USER_ID'       => session()->get('id'),
                'STATUS'        => 'CREATED',
                'DATE_CREATED'  => date('Y-m-d')
            ];

            $requestHeaderModel->insert($requestHeaderData);

            $leaveRequestMandatoryData = [
                'REQUEST_ID' => $reqID,
                'LEAVE_TYPE' => $this->request->getVar('Leave_Type'),
                'FROM' => $this->request->getVar('from_date'),
                'TO' => $this->request->getVar('to_date'),
                'REASON'  => $this->request->getVar('reason')
            ];

            $leaveRequestMandatoryModel->insert($leaveRequestMandatoryData);


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }

    private function updateLeaveMandatoryRequest($request_id){


        $leaveRequestMandatoryModel = new LeaveRequestMandatoryModel();

        try {


            $mandatoryLeaveRequestData = [
                'LEAVE_TYPE' => $this->request->getVar('Leave_Type'),
                'FROM' => $this->request->getVar('from_date'),
                'TO' => $this->request->getVar('to_date'),
                'REASON'  => $this->request->getVar('reason')
            ];



            $leaveRequestMandatoryModel->set($mandatoryLeaveRequestData)
            ->where('REQUEST_ID', $request_id)
            ->update();


        } catch (\Exception $e) {
            // Handle exceptions, log errors, or roll back the transaction

            // Optionally throw or handle the exception
            throw $e;
        }

    }



 }
