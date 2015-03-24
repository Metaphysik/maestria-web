<?php

$uia = '(?<uia>.*)@';


//$this
//    ->resource('professor', ['only' => ['index', 'show'], 'prefix' => $uia])
//    ->resource('evaluation');

//    ->resource('resume', ['only' => ['index', 'show']]);


//$c = clone $class;

//$class->resource('dashboard', ['only' => ['index']]);
//$c->resource('result', ['only' => ['index']]);

//$this->resource('student');
//$this->resource('theme', ['only' => ['index', 'create']]);
//$this->resource('domain', ['only' => ['index', 'create']]);
//$this->resource('know', ['only' => ['index', 'create']]);

$this->resource('classroom', ['prefix' => $uia]);

$this->get($uia . '/error/exception', ['as' => 'errorexception', 'to' => 'Error#Exception']);
$this->get($uia . '/error/404', ['as' => 'errornotfound', 'to' => 'Error#Notfound']);
$this->get($uia . '/', ['as' => 'mainindex', 'to' => 'Main#Index']);
$this->get($uia . '/login', ['as' => 'mainconnect', 'to' => 'Main#Connect']);
$this->post($uia . '/login', ['as' => 'mainlogin', 'to' => 'Main#Login']);
$this->get($uia . '/logout', ['as' => 'mainlogout', 'to' => 'Main#Logout']);
$this->get($uia . '/register', ['as' => 'mainregister', 'to' => 'Main#Register']);
$this->post($uia . '/register', ['as' => 'maincreate', 'to' => 'Main#Create']);


//$this->get($uia . '/user/', ['as' => 'profilall', 'to' => 'Main#Profilall']);
//$this->get($uia . '/user/(?<id>[^/]+)/?', ['as' => 'profiluser', 'to' => 'Main#Profil']);
//$this->get($uia . '/user/(?<id>[^/]+)/edit', ['as' => 'profiledit', 'to' => 'Main#Profiledit']);
//$this->post($uia . '/user/(?<id>[^/]+)/?', ['as' => 'profilupdate', 'to' => 'Main#Profilupdate']);
//$this->post($uia . '/api/know/?', ['as' => 'apicap', 'to' => 'Api#Know']);
//$this->get($uia . '/api/domain/', ['as' => 'apidomain', 'to' => 'Api#Domain']);
//$this->get($uia . '/api/class/', ['as' => 'apiclasse', 'to' => 'Api#Classeall']);
//$this->get($uia . '/api/class/(?<classe>.*)', ['as' => 'apiclass', 'to' => 'Api#Classe']);
//$this->get($uia . '/api/control/(?<clas>[^/]+)/eval/(?<eval>.*)', ['as' => 'apicontrol', 'to' => 'Api#Control']);
//$this->get($uia . '/api/theme/?', ['as' => 'apitheme', 'to' => 'Api#Theme']);
//$this->get($uia . '/api/domaine/?', ['as' => 'apidomaine', 'to' => 'Api#Domaine']);
//$this->get($uia . '/api/level/?', ['as' => 'apilevel', 'to' => 'Api#Level']);
//$this->get($uia . '/api/type/?', ['as' => 'apitype', 'to' => 'Api#Type']);
//$this->get($uia . '/api/users/?', ['as' => 'apiusers', 'to' => 'Api#Users']);