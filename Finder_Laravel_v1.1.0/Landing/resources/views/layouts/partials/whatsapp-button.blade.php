@php($floatingWhatsappPhone = \App\Services\PropertyContact::phone(config('company.whatsapp')))
@if($floatingWhatsappPhone)
<style>
.lp-whatsapp-float{position:fixed;right:calc(20px + env(safe-area-inset-right,0px));bottom:calc(24px + env(safe-area-inset-bottom,0px));z-index:1020;display:flex;align-items:center;justify-content:center;width:56px;height:56px;border:2px solid #fff;border-radius:50%;background:#25d366;color:#fff;box-shadow:0 4px 16px #0003;text-decoration:none}
.lp-whatsapp-float:hover{background:#128c7e;color:#fff}
.lp-whatsapp-float:focus-visible{outline:3px solid #142238;outline-offset:4px}
.lp-whatsapp-float svg{width:32px;height:32px;fill:currentColor}
@media(max-width:575px){.lp-whatsapp-float{right:calc(16px + env(safe-area-inset-right,0px));bottom:calc(20px + env(safe-area-inset-bottom,0px));width:52px;height:52px}}
@media print{.lp-whatsapp-float{display:none}}
</style>
<a class="lp-whatsapp-float" href="https://wa.me/{{ substr($floatingWhatsappPhone, 1) }}?text={{ rawurlencode('Hello, I would like to enquire about Lassana Property.') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with Lassana Property on WhatsApp (opens in a new tab)" title="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20.52 3.48A11.86 11.86 0 0 0 12.05 0C5.47 0 .12 5.35.12 11.93c0 2.1.55 4.16 1.6 5.97L.02 24l6.25-1.64a11.93 11.93 0 0 0 5.77 1.47h.01C18.63 23.83 24 18.48 24 11.9c0-3.18-1.24-6.17-3.48-8.42ZM12.05 21.8a9.87 9.87 0 0 1-5.03-1.38l-.36-.22-3.71.97.99-3.62-.24-.37a9.9 9.9 0 0 1-1.52-5.25c0-5.47 4.45-9.92 9.93-9.92a9.84 9.84 0 0 1 7.01 2.91 9.84 9.84 0 0 1 2.9 7.01c0 5.47-4.46 9.87-9.97 9.87Zm5.44-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.47-.88-.79-1.48-1.77-1.65-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.44-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.2 5.09 4.49.71.31 1.26.49 1.69.62.71.22 1.36.19 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.29.17-1.42-.07-.12-.27-.2-.57-.34Z"/></svg>
</a>
@endif