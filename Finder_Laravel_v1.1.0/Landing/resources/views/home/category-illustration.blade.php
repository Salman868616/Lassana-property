<svg class="lp-home-category-art" viewBox="0 0 120 84" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="{{ __($categoryLabels[0]) }}">
<ellipse cx="60" cy="74" rx="54" ry="7" fill="#F4EBDC"/><circle cx="60" cy="39" r="34" fill="#FAF1E7"/>
<g stroke="#8B1E24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
@if($categorySlug==='land')
<path d="m14 55 44-22 48 21-44 21Z" fill="#EBC9C8"/><path d="m38 44 48 20M36 66l45-23" fill="none" stroke-dasharray="4 4"/><path d="M87 44V18m0 0 16 6-16 6" fill="#FFFDFC"/><path d="M29 45V32"/><path d="m20 33 9-18 10 18Z" fill="#FFFDFC"/>
@elseif($categorySlug==='house')
<path d="M16 40 57 12l42 28" fill="#EBC9C8"/><path d="M25 35v37h65V35L57 14Z" fill="#FFFDFC"/><path d="M49 72V48h18v24" fill="#EBC9C8"/><path d="M34 37h11v12H34zm38 0h11v12H72z" fill="#F4EBDC"/>
@elseif($categorySlug==='apartments-villas')
<path d="M23 73V14h47v59" fill="#FFFDFC"/><path d="M32 25h8v8h-8zm20 0h8v8h-8zM32 43h8v8h-8zm20 0h8v8h-8z" fill="#EBC9C8"/><path d="M40 73V60h14v13M67 50l20-16 22 16" fill="#F4EBDC"/><path d="M73 47v26h29V47L87 36Z" fill="#FFFDFC"/><path d="M82 73V57h12v16" fill="#EBC9C8"/>
@else
<path d="M20 34h80v39H20z" fill="#FFFDFC"/><path d="M25 19h70l10 18H15z" fill="#EBC9C8"/><path d="M31 21v15m15-15v15m15-15v15m15-15v15m15-15v15"/><path d="M30 48h27v14H30zm38 25V48h20v25" fill="#F4EBDC"/>
@endif
</g></svg>
