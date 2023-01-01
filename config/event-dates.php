<?php

return [
	'nlc_closing' => [
		'date' => env('NLC_CLOSING'),
		'error' => 'Pendaftaran Schematics NLC sudah di tutup'
	],
	'nlc_voucher_closing' => [
		'date' => env('NLC_VOUCHER_CLOSING'),
		'error' => 'Voucher NLC sudah tidak dapat digunakan lagi'
	],
	'npc_closing' => [
		'date' => env('NPC_CLOSING'),
		'error' => 'Pendaftaran Schematics NPC sudah di tutup'
	],
	'npc_voucher_closing' => [
		'date' => env('NPC_VOUCHER_CLOSING'),
		'error' => 'Voucher NPC sudah tidak dapat digunakan lagi'
	],
];
