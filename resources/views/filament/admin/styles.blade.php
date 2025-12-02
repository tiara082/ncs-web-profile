<style>
/* Custom NCS Lab Theme - Enhanced Design */

/* Light Mode Sidebar - Gradient Cyan to Navy with Pattern */
[x-cloak] { display: none !important; }

aside.fi-sidebar {
    background: linear-gradient(180deg, #66bbf2 0%, #222f7f 100%) !important;
    position: relative;
}

aside.fi-sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.08) 0%, transparent 50%);
    pointer-events: none;
}

/* Sidebar Brand Logo Area with Glow */
.fi-sidebar-header {
    background: rgba(255, 255, 255, 0.1) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    position: relative;
}

.fi-sidebar-header::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
}

/* Sidebar Navigation Items with Enhanced Effects */
.fi-sidebar-nav-item {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    color: rgba(255, 255, 255, 0.9);
    position: relative;
    overflow: hidden;
}

.fi-sidebar-nav-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #fff, rgba(255,255,255,0.5));
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.fi-sidebar-nav-item:hover {
    background: rgba(255, 255, 255, 0.18) !important;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.fi-sidebar-nav-item:hover::before {
    transform: scaleY(1);
}

.fi-sidebar-nav-item.fi-active {
    background: rgba(255, 255, 255, 0.28) !important;
    font-weight: 600;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

.fi-sidebar-nav-item.fi-active::before {
    transform: scaleY(1);
}

/* Sidebar Group Labels */
.fi-sidebar-group-label {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

/* Topbar */
header.fi-topbar {
    background: white !important;
    border-bottom: 2px solid #66bbf2 !important;
    box-shadow: 0 4px 12px rgba(102, 187, 242, 0.1);
    position: relative;
}

header.fi-topbar::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, #66bbf2 50%, transparent);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 1; }
}

/* Main Content Background with Animated Pattern */
main.fi-main {
    background: 
        linear-gradient(135deg, #fafbfc 0%, #f0f7fc 50%, #e6f5fd 100%);
    background-size: 400% 400%;
    animation: gradientShift 20s ease infinite;
    position: relative;
}

main.fi-main::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 15% 20%, rgba(102, 187, 242, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 85% 80%, rgba(34, 47, 127, 0.06) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(102, 187, 242, 0.04) 0%, transparent 60%);
    pointer-events: none;
    animation: floatPattern 15s ease-in-out infinite;
}

@keyframes floatPattern {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 1;
    }
    50% { 
        transform: translate(20px, -20px) scale(1.05);
        opacity: 0.8;
    }
}

/* Stats Overview Cards with Enhanced Visual Effects */
.fi-wi-stats-overview-stat {
    background: 
        linear-gradient(135deg, rgba(102, 187, 242, 0.12) 0%, rgba(34, 47, 127, 0.08) 100%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.8), transparent);
    border: 1px solid rgba(102, 187, 242, 0.3);
    border-radius: 1.25rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.fi-wi-stats-overview-stat::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(102, 187, 242, 0.15) 0%, transparent 70%);
    transform: rotate(0deg);
    transition: transform 0.8s ease;
}

.fi-wi-stats-overview-stat:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 20px 40px -12px rgba(102, 187, 242, 0.35),
        0 0 0 1px rgba(102, 187, 242, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    border-color: #66bbf2;
}

.fi-wi-stats-overview-stat:hover::before {
    transform: rotate(180deg);
}

/* Stat Icon Glow Effect */
.fi-wi-stats-overview-stat-icon {
    transition: all 0.4s ease;
    filter: drop-shadow(0 2px 4px rgba(102, 187, 242, 0.2));
}

.fi-wi-stats-overview-stat:hover .fi-wi-stats-overview-stat-icon {
    transform: scale(1.15) rotate(5deg);
    filter: drop-shadow(0 4px 12px rgba(102, 187, 242, 0.5));
}

