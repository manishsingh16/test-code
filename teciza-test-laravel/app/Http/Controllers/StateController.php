<?php

namespace App\Http\Controllers;

use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    public function states(Request $request)
    {
        try {
            $method = $request->method();
            switch ($method) {
                case $method == 'POST': {
                        $rules = [
                            'state_name' => 'required|string|max:100',
                            'state_code' => 'required|string|max:10',
                            'latitude' => 'required|numeric',
                            'logitude' => 'required|numeric'
                        ];
                        break;
                    }
                case $method == 'GET': {
                        $rules = [
                            'state_id' => 'required|integer|min:1|exists:master_states,id'
                        ];
                        break;
                    }
                case $method == 'PUT': {
                        $rules = [
                            'state_id' => 'required|integer|min:1|exists:master_states,id',
                            'state_name' => 'required|string|max:100',
                            'state_code' => 'required|string|max:10',
                            'latitude' => 'required|numeric',
                            'logitude' => 'required|numeric'
                        ];
                        break;
                    }
                case $method == "DELETE": {
                        $rules = [
                            'state_id' => 'required|integer|min:1|exists:master_states,id'
                        ];
                        break;
                    }
            }
            if ($validate = parent::validation($request->all(), $rules)) {
                return $validate;
            }
            switch ($method) {
                case $method == 'POST': {
                        $state = new State();
                        $state->state_name = ucwords($request->state_name);
                        $state->state_code = strtoupper($request->state_code);
                        $state->state_latitude = $request->latitude;
                        $state->state_logitude = $request->logitude;
                        $result = $state->save();
                        if ($result) {
                            return parent::cres('State has added successfully. Id: ' . $state->id, parent::SUCCESS, ['state_id' => $state->id]);
                        } else {
                            return parent::cres('State can not be added.');
                        }
                        break;
                    }
                case $method == 'GET': {
                        $state = (new State)->find($request->state_id);
                        $state->cities = $state->cities;
                        // echo "<pre>";
                        // print_r($state->toArray());
                        // die;
                        if($state->toArray()){
                            return view('showData', $state);
                        }else{
                            return view('noDataFound');
                        }
                        break;
                    }
                case $method == 'PUT': {
                        $state = (new State())->find($request->state_id);
                        $state->state_name = ucwords($request->state_name);
                        $state->state_code = strtoupper($request->state_code);
                        $state->state_latitude = $request->latitude;
                        $state->state_logitude = $request->logitude;
                        $result = $state->save();
                        if ($result) {
                            return parent::cres('State has updated successfully.', parent::SUCCESS);
                        } else {
                            return parent::cres('State can not be updated.');
                        }
                        break;
                    }
                case $method == "DELETE": {
                        $state = (new State())->find($request->state_id);
                        $result = $state->delete();
                        if($result){
                            return parent::cres('State has deleted successfully.', parent::SUCCESS);
                        }else{
                            return parent::cres('Unable to delete state.');
                        }
                        break;
                    }
            }
            return response()->json('success');
        } catch (Exception $e) {
            return parent::cres($e->getMessage());
        }
    }
}
