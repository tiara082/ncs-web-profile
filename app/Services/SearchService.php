<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchService
{
    //full text search
    public function globalSearch(string $query, int $limit = 20)
    {
        $results = [
            'members' => $this->searchMembers($query, $limit),
            'galleries' => $this->searchGalleries($query, $limit),
            'archives' => $this->searchArchives($query, $limit),
            'contents' => $this->searchContents($query, $limit),
        ];

        return $results;
    }
    
    //search member tbl
    public function searchMembers(string $query, int $limit = 10)
    {
        return DB::table('members')
            ->selectRaw("
                id,
                member_name,
                member_role,
                member_email,
                ts_rank(search_vector, plainto_tsquery('english', ?)) as rank
            ", [$query])
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$query])
            ->orderBy('rank', 'desc')
            ->limit($limit)
            ->get();
    }

    //gallery tbl
    public function searchGalleries(string $query, int $limit = 10)
    {
        return DB::table('galleries')
            ->selectRaw("
                id,
                title,
                description,
                file_path,
                gallery_type,
                created_at,
                ts_rank(search_vector, plainto_tsquery('english', ?)) as rank
            ", [$query])
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$query])
            ->orderBy('rank', 'desc')
            ->limit($limit)
            ->get();
    }

    //archive tbl
    public function searchArchives(string $query, int $limit = 10)
    {
        return DB::table('archives')
            ->selectRaw("
                id,
                title,
                description,
                file_path,
                type,
                created_at,
                ts_rank(search_vector, plainto_tsquery('english', ?)) as rank
            ", [$query])
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$query])
            ->orderBy('rank', 'desc')
            ->limit($limit)
            ->get();
    }

    //content tbl
    public function searchContents(string $query, int $limit = 10)
    {
        return DB::table('contents')
            ->selectRaw("
                id,
                title,
                body,
                content_type,
                created_at,
                ts_rank(search_vector, plainto_tsquery('english', ?)) as rank
            ", [$query])
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$query])
            ->orderBy('rank', 'desc')
            ->limit($limit)
            ->get();
    }

    //search /w highlight
    public function searchWithHighlight(string $table, string $query, int $limit = 10)
    {
        return DB::table($table)
            ->selectRaw("
                *,
                ts_rank(search_vector, plainto_tsquery('english', ?)) as rank,
                ts_headline('english', title, plainto_tsquery('english', ?)) as highlighted_title
            ", [$query, $query])
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$query])
            ->orderBy('rank', 'desc')
            ->limit($limit)
            ->get();
    }
}
