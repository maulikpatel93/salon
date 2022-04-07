@component('mail::message')
# Use of staff login credentials in Beauty

You've been sent a $100 gift voucher for 'business_name' from 'sender_name'.

<b>How to use your gift voucher</b>

To redeem the gift voucher,print out the attached voucher or use the voucher code: 458Ack

<b>How to make an appointment</b>

Please call or visit us to arrange an appointment:<br>
{{ config('app.name') }}
@endcomponent
