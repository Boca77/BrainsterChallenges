<?php

function emptyUsernameCheck($username): bool
{
    if (empty($username)) {
        return true;
    }
    return false;
}

function emptyPasswordCheck($password): bool
{
    if (empty($password)) {
        return true;
    }
    return false;
}

function emptyEmailCheck($email): bool
{
    if (empty($email)) {
        return true;
    }
    return false;
}

function validateUsernameCharacters($username): bool
{
    if (preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        return false;
    }
    return true;
}

function validatePasswordCharacters($password): bool
{
    if (preg_match('/^(?=.*\d)(?=.*[^\w\d\s])(?=.*[A-Z])/', $password)) {
        return false;
    }
    return true;
}

function validateEmailCharacters($validEmailCheck): bool
{
    if (strlen($validEmailCheck) < 5) {
        return true;
    }
    return false;
}
