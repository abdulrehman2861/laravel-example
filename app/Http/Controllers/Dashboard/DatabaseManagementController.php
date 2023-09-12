<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Interfaces\DatabaseManagementRepositoryInterface;

class DatabaseManagementController extends Controller
{

    private $databaseManagementRepository;

    /**
     * __construct
     *
     * @param  mixed $databaseManagementRepository
     * @return void
     */
    public function __construct(DatabaseManagementRepositoryInterface $databaseManagementRepository)
    {
        $this->databaseManagementRepository = $databaseManagementRepository;
    }

    /**
     * export database in sql format
     * @return file
     * @throws \Exception
     * @throws \Throwable
     */
    public function export()
    {
        $filename = $this->databaseManagementRepository->exportDatabase();
        return response()->download($filename)->deleteFileAfterSend(true);
    }

    /**
     * import database from sql file
     * @param UploadedFile $data
     * @return bool
     */
    public function import(Request $request)
    {
        $this->databaseManagementRepository->importDatabase($request->file('database'));
        return redirect()->route('dashboard')->with('success', 'Database imported successfully');
    }
    
}
