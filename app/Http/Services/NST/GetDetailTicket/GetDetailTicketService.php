<?php


namespace App\Http\Services\NST\GetDetailTicket;


use App\Exceptions\SchematicsException;
use App\Models\NstTicket;

class GetDetailTicketService
{
	public function execute(GetDetailTicketRequest $request): GetDetailTicketResponse
	{
		$nst_ticket = NstTicket::where(
			'user_id',
			$request->getUser()->id
		)->first();

        if (!$nst_ticket) {
            throw new SchematicsException("Tiket tidak ditemukan", 1001);
        }

		return new GetDetailTicketResponse(
			$nst_ticket->id,
			$nst_ticket->user_id,
			$nst_ticket->created_at
		);
	}
}
