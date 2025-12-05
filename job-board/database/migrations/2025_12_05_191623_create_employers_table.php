<?php

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(User::class) -> nullable() -> constrained();
            $table->timestamps();
        });

        Schema::table('jobs', function (Blueprint $table) {

            $table->foreignIdFor(Employer::class) -> constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // First drop the foreign key constraint
            $table->dropForeign('jobs_employer_id_foreign');

            // Then drop the column
            $table->dropColumn('employer_id');
        });

        Schema::dropIfExists('employers');
    }
};
