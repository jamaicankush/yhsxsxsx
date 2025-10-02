use App\Http\Controllers\Admin\AdThesisController as AdminAdThesisController;

Route::prefix('admin')->group(function () {
    Route::resource('ad-theses', AdminAdThesisController::class);
});