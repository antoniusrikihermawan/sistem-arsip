{{-- SVG Illustration: Arsip Surat / Document Management --}}
<svg viewBox="0 0 500 400" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Desk -->
    <rect x="60" y="310" width="380" height="8" rx="4" fill="rgba(255,255,255,0.15)"/>

    <!-- Folder back -->
    <rect x="120" y="120" width="260" height="190" rx="12" fill="rgba(255,255,255,0.12)"/>
    <!-- Folder tab -->
    <path d="M120 132C120 125.373 125.373 120 132 120H200L215 140H368C374.627 140 380 145.373 380 152V298C380 304.627 374.627 310 368 310H132C125.373 310 120 304.627 120 298V132Z" fill="rgba(255,255,255,0.18)"/>

    <!-- Document 1 -->
    <rect x="155" y="165" width="120" height="120" rx="6" fill="rgba(255,255,255,0.9)"/>
    <rect x="170" y="185" width="60" height="4" rx="2" fill="#4361ee" opacity="0.6"/>
    <rect x="170" y="197" width="90" height="3" rx="1.5" fill="#94a3b8"/>
    <rect x="170" y="207" width="80" height="3" rx="1.5" fill="#94a3b8"/>
    <rect x="170" y="217" width="85" height="3" rx="1.5" fill="#94a3b8"/>
    <rect x="170" y="232" width="70" height="3" rx="1.5" fill="#94a3b8"/>
    <rect x="170" y="242" width="55" height="3" rx="1.5" fill="#94a3b8"/>
    <!-- Stamp -->
    <rect x="224" y="252" width="36" height="20" rx="3" fill="#4361ee" opacity="0.2"/>
    <rect x="230" y="257" width="24" height="4" rx="2" fill="#4361ee" opacity="0.5"/>
    <rect x="232" y="264" width="20" height="3" rx="1.5" fill="#4361ee" opacity="0.35"/>

    <!-- Document 2 (behind, shifted) -->
    <rect x="230" y="155" width="120" height="130" rx="6" fill="rgba(255,255,255,0.7)" transform="rotate(5 290 220)"/>
    <rect x="248" y="178" width="55" height="4" rx="2" fill="#4361ee" opacity="0.4"/>
    <rect x="248" y="190" width="80" height="3" rx="1.5" fill="#94a3b8" opacity="0.6"/>
    <rect x="248" y="200" width="70" height="3" rx="1.5" fill="#94a3b8" opacity="0.6"/>
    <rect x="248" y="210" width="75" height="3" rx="1.5" fill="#94a3b8" opacity="0.6"/>

    <!-- Envelope icon (floating) -->
    <g transform="translate(340, 100)">
        <circle cx="30" cy="30" r="28" fill="rgba(255,255,255,0.2)"/>
        <rect x="12" y="16" width="36" height="26" rx="4" fill="#fff" opacity="0.9"/>
        <path d="M12 20L30 32L48 20" stroke="#4361ee" stroke-width="2.5" stroke-linecap="round" fill="none"/>
    </g>

    <!-- Shield icon (floating) -->
    <g transform="translate(75, 80)">
        <circle cx="22" cy="22" r="20" fill="rgba(255,255,255,0.15)"/>
        <path d="M22 6L10 12V22C10 30 15 37 22 40C29 37 34 30 34 22V12L22 6Z" fill="#fff" opacity="0.85"/>
        <path d="M18 22L21 25L27 19" stroke="#4361ee" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    </g>

    <!-- Search icon (floating) -->
    <g transform="translate(85, 260)">
        <circle cx="16" cy="16" r="15" fill="rgba(255,255,255,0.15)"/>
        <circle cx="14" cy="14" r="7" stroke="#fff" stroke-width="2" fill="none" opacity="0.85"/>
        <line x1="19" y1="19" x2="25" y2="25" stroke="#fff" stroke-width="2" stroke-linecap="round" opacity="0.85"/>
    </g>

    <!-- Checkmark badge -->
    <g transform="translate(360, 250)">
        <circle cx="18" cy="18" r="16" fill="rgba(255,255,255,0.2)"/>
        <circle cx="18" cy="18" r="11" fill="#fff" opacity="0.85"/>
        <path d="M13 18L16.5 21.5L23 15" stroke="#4361ee" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    </g>
</svg>
