<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\RoleList;
use App\Livewire\Lesson\LessonList;
use App\Livewire\Account\RoleUpdate;
use App\Livewire\Account\AccountList;
use App\Livewire\Account\SuspendList;
use App\Livewire\Setting\Profile;
use App\Livewire\Account\AccountCreate;
use App\Livewire\Account\AccountUpdate;
use App\Livewire\Account\PasswordAccountUpdate;
use App\Livewire\Setting\ChangePassword;
use App\Livewire\Account\PasswordAccountList;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Assessment\AsasList;
use App\Livewire\Assessment\AstsList;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\ASHEditQuestionessay;
use App\Livewire\Score\AshScoreList;
use App\Livewire\Score\AstsScoreList;
use App\Livewire\Score\AsasScoreList;
use App\Livewire\Score\AshScorePg;
use App\Livewire\Score\AshScoreEssay;
use App\Livewire\Score\AshScoreEssayId;
use App\Livewire\Rapor\RaporKelasX;
use App\Livewire\Rapor\RaporKelasXI;
use App\Livewire\Rapor\RaporKelasXII;
use App\Livewire\Rapor\CreateRapor;
use App\Livewire\Rapor\RaporList;
use App\Livewire\Rapor\RaporCreate;
use App\Livewire\Rapor\RaporUpdate;
use App\Livewire\Rapor\ShowRapor;

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::redirect('/','/admin/dashboard');
        Route::get('/dashboard', Dashboard::class);
        
        // Settings
        Route::get('/profile', Profile::class);
        Route::get('/ganti-password', ChangePassword::class);

        // Management Account
        Route::prefix('/account')->group(function(){
            Route::get('/', AccountList::class);
            Route::get('/create', AccountCreate::class);
            Route::get('/edit/{uuid}', AccountUpdate::class);
            Route::get('/reset-password', PasswordAccountList::class);
            Route::get('/reset-password/{uuid}', PasswordAccountUpdate::class);
            Route::get('/role', RoleList::class);
            Route::get('/role/{uuid}', RoleUpdate::class);
            Route::get('/suspend', SuspendList::class);
        });

        // Mata Pelajaran
        Route::get('/mata-pelajaran', LessonList::class);

        // Assessment
        Route::prefix('/assessment')->group(function(){
            // Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Route::get('/', ASHList::class);
                Route::get('/create', ASHCreate::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsList::class);
                Route::get('/create', ASHCreate::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Route::get('/', AsasList::class);
                Route::get('/create', ASHCreate::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Penilaian Akhir Semester
            Route::get('/pas', function(){
                abort(503);
            });
        });

        // Input Nilai
        Route::prefix('/input-nilai')->group(function(){
            // Input Nilai Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Route::get('/', AshScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

             // Input Nilai Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

             // Input Nilai Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Route::get('/', AsasScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });
            
             // Input Nilai Penilaian Akhir
            Route::get('/pas', function(){
                abort(503);
            });
        });

        // Rapor
        Route::prefix('/rapor')->group(function(){
            // Rapor Kelas X
            Route::get('/kelas/X', RaporKelasX::class);
            Route::get('/kelas/X/create', CreateRapor::class);
            Route::get('/kelas/X/{uuid}', RaporList::class);
            Route::get('/kelas/X/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/X/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/X/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XI
            Route::get('/kelas/XI', RaporKelasXI::class);
            Route::get('/kelas/XI/create', CreateRapor::class);
            Route::get('/kelas/XI/{uuid}', RaporList::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XII
            Route::get('/kelas/XII', RaporKelasXII::class);
            Route::get('/kelas/XII/create', CreateRapor::class);
            Route::get('/kelas/XII/{uuid}', RaporList::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/show', ShowRapor::class);

            Route::get('/contoh', function(){
                return view('contoh-rapor');
            });
        });
    });
});