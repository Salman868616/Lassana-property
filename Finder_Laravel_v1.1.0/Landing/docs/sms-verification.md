# Mobitel SMS verification

Implementation date: 10 October 2026. Activation remains disabled pending gateway credentials, approved Sender ID and a consented real test mobile number.

## Account flow

With `SMS_ENABLED=true`, all roles follow the same rules:

- Registration requires a Sri Lankan mobile number, email OTP, then SMS OTP. After email verification the user explicitly confirms the destination before the first SMS is sent.
- Subsequent password logins send SMS OTP to the verified mobile number. Email OTP is not a substitute for the SMS step.
- Existing accounts without a verified mobile must first complete a fresh email OTP, then confirm a real mobile number. Old test phone values are never sent an SMS automatically.
- A verified phone cannot be replaced on the login verification screen. Changing it from a fully signed-in profile requires the current password, revokes other sessions, and requires verification again.
- Lost-phone recovery requires support and an approved identity-check procedure; there is no public password-only bypass.

With `SMS_ENABLED=false`, the existing email OTP flow remains active. This is the rollout fallback, not an automatic fallback when SMS delivery fails.

## Gateway setup

The supplied `api.zip` PHP guide uses the Mobitel Enterprise SOAP service:
`https://msmsenterpriseapi.mobitel.lk/mSMSEnterpriseAPI/mSMSEnterpriseAPI.wsdl`.
The public WSDL was reachable on 10 October 2026. Account authentication and handset delivery still need live testing.

1. Enable PHP SOAP and OpenSSL on the deployment host. Apply migration `2026_10_10_120000_add_sms_verification.php` using the usual backed-up deployment process.
2. Set `MOBITEL_SMS_USERNAME`, `MOBITEL_SMS_PASSWORD`, and the company-approved `MOBITEL_SMS_SENDER` securely in the environment. Website SMTP credentials are unrelated to the SMS gateway.
3. In a staging environment, set `SMS_ALLOWED_RECIPIENTS` to the explicitly authorized test number(s), comma-separated in `947XXXXXXXX` format. Set `SMS_ENABLED=true`, then clear/rebuild the configuration cache.
4. Run `php artisan sms:status` to inspect configuration presence without exposing secrets or sending SMS.
5. Test registration, real handset receipt, incorrect/expired codes, resend, logout and another login. Confirm the Sender ID and charge with the provider. A provider response of 200 means accepted, not confirmed handset delivery.
6. After successful tests, configure production and remove the staging recipient restriction there. All existing sessions must complete the new verification flow. Staff need accessible email and mobile numbers before activation.

No bulk messages, promotional SMS, delivery callbacks, or SMS password-reset bypass are included.

## Controls and validation

Codes are hashed with a random login-session challenge, expire in ten minutes, allow five incorrect attempts and are consumed after use. Resends wait one minute, with five requests per account per hour. Additional limits apply per destination (20/hour) and IP address (30/hour), using Laravel's shared cache. Keep that cache shared across web workers in production. Failed/uncertain sends also consume limits; the application does not automatically retry paid sends.

Only explicit provider code 200 is accepted. SOAP sessions are closed after use. TLS validation stays enabled. Provider faults are sanitized; SMS content, OTPs, credentials and raw provider responses are not logged by the integration.

Automated coverage: `SmsVerificationTest`, `MobitelSmsGatewayTest`, plus existing email, onboarding, profile and password-reset tests. All automated SMS and email delivery is mocked. PHPUnit defaults `SMS_ENABLED=false`; SMS tests explicitly enable it with a fake gateway.
