<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Exception;

class CityController extends Controller
{
    public function cities(Request $request)
    {
        try {
            $method = $request->method();
            switch ($method) {
                case $method == 'POST': {
                        $rules = [
                            'city_name' => 'required|string|max:100',
                            'city_code' => 'required|string|max:10',
                            'state_id' => 'required|integer|min:1|exists:master_states,id',
                            'latitude' => 'required|numeric',
                            'logitude' => 'required|numeric'
                        ];
                        break;
                    }
                case $method == 'GET': {
                        $rules = [
                            'city_id' => 'required|integer|min:1'
                        ];
                        break;
                    }
                case $method == 'PUT': {
                        $rules = [
                            'city_id' => 'required|integer|min:1|exists:master_cities,id',
                            'city_name' => 'required|string|max:100',
                            'state_id' => 'required|integer|min:1|exists:master_states,id',
                            'city_code' => 'required|string|max:10',
                            'latitude' => 'required|numeric',
                            'logitude' => 'required|numeric'
                        ];
                        break;
                    }
                case $method == "DELETE": {
                        $rules = [
                            'city_id' => 'required|integer|min:1|exists:master_cities,id'
                        ];
                        break;
                    }
            }
            if ($validate = parent::validation($request->all(), $rules)) {
                return $validate;
            }
            switch ($method) {
                case $method == 'POST': {
                        $city = new City();
                        $city->city_name = ucwords($request->city_name);
                        $city->city_code = strtoupper($request->city_code);
                        $city->state_id = $request->state_id;
                        $city->city_latitude = $request->latitude;
                        $city->city_logitude = $request->logitude;
                        $result = $city->save();
                        if ($result) {
                            return parent::cres('City has added successfully. Id: ' . $city->id, parent::SUCCESS, ['state_id' => $city->id]);
                        } else {
                            return parent::cres('State can not be added.');
                        }
                        break;
                    }
                case $method == 'GET': {
                        return parent::cres('State has found.', parent::SUCCESS);
                        break;
                    }
                case $method == 'PUT': {
                        $city = (new city())->find($request->city_id);
                        $city->city_name = ucwords($request->city_name);
                        $city->city_code = strtoupper($request->city_code);
                        $city->state_id = $request->state_id;
                        $city->city_latitude = $request->latitude;
                        $city->city_logitude = $request->logitude;
                        $result = $city->save();
                        if ($result) {
                            return parent::cres('city has updated successfully.', parent::SUCCESS);
                        } else {
                            return parent::cres('city can not be updated.');
                        }
                        break;
                    }
                case $method == "DELETE": {
                        $city = (new city())->find($request->city_id);
                        $result = $city->delete();
                        if ($result) {
                            return parent::cres('city has deleted successfully.', parent::SUCCESS);
                        } else {
                            return parent::cres('Unable to delete city.');
                        }
                        break;
                    }
            }
        } catch (Exception $e) {
            return parent::cres($e->getMessage());
        }
    }
}
