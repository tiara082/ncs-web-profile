<!-- Sub-Header Partial (Navbar + Dynamic Hero) -->
@include('partials.navbar')

@php
    $currentPath = request()->path();
        $heroMap = [
            'organization' => 'hero-organization',
            'activities' => 'hero-activities',
            'agenda' => 'hero-agenda',
            'logo' => 'hero-logo',
            'infrastructure' => 'hero-infrastructure',
            'consulting' => 'hero-consulting',
            'research-documents' => 'hero-publications',
            'vision-mission' => 'hero-vision-mission',
            'profile' => 'hero-profile',
            'community-service' => 'hero-community-service',
        ];    $heroView = $heroMap[$currentPath] ?? 'hero-organization';
@endphp

@include('partials.' . $heroView)
