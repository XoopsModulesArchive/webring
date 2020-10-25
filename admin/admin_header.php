<?php

include '../../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsmodule.php';
require XOOPS_ROOT_PATH . '/include/cp_functions.php';
if ($xoopsUser) {
    $xoopsModule = XoopsModule::getByDirname('webring');

    if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
        redirect_header($xoopsConfig['xoops_url'] . '/', 3, _NOPERM);

        exit();
    }
} else {
    redirect_header($xoopsConfig['xoops_url'] . '/', 3, _NOPERM);

    exit();
}
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include '../language/english/main.php';
}
