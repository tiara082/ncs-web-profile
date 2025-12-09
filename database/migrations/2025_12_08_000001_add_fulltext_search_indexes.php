<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add tsvector columns for full-text search
        DB::statement("ALTER TABLE contents ADD COLUMN search_vector tsvector");
        DB::statement("ALTER TABLE galleries ADD COLUMN search_vector tsvector");
        DB::statement("ALTER TABLE archives ADD COLUMN search_vector tsvector");
        DB::statement("ALTER TABLE members ADD COLUMN search_vector tsvector");

        // Create GIN indexes for fast full-text search
        DB::statement("CREATE INDEX contents_search_idx ON contents USING GIN(search_vector)");
        DB::statement("CREATE INDEX galleries_search_idx ON galleries USING GIN(search_vector)");
        DB::statement("CREATE INDEX archives_search_idx ON archives USING GIN(search_vector)");
        DB::statement("CREATE INDEX members_search_idx ON members USING GIN(search_vector)");

        // CONTENTS table trigger
        DB::statement("
            CREATE OR REPLACE FUNCTION contents_search_trigger() RETURNS trigger AS $$
            BEGIN
                NEW.search_vector := 
                    setweight(to_tsvector('english', COALESCE(NEW.title, '')), 'A') ||
                    setweight(to_tsvector('english', COALESCE(NEW.body, '')), 'B') ||
                    setweight(to_tsvector('english', COALESCE(NEW.content_type, '')), 'C');
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER contents_search_update 
            BEFORE INSERT OR UPDATE ON contents
            FOR EACH ROW EXECUTE FUNCTION contents_search_trigger();
        ");

        // GALLERIES table trigger
        DB::statement("
            CREATE OR REPLACE FUNCTION galleries_search_trigger() RETURNS trigger AS $$
            BEGIN
                NEW.search_vector := 
                    setweight(to_tsvector('english', COALESCE(NEW.title, '')), 'A') ||
                    setweight(to_tsvector('english', COALESCE(NEW.description, '')), 'B') ||
                    setweight(to_tsvector('english', COALESCE(NEW.gallery_type, '')), 'C');
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER galleries_search_update 
            BEFORE INSERT OR UPDATE ON galleries
            FOR EACH ROW EXECUTE FUNCTION galleries_search_trigger();
        ");

        // ARCHIVES table trigger
        DB::statement("
            CREATE OR REPLACE FUNCTION archives_search_trigger() RETURNS trigger AS $$
            BEGIN
                NEW.search_vector := 
                    setweight(to_tsvector('english', COALESCE(NEW.title, '')), 'A') ||
                    setweight(to_tsvector('english', COALESCE(NEW.description, '')), 'B') ||
                    setweight(to_tsvector('english', COALESCE(NEW.type, '')), 'C');
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER archives_search_update 
            BEFORE INSERT OR UPDATE ON archives
            FOR EACH ROW EXECUTE FUNCTION archives_search_trigger();
        ");

        // MEMBERS table trigger
        DB::statement("
            CREATE OR REPLACE FUNCTION members_search_trigger() RETURNS trigger AS $$
            BEGIN
                NEW.search_vector := 
                    setweight(to_tsvector('english', COALESCE(NEW.member_name, '')), 'A') ||
                    setweight(to_tsvector('english', COALESCE(NEW.member_role, '')), 'B') ||
                    setweight(to_tsvector('english', COALESCE(NEW.member_email, '')), 'C');
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER members_search_update 
            BEFORE INSERT OR UPDATE ON members
            FOR EACH ROW EXECUTE FUNCTION members_search_trigger();
        ");

        // Update existing records
        DB::statement("UPDATE contents SET search_vector = 
            setweight(to_tsvector('english', COALESCE(title, '')), 'A') ||
            setweight(to_tsvector('english', COALESCE(body, '')), 'B') ||
            setweight(to_tsvector('english', COALESCE(content_type, '')), 'C')
        ");

        DB::statement("UPDATE galleries SET search_vector = 
            setweight(to_tsvector('english', COALESCE(title, '')), 'A') ||
            setweight(to_tsvector('english', COALESCE(description, '')), 'B') ||
            setweight(to_tsvector('english', COALESCE(gallery_type, '')), 'C')
        ");

        DB::statement("UPDATE archives SET search_vector = 
            setweight(to_tsvector('english', COALESCE(title, '')), 'A') ||
            setweight(to_tsvector('english', COALESCE(description, '')), 'B') ||
            setweight(to_tsvector('english', COALESCE(type, '')), 'C')
        ");

        DB::statement("UPDATE members SET search_vector = 
            setweight(to_tsvector('english', COALESCE(member_name, '')), 'A') ||
            setweight(to_tsvector('english', COALESCE(member_role, '')), 'B') ||
            setweight(to_tsvector('english', COALESCE(member_email, '')), 'C')
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop triggers
        DB::statement("DROP TRIGGER IF EXISTS contents_search_update ON contents");
        DB::statement("DROP TRIGGER IF EXISTS galleries_search_update ON galleries");
        DB::statement("DROP TRIGGER IF EXISTS archives_search_update ON archives");
        DB::statement("DROP TRIGGER IF EXISTS members_search_update ON members");

        // Drop functions
        DB::statement("DROP FUNCTION IF EXISTS contents_search_trigger()");
        DB::statement("DROP FUNCTION IF EXISTS galleries_search_trigger()");
        DB::statement("DROP FUNCTION IF EXISTS archives_search_trigger()");
        DB::statement("DROP FUNCTION IF EXISTS members_search_trigger()");

        // Drop indexes
        DB::statement("DROP INDEX IF EXISTS contents_search_idx");
        DB::statement("DROP INDEX IF EXISTS galleries_search_idx");
        DB::statement("DROP INDEX IF EXISTS archives_search_idx");
        DB::statement("DROP INDEX IF EXISTS members_search_idx");

        // Drop columns
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn('search_vector');
        });
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('search_vector');
        });
        Schema::table('archives', function (Blueprint $table) {
            $table->dropColumn('search_vector');
        });
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('search_vector');
        });
    }
};
