# Lassana Property — System Audit and Gap Map

**Audit date:** 29 September 2026  
**Timeline task:** T01 — System audit & gap map  
**V1 launch target:** 31 October 2026

## Scope decision

The October V1 scope is frozen around the operational property marketplace: accounts and roles, admin property control, property workflow, published listings, search, detail/gallery/map, seller and buyer actions, enquiry/CRM, verification, dashboards, security, QA, UAT and launch readiness.

Finder template pages remain the presentation layer. A page counts as complete only when its data, validation, authorization, workflow and error handling are connected.

## Current implementation map

| Area | Current page or endpoint | Backend evidence | T01 status | Remaining work |
|---|---|---|---|---|
| Admin property control | `/admin/properties` | `app/Http/Controllers/Admin/PropertyController.php`; admin routes in `routes/web.php` | Working | Add review remarks/history and archive controls |
| Property creation/editing | `/admin/properties/create`, `/admin/properties/{property}/edit` | `properties` migration; `Property` model; image upload/delete | Working | Expand category-specific validation |
| Property workflow | Admin submit, start-review, approve, return-to-draft, publish routes | Admin controller transitions and status checks | Working | Add Sold/Archived states and transition history |
| Public listings | `/properties`, `/listings-real-estate` | `PropertyController@index` and `finderIndex`; published query | Working | Connect Finder filters and sort controls |
| Property details | `/properties/{propertyCode}` | `PropertyController@show`; `resources/views/properties/show.blade.php` | Working | Replace remaining template-only popup links and polish responsive layout |
| Images and map | `/properties-map.json` | `PropertyImage` model; `PropertyController@mapMarkers`; storage link | Working | Add property-specific popup links and verify all coordinates |
| Public enquiry | POST `/properties/{property}/enquiries` | `PropertyEnquiry` model/migration/controller; validation and success message | Working | Add admin enquiry/CRM view |
| Authentication | `/account-signin`, `/account-signup`, `/login`, `/register`, `/logout` | `AuthController.php`; auth and role middleware | Partial | Complete password reset, profile validation and role test matrix |
| Seller operations | Account/listing template pages | Finder Blade pages exist | Not connected | Seller dashboard, own-property access, upload and submit flow |
| Buyer operations | Favorites/account templates | Finder Blade pages exist | Not connected | Save property, inspection request and service request persistence |
| CRM and sales | No complete operational UI | No pipeline/assignment implementation yet | Not started | Enquiries pipeline, assignment, follow-up, notes and dashboards |
| Verification | No complete operational UI | No verification workflow yet | Not started | Basic/Silver checks, remarks and decisions |
| Agent and management | Template pages only | No operational controllers yet | Not started | Agent portal, CEO/manager KPIs and revenue tracking |
| Security/deployment | Local development only | Auth middleware and validation present | Partial | Private document protection, upload/session review, backups and production checks |

## Verified on 29 September

- PHP syntax checks passed for the property and enquiry controllers/models.
- Property and enquiry migrations completed successfully; a second migrate reported `Nothing to migrate`.
- `php artisan route:list --path=properties` shows public listing, detail, map and enquiry routes.
- Admin workflow routes are present for submit, review, approval, return-to-draft and publish.
- Browser smoke checks showed published properties on the public Finder listing, Sri Lankan map markers, LKR map prices, property gallery and enquiry form.

## T01 outcome

**T01 is complete for the current audit pass.** The gap map is the evidence record. The next scheduled item is T02 database architecture, which has already started early through the properties, images, roles and enquiries migrations. Continue by completing the database relationship and fresh-install verification before marking T02 complete.
