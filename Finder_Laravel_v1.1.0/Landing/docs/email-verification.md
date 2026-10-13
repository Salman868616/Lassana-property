# Email verification and login OTP

While `SMS_ENABLED=false`, every password login requires an email OTP for all roles, including previously verified users. Registration also requires verification. Dashboard and authenticated actions remain blocked until the current session completes OTP verification. Existing sessions without an OTP completion marker must verify. When SMS is activated, registration requires both codes and subsequent logins use SMS; see [SMS verification](sms-verification.md).

Login codes are hashed with a random session challenge, expire after ten minutes, allow five failed attempts, and are consumed on success. Resends have a one-minute cooldown and five-per-hour issuance limit. A new code replaces the previous code for that account. Successful verification regenerates the session ID. Remember-me login is disabled.

Only initial registration permits correcting the email before verification. A login challenge cannot change its email destination. Email changes from a completed session require verification again.

The local company SMTP setup was tested on 9 October 2026. Use accessible inboxes for account verification and keep credentials in the private environment configuration. Automated tests use fake notifications or the array mail driver and do not deliver real mail. Never log production OTPs.

Tests: php artisan test --filter="EmailVerificationTest|LoginRedirectTest|AccountOnboardingTest|AccountProfileTest|RoleDashboardTest|UserManagementTest"
