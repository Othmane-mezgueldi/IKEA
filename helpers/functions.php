<?php

session_start();

function e($value)
{
    return htmlspecialchars(trim(strtolower($value)));
}
