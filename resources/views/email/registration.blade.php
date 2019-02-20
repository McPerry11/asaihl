Greetings from ASAIHL Staff,
<br><br>
Thank you for participating in the 2019 ASAIHL International Conference! Please confirm your participation by paying your registration fee amounting to {{ $profile->citizenship == 'LOCAL' ? '₱' : '$' }}{{ number_format($price * ($count + 1), 2, ".", ",") }}.
<br><br>
You can pay the participation fee through this account: <br>
Bank name: Banco De Oro (BDO)
Account Name: <strong>Association of Southeast Asian Institution of Higher Learning, Inc.</strong><br>
@if($profile->citizenship == 'FOREIGN')
  Dollar Account Number: <strong>100020254245</strong>
@else
  Peso / Savings Account Number: <strong>000020177488</strong>
@endif
<br><br>
Please take note of your barcode number: <strong>{{ $profile->barcode }}</strong>.
<br><br>
<img src="{{ str_replace("\\", "", url(DNS1D::getBarcodePNGPath($profile->barcode, "C39+"))) }}" alt="barcode">
<br><br>
Thank you!
