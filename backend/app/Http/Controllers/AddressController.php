<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Services\AddressService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    use ResponseTrait;

    public function __construct(private AddressService $addressService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddress($cep)
    {
        try {
            return $address = $this->addressService->getCep($cep);
            return $this->responseSuccess($address, 'Get Address With CEP Fetch Successfully !');
        } catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
