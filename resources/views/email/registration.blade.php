Greetings from ASAIHL Staff,
<br><br>
Thank you for participating in the 2019 ASAIHL International Conference! Please confirm your participation by paying your participation fee amounting to {{ $price }}.
<br><br>
Your barcode number is <strong>{{ $profile->barcode }}</strong>.
<br><br>
<img src="{{ str_replace("\\", "", url(DNS1D::getBarcodePNGPath($profile->barcode, "C39+"))) }}" alt="barcode">
<br><br>
Thank you!
