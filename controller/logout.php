<?php
//limpa dos dados da sessão e retorna ao index
session_start();
session_destroy();
header("location: ../");