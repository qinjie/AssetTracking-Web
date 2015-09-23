<?php

Yii::setAlias('@siteroot', realpath(dirname(__FILE__).'/../'));

return [
    'adminEmail' => 'zqi2@np.edu.sg',
    'supportEmail' => 'zqi2@np.edu.sg',
    'user.passwordResetTokenExpire' => 3600,
    'project.id.canteen' => 1,
    'upload.nodefile' => '/upload/nodefile/',
    'folder.upload' => '/upload/',
    'floor.crowdindex' => 'crowdindex',
    'application' => '/web'
];