/* Stat Value Animation */
.fi-wi-stats-overview-stat-value {
    background: linear-gradient(135deg, #222f7f, #66bbf2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Tables with Enhanced Design */
.fi-ta-table {
    border-radius: 1.25rem;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(102, 187, 242, 0.1);
    border: 1px solid rgba(102, 187, 242, 0.2);
}

.fi-ta-header-cell {
    background: linear-gradient(135deg, #66bbf2 0%, #339de4 50%, #222f7f 100%);
    color: white !important;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.05em;
    position: relative;
    box-shadow: 0 2px 8px rgba(102, 187, 242, 0.3);
}

.fi-ta-header-cell::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
}

.fi-ta-row {
    transition: all 0.3s ease;
    position: relative;
}

.fi-ta-row:hover {
    background: linear-gradient(90deg, rgba(102, 187, 242, 0.08), rgba(102, 187, 242, 0.04), rgba(102, 187, 242, 0.08)) !important;
    transform: scale(1.01);
    box-shadow: 0 4px 12px rgba(102, 187, 242, 0.1);
}

.fi-ta-row::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(180deg, #66bbf2, #222f7f);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.fi-ta-row:hover::before {
    opacity: 1;
}

/* Buttons with 3D Effect */
button.fi-btn-primary,
a.fi-btn-primary {
    background: linear-gradient(135deg, #66bbf2 0%, #4daceb 50%, #339de4 100%) !important;
    border: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 4px 12px rgba(102, 187, 242, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

button.fi-btn-primary::before,
a.fi-btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

button.fi-btn-primary:hover::before,
a.fi-btn-primary:hover::before {
    left: 100%;
}

button.fi-btn-primary:hover,
a.fi-btn-primary:hover {
    background: linear-gradient(135deg, #4daceb 0%, #339de4 50%, #2676b3 100%) !important;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 12px 24px rgba(102, 187, 242, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.4),
        0 0 20px rgba(102, 187, 242, 0.3);
}

button.fi-btn-primary:active,
a.fi-btn-primary:active {
    transform: translateY(-1px) scale(0.98);
}

/* Forms */
input.fi-input:focus,
textarea.fi-input:focus,
select.fi-input:focus {
    border-color: #66bbf2 !important;
    box-shadow: 0 0 0 3px rgba(102, 187, 242, 0.15) !important;
}

/* Page Heading with Animated Gradient */
h1.fi-header-heading {
    background: linear-gradient(90deg, #222f7f 0%, #66bbf2 50%, #222f7f 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
    animation: gradientText 4s linear infinite;
    position: relative;
    display: inline-block;
}

h1.fi-header-heading::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #66bbf2, transparent);
    border-radius: 2px;
}

@keyframes gradientText {
    0% { background-position: 0% center; }
    100% { background-position: 200% center; }
}

/* Cards */
.fi-section,
.fi-card {
    border-radius: 1.25rem;
    border: 1px solid rgba(102, 187, 242, 0.2);
    background: white !important;
    box-shadow: 0 4px 12px rgba(102, 187, 242, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.fi-section::before,
.fi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(102, 187, 242, 0.4), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.fi-section:hover,
.fi-card:hover {
    box-shadow: 
        0 12px 32px rgba(102, 187, 242, 0.15),
        0 0 0 1px rgba(102, 187, 242, 0.3),
        0 1px 0 rgba(255, 255, 255, 1) inset;
    border-color: rgba(102, 187, 242, 0.4);
    transform: translateY(-2px);
}

.fi-section:hover::before,
.fi-card:hover::before {
    opacity: 1;
}

/* Scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #66bbf2 0%, #222f7f 100%);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #4daceb 0%, #445bbb 100%);
}

/* Enhanced Animations */
@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Widget Staggered Animation */
.fi-wi {
    animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) backwards;
}

.fi-wi:nth-child(1) { animation-delay: 0.1s; }
.fi-wi:nth-child(2) { animation-delay: 0.2s; }
.fi-wi:nth-child(3) { animation-delay: 0.3s; }
.fi-wi:nth-child(4) { animation-delay: 0.4s; }
.fi-wi:nth-child(5) { animation-delay: 0.5s; }
.fi-wi:nth-child(6) { animation-delay: 0.6s; }

/* Page Content Animation */
.fi-main > * {
    animation: scaleIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) backwards;
}

/* ===== DARK MODE STYLES ===== */

/* Dark Mode Sidebar */
.dark aside.fi-sidebar {
    background: linear-gradient(180deg, rgb(15 23 42) 0%, rgb(30 41 59) 100%) !important;
}

/* Dark Mode Topbar */
.dark header.fi-topbar {
    background: rgb(15 23 42) !important;
    border-bottom: 1px solid rgb(51 65 85) !important;
}

/* Dark Mode Main */
.dark main.fi-main {
    background: linear-gradient(135deg, rgb(15 23 42) 0%, rgb(30 41 59) 50%, rgb(51 65 85) 100%);
}

/* Dark Mode Cards */
.dark .fi-section,
.dark .fi-card {
    background: rgb(30 41 59) !important;
    border: 1px solid rgb(51 65 85);
}

/* Dark Mode Stats */
.dark .fi-wi-stats-overview-stat {
    background: linear-gradient(135deg, rgba(102, 187, 242, 0.15) 0%, rgba(34, 47, 127, 0.25) 100%);
    border: 1px solid rgba(102, 187, 242, 0.3);
}

/* Dark Mode Tables */
.dark .fi-ta-header-cell {
    background: linear-gradient(90deg, rgba(102, 187, 242, 0.3) 0%, rgba(34, 47, 127, 0.4) 100%);
}

.dark .fi-ta-row:hover {
    background: rgba(102, 187, 242, 0.1) !important;
}

/* Dark Mode Forms */
.dark input.fi-input,
.dark textarea.fi-input,
.dark select.fi-input {
    background: rgb(15 23 42) !important;
    border-color: rgb(51 65 85) !important;
    color: rgb(226 232 240) !important;
}

.dark input.fi-input:focus,
.dark textarea.fi-input:focus,
.dark select.fi-input:focus {
    border-color: #66bbf2 !important;
    background: rgb(30 41 59) !important;
}

/* Dark Mode Heading */
.dark h1.fi-header-heading {
    background: linear-gradient(90deg, #66bbf2 0%, #4daceb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Dark Mode Scrollbar */
.dark ::-webkit-scrollbar-track {
    background: rgb(15 23 42);
}

.dark ::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, rgba(102, 187, 242, 0.5) 0%, rgba(34, 47, 127, 0.6) 100%);
}

/* ===== ADDITIONAL ENHANCEMENTS ===== */

/* Badge Styling */
.fi-badge {
    padding: 0.375rem 0.875rem;
    border-radius: 9999px;
    font-weight: 600;
    font-size: 0.75rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.fi-badge:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Modal Enhancements */
.fi-modal {
    animation: modalZoom 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes modalZoom {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Dropdown Menu */
.fi-dropdown-panel {
    animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Notification Toast */
.fi-no {
    animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Loading Spinner */
.fi-loading-indicator {
    animation: spin 1s linear infinite, pulse 2s ease-in-out infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Search Input Glow */
input[type="search"],
.fi-global-search-input {
    transition: all 0.3s ease;
}

input[type="search"]:focus,
.fi-global-search-input:focus {
    box-shadow: 
        0 0 0 4px rgba(102, 187, 242, 0.15),
        0 0 20px rgba(102, 187, 242, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}

/* Breadcrumb Styling */
.fi-breadcrumbs {
    animation: fadeInUp 0.5s ease;
}

/* Action Button Hover */
.fi-ac-action {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.fi-ac-action:hover {
    transform: scale(1.1) rotate(5deg);
}

/* Toggle Switch Enhancement */
.fi-toggle {
    transition: all 0.3s ease;
}

.fi-toggle:checked {
    box-shadow: 0 0 12px rgba(102, 187, 242, 0.5);
}

/* Tooltip */
[data-tooltip] {
    position: relative;
}

/* Pagination Animation */
.fi-pagination-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.fi-pagination-item:hover {
    transform: translateY(-2px) scale(1.05);
}

/* Avatar Glow */
.fi-avatar {
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(102, 187, 242, 0.2);
}

.fi-avatar:hover {
    box-shadow: 0 4px 16px rgba(102, 187, 242, 0.4);
    transform: scale(1.05);
}

/* Empty State */
.fi-ta-empty-state {
    animation: fadeInUp 0.6s ease;
}

/* Ripple Effect for Clicks */
@keyframes ripple {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(4);
        opacity: 0;
    }
}
</style>
