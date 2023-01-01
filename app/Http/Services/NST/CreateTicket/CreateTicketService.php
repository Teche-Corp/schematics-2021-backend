<?php


namespace App\Http\Services\NST\CreateTicket;


use App\Exceptions\SchematicsException;
use App\Models\NstTicket;

class CreateTicketService
{
	public function execute(CreateTicketRequest $request): CreateTicketResponse
	{
		if ($request->getUser()->nstTicket) {
			throw SchematicsException::build('user-has-active-ticket');
		}
		
		$nst_ticket = new NstTicket();
		$nst_ticket->user_id = $request->getUser()->id;
		$nst_ticket->save();

		return new CreateTicketResponse(
			$nst_ticket->id,
			$nst_ticket->user_id,
			$nst_ticket->created_at,
		);
	}
}
