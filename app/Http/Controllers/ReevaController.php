<?php

namespace App\Http\Controllers;

use App\Exports\ReevaNameExport;
use App\Http\Services\REEVA\CreateTicket\CreateTicketRequest;
use App\Http\Services\REEVA\GetDetailTicket\GetDetailTicketRequest;
use App\Http\Services\REEVA\CreateTicket\CreateTicketService;
use App\Http\Services\REEVA\GetDetailTicket\GetDetailTicketService;
use App\Http\Services\REEVA\GetNameData\GetNameDataRequest;
use App\Http\Services\REEVA\GetNameData\GetNameDataService;
use App\Http\Services\REEVA\InsertReevaData\InsertReevaDataRequest;
use App\Http\Services\REEVA\InsertReevaData\InsertReevaDataService;
use App\Models\Mechanism\UnitOfWork;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class ReevaController extends Controller
{
    private UnitOfWork $unit_of_work;

    /**
     * NstController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

    public function createTicket(): JsonResponse
    {
        $input = new CreateTicketRequest(
            Auth::user()
        );

        /** @var CreateTicketService $service */
        $service = resolve(CreateTicketService::class);

        $this->unit_of_work->begin();
        $response = $service->execute($input);
        $this->unit_of_work->commit();

        return $this->successWithData($response);
    }

    public function detailTicket()
    {
        $input = new GetDetailTicketRequest(
            Auth::user()
        );

        /** @var GetDetailTicketService $service */
        $service = resolve(GetDetailTicketService::class);
        $response = $service->execute($input);

        return $this->successWithData($response);
    }

    /**
     * @throws Throwable
     */
    public function insertName(Request $request): JsonResponse
    {
        $input = new InsertReevaDataRequest($request->input('name'));
        /** @var InsertReevaDataService $processor */
        $processor = resolve(InsertReevaDataService::class);

        $this->unit_of_work->begin();
        try {
            $processor->execute($input);
        } catch (Throwable $exception) {
            $this->unit_of_work->rollback();
            throw $exception;
        }
        $this->unit_of_work->commit();
        return $this->success();
    }

    public function getName(Request $request): JsonResponse
    {
        $input = new GetNameDataRequest($request->input('page'), $request->input('per_page'));
        /** @var GetNameDataService $processor */
        $processor = resolve(GetNameDataService::class);
        $response = $processor->execute($input);
        return $this->successWithData($response);
    }

    public function exportReevaNameToExcel(): BinaryFileResponse
    {
        return Excel::download(new ReevaNameExport(), 'reeva-name-export' . date('d-m-Y') . '.csv');
    }
}
