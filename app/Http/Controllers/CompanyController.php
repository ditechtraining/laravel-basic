<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(
            Company::all(),
        Response::HTTP_OK
        );
    }

    /**
     * @param Company $company
     * @return Company
     */
    public function show(Company $company) : Company
    {
        return $company;
    }

    public function create(CompanyRequest $request)
    {
        $company = Company::create($request->all());
        return new JsonResponse($company, Response::HTTP_CREATED);
    }

    /**
     * @param CompanyRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $responseCode = Response::HTTP_OK;
        $response = [
            'message' => null,
            'data' => null
        ];

        if ($company->update($request->all())) {
            $response['message'] = 'Dados alterados com sucesso';
            $response['data'] = $company;
        } else {
            $response['message'] = 'Falha na alteração dos dados';
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return new JsonResponse(
            $response,
            $responseCode
        );
    }

    /**
     * @param Company $company
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(Company $company)
    {
        $responseCode = Response::HTTP_OK;
        $message =  null;

        if ($company->delete()) {
            $message = 'Excluído com sucesso';
        } else {
            $message = 'Falha na exclusão';
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return new JsonResponse(
            [
                'message' => $message
            ],
            $responseCode
        );
    }
}
