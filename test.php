<?php
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
$fmt->setPattern('EEEE dd MMMM YYYY');
echo $fmt->format(new DateTime());