<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("dossier_id");
            $table->unsignedBigInteger("type_id");
            $table->string("libelle");
            $table->text("description")->nullable();
            $table->double("prixHt");
            $table->double("prixTva");
            $table->double("prixTtc");
            $table->double("tauxTva");
            $table->timestamps();
            $table->foreign("dossier_id")->references("id")->on("dossiers")->onDelete("cascade");
            $table->foreign("type_id")->references("id")->on("types")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges');
    }
}
