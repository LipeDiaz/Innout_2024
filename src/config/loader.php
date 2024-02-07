<?php

function loadModel($nameModel) {
    require_once(MODEL_PATH . "/{$nameModel}.php");
}

function loadView($nameView, $params = array()) {
    
    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    require_once(VIEW_PATH . "/{$nameView}.php");
}

function loadTempleteView($nameView, $params = array()) {
    
    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    $user = $_SESSION['user'];
    $workingHours = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));
    $workedInterval = $workingHours->getWorkedInterval()->format('%H:%I:%S');
    $exitTime = $workingHours->getExitTime()->format('H:i:s');
    $activeClock = $workingHours->getAtiveClock();

    require_once(TEMPLETE_PATH . "/header.php");
    require_once(TEMPLETE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$nameView}.php");
    require_once(TEMPLETE_PATH . "/footer.php");
}

function renderTitle($title, $subTitle, $icon = null) {
    require_once(TEMPLETE_PATH . '/title.php');
}