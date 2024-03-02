<?php

use App\Migrations\AbstractCreateTableMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AbstractCreateTableMigration
{
    protected string $table_name = 'articles';

    public function up(): void
    {
        Schema::create($this->table_name, static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('api_id');
            $table->string('title');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
