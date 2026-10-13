# Account onboarding

Signup offers Buyer, Seller and Agent. Omitted account type still defaults to Buyer for compatibility. All self-service registrations require the existing signup OTP step.

- Buyer: gets Buyer access.
- Seller: gets Buyer and Seller access. Property submissions still use the existing review and publication workflow.
- Agent: gets Buyer access and a pending application. Agent access is granted only after admin approval.

Existing users can open My profile to add Seller access or submit an Agent application. Applying does not grant Agent access. A rejected applicant can submit a new application; previous decisions remain in history. Only one pending application is allowed per account.

Admin: open Users, then Agent applications. Review the professional details and approve or reject with notes. Approval requires an active account with completed signup verification, preserves existing roles, records the reviewer and decision, creates an access audit entry, and revokes older sessions. Approved applicants sign in again for Agent access. Admins can still manage roles through the existing access management screen.

User-facing email notifications for application decisions are not added in this change. Applicants view their status and feedback in My profile > Agent application and status.

Validation: AccountOnboardingTest covers signup roles, OTP gating, self-service Seller access, review authorization, duplicate applications, immutable decisions, session revocation, and resubmission history.
