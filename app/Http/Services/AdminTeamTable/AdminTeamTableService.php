<?php

namespace App\Http\Services\AdminTeamTable;

use App\Exceptions\SchematicsException;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use App\Models\NstTicket;

use function PHPUnit\Framework\isNull;

class AdminTeamTableService
{
    public function execute(AdminTeamTableRequest $request)
    {
        /**
         * Can be ordered by verified, default is by creation date.
         * Can be ordered by name.
         */

        /**
         * Laravel's eloquent using `page` in get query param
         * to know the page's count.
         * 
         * The order's must be put on array.
         * {{ _.base }}/?order_by[name]=desc&order_by[created_date]=asc
         */
        $append_order_by = $request->getEvent() == 'nlc' || $request->getEvent() == 'npcj' || $request->getEvent() == 'npcs'? ',team_name' : '';

        Validator::validate(
            [
                'page' => $request->getPage(),
                'search' => $request->getSearchQuery(),
                'order_by' => $request->getOrderBy()
            ],
            [
                'page' => 'nullable|min:1',
                'search' => 'nullable|min:1|max:256',
                'order_by' => 'nullable|array|max:3',
                'order_by.*' => 'nullable|string|in:asc,desc',
                'order_by.*.asc' => 'nullable|string|distinct|in:created_at'.$append_order_by,
                'order_by.*.desc' => 'nullable|string|distinct|in:created_at'.$append_order_by,
            ]
        );

        if ($request->getEvent() == 'nst') {
            return $this->getNst($request);
        }

        /**
         * Tabel isian kolom region, nama tim, verified (yes/no),
         * sekolah, kota, provinsi, ketua (isian langsung nama, email, no telepon, ID Line)
         */
        $data = Team::where('event', $request->getEventWhere())->select('team_id', 'kota_id', 'team_name', 'ketua_id', 'event' /**Ambil dari user nanti */);
        if ($request->getSearchQuery()) {
            $data->where('team_name', 'like', '%'.$request->getSearchQuery().'%');
        }
        if (sizeof($request->getOrderBy() ?? []) > 0) {
            foreach ($request->getOrderBy() as $key => $value) {
                $data->orderBy($key, $value);
            }
        } else {
            $data->orderBy('created_at', 'desc');
        }

        $data->with('kota:id,region_name,regency_name,province_name');
        $data->with('userKetua:id,name,email,phone');
        $data->with('buktiPembayaran:id,team_id,is_verified,need_edit,bukti_bayar_url');

        if ($request->getEvent() == 'npc') {
            $data->with('anggotaKetua:anggota_id,team_id,user_id,anggota_id_line,anggota_id_facebook as anggota_id_discord');
        } else {
            $data->with('anggotaKetua:anggota_id,team_id,user_id,anggota_id_line,anggota_id_facebook');
        }

        $result = $data->paginate(50);

        return new AdminTeamTableResponse($result->lastPage(), $result->currentPage(), $result->items(), $result->perPage(), $result->total());
    }

    protected function getNst(AdminTeamTableRequest $request)
    {
        $result = NstTicket::with('user:id,name,email,phone');

        if (sizeof($request->getOrderBy() ?? []) > 0) {
            foreach ($request->getOrderBy() as $key => $value) {
                $result->orderBy($key, $value);
            }
        } else {
            $result->orderBy('created_at', 'desc');
        }
        
        $result = $result->paginate(50);

        return new AdminTeamTableResponse($result->lastPage(), $result->currentPage(), $result->items(), $result->perPage(), $result->total());
    }
}