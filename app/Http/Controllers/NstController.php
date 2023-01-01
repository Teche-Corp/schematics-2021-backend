<?php


namespace App\Http\Controllers;


use App\Http\Services\NST\CreateTicket\CreateTicketRequest;
use App\Http\Services\NST\CreateTicket\CreateTicketService;
use App\Http\Services\NST\GetDetailTicket\GetDetailTicketRequest;
use App\Http\Services\NST\GetDetailTicket\GetDetailTicketService;
use App\Models\Mechanism\UnitOfWork;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class NstController extends Controller
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
}