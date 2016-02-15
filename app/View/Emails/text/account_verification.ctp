
<?php
echo (__('Hello %s,',$user[$model]['firstname']));
echo "\n";
echo ('Welcome to Blog App, thank you for joining with us.');
echo "\n";
echo ( 'To validate your account, you must visit the URL below within 24 hours');
echo "\n";
echo Router::url(array('controller' => 'users', 'action' => 'verify', 'email',$user[$model]['email_token']), true);
?>
