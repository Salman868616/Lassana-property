# Visitors and campaign reporting

Implemented 7 October 2026. Admin opens **Marketing reports** from the sidebar or **Manage campaigns** in Management overview.

## Visitors

Public homepage, listings, property details, agents, About and Contact pages count successful HTML GET requests. Dashboard/account pages, JSON, failures, prefetches, known crawler user agents and signed-in seller/agent/staff accounts are excluded. Guest and buyer browsing counts.

Visitors means anonymous browser sessions, not unique people. A random session token is hashed with the application key. No IP address, email, full URL, query string or user agent is stored in visitor records. Reloads increase page views but not visitor counts. A session spanning days is counted once in the 30-day total, and once on each visited day. Days use Asia/Colombo. Clearing cookies, logout/session invalidation, session expiry or another browser can count as another visitor. Bot exclusion is heuristic, not guaranteed.

Collection starts after migration. No historical traffic is invented or imported. Local development traffic is labelled separately and is not evidence of live customer traffic. Set MARKETING_TRACKING_ENABLED=false to stop new visitor collection and campaign attribution. Existing reports remain readable. Deploy to a separate production database to avoid mixing local test traffic with real visitors.

## Campaigns and spending

1. Admin creates a campaign and copies the generated advert link.
2. Use that link in an advert, or retain its utm_campaign code on another public property link.
3. A visitor arriving through a recognised active code stores the most recent valid campaign in the server session. Direct visits and invalid codes do not overwrite it.
4. New property enquiries, buyer property requests and inspection/LGC requests created in the same session receive that campaign for up to 30 days. Normal session expiry can shorten that window. Login session regeneration preserves the attribution. Existing leads and legacy enquiry conversions are not backfilled. Posted campaign IDs are ignored.
5. Admin records actual spending in LKR with a date and reference. References are unique per campaign, including voided entries. Incorrect entries can be voided with a reason, then replaced using a new reference. Creator/recorder and void actor/time are retained. Pausing stops new campaign touches; existing valid touches can still convert.

All campaign figures are all-time: non-voided recorded spending divided by attributed CRM lead records. A lead is a submitted record, not necessarily a unique person or a sale. Calls and WhatsApp chats are not automatically tracked. Tracking links show observed attribution, not proof that an advert caused a sale.

Missing spending is shown as Not recorded. With zero leads, CPL is unavailable. An explicitly recorded zero spend with leads yields zero CPL. The combined CPL uses only campaigns with at least one non-voided spending entry, and the leads belonging to those same campaigns; it does not divide campaign spend by every CRM lead. Campaign costs do not change company revenue totals.

## Deployment and checks

Run `php artisan migrate` and `php artisan view:clear`. The new migration adds campaigns, spending and anonymous daily visitor records, and a nullable campaign relationship on CRM leads. Existing leads remain unattributed.

Run `php artisan test --filter="MarketingReportingTest|ManagementDashboardTest|EnquiryCaptureTest|BuyerServiceRequestTest|PropertyRequestTest"`.

Manual check: create a campaign as admin, open its link in a separate guest browser session, send an enquiry, record spending and confirm the campaign lead count/CPL. Repeat browsing in that guest session: visitors should stay unchanged and page views increase. Do not use a logged-in staff browser to test visitor counting.
