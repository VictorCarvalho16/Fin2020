<?php

function passwordCrypt($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}