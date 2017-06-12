<?php

function layout()
{
    return \Request::is('admin/*') ? 'layouts.admin' : 'layouts.app';
}

function isAdmin()
{
    return \Request::is('admin/*') ? true : false;
}