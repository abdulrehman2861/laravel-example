<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Repositories\Interfaces\DatabaseManagementRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Config;

class DatabaseManagementRepository implements DatabaseManagementRepositoryInterface
{
    /**
     * dump database in sql format
     * @return file
     * @throws \Exception
     * @throws \Throwable
     */
    public function exportDatabase()
    {
        $database = Config::get('database.connections.mysql.database');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password');
        $filename = 'database_backup_' . date('Y_m_d_H_i_s') . '.sql';
        $command = "mysqldump --user={$username} --password={$password} {$database} > {$filename}";
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
        return $filename;
    }

    /**
     * import database from sql file
     * @param UploadedFile $data
     * @return bool
     */
    public function importDatabase($data)
    {
        $database = Config::get('database.connections.mysql.database');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password');
        $command = "mysql --user={$username} --password={$password} {$database} < {$data}";
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
        return true;
    }
}
