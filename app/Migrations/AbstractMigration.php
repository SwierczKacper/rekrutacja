<?php

declare(strict_types=1);

namespace App\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

abstract class AbstractMigration extends Migration
{
    protected string $table_name;

    abstract public function up(): void;
    abstract public function down(): void;

    public function hasForeignKey(string $table, string $column): bool
    {
        $fkColumns = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableForeignKeys($table, config('database.connections.mysql.database'));

        return collect($fkColumns)->map(function ($fkColumn) {
            return $fkColumn->getColumns();
        })->flatten()->contains($column);
    }
}
