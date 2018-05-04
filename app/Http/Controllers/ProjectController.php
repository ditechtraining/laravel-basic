<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectWithoutCompanyParamRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    /**
     * @param Project $project
     * @return Project
     */
    public function show(Project $project) : Project
    {
        return $project;
    }

    /**
     * @param ProjectRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function create(ProjectRequest $request, Company $company)
    {
        $project = $company->projects()
            ->create($request->all());

        return new JsonResponse($project, Response::HTTP_CREATED);
    }

    /**
     * @param ProjectRequest $request
     * @return JsonResponse
     */
    public function createWithAssociate(ProjectWithoutCompanyParamRequest $request)
    {

        $responseCode = Response::HTTP_CREATED;
        $response = [
            'message' => null,
            'data' => null
        ];

        $novoProjeto = new Project($request->all());
        $novoProjeto->company()->associate($request->company_id);
        if ($novoProjeto->save()) {
            $response['message'] = 'Cadastro realizado com sucesso';
            $response['data'] = $novoProjeto;
        } else {
            $response['message'] = 'Falha no cadastro dos dados';
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return new JsonResponse(
            $response,
            $responseCode
        );
    }

    /**
     * @param ProjectRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $responseCode = Response::HTTP_OK;
        $response = [
            'message' => null,
            'data' => null
        ];

        if ($project->update($request->all())) {
            $response['message'] = 'Dados alterados com sucesso';
            $response['data'] = $project;
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
     * @param Project $project
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(Project $project)
    {
        $responseCode = Response::HTTP_OK;
        $message =  null;

        if ($project->delete()) {
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
