<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securities', function (Blueprint $table) {
            $table->id();
            $table->string('ticker', 10)->nullable(); // Nullable for bonds/bills
            $table->string('isin', 12)->nullable(); // ISIN code
            $table->string('company_name')->nullable(); // For equities
            $table->string('issuer_name')->nullable(); // For bonds/bills
            $table->enum('security_type', ['equity', 'treasury_bill', 'treasury_bond'])->default('equity');
            $table->string('type')->nullable(); // Specific type within category
            $table->bigInteger('issued_shares')->nullable(); // ISSUEDSHARES
            $table->date('issue_date')->nullable(); // ISSUEDATE
            $table->decimal('rate', 8, 4)->nullable(); // Interest rate for bonds/bills
            $table->date('maturity_date')->nullable(); // MATURITY
            $table->string('currency', 3)->default('UGX'); // Currency
            $table->string('category')->nullable(); // CATEGORY field
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('securities');
    }
}
