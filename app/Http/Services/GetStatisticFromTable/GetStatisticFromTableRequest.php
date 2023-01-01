<?php

namespace App\Http\Services\GetStatisticFromTable;

class GetStatisticFromTableRequest
{
    protected $total_pendaftaran;
    protected $total_pendapatan;
    protected $total_tim_nlc_sudah_bayar;
    protected $total_tim_nlc;
    protected $total_tim_npc_junior_sudah_bayar;
    protected $total_tim_npc_senior_sudah_bayar;
    protected $total_tim_npc_junior;
    protected $total_tim_npc_senior;
    protected $total_tiket_nst_sudah_bayar;
    protected $total_tiket_nst;
    protected $total_tiket_reeva_sudah_bayar;
    protected $total_tiket_reeva;
    protected $total_pendapatan_nlc;
    protected $total_pendapatan_npcj;
    protected $total_pendapatan_npcs;
    protected $total_pendapatan_nst;
    protected $total_pendapatan_reeva;

    public function __construct($total_pendaftaran, $total_pendapatan, $total_tim_nlc_sudah_bayar,
                                $total_tim_nlc, $total_tim_npc_junior_sudah_bayar, $total_tim_npc_senior_sudah_bayar,
                                $total_tim_npc_junior, $total_tim_npc_senior, $total_tiket_nst_sudah_bayar,
                                $total_tiket_nst, $total_tiket_reeva_sudah_bayar, $total_tiket_reeva,
                                $total_pendapatan_nlc,$total_pendapatan_npcj,$total_pendapatan_npcs,$total_pendapatan_nst,
                                $total_pendapatan_reeva)
    {
        $this->total_pendaftaran = $total_pendaftaran;
        $this->total_pendapatan = $total_pendapatan;
        $this->total_tim_nlc_sudah_bayar = $total_tim_nlc_sudah_bayar;
        $this->total_tim_nlc = $total_tim_nlc;
        $this->total_tim_npc_junior_sudah_bayar = $total_tim_npc_junior_sudah_bayar;
        $this->total_tim_npc_senior_sudah_bayar = $total_tim_npc_senior_sudah_bayar;
        $this->total_tim_npc_junior = $total_tim_npc_junior;
        $this->total_tim_npc_senior = $total_tim_npc_senior;
        $this->total_tiket_nst_sudah_bayar = $total_tiket_nst_sudah_bayar;
        $this->total_tiket_nst = $total_tiket_nst;
        $this->total_tiket_reeva_sudah_bayar = $total_tiket_reeva_sudah_bayar;
        $this->total_tiket_reeva = $total_tiket_reeva;
        $this->total_pendapatan_nlc = $total_pendapatan_nlc;
        $this->total_pendapatan_npcj = $total_pendapatan_npcj;
        $this->total_pendapatan_npcs = $total_pendapatan_npcs;
        $this->total_pendapatan_nst = $total_pendapatan_nst;
        $this->total_pendapatan_reeva = $total_pendapatan_reeva;
    }

    public function getTotalPendaftaran(): bool
    {
        return !is_null($this->total_pendaftaran);
    }

    public function getTotalPendapatan(): bool
    {
        return !is_null($this->total_pendapatan);
    }

    public function getTotalTimNlcSudahBayar(): bool
    {
        return !is_null($this->total_tim_nlc_sudah_bayar);
    }

    public function getTotalTimNlc(): bool
    {
        return !is_null($this->total_tim_nlc);
    }

    public function getTotalTimNpcJuniorSudahBayar(): bool
    {
        return !is_null($this->total_tim_npc_junior_sudah_bayar);
    }

    public function getTotalTimNpcSeniorSudahBayar(): bool
    {
        return !is_null($this->total_tim_npc_senior_sudah_bayar);
    }

    public function getTotalTimNpcJunior(): bool
    {
        return !is_null($this->total_tim_npc_junior);
    }

    public function getTotalTimNpcSenior(): bool
    {
        return !is_null($this->total_tim_npc_senior);
    }

    public function getTotalTiketNstSudahBayar(): bool
    {
        return !is_null($this->total_tiket_nst_sudah_bayar);
    }

    public function getTotalTiketNst(): bool
    {
        return !is_null($this->total_tiket_nst);
    }

    public function getTotalTiketReevaSudahBayar(): bool
    {
        return !is_null($this->total_tiket_reeva_sudah_bayar);
    }

    public function getTotalTiketReeva(): bool
    {
        return !is_null($this->total_tiket_reeva);
    }

    public function getTotalPendapatanNlc(): bool
    {
        return !is_null($this->total_pendapatan_nlc);
    }

    public function getTotalPendapatanNpcJunior(): bool
    {
        return !is_null($this->total_pendapatan_npcj);
    }

    public function getTotalPendapatanNpcSenior(): bool
    {
        return !is_null($this->total_pendapatan_npcs);
    }

    public function getTotalPendapatanNst(): bool
    {
        return !is_null($this->total_pendapatan_nst);
    }

    public function getTotalPendapatanReeva(): bool
    {
        return !is_null($this->total_pendapatan_reeva);
    }

}