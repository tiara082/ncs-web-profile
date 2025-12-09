<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');
        
        if (empty($query)) {
            return view('search', ['results' => [], 'query' => '']);
        }

        $results = $this->searchService->globalSearch($query);

        return view('search', [
            'results' => $results,
            'query' => $query,
            'total' => array_sum(array_map('count', $results))
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = $this->searchService->globalSearch($query, 5);

        return response()->json([
            'members' => $results['members']->map(fn($m) => [
                'id' => $m->id,
                'title' => $m->member_name,
                'subtitle' => $m->member_role,
                'type' => 'member',
                'url' => route('organization')
            ]),
            'galleries' => $results['galleries']->map(fn($g) => [
                'id' => $g->id,
                'title' => $g->title,
                'subtitle' => $g->gallery_type,
                'type' => 'gallery',
                'url' => route('agenda')
            ]),
            'archives' => $results['archives']->map(fn($a) => [
                'id' => $a->id,
                'title' => $a->title,
                'subtitle' => $a->category,
                'type' => 'archive',
                'url' => route('research-documents')
            ]),
        ]);
    }
}
