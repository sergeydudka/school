<p align="center">
    <h1 align="center">Install guid</h1>
    <br>
</p>

<h4>Git</h4>
```
git https://github.com/sergeydudka/school.git ./
```
<b>or</b>
<br>

```
git clone git@github.com:sergeydudka/school.git ./
```

<h4>Composer</h4>
```
composer install
```
<b>or</b>
```
composer update
```

<h4>Migration</h4>
```
php yii migration
```

<h2>Other</h2>

<h4>api</h4>
<p>
    actions
</p>

```
'index' => ['GET', 'HEAD'],
'view' => ['GET', 'HEAD'],
'create' => ['POST'],
'update' => ['PUT', 'PATCH'],
'delete' => ['DELETE'],
```