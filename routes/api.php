<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\EventStatisticController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NlcTeamController;
use App\Http\Controllers\NpcTeamController;
use App\Http\Controllers\NstController;
use App\Http\Controllers\ReevaController;
use App\Http\Controllers\RegionController;
use App\Models\UserRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(
	function () {
		Route::post('register', [AuthController::class, 'UserRegister']);
		Route::post('login', [AuthController::class, 'UserLogin']);
		Route::post('forgot-password', [AuthController::class, 'ForgetPassword']);
		Route::post('reset-password', [AuthController::class, 'ResetPassword']);
		Route::post('refresh-auth-token', [AuthController::class, 'RefreshAuthToken']);

		Route::middleware('auth:jwt_guard')->group(
			function () {
				Route::post('get-user-info', [AuthController::class, 'getUserInfo']);
				Route::post('change-password', [AuthController::class, 'ChangePassword']);

				Route::put('edit', [AuthController::class, 'UserEdit']);
			}
		);
	}
);

Route::prefix('auth')->group(
	function() {
        Route::prefix('login')->group(function () {
            Route::any('redirect', [AuthController::class, 'loginRedirect']);
        });
    }
);

Route::prefix('region')->group(
    function () {
        Route::get('list', [RegionController::class, 'listAllRegion']);
    }
);

Route::prefix('nlc')->group(
    function () {
        Route::get('warmup_scoreboard', [NlcTeamController::class, 'warmupScoreboard']);
        Route::get('penyisihan_scoreboard', [NlcTeamController::class, 'penyisihanScoreboard']);
        Route::middleware('auth:jwt_guard')->group(
            function () {
                Route::prefix('team')->group(
                    function () {
                        Route::post('create', [NlcTeamController::class, 'createTeam'])
                            ->middleware('date_before:nlc_closing');
                        Route::post('find', [NlcTeamController::class, 'findTeam']);
                    }
                );

                Route::prefix('communal_voucher')
                    ->group(function () {
                        Route::get('using', [NlcTeamController::class, 'listTeamUsingCommunalVoucher']);
                        Route::post('create', [NlcTeamController::class, 'createCommunalVoucher'])
                            ->middleware('date_before:nlc_voucher_closing');
                    });
            }
		);
	}
);

Route::prefix('npc')->group(function () {
	Route::middleware('auth:jwt_guard')->group(
		function () {
			Route::prefix('team')->group(
				function () {
					Route::middleware('date_before:npc_closing')->group(function () {
						Route::post('junior', [NpcTeamController::class, 'createNpcTeamJunior']);
						Route::post('senior', [NpcTeamController::class, 'createNpcTeamSenior']);
					});
					Route::post('find', [NpcTeamController::class, 'findTeam']);
				}
			);
		}
	);
}
);

Route::prefix('nst')->group(
	function () {
		Route::middleware('auth:jwt_guard')->group(
			function () {
// 				Route::post('create-ticket', [NstController::class, 'createTicket']);
				Route::post('detail-ticket', [NstController::class, 'detailTicket']);
			}
		);
	}
);

Route::prefix('reeva')->group(
	function () {
		Route::middleware('auth:jwt_guard')->group(
			function () {
                Route::post('create-ticket', [ReevaController::class, 'createTicket']);
                Route::post('detail-ticket', [ReevaController::class, 'detailTicket']);
            }
		);
        Route::post('insert_name', [ReevaController::class, 'insertName']);
        Route::post('get_name', [ReevaController::class, 'getName']);
	}
);

Route::group(
	['middleware' => ['auth:jwt_guard', 'role:' . UserRole::ADMIN]],
	function () {
		Route::prefix('admin')->group(
			function () {
				Route::prefix('list')->group(
					function () {
						Route::get('peserta/{event}', [AdminController::class, 'listPeserta'])->where('event', 'nlc|npc');
						Route::get('tim/{event}', [AdminController::class, 'listTim'])->where('event', 'nlc|npcs|npcj|nst');
					}
				);
				Route::prefix('export')->group(
					function () {
						Route::prefix('nlc')->group(
							function () {
                                Route::get('tim', [AdminController::class, 'exportNlcTeamToExcel']);
                            }
                        );
                        Route::prefix('npc')->group(function () {
                            Route::get('tim/{stage}', [AdminController::class, 'exportNpcTeamToExcel'])->where(
                                'stage',
                                'junior|senior'
                            );;
                        });
                        Route::get('nst', [AdminController::class, 'exportNstTicketsToExcel']);
                        Route::get('reeva', [AdminController::class, 'exportReevaTicketsToExcel']);
                        Route::get('export_name', [ReevaController::class, 'exportReevaNameToExcel']);
                    }
				);
				Route::post('detail_tim', [AdminController::class, 'detailTeam']);
				Route::middleware('log_admin')->group(
					function () {
						Route::post('update_tim', [AdminController::class, 'updateTeam']);
						Route::post('delete_tim', [AdminController::class, 'deleteTeam']);
					}
				);
			}
		);
		Route::prefix('statistics')->group(function () {
			Route::any('/', [EventStatisticController::class, 'getFromStatisticTable']);
		});
	}
);

Route::prefix('voucher')->group(
	function () {
		Route::group(
			['middleware' => ['auth:jwt_guard', 'role:' . UserRole::ADMIN]],
			function () {
				Route::post('list', [AdminController::class, 'listVoucher']);
				Route::post('deactivate', [AdminController::class, 'deactivateVoucher']);
				Route::post('activate', [AdminController::class, 'activateVoucher']);
				Route::post('create', [AdminController::class, 'createVoucher']);
			}
		);
	}
);

Route::prefix('pembayaran')->group(
	function () {
		Route::middleware('auth:jwt_guard')->group(
			function () {
				Route::post('apply_voucher', [BuktiController::class, 'applyVoucher']);
				Route::post('revoke_voucher/{event}', [BuktiController::class, 'revokeVoucher'])->where(
					'event',
					'nlc|npcs|npcj'
				);;
			}
		);

		Route::prefix('bukti')->group(
			function () {
				Route::middleware('auth:jwt_guard')->group(
					function () {
						Route::get('/', [BuktiController::class, 'getBuktiPembayaran']);

						/* Upload gambar disatukan di form insert */
						Route::post('insert', [BuktiController::class, 'insertBuktiPembayaran']);
						Route::put('update', [BuktiController::class, 'updateBuktiPembayaran']);

						Route::middleware('role:' . UserRole::ADMIN)->group(
							function () {
								Route::put('verif', [BuktiController::class, 'verifBuktiPembayaran']);
							}
						);
					}
				);
			}
		);
	}
);

Route::prefix('storage')->group(
	function () {
		Route::any('{any}', [FileController::class, 'publicFileGet'])->where('any', '.*');
	}
);

Route::any(
	'/',
	function () {
		return response()->json(
			[
				'status' => 'success',
				'health' => 'ok',
			]
		);
	}
);
