<?php

function get_la_time($format) {
  $tz = 'America/Los_Angeles';
  $timestamp = time();
  $dt = new DateTime("now", new DateTimeZone($tz));
  $dt->setTimestamp($timestamp);
  return $dt->format($format);
}

function disableVoting() {
  if (get_la_time('Y-m-d H:i:s') >= '2022-10-07 23:59:00') {
    return true;
  } else {
    return false;
  }
}

function winnerMode() {
  if (get_la_time('Y-m-d H:i:s') >= '2022-10-21 18:15:00') {
    return true;
  } else {
    return false;
  }
}

?>