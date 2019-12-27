<?php

function hash_encode($str)
{
    $hashid = new \Hashids\Hashids;
   return $hashid->encode($str);
}
function hash_decode($str)
{
    $hashid = new \Hashids\Hashids;
    $arr = $hashid->decode($str);
   return $arr == null ? null : $arr[0];
}