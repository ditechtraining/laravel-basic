<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return new JsonResponse(
            Task::all(),
            Response::HTTP_OK
        );
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function show(Task $task) : Task
    {
        return $task;
    }

    /**
     * @param TaskRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function create(TaskRequest $request, Project $project) : JsonResponse
    {
        $task = $project->tasks()
            ->create($request->all());

        return new JsonResponse($task, Response::HTTP_CREATED);
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(TaskRequest $request, Task $task) : JsonResponse
    {
        $responseCode = Response::HTTP_OK;
        $response = [
            'message' => null,
            'data' => null
        ];

        if ($task->update($request->all())) {
            $response['message'] = 'Dados alterados com sucesso';
            $response['data'] = $task;
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
     * @param Task $task
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Task $task) : JsonResponse
    {
        $responseCode = Response::HTTP_OK;
        $message =  null;

        if ($task->delete()) {
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

    /**
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     */
    public function createTaskWorkTime(Request $request, Task $task) : JsonResponse
    {
        $workTime = $task->workTimes()
            ->create($request->all());

        return new JsonResponse($workTime, Response::HTTP_CREATED);
    }
}
