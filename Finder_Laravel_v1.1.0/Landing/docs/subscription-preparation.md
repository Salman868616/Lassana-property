# T26 subscription preparation

Prepared on 7 October 2026 for the guideline's October Week 3 database preparation. Selling subscriptions remains Phase 2.

The additive migration creates:

- `subscription_plans`: unique code, name, nullable price, currency, nullable billing interval, inactive flag and timestamps. Free, Professional and Premium are seeded once by the migration. All are inactive. No prices or billing periods have been assumed, including the Free placeholder.
- `agent_subscriptions`: agent and plan references, draft status, nullable agreed price and lifecycle dates, currency and timestamps. Foreign keys retain plan/user references. No agent subscriptions are automatically created.

Models expose the plan/subscription/agent relationships. Mass assignment is guarded. Eloquent saves reject plan activation, non-draft subscription lifecycle changes and subscriptions for users without an agent role. These are application-level safeguards, not a billing implementation or protection against direct database administration.

There are no subscription routes, purchase screens, recurring jobs, payment provider integrations, entitlement checks or subscription revenue entries. Existing agent access and listing/verification revenue work exactly as before. The management dashboard's subscription revenue remains unavailable, not zero or estimated revenue.

Before Phase 2, the company must approve pricing, billing periods, benefits, eligibility, renewals and cancellation/refund rules. That phase must implement authorized lifecycle transitions, billing and payment reconciliation, audit history and tests before removing the model activation safeguards. A prepared record does not establish a paid entitlement.

Apply with `php artisan migrate`. Validate with `php artisan test --filter="SubscriptionPreparationTest|RevenueTrackingTest|ManagementDashboardTest|AgentPropertyTest|AgentProfileTest"`.
