<?php

use Botble\ACL\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        if (! Schema::hasTable('re_property_types')) {
            Schema::create('re_property_types', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->string('slug', 60);
                $table->integer('order')->default(0)->unsigned();
            });
        }

        if (! Schema::hasTable('re_properties')) {
            Schema::create('re_properties', function (Blueprint $table) {
                $table->id();
                $table->string('name', 300);
                $table->string('description', 400)->nullable();
                $table->longText('content')->nullable();
                $table->string('location')->nullable();
                $table->text('images')->nullable();
                $table->integer('number_bedroom')->nullable();
                $table->integer('number_bathroom')->nullable();
                $table->integer('number_floor')->nullable();
                $table->integer('square')->nullable();
                $table->decimal('price', 15)->nullable();
                $table->integer('currency_id')->unsigned()->nullable();
                $table->integer('city_id')->unsigned()->nullable();
                $table->string('period', 30)->default('month');
                $table->integer('author_id')->nullable();
                $table->string('author_type', 255)->default(addslashes(User::class));
                $table->integer('category_id')->unsigned()->nullable();
                $table->boolean('is_featured')->default(0);
                $table->string('moderation_status', 60)->default('pending');
                $table->date('expire_date')->nullable();
                $table->boolean('auto_renew')->default(false);
                $table->boolean('never_expired')->default(false);
                $table->string('latitude', 25)->nullable();
                $table->string('longitude', 25)->nullable();
                $table->integer('type_id')->unsigned()->references('id')->on('re_types')->index();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_features')) {
            Schema::create('re_features', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->string('icon', 60)->nullable();
                $table->string('status', 60)->default('published');
            });
        }

        if (! Schema::hasTable('re_property_features')) {
            Schema::create('re_property_features', function (Blueprint $table) {
                $table->integer('property_id')->unsigned();
                $table->integer('feature_id')->unsigned();
            });
        }

        if (! Schema::hasTable('re_currencies')) {
            Schema::create('re_currencies', function (Blueprint $table) {
                $table->id();
                $table->string('title', 60);
                $table->string('symbol', 10);
                $table->tinyInteger('is_prefix_symbol')->unsigned()->default(0);
                $table->tinyInteger('decimals')->unsigned()->default(0);
                $table->integer('order')->default(0)->unsigned();
                $table->tinyInteger('is_default')->default(0);
                $table->double('exchange_rate')->default(1);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_consults')) {
            Schema::create('re_consults', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->string('email', 60);
                $table->string('phone', 60);
                $table->integer('property_id')->unsigned()->nullable();
                $table->longText('content')->nullable();
                $table->string('status', 60)->default('unread');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_accounts')) {
            Schema::create('re_accounts', function (Blueprint $table) {
                $table->id();
                $table->string('first_name', 120);
                $table->string('last_name', 120);
                $table->string('username', 60)->unique()->nullable();
                $table->text('description')->nullable();
                $table->string('gender', 20)->nullable();
                $table->string('email')->unique();
                $table->string('password');
                $table->integer('avatar_id')->unsigned()->nullable();
                $table->date('dob')->nullable();
                $table->string('phone', 25)->unique()->nullable();
                $table->foreignId('city')->nullable();
                $table->string('area', 1000)->nullable();
                $table->string('address', 1000)->nullable();
                $table->boolean('status')->default(1);
                $table->integer('credits')->unsigned()->nullable();
                $table->dateTime('confirmed_at')->nullable();
                $table->string('email_verify_token', 120)->nullable();
                $table->boolean('is_featured')->default(0);
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_account_password_resets')) {
            Schema::create('re_account_password_resets', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token')->index();
                $table->timestamp('created_at')->nullable();
            });
        }

        if (! Schema::hasTable('re_account_activity_logs')) {
            Schema::create('re_account_activity_logs', function (Blueprint $table) {
                $table->id();
                $table->string('action', 120);
                $table->text('user_agent')->nullable();
                $table->string('reference_url', 255)->nullable();
                $table->string('reference_name', 255)->nullable();
                $table->string('ip_address', 39)->nullable();
                $table->integer('account_id')->unsigned()->references('id')->on('re_accounts')->index();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_packages')) {
            Schema::create('re_packages', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->double('price', 15, 2)->unsigned();
                $table->integer('currency_id')->unsigned();
                $table->integer('percent_save')->unsigned()->default(0);
                $table->integer('number_of_listings')->unsigned();
                $table->integer('account_limit')->unsigned()->nullable();
                $table->tinyInteger('order')->default(0);
                $table->tinyInteger('is_default')->unsigned()->default(0);
                $table->text('features')->nullable();
                $table->string('status', 60)->default('published');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_categories')) {
            Schema::create('re_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->string('description', 400)->nullable();
                $table->string('status', 60)->default('published');
                $table->integer('order')->default(0)->unsigned();
                $table->tinyInteger('is_default')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_transactions')) {
            Schema::create('re_transactions', function (Blueprint $table) {
                $table->id();
                $table->integer('credits')->unsigned();
                $table->string('description', 255)->nullable();
                $table->bigInteger('user_id')->unsigned()->nullable();
                $table->bigInteger('account_id')->unsigned()->nullable();
                $table->string('type')->default('add');

                $table->integer('payment_id')->unsigned()->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_accounts_packages')) {
            Schema::create('re_accounts_packages', function (Blueprint $table) {
                $table->id();
                $table->integer('account_id')->unsigned();
                $table->integer('package_id')->unsigned();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_facilities')) {
            Schema::create('re_facilities', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->string('icon', 60)->nullable();
                $table->string('status', 60)->default('published');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_facilities_distances')) {
            Schema::create('re_facilities_distances', function (Blueprint $table) {
                $table->id();
                $table->integer('facility_id')->unsigned();
                $table->integer('reference_id')->unsigned();
                $table->string('reference_type', 255);
                $table->string('distance', 255)->nullable();
            });
        }

        if (! Schema::hasTable('re_reviews')) {
            Schema::create('re_reviews', function (Blueprint $table) {
                $table->id();
                $table->integer('account_id')->unsigned();
                $table->integer('reviewable_id')->unsigned();
                $table->string('reviewable_type');
                $table->float('star');
                $table->text('comment');
                $table->string('status', 60)->default('published');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('re_reviews_meta')) {
            Schema::create('re_reviews_meta', function (Blueprint $table) {
                $table->id();
                $table->string('key')->nullable();
                $table->string('value')->nullable();
                $table->integer('review_id')->unsigned()->references('id')->on('re_reviews')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('re_consults');
        Schema::dropIfExists('re_properties');
        Schema::dropIfExists('re_features');
        Schema::dropIfExists('re_property_features');
        Schema::dropIfExists('re_categories');
        Schema::dropIfExists('re_property_types');
        Schema::dropIfExists('re_currencies');
        Schema::dropIfExists('re_facilities_distances');
        Schema::dropIfExists('re_facilities');
        Schema::dropIfExists('re_accounts');
        Schema::dropIfExists('re_account_password_resets');
        Schema::dropIfExists('re_account_activity_logs');
        Schema::dropIfExists('re_packages');
        Schema::dropIfExists('re_accounts_packages');
        Schema::dropIfExists('re_reviews');
        Schema::dropIfExists('re_reviews_meta');
    }
}
