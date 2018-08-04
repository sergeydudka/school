<?php

use yii\db\Migration;

class m180804_085201_article extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%article}}')) {
            $this->dropTable('{{%article}}');
        }

$this->createTable(
            '{{%article}}',
            [
                'article_id'=> $this->primaryKey(20),
                'language_id'=> $this->integer(11)->null()->defaultValue(null),
                'title'=> $this->string(512)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'status'=> "enum('disabled', 'published', 'waiting', 'deleted') NULL DEFAULT 'disabled'",
                'article_group_id'=> $this->integer(11)->notNull()->defaultValue(0),
                'created_by'=> $this->integer(11)->notNull()->defaultValue(0),
                'updated_by'=> $this->integer(11)->notNull()->defaultValue(0),
                'difficult_id'=> $this->integer(11)->null()->defaultValue(0),
                'alias_id'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('title','{{%article}}',['title'],false);
        $this->createIndex('status','{{%article}}',['status'],false);
        $this->createIndex('date_added','{{%article}}',['created_at'],false);
        $this->createIndex('date_update','{{%article}}',['updated_at'],false);
        $this->createIndex('article_group_id','{{%article}}',['article_group_id'],false);
        $this->createIndex('language_id','{{%article}}',['language_id'],false);
        $this->createIndex('alias_id','{{%article}}',['alias_id'],false);
        $this->createIndex('difficult_id','{{%article}}',['difficult_id'],false);
    $this->batchInsert('{{%article}}',
        ["article_id", "language_id", "title", "description", "created_at", "updated_at", "status", "article_group_id", "created_by", "updated_by", "difficult_id", "alias_id"],
        [
    [
        'article_id' => '2',
        'language_id' => '2',
        'title' => 'Введение в HTML',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;h2&gt;Быстрый старт&lt;/h2&gt;
  &lt;p&gt;Чтобы сразу же ввести в курс дела нетерпеливых читателей, предложим им возможность
    создания веб-страницы без последовательного изучения правил HTML. По крайней
    мере, вы сумеете убедиться, что создание веб-страниц достаточно простая штука.&lt;/p&gt;
  &lt;p&gt; В примере 1.1 приведен несложный пример такого кода.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 1.1. Первая веб-страница&lt;/p&gt;
  &lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; 
  &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Моя первая веб-страница&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;

  &amp;lt;h1&amp;gt;Заголовок страницы&amp;lt;/h1&amp;gt;
  &amp;lt;p&amp;gt;Основной текст.&amp;lt;/p&amp;gt;

 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; 
  &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Моя первая веб-страница&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;

  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок страницы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Основной текст.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;

 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  &lt;p&gt;Чтобы посмотреть результат примера в действии, проделайте следующие шаги.&lt;/p&gt;
  &lt;p&gt; 1. В Windows откройте программу Блокнот (&lt;span class=&quot;menuitem&quot;&gt;Пуск&amp;nbsp;&amp;gt; Выполнить&amp;nbsp;&amp;gt; набрать «notepad»&lt;/span&gt; или &lt;span class=&quot;menuitem&quot;&gt;Пуск&amp;nbsp;&amp;gt; Программы&amp;nbsp;&amp;gt; Стандартные&amp;nbsp;&amp;gt; Блокнот&lt;/span&gt;).&lt;/p&gt;
  &lt;p&gt;2. Наберите или скопируйте код в Блокноте (рис.&amp;nbsp;1.1). &lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_01_01.png&quot; alt=&quot;Рис. 1.1&quot; width=&quot;608&quot; height=&quot;296&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 1.1. Вид HTML-кода в программе Блокнот&lt;/p&gt;
  &lt;p&gt; 3. Сохраните готовый документ (&lt;span class=&quot;menuitem&quot;&gt;Файл&amp;nbsp;&amp;gt; Сохранить как...&lt;/span&gt;)
    под именем &lt;span class=&quot;attribute&quot;&gt;c:\\www\\example11.html&lt;/span&gt;,
    при этом обязательно поставьте в диалоговом окне сохранения тип файла: Все
    файлы и кодировку UTF-8 (рис.&amp;nbsp;1.2). Обратите внимание, что расширение у файла должно быть именно html.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_01_02.png&quot; alt=&quot;Рис. 1.2&quot; width=&quot;365&quot; height=&quot;108&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 1.2. Параметры сохранения файла в Блокноте&lt;/p&gt;
  &lt;p&gt;4.  Запустите браузер Internet Explorer (&lt;span class=&quot;menuitem&quot;&gt;Пуск&amp;nbsp;&amp;gt; Выполнить&amp;nbsp;&amp;gt; набрать «iexplore»&lt;/span&gt; или &lt;span class=&quot;menuitem&quot;&gt;Пуск&amp;nbsp;&amp;gt; Программы&amp;nbsp;&amp;gt; Internet Explorer&lt;/span&gt;).&lt;/p&gt;
  &lt;p&gt;5.   В браузере выберите пункт меню &lt;span class=&quot;menuitem&quot;&gt;Файл&amp;nbsp;&amp;gt; Открыть&lt;/span&gt; и
    укажите путь к вашему файлу.&lt;/p&gt;
  &lt;p&gt;6. Если все сделано правильно, то в браузере вы увидите результат, как показано
    на рис.&amp;nbsp;1.3.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_01_03.png&quot; alt=&quot;Рис. 1.3&quot; width=&quot;446&quot; height=&quot;279&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 1.3. Вид веб-страницы в окне браузера&lt;/p&gt;
  &lt;p&gt; В случае возникновения каких-либо ошибок проверьте правильность набора кода
    согласно примеру&amp;nbsp;1.1, расширение файла (должно быть html) и путь к
    документу.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '3',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '3',
        'language_id' => '2',
        'title' => 'Инструментарий',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для эффективной работы не обойтись без необходимых и привычных инструментов,
    в том числе и при написании кода HTML. Поэтому для начальной разработки веб-страниц
    или даже небольшого &lt;span class=&quot;term&quot;&gt;сайта&lt;/span&gt;&amp;nbsp;— так называется набор страниц, связанных
    между собой ссылками и единым оформлением, нам понадобятся следующие программы.&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt;Текстовый редактор.&lt;/li&gt;
    &lt;li&gt;Браузер для просмотра результатов.&lt;/li&gt;
    &lt;li&gt;Валидатор&amp;nbsp;— программа для проверки синтаксиса HTML и выявления ошибок
      в коде.&lt;/li&gt;
    &lt;li&gt;Графический редактор.&lt;/li&gt;
    &lt;li&gt;Справочник по тегам HTML.&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p&gt;Далее рассмотрим эти инструменты подробнее.&lt;/p&gt;
  &lt;h2&gt;Текстовый редактор&lt;/h2&gt;
  &lt;p&gt;HTML-документ можно создавать в любом текстовом редакторе, хоть Блокноте,
    тем не менее, для этой цели подойдет не всякая программа. Нужна такая, чтобы
    поддерживала следующие возможности:&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt;подсветка синтаксиса&amp;nbsp;— выделение тегов, текста, ключевых слов и параметров
      разными цветами. Это облегчает поиск нужного элемента, ускоряет работу разработчика
      и снижает возникновение ошибок;&lt;/li&gt;
    &lt;li&gt;работа с вкладками. Сайт представляет собой набор файлов, которые приходится
      править по отдельности, для чего нужен редактор, умеющий одновременно работать
      сразу с несколькими документами. При этом файлы удобно открывать в отдельных
      вкладках, чтобы быстро переходить к нужному документу;&lt;/li&gt;
    &lt;li&gt;проверка текущего документа на ошибки.&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p&gt; Ссылки на некоторые подобные редакторы приведены ниже.&lt;/p&gt;
  &lt;h3&gt; PSPad&lt;/h3&gt;
    &lt;p&gt;&lt;a href=&quot;http://www.pspad.com/ru/download.php&quot;&gt;http://www.pspad.com/ru/download.php&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt; HtmlReader&lt;/h3&gt;
    &lt;p&gt;&lt;a href=&quot;http://manticora.ru/download.htm&quot;&gt;http://manticora.ru/download.htm&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt; Notepad++&lt;/h3&gt;
    &lt;p&gt;&lt;a href=&quot;http://notepad-plus.sourceforge.net/ru/site.htm&quot;&gt;http://notepad-plus.sourceforge.net/ru/site.htm&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt; EditPlus&lt;/h3&gt;
&lt;p&gt;&lt;a href=&quot;http://www.editplus.com&quot;&gt;http://www.editplus.com&lt;/a&gt;&lt;/p&gt;
  &lt;h2&gt;Браузер&lt;/h2&gt;
  &lt;p&gt;Браузер это программа, предназначенная для просмотра веб-страниц.
    На первых порах подойдет любой браузер, но с повышением опыта и знаний потребуется
    завести целый «зверинец», чтобы проверять правильность отображения
    сайта в разных браузерах. Дело в том, что каждый браузер имеет свои уникальные
    особенности, поэтому для проверки универсальности кода требуется просматривать
    и корректировать код с их учетом. На сегодняшний день наибольшей популярностью
    пользуются три браузера: Firefox, Internet Explorer и Opera.&lt;/p&gt;
  &lt;h3&gt;Mozilla Firefox&lt;/h3&gt;
  &lt;p&gt;Перспективный и развивающийся браузер, получивший признание во всем мире.
    Его особенность&amp;nbsp;— простота и расширяемость, которая получается за счет
    специальных расширений, как они называются. Изначально Firefox имеет набор
    только самых необходимых функций, но, устанавливая желаемые расширения, в итоге
    можно нарастить браузер до системы, выполняющей все необходимые для вашей работы
    действия. 
    Браузер Firefox является открытой системой, разрабатываемый группой Mozilla.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://www.mozilla.ru/products/firefox/&quot;&gt;http://www.mozilla.ru/products/firefox/&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt;Microsoft Internet Explorer (IE)&lt;/h3&gt;
  &lt;p&gt;Один из старейших браузеров, который бесплатно поставляется вместе с операционной
    системой Windows. Это и определило его популярность. Версия IE&amp;nbsp;7
    по удобству приблизилась к своим давним конкурентам, в частности, появились
    вкладки. К сожалению, этот браузер хуже всех поддерживает спецификацию HTML,
    поэтому для корректного отображения  в IE приходится порой отдельно отлаживать
    код специально под него.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://www.microsoft.com/rus/windows/ie/default.mspx&quot;&gt;http://www.microsoft.com/rus/windows/ie/default.mspx&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt;Opera&lt;/h3&gt;
  &lt;p&gt;Быстрый и удобный браузер, поддерживающий множество дополнительных возможностей,
    повышающих комфортность работы с сайтами. &lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://ru.opera.com/download/&quot;&gt;http://ru.opera.com/download/&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt;Safari &lt;/h3&gt;
  &lt;p&gt;    Разработаный компанией Apple этот браузер встроен в iPhone и операционную систему MacOS на компьютерах Apple. Также имеется версия под Windows. &lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;    Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://www.apple.com/ru/safari/&quot;&gt;http://www.apple.com/ru/safari/&lt;/a&gt;&lt;/p&gt;
  &lt;h3&gt;Google Chrome&lt;/h3&gt;
  &lt;p&gt;Браузер, появившийся на рынке в конце 2008 года. Разработан компанией Google.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://www.google.com/chrome?hl=ru&quot;&gt;http://www.google.com/chrome?hl=ru&lt;/a&gt;&lt;/p&gt;


  &lt;h2&gt;Валидатор&lt;/h2&gt;
  &lt;p&gt;&lt;span class=&quot;term&quot;&gt;Валидация&lt;/span&gt; HTML-документа предназначена для выявления ошибок в синтаксисе
    веб-страницы и расхождений со спецификацией HTML. Соответственно, программа
    или система для такой проверки называется &lt;span class=&quot;term&quot;&gt;валидатором&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;Как проверить HTML-файл на валидность&lt;/h3&gt;
  &lt;p&gt;Если есть доступ в Интернет, то следует зайти по адресу &lt;a href=&quot;http://validator.w3.org&quot;&gt;http://validator.w3.org&lt;/a&gt; и
    ввести путь к проверяемому документу или сайту в специальной форме. После проверки
    будут показаны возможные ошибки или появится надпись, что документ прошел валидацию
    успешно.&lt;/p&gt;
  &lt;h3&gt;Tidy&lt;/h3&gt;
  &lt;p&gt;Для проверки локального HTML-файла или при отсутствии подключения к Интернету,
    предназначена программа Tidy. Некоторые редакторы, например, PSPad, уже содержат
    встроенный Tidy и валидацию документа можно провести без дополнительных средств.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://tidy.sourceforge.net/&quot;&gt;http://tidy.sourceforge.net&lt;/a&gt;&lt;/p&gt;
  &lt;h2&gt;Графический редактор&lt;/h2&gt;
  &lt;p&gt;Графический редактор необходим для обработки изображений и  их подготовки для публикации на веб-странице. Самой популярной программой  такого рода является Photoshop, ставший стандартом для обработки фотографий и создания  графических изображений для сайтов. Но в большинстве случаев мощь Photoshop-а избыточна, и лучше  воспользоваться чем-нибудь более простым и проворным. В частности, программа Paint.Net позволяет  сделать все необходимые манипуляции с изображениями, вдобавок бесплатна для  использования.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;Скачать Paint.Net &lt;/strong&gt;&lt;br&gt;
    &lt;a href=&quot;http://www.getpaint.net/download.html&quot;&gt;http://www.getpaint.net/download.html&lt;/a&gt;&lt;/p&gt;
  &lt;h2&gt;Справочник по тегам HTML&lt;/h2&gt;
  &lt;p&gt;Запоминать все теги и их параметры наизусть на первых порах сложно, поэтому
    требуется периодически заглядывать в руководство, чтобы уточнить тот или иной
    вопрос. Вообще, хороший справочник нужен всем, независимо от уровня подготовки.&lt;/p&gt;
  &lt;h3&gt;Справочники в Интернете&lt;/h3&gt;
  &lt;p&gt;Описание тегов HTML (на английском языке)&lt;br&gt;
    &lt;a href=&quot;http://www.w3.org/TR/html4/index/elements.html&quot;&gt;http://www.w3.org/TR/html4/index/elements.html&lt;/a&gt;&lt;/p&gt;
&lt;p&gt;На этом сайте вы также найдете один из лучших справочников по тегам в Рунете.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '4',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '4',
        'language_id' => '2',
        'title' => 'Теги',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Чтобы браузер при отображении документа понимал, что имеет дело не с простым
    текстом, а с элементом форматирования и применяются теги. Общий синтаксис написания
    тегов следующий.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;тег атрибут1=&quot;значение&quot; атрибут2=&quot;значение&quot;&amp;gt;
&amp;lt;тег атрибут1=&quot;значение&quot; атрибут2=&quot;значение&quot;&amp;gt;...&amp;lt;/тег&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons xml&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;тег атрибут1=&quot;значение&quot; атрибут2=&quot;значение&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;тег атрибут1=&quot;значение&quot; атрибут2=&quot;значение&quot;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/тег&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

  &lt;p&gt;Как видно из данного примера, теги бывают двух типов&amp;nbsp;— одиночные и парные
    (контейнеры). Одиночный тег используется самостоятельно, а парный может включать
    внутри себя другие теги или текст. У тегов допустимы различные атрибуты, которые
    разделяются между собой пробелом. Впрочем, есть теги без всяких дополнительных
    атрибутов. Условно атрибуты можно подразделить на обязательные, они непременно
    должны присутствовать, и необязательные, их добавление зависит от цели применения
    тега.&lt;/p&gt;
  &lt;p&gt; В примере&amp;nbsp;3.1 показан типичный HTML-документ с тегами и текстом.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 3.1. Теги в документе &lt;/p&gt;

  &lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; 
 &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Lorem ipsum&amp;lt;/title&amp;gt;
  &amp;lt;/head&amp;gt;
  &amp;lt;body&amp;gt;
    &amp;lt;p&amp;gt;Lorem ipsum dolor sit amet consectetuer cursus pede pellentesque 
      vitae pretium. Tristique mus at elit lobortis libero Sed vestibulum ut 
      eleifend habitasse. Quis Nam Mauris adipiscing Integer ligula dictum 
      sed at enim urna. Et scelerisque id et nibh dui tincidunt Curabitur faucibus 
      elit massa. Tincidunt et gravida Phasellus eget parturient faucibus tellus 
      at justo sollicitudin. Mi nulla ut adipiscing.&amp;lt;/p&amp;gt;
   &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; 
 &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum dolor sit amet consectetuer cursus pede pellentesque 
      vitae pretium. Tristique mus at elit lobortis libero Sed vestibulum ut 
      eleifend habitasse. Quis Nam Mauris adipiscing Integer ligula dictum 
      sed at enim urna. Et scelerisque id et nibh dui tincidunt Curabitur faucibus 
      elit massa. Tincidunt et gravida Phasellus eget parturient faucibus tellus 
      at justo sollicitudin. Mi nulla ut adipiscing.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В данном примере используется одиночный тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;meta&amp;gt;&lt;/span&gt;, а парных тегов
    сразу несколько: &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '5',
        'language_id' => '2',
        'title' => 'Парные теги',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Парные теги, называемые по-другому контейнеры, состоят из двух частей&amp;nbsp;—  открывающий
  и закрывающий тег. Открывающий тег обозначается как и одиночный&amp;nbsp;— &lt;span class=&quot;tag&quot;&gt;&amp;lt;тег&amp;gt;&lt;/span&gt;,
  а в закрывающем используется слэш&amp;nbsp;— &lt;span class=&quot;tag&quot;&gt;&amp;lt;/тег&amp;gt;&lt;/span&gt;. Допускается
  вкладывать в контейнер другие теги, однако следует соблюдать их порядок. Так,
  на рис. 3.1 демонстрируется, как можно и нельзя добавлять один контейнер внутрь
  другого.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;389&quot; height=&quot;50&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_03_01a.png&quot; alt=&quot;Рис. 3.1а&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;а&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;439&quot; height=&quot;62&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_03_01b.png&quot; alt=&quot;Рис. 3.1б&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;б&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис.  3.1. Вложение тегов, а&amp;nbsp;— правильное, б&amp;nbsp;— неверное&lt;/p&gt;
&lt;p&gt;Если связать открывающий и закрывающий тег между собой скобкой, как показано
  на рис.&amp;nbsp;3.1, то несколько скобок обозначающих разные контейнеры, не должны
  пересекаться между собой (рис.&amp;nbsp;3.1а). Любое пересечение условных скобок
  (рис.&amp;nbsp;3.1б) говорит о том, что правильная последовательность тегов нарушена.&lt;/p&gt;
&lt;p class=&quot;note&quot;&gt; Не все контейнеры требуют обязательно закрывающего тега, иногда его можно и
  опустить. Тем не менее, закрывайте  все требуемые теги, так вы приучитесь
  сводить к нулю возможные ошибки.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '6',
        'language_id' => '2',
        'title' => 'Правила применения тегов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для тегов любого типа действуют определенные правила их использования. Причем,
  некоторые правила обязательны для выполнения, а другие являются рекомендациями,
  т.е. их можно выполнять, а можно и нет.&lt;/p&gt;
&lt;h3&gt;Атрибуты тегов и кавычки&lt;/h3&gt;
&lt;p&gt;Согласно спецификации HTML все значения атрибутов тегов следует указывать
  в двойных (&quot;пример&quot;) или одинарных кавычках (&#039;пример&#039;). Отсутствие
  кавычек не приведет к ошибкам, браузеры во многих случаях достаточно корректно обрабатывают код
  и без кавычек, за исключением текста, содержащего пробелы (пример&amp;nbsp;3.2).&lt;/p&gt;
&lt;p class=&quot;exampleTitle&quot;&gt;Пример 3.2. Использование кавычек в атрибутах тегов&lt;/p&gt;
&lt;p class=&quot;example-support&quot;&gt;&lt;span class=&quot;html no&quot;&gt;HTML 4.01&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;IE&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Cr&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Op&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Sa&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Fx&lt;/span&gt;&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot;  content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Кавычки в атрибуте alt&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/arena.png&quot; alt=&quot;Вид заголовка&quot; width=&quot;400&quot; height=&quot;101&quot;&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/arena.png&quot; alt=Вид заголовка width=&quot;400&quot; height=&quot;101&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt; &lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Кавычки в атрибуте alt&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/arena.png&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Вид заголовка&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;400&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;101&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/arena.png&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;/span&gt;Вид заголовка&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;400&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;101&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;В данном примере строка 8 написана правильно, со всеми кавычками, а в строке
  9 у атрибута &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt; кавычки отсутствуют. Из-за этого браузер в качестве значения
   &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt; возьмет только первое слово («Вид»), а слово «заголовка» будет
  воспринято как ошибочное значение. Поэтому всегда приучайтесь указывать значения атрибутов
  тегов в кавычках.&lt;/p&gt;
&lt;h3&gt;Теги можно писать как прописными, так и строчными символами&lt;/h3&gt;
&lt;p&gt;Любые теги, а также их атрибуты нечувствительны к регистру, поэтому 
  вы вольны выбирать сами, как писать&amp;nbsp;— &lt;span class=&quot;tag&quot;&gt;&amp;lt;BR&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;Br&amp;gt;&lt;/span&gt; или &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt;.
  В любом случае рекомендуется придерживаться выбранной формы записи на протяжении
  всех страниц сайта. Заметим также, что текст, полностью набранный прописными
  символами, читается хуже, чем текст со строчными символами или смешанный.&lt;/p&gt;
&lt;h3&gt;Переносы строк&lt;/h3&gt;
&lt;p&gt;Внутри тега между его атрибутами допустимо ставить перенос строк. В примере&amp;nbsp;3.3
  показана одна и та же строка, но оформленная разными способами.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 3.3. Переносы строк в коде тега&lt;/p&gt;

&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Кавычки в атрибуте alt&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/arena.png&quot; alt=&quot;Вид заголовка в IE&quot; width=&quot;400&quot; height=&quot;101&quot;&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/arena.png&quot;
   alt=&quot;Вид заголовка в браузере IE&quot;
   width=&quot;400&quot;
   height=&quot;101&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Кавычки в атрибуте alt&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/arena.png&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Вид заголовка в IE&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;400&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;101&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/arena.png&quot;&lt;/span&gt;&lt;/span&gt;
  &lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Вид заголовка в браузере IE&quot;&lt;/span&gt;&lt;/span&gt;
  &lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;400&quot;&lt;/span&gt;&lt;/span&gt;
  &lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;101&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;В данном примере первый тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; набран в одну строку, включая все
  его атрибуты, а второй тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; разбит на несколько строк.&lt;/p&gt;

&lt;p class=&quot;note&quot;&gt; Хотя ошибки при переносе текста в подобном случае и не возникнет, рекомендуем
  писать теги в одну строку, иначе ухудшается восприятие кода и его становится
  сложнее править.&lt;/p&gt;
&lt;h3&gt;Неизвестные теги и атрибуты&lt;/h3&gt;
&lt;p&gt;Если какой-либо тег или его атрибут был написан неверно, то браузер проигнорирует
  подобный тег и будет отображать текст так, словно тега и не было. Опять же,
  следует избегать неизвестных тегов, поскольку код HTML не пройдет валидацию.&lt;/p&gt;
&lt;h3&gt;Порядок тегов&lt;/h3&gt;
&lt;p&gt;Существует определенная иерархия вложенности тегов. Например, тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt; должен
  находиться внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt; и нигде иначе. Чтобы не возникло
  ошибки, следите за тем, чтобы теги располагались в коде правильно.&lt;/p&gt;
&lt;p&gt; Если теги между собой равноценны в иерархии связи, то их последовательность
  не имеет значения. Так, можно поменять местами теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;meta&amp;gt;&lt;/span&gt;,
  на конечном результате это никак не скажется.&lt;/p&gt;
&lt;h3&gt;Закрывайте все теги&lt;/h3&gt;
&lt;p&gt;Существует три состояния закрывающего тега: обязателен, не требуется или не
  обязателен. Обязательный закрывающий тег должен присутствовать всегда, иначе
  это приведет к ошибке при отображении документа. Для некоторых тегов вроде &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt; закрывающего
  тега нет в принципе. Необязательный закрывающий тег говорит о том, что разработчик
  может его как добавить, так и опустить, к ошибке это не приведет. Однако рекомендуем
  закрывать все подобные теги, включая необязательные, это дисциплинирует, создает
  более стройный и строгий код, который легко модифицировать.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '7',
        'language_id' => '2',
        'title' => 'Атрибуты тегов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Чтобы расширить возможности отдельных тегов и более гибко управлять содержимым
  контейнеров и применяются атрибуты тегов.&lt;/p&gt;
&lt;h3&gt;Для атрибутов тегов используются значения по умолчанию&lt;/h3&gt;
&lt;p&gt;Когда для тега не добавлен какой-либо допустимый атрибут, это означает, что
  браузер в этом случае будет подставлять значение, заданное по умолчанию. Если
  вы ожидали получить иной результат на веб-странице, проверьте, возможно, следует
  явно указать значения некоторых атрибутов.&lt;/p&gt;
&lt;h3&gt;Атрибуты без значений&lt;/h3&gt;
&lt;p&gt;Допустимо использовать некоторые атрибуты у тегов, не присваивая им никакого
  значения, как показано в примере&amp;nbsp;3.4.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример 3.4. Атрибуты без значений &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Добавление формы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
  &amp;lt;body&amp;gt;
  &amp;lt;form action=&quot;self.php&quot;&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;input type=&quot;text&quot;&amp;gt;&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;input type=&quot;submit&quot; disabled&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;/form&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Добавление формы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;form&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; action=&lt;span class=&quot;value&quot;&gt;&quot;self.php&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;input&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; type=&lt;span class=&quot;value&quot;&gt;&quot;text&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;input&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; type=&lt;span class=&quot;value&quot;&gt;&quot;submit&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; disabled&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;form&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;В данном примере используется атрибут &lt;span class=&quot;attribute&quot;&gt;disabled&lt;/span&gt;, у которого явно не задано
  значение. Подобная запись называется «сокращенный атрибут тега».&lt;/p&gt;
&lt;h3&gt;Порядок атрибутов в тегах&lt;/h3&gt;
&lt;p&gt;Порядок атрибутов в любом теге не имеет значения и на результат отображения
  элемента не влияет. Поэтому теги вида &lt;span class=&quot;var&quot;&gt;&amp;lt;img src=&quot;/images/title.gif&quot; width=&quot;438&quot;  height=&quot;118&quot;&amp;gt;&lt;/span&gt; и &lt;span class=&quot;var&quot;&gt;&amp;lt;img
    height=&quot;118&quot; width=&quot;438&quot;  src=&quot;/images/title.gif&quot;&amp;gt;&lt;/span&gt; по
  своему действию равны.&lt;/p&gt;
&lt;h3&gt;Формат атрибутов&lt;/h3&gt;
&lt;p&gt;Каждый атрибут тега относится к определенному типу (например: текст, число,
  путь к файлу и др.), который обязательно должен учитываться при написании атрибута.
  Так, в примере&amp;nbsp;3.3 упоминается тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;, он добавляет на веб-страницу
  рисунок, а его атрибут &lt;span class=&quot;attribute&quot;&gt;width&lt;/span&gt; задает ширину изображения в пикселах. Если поставить
  не число, а нечто другое, то значение будет проигнорировано и возникнет ошибка
  при валидации документа. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '8',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '8',
        'language_id' => '2',
        'title' => 'Структура HTML-кода',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Если открыть любую веб-страницу, то она будет содержать в себе типичные элементы,
  которые не меняются от вида и направленности сайта. В примере&amp;nbsp;4.1 показан
  код  простого документа, содержащего основные теги.&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 4.1. Исходный код веб-страницы&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Пример веб-страницы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;h1&amp;gt;Заголовок&amp;lt;/h1&amp;gt;
  &amp;lt;!-- Комментарий --&amp;gt;
  &amp;lt;p&amp;gt;Первый абзац.&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;Второй абзац.&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Пример веб-страницы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;comment&quot;&gt;&amp;lt;!-- Комментарий --&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Первый абзац.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Второй абзац.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;Скопируйте содержимое данного примера и сохраните его в папке c:\\www\\ под
  именем example41.html. После этого запустите браузер и откройте файл через пункт меню &lt;span class=&quot;menuitem&quot;&gt;Файл&amp;nbsp;&amp;gt; Открыть
  файл (Ctrl+O)&lt;/span&gt;. В диалоговом окне выбора документа укажите файл example41.html. В браузере откроется веб-страница, показанная на рис.&amp;nbsp;4.1.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_04_01.png&quot; width=&quot;526&quot; height=&quot;284&quot; alt=&quot;Рис. 4.1&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;  Рис. 4.1. Результат выполнения примера&lt;/p&gt;
&lt;p&gt;  Далее разберем отдельные строки нашего кода.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;  предназначен для указания типа текущего документа&amp;nbsp;—
  DTD (document type definition, описание типа документа). Это необходимо, чтобы
  браузер понимал, как следует интерпретировать текущую веб-страницу, ведь HTML
  существует в нескольких версиях, кроме того, имеется XHTML (EXtensible HyperText
  Markup Language, расширенный язык разметки гипертекста), похожий на HTML, но
  различающийся с ним по синтаксису. Чтобы браузер «не путался» и понимал,
  согласно какому стандарту отображать веб-страницу и необходимо в первой строке
  кода задавать &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p&gt;  Существует несколько видов &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;, они различаются в зависимости
  от версии HTML, на которую ориентированы. В табл.&amp;nbsp;4.1. приведены основные
  типы документов с их описанием.&lt;/p&gt;

&lt;table class=&quot;data&quot;&gt;
&lt;caption&gt;Табл. 4.1. Допустимые DTD&lt;/caption&gt;
  &lt;tbody&gt;&lt;tr&gt;
    &lt;th&gt;DOCTYPE &lt;/th&gt;
    &lt;th&gt;Описание&lt;/th&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td colspan=&quot;2&quot;&gt;&lt;strong&gt;HTML 4.01&lt;/strong&gt;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE HTML PUBLIC  &quot;-//W3C//DTD
      HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Строгий синтаксис HTML.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE HTML PUBLIC  &quot;-//W3C//DTD
      HTML 4.01 Transitional//EN&quot;  &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Переходный синтаксис HTML.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE HTML PUBLIC  &quot;-//W3C//DTD
      HTML 4.01 Frameset//EN&quot;  &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;В HTML-документе применяются фреймы.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td colspan=&quot;2&quot;&gt;&lt;strong&gt;HTML 5&lt;/strong&gt;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE html&amp;gt;&lt;/td&gt;
    &lt;td&gt;В этой версии HTML только один доктайп.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td colspan=&quot;2&quot;&gt;&lt;strong&gt;XHTML 1.0&lt;/strong&gt;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE html PUBLIC  &quot;-//W3C//DTD
      XHTML 1.0 Strict//EN&quot;    &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Строгий синтаксис XHTML.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD
      XHTML 1.0 Transitional//EN&quot;    &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Переходный синтаксис XHTML.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE html PUBLIC  &quot;-//W3C//DTD
      XHTML 1.0 Frameset//EN&quot;    &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Документ написан на XHTML и содержит фреймы.&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td colspan=&quot;2&quot;&gt;&lt;strong&gt;XHTML 1.1&lt;/strong&gt;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.1//EN&quot; &quot;http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd&quot;&amp;gt;&lt;/td&gt;
    &lt;td&gt;Разработчики XHTML&amp;nbsp;1.1 предполагают,
      что он постепенно вытеснит HTML. Как видите, никакого деления на виды
      это определение не имеет, поскольку синтаксис один и подчиняется четким
      правилам.&lt;/td&gt;
  &lt;/tr&gt;
&lt;/tbody&gt;&lt;/table&gt;
&lt;p&gt;Разница между строгим и переходным описанием документа состоит в различном
  подходе к написанию кода документа. Строгий HTML требует жесткого соблюдения
  спецификации HTML и не прощает ошибок. Переходный HTML более «спокойно» относится
  к некоторым огрехам кода, поэтому этот тип в определенных случаях использовать
  предпочтительнее. &lt;/p&gt;
&lt;p&gt;  Например, в строгом HTML и XHTML непременно требуется наличие тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;,
  а в переходном HTML его можно опустить и не указывать. При этом помним, что
  браузер в любом случае покажет документ, независимо от того, соответствует
  он синтаксису или нет. Подобная проверка осуществляется при помощи валидатора
  и предназначена в первую очередь для разработчиков, чтобы отслеживать ошибки
  в документе. &lt;/p&gt;
&lt;p&gt;  В дальнейшем будем применять преимущественно строгий &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;, кроме
  случаев, когда это оговаривается особо. Это позволит нам избегать типичных
  ошибок и приучит к написанию синтаксически правильного кода.&lt;/p&gt;

&lt;p class=&quot;note&quot;&gt;  Часто можно встретить код HTML вообще без использования &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;,
  веб-страница в подобном случае все равно будет показана. Тем не менее, может
  получиться, что один и тот же документ отображается в браузере по-разному при
  использовании &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; и без него. Кроме того,
  браузеры могут по-своему показывать такие документы, в итоге страница «рассыплется»,
  т.е. будет отображаться совсем не так, как это требуется разработчику. Чтобы
  не произошло подобных ситуаций, всегда добавляйте &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; в начало документа. &lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt;  определяет начало HTML-файла, внутри него хранится заголовок
  (&lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;) и тело документа (&lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;).&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;head&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;  Заголовок документа, как еще называют блок &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;, может содержать текст
  и теги, но содержимое этого раздела не показывается напрямую на странице, за
  исключением контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;meta&amp;gt;&lt;/span&gt;  является универсальным и добавляет целый класс возможностей,
  в частности, с помощью метатегов, как обобщенно называют этот тег, можно изменять
  кодировку страницы, добавлять ключевые слова, описание документа и многое другое.
  Чтобы браузер понимал, что имеет дело с кодировкой UTF-8 (Unicode transformation format, формат преобразования Юникод) и добавляется данная строка.&lt;/p&gt;
  
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;title&amp;gt;Пример веб-страницы&amp;lt;/title&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Пример веб-страницы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;  определяет заголовок веб-страницы, это один из важных элементов
  предназначенный для решения множества задач. В операционной системе Windows
  текст заголовка отображается в левом верхнем углу окна браузера (рис.&amp;nbsp;4.2).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_04_02.png&quot; width=&quot;194&quot; height=&quot;37&quot; alt=&quot;Вид заголовка в браузере&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 4.2. Вид заголовка в браузере&lt;/p&gt;

&lt;p class=&quot;note&quot;&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;  является обязательным и должен непременно присутствовать
  в коде документа.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;/head&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Обязательно следует добавлять закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/head&amp;gt;&lt;/span&gt;, чтобы показать,
  что блок заголовка документа завершен.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;body&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;  Тело документа &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;  предназначено для размещения тегов и содержательной
  части веб-страницы.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;h1&amp;gt;Заголовок&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  HTML предлагает шесть текстовых заголовков разного уровня, которые показывают
    относительную важность секции, расположенной после заголовка. Так, тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;&lt;/span&gt; представляет
    собой наиболее важный заголовок первого уровня, а тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;h6&amp;gt;&lt;/span&gt;  служит
    для обозначения заголовка шестого уровня и является наименее значительным.
    По умолчанию, заголовок первого уровня отображается самым крупным шрифтом
    жирного начертания, заголовки последующего уровня по размеру меньше. Теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;...&amp;lt;h6&amp;gt;&lt;/span&gt; относятся
    к блочным элементам, они всегда начинаются с новой строки, а после них другие
    элементы отображаются на следующей строке. Кроме того, перед заголовком и
    после него добавляется пустое пространство.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;!-- Комментарий --&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons xml&quot;&gt; &lt;span class=&quot;comment&quot;&gt;&amp;lt;!-- Комментарий --&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Некоторый текст можно спрятать от показа в браузере, сделав его комментарием.
    Хотя такой текст пользователь не увидит, он все равно будет передаваться
  в документе, так что, посмотрев исходный код, можно обнаружить скрытые заметки.&lt;/p&gt;
&lt;p&gt;  Комментарии нужны для внесения в код своих записей, не влияющих на вид страницы.
Начинаются они тегом &lt;span class=&quot;tag&quot;&gt;&amp;lt;!--&lt;/span&gt; и заканчиваются тегом &lt;span class=&quot;tag&quot;&gt;--&amp;gt;&lt;/span&gt;. Все, что находится
  между этими тегами, отображаться на веб-странице не будет.&lt;/p&gt;
  
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;p&amp;gt;Первый абзац.&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Первый абзац.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt;  определяет абзац (параграф) текста. Если закрывающего тега нет,
  считается, что конец абзаца совпадает с началом следующего блочного элемента.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt; &amp;lt;p&amp;gt;Второй абзац.&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Второй абзац.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt;  является блочным элементом, поэтому текст всегда начинается
  с новой строки, абзацы идущие друг за другом разделяются между собой отбивкой (так называется пустое пространство между ними). Это хорошо видно на рис.&amp;nbsp;4.1.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;/body&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Следует добавить закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/body&amp;gt;&lt;/span&gt;, чтобы показать, что тело документа
  завершено.&lt;/p&gt;
  
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;  Последним элементом в коде всегда идет закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/html&amp;gt;&lt;/span&gt;. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '6',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '9',
        'language_id' => '2',
        'title' => 'Типы тегов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Каждый тег HTML принадлежит к определенной группе тегов,  например, табличные теги направлены на формирование таблиц и не могут  применяться для других целей.&lt;/p&gt;
  &lt;p&gt; Условно теги делятся на следующие типы:&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; теги верхнего уровня;&lt;/li&gt;
    &lt;li&gt; теги заголовка документа;&lt;/li&gt;
    &lt;li&gt; блочные элементы;&lt;/li&gt;
    &lt;li&gt; строчные элементы;&lt;/li&gt;
    &lt;li&gt; универсальные элементы;&lt;/li&gt;
    &lt;li&gt; списки;&lt;/li&gt;
    &lt;li&gt; таблицы;&lt;/li&gt;
    &lt;li&gt; фреймы.&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p&gt; Следует учитывать, что один и тот же тег может  одновременно принадлежать разным группам, например, теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;ul&amp;gt;&lt;/span&gt; относятся к  категории списков, но также являются и блочными элементами.&lt;/p&gt;
  &lt;p&gt; Далее рассмотрим только те теги, которые потребуются нам в  дальнейшей работе.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '10',
        'language_id' => '2',
        'title' => 'Теги верхнего уровня',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Эти теги предназначены для формирования структуры  веб-страницы и определяют раздел заголовка и тела документа.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;html&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt; является контейнером, который заключает в себе всё содержимое веб-страницы,  включая теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;. Открывающий  и закрывающий теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt; в  документе необязательны, но хороший стиль диктует непременное их использование.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;head&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt; предназначен для хранения других элементов, цель которых&amp;nbsp;— помочь браузеру  в работе с данными. Также внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt; находятся метатеги, которые используются для хранения информации,  предназначенной для браузеров и поисковых систем. Например, механизмы поисковых  систем обращаются к метатегам для получения описания сайта, ключевых слов и  других данных.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;body&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt; предназначен для хранения содержания веб-страницы, отображаемого в окне  браузера. Информацию, которую следует выводить в документе, следует располагать  именно внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;.  К такой информации относится текст, изображения, таблицы, списки и др.&lt;/p&gt;
  &lt;p&gt; Набор тегов верхнего уровня и порядок их вложения показан  в примере&amp;nbsp;5.1.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример  5.1. Теги верхнего уровня &lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;html&amp;gt;
  &amp;lt;head&amp;gt;
   ...
  &amp;lt;/head&amp;gt;
  &amp;lt;body&amp;gt;
   ...
  &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   ...
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   ...
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

  &lt;p&gt;В данном примере показано, что контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt; определяет «каркас» всей веб-страницы, внутри него вначале задается тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;,  затем идет контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;, в нем  хранится содержательная часть документа, которая и отображается в браузере.  Теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt; хотя и не  относятся к обязательным тегам (т.&amp;nbsp;е. их можно не размещать в коде), все  же стоит добавлять всегда. Это позволяет получить четкую и понятную структуру  документа. &lt;/p&gt;
  &lt;p&gt; Заметьте, что в примере не упоминается &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;, поскольку  этот обязательный элемент кода веб-страницы не является тегом, а предназначен  для браузеров, чтобы сообщить им, как интерпретировать текущий документ.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '11',
        'language_id' => '2',
        'title' => 'Теги заголовка документа',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt; &lt;p&gt;К этим тегам относятся элементы, которые располагаются в  контейнере &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;. Все  эти теги напрямую не отображаются в окне браузера, за исключением тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;, который  определяет название веб-страницы.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;title&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Используется для отображения строки текста в левом верхнем  углу окна браузера, а также на вкладке. Такая строка сообщает пользователю название сайта и другую  информацию, которую добавляет разработчик.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;meta&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Метатеги используются для хранения информации,  предназначенной для браузеров и поисковых систем. Например, механизмы поисковых  систем обращаются к метатегам для получения описания сайта, ключевых слов и  других данных. Хотя тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;meta&amp;gt;&lt;/span&gt; всего один, он имеет несколько атрибутов, поэтому к нему и применяется  множественное число.&lt;/p&gt;
  &lt;p&gt; Так, для краткого описания содержимого веб-страницы  используется значение &lt;span class=&quot;value&quot;&gt;description&lt;/span&gt; атрибута &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt;, как показано в примере&amp;nbsp;5.2.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример  5.2. Использование description&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
 &amp;lt;title&amp;gt;HTML&amp;lt;/title&amp;gt;
  &amp;lt;meta name=&quot;description&quot; content=&quot;Сайт об HTML и создании сайтов&quot;&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;...&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;HTML&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;description&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;Сайт об HTML и создании сайтов&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
 
  &lt;p&gt;Описание сайта, заданное с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;meta&amp;gt;&lt;/span&gt; и значения &lt;span class=&quot;value&quot;&gt;description&lt;/span&gt;,  обычно отображается в поисковых системах или каталогах при выводе результатов  поиска. Значение &lt;span class=&quot;value&quot;&gt;keywords&lt;/span&gt; также  предназначено в первую очередь для повышения рейтинга сайта в поисковых  системах, в нем перечисляются ключевые слова, встречаемые на  веб-странице (пример&amp;nbsp;5.3).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример  5.3. Использование keywords&lt;/p&gt;
  
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;title&amp;gt;HTML&amp;lt;/title&amp;gt;
  &amp;lt;meta name=&quot;keywords&quot; content=&quot;HTML, META, метатег, тег, поисковая система&quot;&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;...&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;HTML&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;keywords&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;HTML, META, метатег, тег, поисковая система&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;Ключевые слова можно перечислять через пробел или запятую. Поисковые системы сами приведут запись к виду, который они используют.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '12',
        'language_id' => '2',
        'title' => 'Блочные элементы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Блочные элементы характеризуются тем, что занимают всю  доступную ширину, высота элемента определяется его содержимым, и он всегда  начинается с новой строки.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;blockquote&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Предназначен для выделения длинных цитат внутри документа.  Текст, обозначенный этим тегом, традиционно отображается как выровненный блок с  отступами слева и справа (примерно по 40 пикселов), а также с пустым  пространством сверху и снизу.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;div&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;div&amp;gt;&lt;/span&gt; относится к универсальным блочным контейнерам и применяется в тех случаях, где  нужны блочные элементы без дополнительных свойств. Также с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;div&amp;gt;&lt;/span&gt; можно  выравнивать текст внутри этого контейнера с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;h1&amp;gt;,...,&amp;lt;h6&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Эта группа тегов определяет текстовые заголовки разного  уровня, которые показывают относительную важность секции, расположенной после  заголовка.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;hr&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Рисует горизонтальную линию, которая по своему виду  зависит от используемых атрибутов. Линия всегда начинается с  новой строки, а после нее все элементы отображаются на следующей строке.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;p&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Определяет параграф (абзац) текста.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;pre&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Задает блок предварительно форматированного текста. Такой  текст отображается обычно моноширинным шрифтом и со всеми пробелами между  словами. В HTML любое количество пробелов идущих в коде подряд на веб-странице  показывается как один. Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;pre&amp;gt;&lt;/span&gt; позволяет обойти эту особенность и отображать текст как требуется разработчику.&lt;/p&gt;
  &lt;p&gt; Следующие теги не должны размещаться внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;pre&amp;gt;&lt;/span&gt;: &lt;span class=&quot;tag&quot;&gt;&amp;lt;big&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;small&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;sub&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;sup&amp;gt;&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '13',
        'language_id' => '2',
        'title' => 'Строчные элементы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Строчными называются такие элементы веб-страницы,  которые являются непосредственной частью другого элемента, например, текстового  абзаца. В основном они используются для изменения вида текста или его  логического выделения.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;a&amp;gt;&lt;/h3&gt;
  &lt;p&gt; Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; является одним  из важных элементов HTML и предназначен для создания ссылок. В зависимости от  присутствия атрибутов &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; или &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; устанавливает  ссылку или якорь.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;b&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Определяет жирное начертание шрифта.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;big&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;big&amp;gt;&lt;/span&gt; увеличивает размер шрифта на единицу по сравнению с обычным текстом. В HTML  размер шрифта измеряется в условных единицах от 1 до 7, средний размер текста,  используемый по умолчанию, принят 3. Таким образом, добавление тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;big&amp;gt;&lt;/span&gt; увеличивает  текст на одну условную единицу.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;br&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt; устанавливает перевод строки в том месте, где этот тег находится. В отличие от  тега параграфа &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt;,  использование тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt; не  добавляет пустой отступ перед строкой.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;em&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;em&amp;gt;&lt;/span&gt; предназначен для акцентирования текста. Браузеры отображают такой текст  курсивным начертанием.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;i&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Устанавливает курсивное начертание шрифта. &lt;/p&gt;
  &lt;h3&gt;&amp;lt;img&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; предназначен для отображения на веб-странице изображений в графическом формате  GIF, JPEG или PNG. Если необходимо, то рисунок можно сделать ссылкой на другой  файл, поместив тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; в  контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;. При  этом вокруг изображения отображается рамка, которую можно убрать, добавив атрибут &lt;span class=&quot;attribute&quot;&gt;border=&quot;0&quot;&lt;/span&gt; в тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;small&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;small&amp;gt;&lt;/span&gt; уменьшает размер шрифта на единицу по сравнению с обычным текстом. По своему  действию похож на тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;big&amp;gt;&lt;/span&gt;,  но действует с точностью до наоборот.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;span&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Универсальный тег, предназначенный для определения  строчного элемента внутри документа.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;strong&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt; предназначен для акцентирования текста. Браузеры отображают такой текст жирным  начертанием.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;sub&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Отображает шрифт в виде нижнего индекса. Текст при этом  располагается ниже базовой линии остальных символов строки и уменьшенного  размера&amp;nbsp;— H&lt;sub&gt;2&lt;/sub&gt;O.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;sup&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Отображает шрифт в виде верхнего индекса. По своему  действию похож на &lt;span class=&quot;tag&quot;&gt;&amp;lt;sub&amp;gt;&lt;/span&gt;,  но текст отображается выше базовой линии текста&amp;nbsp;— м&lt;sup&gt;2&lt;/sup&gt;.&lt;/p&gt;
  &lt;p&gt;Разница между блочными и строчными элементами следующая. &lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; Строчные элементы могут содержать только данные или  другие строчные элементы, а в блочные допустимо вкладывать другие блочные  элементы, строчные элементы, а также данные. Иными словами, строчные элементы никак не могут хранить блочные элементы.&lt;/li&gt;
    &lt;li&gt; Блочные элементы всегда начинаются с новой строки, а  строчные таким способом не акцентируются.&lt;/li&gt;
    &lt;li&gt; Блочные элементы занимают всю доступную ширину,  например, окна браузера, а ширина строчных элементов равна их содержимому  плюс значения отступов, полей и границ.&lt;/li&gt;
  &lt;/ul&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '14',
        'language_id' => '2',
        'title' => 'Универсальные элементы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Особенность этих тегов состоит в том, что они в  зависимости от контекста могут использоваться как блочные или встроенные  элементы.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;del&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;del&amp;gt;&lt;/span&gt; используется для выделения текста, который был удален в новой версии документа.  Подобное форматирование позволяет отследить, какие изменения в тексте документа  были сделаны. Браузеры обычно помечают текст в контейнере &lt;span class=&quot;tag&quot;&gt;&amp;lt;del&amp;gt;&lt;/span&gt; как перечеркнутый.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;ins&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;ins&amp;gt;&lt;/span&gt; предназначен для акцентирования вновь добавленного текста и обычно применяется  наряду с тегом &lt;span class=&quot;tag&quot;&gt;&amp;lt;del&amp;gt;&lt;/span&gt;.  Браузеры помечают содержимое контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;ins&amp;gt;&lt;/span&gt; подчеркиванием текста.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '15',
        'language_id' => '2',
        'title' => 'Теги для списков',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Списком называется взаимосвязанный набор отдельных фраз  или предложений, которые начинаются с маркера или цифры. Списки предоставляют  возможность упорядочить и систематизировать разные данные и представить их в  наглядном и удобном для пользователя виде.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;ol&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt; устанавливает нумерованный список, т.е. каждый элемент списка начинается с  числа или буквы и увеличивается по нарастающей.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;ul&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Устанавливает маркированный список, каждый элемент  которого начинается с небольшого символа&amp;nbsp;— маркера.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;li&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;li&amp;gt;&lt;/span&gt; определяет отдельный элемент списка. Внешний тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;ul&amp;gt;&lt;/span&gt; или &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt; устанавливает  тип списка&amp;nbsp;— маркированный или нумерованный.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;dd&amp;gt;, &amp;lt;dt&amp;gt;, &amp;lt;dl&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тройка элементов предназначена для создания списка  определений. Каждый такой список начинается с контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;dl&amp;gt;&lt;/span&gt;,  куда входит тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;dt&amp;gt;&lt;/span&gt; создающий термин и тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;dd&amp;gt;&lt;/span&gt; задающий определение этого термина. Закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/dd&amp;gt;&lt;/span&gt; не обязателен, поскольку следующий тег сообщает о завершении предыдущего  элемента. Тем не менее, хорошим стилем является закрывать все теги.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '16',
        'language_id' => '2',
        'title' => 'Теги для таблиц',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Таблица состоит из строк и столбцов ячеек, которые могут  содержать текст и рисунки. Обычно таблицы используются для упорядочения и  представления табличных данных.&lt;/p&gt;&lt;!--break--&gt;
  &lt;h3&gt;&amp;lt;table&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Служит контейнером для элементов, определяющих содержимое  таблицы. Любая таблица состоит из строк и ячеек, которые задаются с помощью  тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;td&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Предназначен для создания одной ячейки таблицы. Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt; должен  размещаться внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt;,  который в свою очередь располагается внутри тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;th&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;th&amp;gt;&lt;/span&gt; предназначен для создания одной ячейки таблицы, которая обозначается как  заголовочная. Текст в такой ячейке отображается браузером обычно жирным шрифтом  и выравнивается по центру.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;tr&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt; служит контейнером для создания строки таблицы. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '17',
        'language_id' => '2',
        'title' => 'Теги для фреймов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt; &lt;p&gt;&lt;span class=&quot;term&quot;&gt;Фреймы&lt;/span&gt; разделяют  окно браузера на отдельные области, расположенные вплотную друг к другу. В  каждую из таких областей загружается самостоятельная веб-страница определяемая  с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt;. С  помощью фреймов веб-страница делится на два или более документа, которые обычно  содержат навигацию по сайту и его контент. Механизм фреймов позволяет открывать  документ в одном фрейме, по ссылке, нажатой в совершенно другом фрейме.  Допустимо также использовать вложенную структуру элементов, это позволяет дробить  фреймы на мелкие области.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;frame&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt; определяет свойства отдельного фрейма, на которые делится окно браузера.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;frameset&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt; заменяет собой элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt; на веб-странице и формирует структуру фреймов.&lt;/p&gt;
  &lt;h3&gt;&amp;lt;iframe&amp;gt;&lt;/h3&gt;
  &lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;iframe&amp;gt;&lt;/span&gt; создает плавающий фрейм, который находится внутри обычного документа, он  позволяет загружать в область заданных размеров любые другие независимые  документы.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '5',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '18',
        'language_id' => '2',
        'title' => 'Значения атрибутов тегов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Атрибуты тегов расширяют возможности самих тегов и  позволяют гибко управлять различными настройками отображения элементов  веб-страницы. Общее количество атрибутов достаточно велико, но их значения,  как правило, можно сгруппировать по разным типам, например, задающих цвет,  размер, адрес и др. Далее рассмотрим основные типы значений.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '8',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '19',
        'language_id' => '2',
        'title' => 'Цвет',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;В HTML цвет задается одним из двух путей: с помощью  шестнадцатеричного кода и по названию некоторых цветов. Преимущественно  используется способ, основанный на шестнадцатеричной системе исчисления, как  наиболее универсальный.&lt;/p&gt;
  &lt;h3&gt;Шестнадцатеричные цвета&lt;/h3&gt;
  &lt;p&gt;Для задания цветов в HTML используются числа в  шестнадцатеричном коде. Шестнадцатеричная система, в отличие от десятичной  системы, базируется, как следует из ее названия, на числе 16. Цифры будут  следующие: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F. Числа от 10 до 15  заменены латинскими буквами. В табл.&amp;nbsp;6.1 приведено соответствие десятичных  и шестнадцатеричных чисел.&lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 6.1. Десятичные и шестнадцатеричные числа меньше 16
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Десятичные &lt;/th&gt;
      &lt;td&gt;0&lt;/td&gt;
      &lt;td&gt;1&lt;/td&gt;
      &lt;td&gt;2&lt;/td&gt;
      &lt;td&gt;3&lt;/td&gt;
      &lt;td&gt;4&lt;/td&gt;
      &lt;td&gt;5&lt;/td&gt;
      &lt;td&gt;6&lt;/td&gt;
      &lt;td&gt;7&lt;/td&gt;
      &lt;td&gt;8&lt;/td&gt;
      &lt;td&gt;9&lt;/td&gt;
      &lt;td&gt;10&lt;/td&gt;
      &lt;td&gt;11&lt;/td&gt;
      &lt;td&gt;12&lt;/td&gt;
      &lt;td&gt;13&lt;/td&gt;
      &lt;td&gt;14&lt;/td&gt;
      &lt;td&gt;15&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th&gt;Шестнадцатеричные&lt;/th&gt;
      &lt;td&gt;0&lt;/td&gt;
      &lt;td&gt;1&lt;/td&gt;
      &lt;td&gt;2&lt;/td&gt;
      &lt;td&gt;3&lt;/td&gt;
      &lt;td&gt;4&lt;/td&gt;
      &lt;td&gt;5&lt;/td&gt;
      &lt;td&gt;6&lt;/td&gt;
      &lt;td&gt;7&lt;/td&gt;
      &lt;td&gt;8&lt;/td&gt;
      &lt;td&gt;9&lt;/td&gt;
      &lt;td&gt;A&lt;/td&gt;
      &lt;td&gt;B&lt;/td&gt;
      &lt;td&gt;C&lt;/td&gt;
      &lt;td&gt;D&lt;/td&gt;
      &lt;td&gt;E&lt;/td&gt;
      &lt;td&gt;F&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p&gt;Числа больше 15 в шестнадцатеричной системе образуются  объединением двух чисел в одно (табл.&amp;nbsp;6.2). Например, числу 255 в десятичной  системе соответствует число FF в шестнадцатеричной.&lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 6.2. Десятичные и шестнадцатеричные числа больше 16
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Десятичные&lt;/th&gt;
      &lt;td&gt;16&lt;/td&gt;
      &lt;td&gt;17&lt;/td&gt;
      &lt;td&gt;18&lt;/td&gt;
      &lt;td&gt;19&lt;/td&gt;
      &lt;td&gt;20&lt;/td&gt;
      &lt;td&gt;21&lt;/td&gt;
      &lt;td&gt;22&lt;/td&gt;
      &lt;td&gt;23&lt;/td&gt;
      &lt;td&gt;24&lt;/td&gt;
      &lt;td&gt;25&lt;/td&gt;
      &lt;td&gt;26&lt;/td&gt;
      &lt;td&gt;27&lt;/td&gt;
      &lt;td&gt;28&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th&gt;Шестнадцатеричные&lt;/th&gt;
      &lt;td&gt;10&lt;/td&gt;
      &lt;td&gt;11&lt;/td&gt;
      &lt;td&gt;12&lt;/td&gt;
      &lt;td&gt;13&lt;/td&gt;
      &lt;td&gt;14&lt;/td&gt;
      &lt;td&gt;15&lt;/td&gt;
      &lt;td&gt;16&lt;/td&gt;
      &lt;td&gt;17&lt;/td&gt;
      &lt;td&gt;18&lt;/td&gt;
      &lt;td&gt;19&lt;/td&gt;
      &lt;td&gt;1A&lt;/td&gt;
      &lt;td&gt;1B&lt;/td&gt;
      &lt;td&gt;1C&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p&gt;Чтобы не возникало путаницы в определении системы  счисления, перед шестнадцатеричным числом ставится символ решетки #, например #aa69cc. При этом регистр значения не имеет,  поэтому допустимо писать #F0F0F0 или #f0f0f0.&lt;/p&gt;
  &lt;p&gt; Типичный цвет, используемый в HTML, выглядит следующим  образом.&lt;/p&gt;
  &lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;body bgcolor=&quot;#fa8e47&quot;&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#fa8e47&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
  &lt;p&gt;Здесь цвет фона веб-страницы задан как #FA8E47. Символ решетки # перед числом означает, что оно  шестнадцатеричное. Первые две цифры (FA) определяют красную составляющую цвета, цифры с третьей по  четвертую (8E)&amp;nbsp;— зеленую, а последние  две цифры (47)&amp;nbsp;—  синюю. В итоге получится такой цвет.&lt;/p&gt;
  &lt;table style=&quot;width: 264px; margin: auto&quot;&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;td style=&quot;background: #fa0000; color: #fff&quot;&gt;FA&lt;/td&gt;
      &lt;td&gt;+&lt;/td&gt;
      &lt;td style=&quot;background: #008e00; color: #fff&quot;&gt;8E&lt;/td&gt;
      &lt;td&gt;+&lt;/td&gt;
      &lt;td style=&quot;background: #000047; color: #fff&quot;&gt;47&lt;/td&gt;
      &lt;td&gt;=&lt;/td&gt;
      &lt;td style=&quot;background: #FA8E47&quot;&gt;FA8E47&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p&gt;Каждый из трех цветов&amp;nbsp;— красный, зеленый и синий&amp;nbsp;— может принимать значения от 00  до FF, что в итоге образует 256 оттенков. Таким образом, общее количество цветов  может быть 256х256х256 = 16.777.216 комбинаций. Цветовая модель, основанная на  красной, зеленой и синей составляющей получила название &lt;span class=&quot;term&quot;&gt;RGB&lt;/span&gt; (red, green, blue; красный, зеленый, синий). Эта  модель аддитивная (от add&amp;nbsp;—  складывать), при которой сложение всех трех компонент образует белый цвет.&lt;/p&gt;
  &lt;p&gt; Чтобы легче ориентироваться в шестнадцатеричных цветах, примите  во внимание некоторые правила. &lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; Если значения компонент цвета одинаковы (например: #D6D6D6), то получится серый оттенок. Чем больше число, тем светлее  цвет, значения при этом меняются от #000000 (черный) до #FFFFFF (белый).&lt;/li&gt;
    &lt;li&gt; Ярко-красный цвет образуется, если красный компонент  сделать максимальным (FF),  а остальные компоненты обнулить. Цвет со значением #FF0000 самый красный из возможных  красных оттенков. Аналогично обстоит с зеленым цветом (#00FF00) и синим (#0000FF). &lt;/li&gt;
    &lt;li&gt; Желтый цвет (#FFFF00) получается смешением красного с зеленым. Это хорошо видно  на цветовом круге (рис.&amp;nbsp;6.1), где представлены основные цвета (красный,  зеленый, синий) и комплементарные или дополнительные. К ним относятся желтый,  голубой и фиолетовый (еще называемым пурпурным). Вообще, любой цвет можно  получить смешением близлежащих к нему цветов. Так, голубой (#00FFFF) получается за счет  объединения синего и зеленого цвета.&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_06_01.png&quot; alt=&quot;Рис. 6.1&quot; width=&quot;201&quot; height=&quot;201&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 6.1. Цветовой круг&lt;/p&gt;
  &lt;p&gt; Цвета по шестнадцатеричным значениям не обязательно  подбирать эмпирическим путем. Для этой цели подойдет графический редактор,  умеющий работать с разными цветовыми моделями, например, Adobe Photoshop. На рис.&amp;nbsp;6.2  показано окно для выбора цвета в этой программе, линией обведено полученное шестнадцатеричное  значение текущего цвета. Его можно скопировать и вставить к себе в код.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_06_02.jpg&quot; alt=&quot;Рис. 6.2&quot; width=&quot;558&quot; height=&quot;377&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 6.2. Окно для выбора цвета в программе Photoshop&lt;/p&gt;
  &lt;h3&gt;Веб-цвета&lt;/h3&gt;
  &lt;p&gt;Если установить качество цветопередачи монитора в 8 бит  (256 цветов), то один и тот же цвет может показываться в разных браузерах  по-своему. Это связано со способом отображения графики, когда браузер работает  со своей собственной палитрой и не может показать цвет, который у него в палитре  отсутствует. В этом случае цвет заменяется сочетанием пикселов других, близких  к нему, цветов, имитирующих заданный. Чтобы цвет оставался неизменным в разных  браузерах, ввели палитру так называемых веб-цветов. &lt;span class=&quot;term&quot;&gt;Веб-цветами&lt;/span&gt; называются такие цвета, для каждой составляющей которых&amp;nbsp;—  красной, зеленой и синей&amp;nbsp;— устанавливается одно из шести значений&amp;nbsp;— 0 (00),  51 (33), 102 (66), 153 (99), 204 (CC), 255 (FF). В скобках указано  шестнадцатеричное значение данной компоненты. Общее количество цветов из всех  возможных сочетаний дает 6х6х6&amp;nbsp;— 216 цветов. Пример веб-цвета&amp;nbsp;—  #33FF66.&lt;/p&gt;
  &lt;p&gt; Основная особенность веб-цвета заключается в том, что он  показывается одинаково во всех браузерах. В данный момент актуальность  веб-цветов весьма мала из-за повышения качества мониторов и расширения их  возможностей.&lt;/p&gt;
  &lt;h3&gt;Цвета по названию&lt;/h3&gt;
  &lt;p&gt;Чтобы не запоминать совокупность цифр, вместо них можно  использовать имена широко используемых цветов. В табл.&amp;nbsp;6.3 приведены имена  популярных названий цветов.&lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 6.3. Названия некоторых цветов
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Имя цвета &lt;/th&gt;
      &lt;th&gt;Цвет&lt;/th&gt;
      &lt;th&gt;Описание&lt;/th&gt;
      &lt;th&gt;Шестнадцатеричное значение&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;black&lt;/td&gt;
      &lt;td style=&quot;background: black&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Черный&lt;/td&gt;
      &lt;td&gt;#000000&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;blue&lt;/td&gt;
      &lt;td style=&quot;background: blue&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Синий&lt;/td&gt;
      &lt;td&gt;#0000FF&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;fuchsia&lt;/td&gt;
      &lt;td style=&quot;background: fuchsia&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Светло-фиолетовый&lt;/td&gt;
      &lt;td&gt;#FF00FF&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;gray&lt;/td&gt;
      &lt;td style=&quot;background: gray&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Темно-серый&lt;/td&gt;
      &lt;td&gt;#808080&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;green&lt;/td&gt;
      &lt;td style=&quot;background: green&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Зеленый&lt;/td&gt;
      &lt;td&gt;#008000&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;lime&lt;/td&gt;
      &lt;td style=&quot;background: lime&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Светло-зеленый&lt;/td&gt;
      &lt;td&gt;#00FF00&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;maroon&lt;/td&gt;
      &lt;td style=&quot;background: maroon&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Темно-красный&lt;/td&gt;
      &lt;td&gt;#800000&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;navy&lt;/td&gt;
      &lt;td style=&quot;background: navy&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Темно-синий&lt;/td&gt;
      &lt;td&gt;#000080&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;olive&lt;/td&gt;
      &lt;td style=&quot;background: olive&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Оливковый&lt;/td&gt;
      &lt;td&gt;#808000&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;purple&lt;/td&gt;
      &lt;td style=&quot;background: purple&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Темно-фиолетовый&lt;/td&gt;
      &lt;td&gt;#800080&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;red&lt;/td&gt;
      &lt;td style=&quot;background: red&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Красный&lt;/td&gt;
      &lt;td&gt;#FF0000&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;silver&lt;/td&gt;
      &lt;td style=&quot;background: silver&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Светло-серый&lt;/td&gt;
      &lt;td&gt;#C0C0C0&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;teal&lt;/td&gt;
      &lt;td style=&quot;background: teal&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Сине-зеленый&lt;/td&gt;
      &lt;td&gt;#008080&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;white&lt;/td&gt;
      &lt;td style=&quot;background: white&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Белый&lt;/td&gt;
      &lt;td&gt;#FFFFFF&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;yellow&lt;/td&gt;
      &lt;td style=&quot;background: yellow&quot;&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;Желтый&lt;/td&gt;
      &lt;td&gt;#FFFF00&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p&gt;Не имеет значения, каким способом вы задаете цвет&amp;nbsp;—  по его имени или с помощью шестнадцатеричных чисел. По своему действию эти  способы равны. В примере&amp;nbsp;6.1 показано, как установить цвет фона и текста  веб-страницы.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt; Пример 6.1. Цвет  фона и текста &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;title&amp;gt;Цвета&amp;lt;/title&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body bgcolor=&quot;teal&quot; text=&quot;#ffffff&quot;&amp;gt;
  &amp;lt;p&amp;gt;Пример текста&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Цвета&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;teal&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; text=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Пример текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В данном примере цвет фона задается с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;bgcolor&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;, а цвет  текста через атрибут &lt;span class=&quot;attribute&quot;&gt;text&lt;/span&gt;.  Для разнообразия значение у атрибута &lt;span class=&quot;attribute&quot;&gt;text&lt;/span&gt; установлено в виде шестнадцатеричного числа, а у &lt;span class=&quot;attribute&quot;&gt;bgcolor&lt;/span&gt; с помощью зарезервированного ключевого слова &lt;span class=&quot;value&quot;&gt;teal&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '8',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '20',
        'language_id' => '2',
        'title' => 'Размер',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt; &lt;p&gt;В HTML  размеры элементов или расстояния между ними задаются в пикселах или процентах. &lt;span class=&quot;term&quot;&gt;Пиксел&lt;/span&gt;&amp;nbsp;— это элементарная точка на  экране монитора, является относительной единицей измерения, ее величина зависит  от установленного экранного разрешения и размера монитора. Возьмем, к примеру, популярное  разрешение монитора 1024х768 пикселов. Картинка с такими же размерами будет  занимать всю область экрана. Увеличив разрешение монитора до 1280х1024, мы, тем  самым, уменьшим размеры изображения на экране. &lt;/p&gt;
  &lt;p&gt; При использовании пикселов в качестве значений пишется  только число без указания единиц, например: &lt;span class=&quot;attribute&quot;&gt;width=&quot;380&quot;&lt;/span&gt;.  В примере&amp;nbsp;6.2 приведено добавление изображения с заданными размерами.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример  6.2. Размеры изображения в пикселах &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Изображение&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/figure.jpg&quot; alt=&quot;Винни-Пух в гостях у Кролика&quot;
  width=&quot;100&quot; height=&quot;111&quot; hspace=&quot;4&quot; vspace=&quot;4&quot; border=&quot;2&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Изображение&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/figure.jpg&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Винни-Пух в гостях у Кролика&quot;&lt;/span&gt;&lt;/span&gt;
 &lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;111&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; hspace=&lt;span class=&quot;value&quot;&gt;&quot;4&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; vspace=&lt;span class=&quot;value&quot;&gt;&quot;4&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
	
  &lt;p&gt;В данном примере рисунок имеет ширину 100 пикселов (&lt;span class=&quot;attribute&quot;&gt;width=&quot;100&quot;&lt;/span&gt;),  высоту 111 пикселов (&lt;span class=&quot;attribute&quot;&gt;height=&quot;111&quot;&lt;/span&gt;),  горизонтальный и вертикальный отступ по 4 пиксела (&lt;span class=&quot;attribute&quot;&gt;hspace&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;vspace&lt;/span&gt;) и толщину границы  вокруг картинки 2 пиксела (&lt;span class=&quot;attribute&quot;&gt;border=&quot;2&quot;&lt;/span&gt;).&lt;/p&gt;
  &lt;p&gt;Процентная запись удачно дополняет пикселы, поскольку  позволяет привязаться к размерам определенного элемента, к примеру, окна  браузера. Так, если задать у картинки ширину 100%, то рисунок будет заполнять  все свободное пространство окна по ширине. Браузер понимает, что речь идет о  процентах, если после числа добавляется символ %, например: &lt;span class=&quot;attribute&quot;&gt;width=&quot;40%&quot;&lt;/span&gt;.&lt;/p&gt;
  &lt;p class=&quot;note&quot;&gt; Размеры допустимо задавать только в целых числах. Это правило  относится как к пикселам, так и процентам.&lt;/p&gt;
  &lt;p&gt;Учтите, что размер в процентах вычисляется от размеров родительского элемента, иными словами, контейнера, внутри которого располагается элемент. Если родитель явно не задан, тогда за отсчет принимается окно браузера. В примере&amp;nbsp;6.3 приведен код веб-страницы, в котором ширина элементов задается в процентах.&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt; Пример  6.3. Размеры изображения в процентах &lt;/p&gt;

&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Изображение&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/figure.jpg&quot; alt=&quot;Винни-Пух в гостях у Кролика&quot; width=&quot;100%&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Изображение&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/figure.jpg&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Винни-Пух в гостях у Кролика&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В данном примере ширина картинки задана как 100%, при этом  высота изображения явно не задается, поскольку она вычисляется автоматически.  Вид страницы при таких размерах картинки показан на рис.&amp;nbsp;6.3.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_06_03.jpg&quot; alt=&quot;Рис. 6.3&quot; width=&quot;526&quot; height=&quot;286&quot;&gt; &lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 6.3. Изображение с шириной 100%&lt;/p&gt;
  &lt;p&gt; Обратите внимание, что в изображении появляются заметные искажения, это связано с увеличением картинки вопреки ее исходным размерам. &lt;/p&gt;
  &lt;p&gt; Как вы понимаете, ширина окна принимается за 100%, но ее легко превысить, причем ненароком. В частности, стоит только добавить в  примере&amp;nbsp;6.3 к тегу &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; отступы по горизонтали (&lt;span class=&quot;attribute&quot;&gt;hspace=&quot;10&quot;&lt;/span&gt;) и ширина  изображения станет 100%+20. Это в свою очередь приведет к появлению  горизонтальной полосы прокрутки. Учитывайте этот нюанс при установке размеров  элементов.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '8',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '21',
        'language_id' => '2',
        'title' => 'Адрес',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Адресом называется путь к документу, например, к графическому  файлу. Адрес необходим в тех случаях, когда делается ссылка на веб-страницу или  загружается определенный файл. Например, в теге &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; адрес используется в качестве значения атрибута &lt;span class=&quot;attribute&quot;&gt;src&lt;/span&gt;,  он задает путь к файлу с изображением.&lt;/p&gt;
  &lt;p&gt; Синонимом адреса выступает URL (Universal Resource Locator, универсальный  указатель ресурсов), различают абсолютные и относительные адреса.&lt;/p&gt;
  &lt;h3&gt;Абсолютные адреса&lt;/h3&gt;
  &lt;p&gt;Подобные адреса работают везде и всюду независимо от имени  сайта или веб-страницы, где задан URL, и начинаются всегда с указания  протокола передачи данных. Для веб-страниц это обычно HTTP (HyperText Transfer  Protocol, протокол передачи гипертекста), соответственно, абсолютные адреса  начинаются с ключевого слова &lt;span class=&quot;attribute&quot;&gt;http://&lt;/span&gt;.  В примере&amp;nbsp;6.4 приведена ссылка, в которой применяется абсолютный адрес.&lt;/p&gt;
  
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример  6.4. Использование абсолютного адреса в ссылке &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Ссылка&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;http://htmlbook.ru/html/body&quot;&amp;gt;Описание тега BODY&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;http://htmlbook.ru/html/body&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Описание тега BODY&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В данном примере текстовая ссылка ведет на сайт htmlbook.ru и указывает на веб-страницу с именем body.html, которая располагается в каталоге html. &lt;/p&gt;
  &lt;p&gt; Абсолютные адреса применяются в первую очередь для  указания на другой сетевой ресурс и достаточно редко используются в рамках  одного сайта. &lt;/p&gt;
  &lt;h3&gt;Относительные адреса&lt;/h3&gt;
  &lt;p&gt;Относительные адреса указываются от корня сайта или  текущего документа. Например, код &lt;span class=&quot;attribute&quot;&gt;&amp;lt;img src=&quot;pic.gif&quot;&amp;gt;&lt;/span&gt; означает  загрузить графический файл с именем pic.gif,  который располагается в той же папке, что и сама веб-страница. Далее рассмотрим  несколько примеров таких адресов.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;/&lt;/strong&gt;&lt;br&gt;
    Адрес указывает обычно на файл index.html, который  находится в корне сайта. Если файл index.html отсутствует, браузер, как  правило, показывает список файлов, находящихся в данном каталоге. Имя файла не  обязательно должно быть index.html, этот параметр меняется  через настройки &lt;span class=&quot;term&quot;&gt;веб-сервера&lt;/span&gt;&amp;nbsp;—  так называется программа, которая анализирует приходящие от браузера запросы и передает  ему документы, показываемые пользователю.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;/images/pic.gif&lt;/strong&gt;&lt;br&gt;
    Слэш (символ /) перед адресом говорит о том, что адресация  начинается от корня сайта. Ссылка ведет на рисунок pic.gif, который находится в  папке images. А та в свою очередь размещена в корне сайта.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;../help/me.html&lt;/strong&gt;&lt;br&gt;
    Две точки перед именем указывают браузеру перейти на  уровень выше в списке каталогов сайта и там «поискать» в папке help файл me.html.&lt;/p&gt;
  &lt;p&gt;&lt;strong&gt;manual/info.html&lt;/strong&gt;&lt;br&gt;
    Если перед именем папки нет никаких дополнительных  символов, вроде точек или слэша, то папка размещена внутри текущего  каталога, а уже в ней располагается файл info.html.&lt;/p&gt;
  &lt;p class=&quot;note&quot;&gt; Адреса относительно корня сайта вроде /demo/ работают только под управлением  веб-сервера и на локальном компьютере не применимы.&lt;/p&gt;
  &lt;p&gt; В примере 6.5 приведены ссылки, в которых используются  относительные адреса.&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt; Пример  6.5. Относительные адреса в ссылках &lt;/p&gt;

&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Ссылки&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;a href=&quot;images/xxx.jpg&quot;&amp;gt;Посмотрите на мою фотографию!&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;a href=&quot;tip.html&quot;&amp;gt;Как сделать такое же фото?&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылки&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;images/xxx.jpg&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Посмотрите на мою фотографию!&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;tip.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Как сделать такое же фото?&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
	
  &lt;p&gt;Иногда можно встретить в адресе ссылки путь в виде  &lt;span class=&quot;value&quot;&gt;./file/doc.html&lt;/span&gt;. Точка со слэшем означает, что отсчет ведется от текущей папки.  Подобная запись избыточна и ее можно сократить до &lt;span class=&quot;value&quot;&gt;file/doc.html&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '8',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '22',
        'language_id' => '2',
        'title' => 'Текст',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для изменения вида текста существует достаточно большое количество различных     тегов. Это и немудрено, ведь текст самый популярный вид информации. &lt;/p&gt;
&lt;h2&gt;Особенности текста в HTML&lt;/h2&gt;
&lt;p&gt;Прежде чем редактировать код веб-страницы, следует принять во внимание  некоторые особенности, которые присущи HTML при работе с текстом. &lt;/p&gt;
&lt;h3&gt;Любое количество пробелов идущих подряд, в браузере отображается как  один&lt;/h3&gt;
&lt;p&gt;Сколько бы вы не поставили пробелов между словами, это никак не повлияет на  конечный вид текста. Это же правило относится к символам табуляции и переносу  текста. Поэтому не ставьте лишних пробелов, поскольку это лишь увеличит общий  объем файла, но никак не изменит вид документа в браузере. Приведенные ниже  строки будут отображаться на веб-странице одинаково, несмотря на их разное  написание.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;p&amp;gt;Измеряй микрометром. Отмечай мелом. Отрубай топором.&amp;lt;/p&amp;gt;
&amp;lt;p&amp;gt;Измеряй микрометром.   Отмечай мелом.   Отрубай топором.&amp;lt;/p&amp;gt; 
&amp;lt;p&amp;gt;Измеряй микрометром.
   Отмечай мелом.
   Отрубай топором.&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Измеряй микрометром. Отмечай мелом. Отрубай топором.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Измеряй микрометром.   Отмечай мелом.   Отрубай топором.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt; 
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Измеряй микрометром.
   Отмечай мелом.
   Отрубай топором.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Исключением из этого правила является тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;pre&amp;gt;&lt;/span&gt;,     внутри которого любое число пробелов отображается именно так, как оно указано     в коде. &lt;/p&gt;
&lt;h3&gt; Нет расстановки переносов в тексте&lt;/h3&gt;
&lt;p&gt; HTML не поддерживает расстановку переносов в словах, как это делают текстовые     редакторы, иначе говоря, все слова пишутся целиком без их разбиения. Это условие несущественно, пока не используется выравнивание текста     по ширине. В этом случае блок текста выравнивается по левому и правому краю.     Короткие строки при этом растягиваются за счет автоматического добавления пробелов     между словами. Иногда пустые блоки между словами настолько велики, что портят     внешний вид страницы и ухудшают читабельность текста.&lt;/p&gt;
&lt;p&gt;Представьте, что у вас в середине предложения есть какое-нибудь длинное слово,     вот например
  «Дегидроэпиандростерон»
  . В текстовом редакторе это слово будет     перенесено по слогам так, чтобы текст занял указанную ширину, а на веб-странице     подобное слово будет отображаться целиком, без переносов.&lt;/p&gt;
&lt;h3&gt; Текст занимает ширину окна браузера&lt;/h3&gt;
&lt;p&gt; Если вы просто напишете одну длинную строку в коде HTML, то в браузере она     будет отформатирована, чтобы текст поместился по ширине в окно. Переносы текста     будут добавлены автоматически в местах пробела или дефиса. Что произойдет, если     в тексте нет ни того, ни другого символа? Браузер не сможет создать переносы     и отобразит текст одной строкой. Если она шире окна браузера, то неминуемо появится     горизонтальная полоса прокрутки.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '23',
        'language_id' => '2',
        'title' => 'Абзацы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt; Как правило, блоки текста разделяют между собой абзацами (параграфами). По     умолчанию между параграфами существует небольшой вертикальный отступ, называемый     отбивкой.
  Синтаксис создания абзацев следующий.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;p&amp;gt;Абзац 1&amp;lt;/p&amp;gt;
&amp;lt;p&amp;gt;Абзац 2&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Абзац 1&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Абзац 2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Каждый абзац начинается с тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt; и заканчивается необязательным закрывающим тегом &lt;span class=&quot;tag&quot;&gt;&amp;lt;/p&amp;gt;&lt;/span&gt;.&lt;/p&gt;

&lt;p class=&quot;note&quot;&gt; В любой книге для выделения следующего абзаца используется отступ первой строки,     еще называемый
  «красная строка». Это позволяет читателю легко отыскивать взглядом     новую строку и повышает, таким образом, читабельность текста. На веб-странице     этот прием обычно не используется, а для разделения абзацев применяется отбивка.&lt;/p&gt;
&lt;p&gt; В примере 7.1 показано применение абзацев для создания отступов между строками. &lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.1. Использование абзацев&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Применение абзацев&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;p&amp;gt;В одних садах цветёт миндаль, в других метёт метель.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;В одних краях ещё февраль, в других - уже апрель.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;Проходит время, вечный счёт: год за год, век за век...&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;Во всём - его неспешный ход, его кромешный бег.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;В году на радость и печаль по двадцать пять недель.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;Мне двадцать пять недель февраль, и двадцать пять - апрель.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;По двадцать пять недель в туман уходит счёт векам.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;Летит мой звонкий балаган куда-то к облакам.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;i&amp;gt;М. Щербаков&amp;lt;/i&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Применение абзацев&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;В одних садах цветёт миндаль, в других метёт метель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;В одних краях ещё февраль, в других - уже апрель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Проходит время, вечный счёт: год за год, век за век...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Во всём - его неспешный ход, его кромешный бег.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;В году на радость и печаль по двадцать пять недель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Мне двадцать пять недель февраль, и двадцать пять - апрель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;По двадцать пять недель в туман уходит счёт векам.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Летит мой звонкий балаган куда-то к облакам.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;М. Щербаков&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;


&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;7.1. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_01.png&quot; alt=&quot;Рис. 7.1&quot; width=&quot;526&quot; height=&quot;417&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.1. Отступы на веб-странице при использовании абзацев &lt;/p&gt;
&lt;p&gt;Как видно из рисунка, при использовании тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt; между абзацами  возникают слишком большие отступы. От них можно избавиться, если в местах  переноса строк добавлять тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt;. В отличие от абзаца, тег переноса строки &lt;span class=&quot;tag&quot;&gt;&amp;lt;br&amp;gt;&lt;/span&gt; не создает дополнительных вертикальных отступов между строками и может  применяться практически в любом тексте. &lt;/p&gt;
&lt;p&gt;Так, текст примера 7.1 с учетом переноса строк будет  преобразован следующим образом (пример&amp;nbsp;7.2).&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.2. Тег &amp;lt;br&amp;gt;&lt;/p&gt;

&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Переносы в тексте&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;p&amp;gt;В одних садах цветёт миндаль, в других метёт метель.&amp;lt;br&amp;gt;
   В одних краях ещё февраль, в других - уже апрель.&amp;lt;br&amp;gt;
   Проходит время, вечный счёт: год за год, век за век...&amp;lt;br&amp;gt;
   Во всём - его неспешный ход, его кромешный бег.&amp;lt;br&amp;gt;
   В году на радость и печаль по двадцать пять недель.&amp;lt;br&amp;gt;
   Мне двадцать пять недель февраль, и двадцать пять - апрель.&amp;lt;br&amp;gt;
   По двадцать пять недель в туман уходит счёт векам.&amp;lt;br&amp;gt;
   Летит мой звонкий балаган куда-то к облакам.&amp;lt;/p&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;i&amp;gt;М. Щербаков&amp;lt;/i&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Переносы в тексте&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;В одних садах цветёт миндаль, в других метёт метель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   В одних краях ещё февраль, в других - уже апрель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   Проходит время, вечный счёт: год за год, век за век...&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   Во всём - его неспешный ход, его кромешный бег.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   В году на радость и печаль по двадцать пять недель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   Мне двадцать пять недель февраль, и двадцать пять - апрель.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   По двадцать пять недель в туман уходит счёт векам.&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;br&lt;/span&gt;&amp;gt;&lt;/span&gt;
   Летит мой звонкий балаган куда-то к облакам.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;М. Щербаков&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;Результат примера продемонстрирован на рис.&amp;nbsp;7.2. Видно, что расстояние между строками текста уменьшилось и он приобрел более компактный вид. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_02.png&quot; alt=&quot;Рис. 7.2&quot; width=&quot;526&quot; height=&quot;305&quot;&gt; &lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.2. Вид текста с учетом переносов &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '24',
        'language_id' => '2',
        'title' => 'Заголовки',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Заголовки выполняют важную функцию на веб-странице. Во-первых, они показывают     важность раздела, к которому относятся. Чем больше заголовок и его
  «вес»
  , тем     более он значимый. Вспомните, что в газетах и журналах передовицы набраны крупным     шрифтом, тем самым, привлекая к ним внимание и говоря:
  «вот это надо читать     обязательно»
  . Во-вторых, с помощью различных заголовков легко регулировать размер     текста. Чем выше уровень заголовка, тем больше размер шрифта. Самым верхним     уровнем является уровень&amp;nbsp;1 (&lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;&lt;/span&gt;), а самым     нижним&amp;nbsp;— уровень&amp;nbsp;6 (&lt;span class=&quot;tag&quot;&gt;&amp;lt;h6&amp;gt;&lt;/span&gt;). И,     в-третьих, поисковики добавляют рейтинг тексту, если он находится внутри тега     заголовка. Это важно для раскрутки сайта и для его занятия первых строк выдачи     результата в поисковой системе по ключевым словам. &lt;/p&gt;
&lt;p&gt; Синтаксис создания заголовков показан в примере&amp;nbsp;7.3.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.3. Добавление заголовков &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Заголовки в тексте&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;h1&amp;gt;Заголовок первого уровня&amp;lt;/h1&amp;gt;
  &amp;lt;h2&amp;gt;Заголовок второго уровня&amp;lt;/h2&amp;gt;
  &amp;lt;h3&amp;gt;Заголовок третьего уровня&amp;lt;/h3&amp;gt;
  &amp;lt;h4&amp;gt;Заголовок четвертого уровня&amp;lt;/h4&amp;gt;
  &amp;lt;h5&amp;gt;Заголовок пятого уровня&amp;lt;/h5&amp;gt;
  &amp;lt;h6&amp;gt;Заголовок шестого уровня&amp;lt;/h6&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовки в тексте&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок первого уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок второго уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h3&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок третьего уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h3&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h4&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок четвертого уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h4&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h5&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок пятого уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h5&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h6&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок шестого уровня&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h6&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;7.3. Содержимое тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;&lt;/span&gt; отображается самым крупным шрифтом жирного начертания, а &lt;span class=&quot;tag&quot;&gt;&amp;lt;h6&amp;gt;&lt;/span&gt;&amp;nbsp;— самым мелким.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_03.png&quot; alt=&quot;Рис. 7.3&quot; width=&quot;526&quot; height=&quot;364&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.3. Вид заголовков на веб-странице &lt;/p&gt;
&lt;p&gt;Как правило, на веб-странице применяют заголовки с первого по третий уровень,     их вполне достаточно. Редко когда приходится использовать заголовки более низкого уровня. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '25',
        'language_id' => '2',
        'title' => 'Выравнивание текста',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt; Выравнивание текста определяет его внешний вид и ориентацию краев абзаца и     может выполняться по левому краю, правому краю, по центру или по ширине. Наиболее распространенный вариант&amp;nbsp;— выравнивание по левому краю, когда     слева текст сдвигается до края, а правый остается неровным. Выравнивание по     правому краю и по центру в основном используется в заголовках и подзаголовках.     Следует иметь в виду, что при использовании выравнивания по ширине, в тексте     между словами могут появиться большие интервалы, что не очень красиво. &lt;/p&gt;
&lt;p&gt; Для установки выравнивания текста обычно используется тег параграфа &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt; с атрибутом &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt;, который определяет способ выравнивания.     Также блок текста допустимо выравнивать с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;div&amp;gt;&lt;/span&gt; с аналогичным атрибутом &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt;. Он может принимать следующие значения:&lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt;&lt;span class=&quot;value&quot;&gt;left&lt;/span&gt; — выравнивание по левому краю, задается по умолчанию;&lt;/li&gt;
  &lt;li&gt; &lt;span class=&quot;value&quot;&gt;right&lt;/span&gt; — выравнивание по правому краю;&lt;/li&gt;
  &lt;li&gt; &lt;span class=&quot;value&quot;&gt;center&lt;/span&gt; — выравнивание по центру;&lt;/li&gt;
  &lt;li&gt; &lt;span class=&quot;value&quot;&gt;justify&lt;/span&gt; — выравнивание по ширине (одновременно по правому и левому краю).   Это значение работает только для текста, длина которого более, чем одна строка. &lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt;Атрибут &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt; можно применять как для текста, так и для заголовков (пример&amp;nbsp;7.4).&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.4. Способы выравнивания текста &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Выравнивание текста&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;h1 align=&quot;center&quot;&amp;gt;Как поймать льва?&amp;lt;/h1&amp;gt;
  &amp;lt;h2 align=&quot;right&quot;&amp;gt;Метод перебора&amp;lt;/h2&amp;gt;
  &amp;lt;p align=&quot;justify&quot;&amp;gt;Делим пустыню на ряд элементарных участков, размер 
   которых совпадает с габаритными размерами льва, но при этом меньше размера 
   клетки. Далее простым перебором определяем участок, в котором находится лев,
   что автоматически приводит к его поимке.&amp;lt;/p&amp;gt;
  &amp;lt;h2 align=&quot;right&quot;&amp;gt;Метод дихотомии&amp;lt;/h2&amp;gt;
  &amp;lt;p align=&quot;justify&quot;&amp;gt;Делим пустыню на две половины. В одной части - лев, в 
   другой его нет. Берем ту половину, в которой находится лев, и снова делим 
   ее пополам. Так повторяем до тех пор, пока лев не окажется пойман.&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Выравнивание текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;center&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Как поймать льва?&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;right&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Метод перебора&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;justify&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Делим пустыню на ряд элементарных участков, размер 
   которых совпадает с габаритными размерами льва, но при этом меньше размера 
   клетки. Далее простым перебором определяем участок, в котором находится лев,
   что автоматически приводит к его поимке.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;right&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Метод дихотомии&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h2&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;justify&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Делим пустыню на две половины. В одной части - лев, в 
   другой его нет. Берем ту половину, в которой находится лев, и снова делим 
   ее пополам. Так повторяем до тех пор, пока лев не окажется пойман.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;7.4.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_04.png&quot; alt=&quot;Рис. 7.4&quot; width=&quot;526&quot; height=&quot;428&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.4. Вид текста при его выравнивании&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '26',
        'language_id' => '2',
        'title' => 'Начертание',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;h2&gt;Жирное начертание&lt;/h2&gt;
&lt;p&gt;Насыщенностью называют увеличение толщины линий шрифта и соответственно контраста.     Обычно различают четыре вида насыщенности: светлое начертание, нормальное, полужирное     и жирное. Однако с помощью HTML можно установить только нормальное и жирное     начертание. Для установки текста жирного начертания применяется два тега: &lt;span class=&quot;tag&quot;&gt;&amp;lt;b&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt;. &lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;b&amp;gt;Жирное начертание шрифта&amp;lt;/b&amp;gt;
&amp;lt;strong&amp;gt;Сильное выделение текста&amp;lt;/strong&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;b&lt;/span&gt;&amp;gt;&lt;/span&gt;Жирное начертание шрифта&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;b&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;Сильное выделение текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;h2&gt;Курсивное начертание&lt;/h2&gt;
&lt;p&gt;Курсивный шрифт представляет собой не просто наклон отдельных символов, для     некоторых шрифтов это полная переделка под новый стиль, имитирующий рукописный. Курсив для текста определяют два тега: &lt;span class=&quot;tag&quot;&gt;&amp;lt;i&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;em&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;i&amp;gt;Курсивное начертание шрифта&amp;lt;/i&amp;gt;
&amp;lt;em&amp;gt;Выделение текста&amp;lt;/em&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;Курсивное начертание шрифта&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;em&lt;/span&gt;&amp;gt;&lt;/span&gt;Выделение текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;em&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt; Следует отметить, что теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;b&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt;, также     как &lt;span class=&quot;tag&quot;&gt;&amp;lt;i&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;em&amp;gt;&lt;/span&gt; хотя и похожи по своему действию, являются не совсем эквивалентными     и заменяемыми. Первый тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;b&amp;gt;&lt;/span&gt;&amp;nbsp;— является тегом физической     разметки и устанавливает жирное начертание текста, а тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt;&amp;nbsp;—  тегом логической разметки и выделяет помеченный текст. Такое разделение     тегов на логическое и физическое форматирование изначально предназначалось,     чтобы сделать HTML универсальным, в том числе не зависящим от устройства вывода     информации. Теоретически, если воспользоваться, например, речевым браузером,     то текст, оформленный с помощью тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;b&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt;,     будет отмечен по-разному. Однако получилось так, что в популярных браузерах     результат использования этих тегов равнозначен. &lt;/p&gt;
&lt;p&gt;В примере 7.5 показано использование тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;em&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;strong&amp;gt;&lt;/span&gt; для оформления текстов.&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.5. Теги &amp;lt;em&amp;gt; и &amp;lt;strong&amp;gt;&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Оформление текста&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;А где же печенье и самогоноваренье?!&amp;lt;/strong&amp;gt; — 
  &amp;lt;em&amp;gt;воскликнул Мальчиш-плохиш&amp;lt;/em&amp;gt;.&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Оформление текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;А где же печенье и самогоноваренье?!&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt; — 
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;em&lt;/span&gt;&amp;gt;&lt;/span&gt;воскликнул Мальчиш-плохиш&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;em&lt;/span&gt;&amp;gt;&lt;/span&gt;.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;7.5. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_05.png&quot; alt=&quot;Рис. 7.5. Жирное и курсивное начертание текста&quot; width=&quot;453&quot; height=&quot;171&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.5. Жирное и курсивное начертание текста&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:06:11',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '27',
        'language_id' => '2',
        'title' => 'Верхний и нижний индексы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Индексом по отношению к тексту называется смещение  символов относительно базовой линии вверх или вниз. В зависимости от  положительного или отрицательного значения, индекс называется, соответственно,  верхним или нижним. Они активно применяются в математике, физике, химии и для  обозначения единиц измерения. HTML предлагает два тега для создания индекса: &lt;span class=&quot;tag&quot;&gt;&amp;lt;sup&amp;gt;&lt;/span&gt;&amp;nbsp;— верхний индекс и &lt;span class=&quot;tag&quot;&gt;&amp;lt;sub&amp;gt;&lt;/span&gt;&amp;nbsp;— индекс нижний. Текст, помещенный в один из этих  контейнеров, обозначается меньшим размером, чем базовый текст и смещается  относительно горизонтали. &lt;/p&gt;
&lt;p&gt;В примере 7.6 показано, где применяется подобный текст &lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 7.6. Использование нижнего индекса &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Нижний индекс&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;b&amp;gt;Формула серной кислоты:&amp;lt;/b&amp;gt; &amp;lt;i&amp;gt;H&amp;lt;sub&amp;gt;2&amp;lt;/sub&amp;gt;SO&amp;lt;sub&amp;gt;4&amp;lt;/sub&amp;gt;&amp;lt;/i&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Нижний индекс&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;b&lt;/span&gt;&amp;gt;&lt;/span&gt;Формула серной кислоты:&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;b&lt;/span&gt;&amp;gt;&lt;/span&gt; &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;H&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;sub&lt;/span&gt;&amp;gt;&lt;/span&gt;2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;sub&lt;/span&gt;&amp;gt;&lt;/span&gt;SO&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;sub&lt;/span&gt;&amp;gt;&lt;/span&gt;4&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;sub&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;i&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;7.6. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_07_06.png&quot; alt=&quot;Отображение текста в виде нижнего регистра&quot; width=&quot;453&quot; height=&quot;171&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 7.6. Отображение текста в виде нижнего регистра&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:57:46',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '28',
        'language_id' => '2',
        'title' => 'Спецсимволы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Для отображения символов, которых нет на клавиатуре,  применяются специальные знаки, начинающиеся с амперсанда (&amp;amp;) и  заканчивающиеся точкой с запятой (;). В табл.&amp;nbsp;7.1 приведены некоторые популярные  спецсимволы.&lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 7.1. Спецсимволы
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Имя&lt;/th&gt;
      &lt;th&gt;Код&lt;/th&gt;
      &lt;th&gt;Вид&lt;/th&gt;
      &lt;th&gt;Описание&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;nbsp;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#160;&lt;/td&gt;
      &lt;td&gt;&amp;nbsp;&lt;/td&gt;
      &lt;td&gt;неразрывный пробел&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;pound;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#163;&lt;/td&gt;
      &lt;td&gt;£&lt;/td&gt;
      &lt;td&gt;фунт стерлингов&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;euro;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8364;&lt;/td&gt;
      &lt;td&gt;€&lt;/td&gt;
      &lt;td&gt;знак евро&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;para;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#182;&lt;/td&gt;
      &lt;td&gt;¶&lt;/td&gt;
      &lt;td&gt;символ параграфа&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;sect;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#167;&lt;/td&gt;
      &lt;td&gt;§&lt;/td&gt;
      &lt;td&gt;параграф&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;copy;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#169;&lt;/td&gt;
      &lt;td&gt;©&lt;/td&gt;
      &lt;td&gt;знак copyright&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;reg;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#174;&lt;/td&gt;
      &lt;td&gt;®&lt;/td&gt;
      &lt;td&gt;знак зарегистрированной торговой марки&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;trade;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8482;&lt;/td&gt;
      &lt;td&gt;™&lt;/td&gt;
      &lt;td&gt;знак торговой марки&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;deg;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#176;&lt;/td&gt;
      &lt;td&gt;°&lt;/td&gt;
      &lt;td&gt;градус&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;plusmn;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#177;&lt;/td&gt;
      &lt;td&gt;±&lt;/td&gt;
      &lt;td&gt;плюс-минус&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;frac14;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#188;&lt;/td&gt;
      &lt;td&gt;¼&lt;/td&gt;
      &lt;td&gt;дробь - одна четверть&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;frac12;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#189;&lt;/td&gt;
      &lt;td&gt;½&lt;/td&gt;
      &lt;td&gt;дробь - одна вторая&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;frac34;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#190;&lt;/td&gt;
      &lt;td&gt;¾&lt;/td&gt;
      &lt;td&gt;дробь - три четверти&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;times;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#215;&lt;/td&gt;
      &lt;td&gt;×&lt;/td&gt;
      &lt;td&gt;знак умножения&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;divide;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#247;&lt;/td&gt;
      &lt;td&gt;÷&lt;/td&gt;
      &lt;td&gt;знак деления&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;fnof;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#402;&lt;/td&gt;
      &lt;td&gt;ƒ&lt;/td&gt;
      &lt;td&gt;знак функции&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th colspan=&quot;4&quot;&gt; Греческие буквы&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Alpha;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#913;&lt;/td&gt;
      &lt;td&gt;Α&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква альфа&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Beta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#914;&lt;/td&gt;
      &lt;td&gt;Β&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква бета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Gamma;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#915;&lt;/td&gt;
      &lt;td&gt;Γ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква гамма&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Delta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#916;&lt;/td&gt;
      &lt;td&gt;Δ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква дельта&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Epsilon;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#917;&lt;/td&gt;
      &lt;td&gt;Ε&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква эпсилон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Zeta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#918;&lt;/td&gt;
      &lt;td&gt;Ζ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква дзета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Eta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#919;&lt;/td&gt;
      &lt;td&gt;Η&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква эта&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Theta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#920;&lt;/td&gt;
      &lt;td&gt;Θ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква тета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Iota;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#921;&lt;/td&gt;
      &lt;td&gt;Ι&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква иота&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Kappa;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#922;&lt;/td&gt;
      &lt;td&gt;Κ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква каппа&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Lambda;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#923;&lt;/td&gt;
      &lt;td&gt;Λ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква лямбда&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Mu;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#924;&lt;/td&gt;
      &lt;td&gt;Μ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква мю&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Nu;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#925;&lt;/td&gt;
      &lt;td&gt;Ν&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква ню&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Xi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#926;&lt;/td&gt;
      &lt;td&gt;Ξ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква кси&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Omicron;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#927;&lt;/td&gt;
      &lt;td&gt;Ο&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква омикрон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Pi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#928;&lt;/td&gt;
      &lt;td&gt;Π&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква пи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Rho;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#929;&lt;/td&gt;
      &lt;td&gt;Ρ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква ро&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Sigma;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#931;&lt;/td&gt;
      &lt;td&gt;Σ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква сигма&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Tau;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#932;&lt;/td&gt;
      &lt;td&gt;Τ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква тау&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Upsilon;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#933;&lt;/td&gt;
      &lt;td&gt;Υ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква ипсилон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Phi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#934;&lt;/td&gt;
      &lt;td&gt;Φ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква фи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Chi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#935;&lt;/td&gt;
      &lt;td&gt;Χ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква хи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Psi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#936;&lt;/td&gt;
      &lt;td&gt;Ψ&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква пси&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Omega;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#937;&lt;/td&gt;
      &lt;td&gt;Ω&lt;/td&gt;
      &lt;td&gt;греческая заглавная буква омега&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;alpha;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#945;&lt;/td&gt;
      &lt;td&gt;α&lt;/td&gt;
      &lt;td&gt;греческая строчная буква альфа&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;beta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#946;&lt;/td&gt;
      &lt;td&gt;β&lt;/td&gt;
      &lt;td&gt;греческая строчная буква бета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;gamma;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#947;&lt;/td&gt;
      &lt;td&gt;γ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква гамма&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;delta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#948;&lt;/td&gt;
      &lt;td&gt;δ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква дельта&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;epsilon;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#949;&lt;/td&gt;
      &lt;td&gt;ε&lt;/td&gt;
      &lt;td&gt;греческая строчная буква эпсилон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;zeta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#950;&lt;/td&gt;
      &lt;td&gt;ζ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква дзета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;eta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#951;&lt;/td&gt;
      &lt;td&gt;η&lt;/td&gt;
      &lt;td&gt;греческая строчная буква эта&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;theta;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#952;&lt;/td&gt;
      &lt;td&gt;θ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква тета&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;iota;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#953;&lt;/td&gt;
      &lt;td&gt;ι&lt;/td&gt;
      &lt;td&gt;греческая строчная буква иота&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;kappa;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#954;&lt;/td&gt;
      &lt;td&gt;κ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква каппа&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;lambda;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#955;&lt;/td&gt;
      &lt;td&gt;λ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква лямбда&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;mu;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#956;&lt;/td&gt;
      &lt;td&gt;μ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква мю&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;nu;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#957;&lt;/td&gt;
      &lt;td&gt;ν&lt;/td&gt;
      &lt;td&gt;греческая строчная буква ню&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;xi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#958;&lt;/td&gt;
      &lt;td&gt;ξ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква кси&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;omicron;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#959;&lt;/td&gt;
      &lt;td&gt;ο&lt;/td&gt;
      &lt;td&gt;греческая строчная буква омикрон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;pi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#960;&lt;/td&gt;
      &lt;td&gt;π&lt;/td&gt;
      &lt;td&gt;греческая строчная буква пи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;rho;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#961;&lt;/td&gt;
      &lt;td&gt;ρ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква ро&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;sigmaf;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#962;&lt;/td&gt;
      &lt;td&gt;ς&lt;/td&gt;
      &lt;td&gt;греческая строчная буква сигма&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;sigma;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#963;&lt;/td&gt;
      &lt;td&gt;σ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква сигма&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;tau;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#964;&lt;/td&gt;
      &lt;td&gt;τ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква тау&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;upsilon;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#965;&lt;/td&gt;
      &lt;td&gt;υ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква ипсилон&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;phi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#966;&lt;/td&gt;
      &lt;td&gt;φ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква фи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;chi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#967;&lt;/td&gt;
      &lt;td&gt;χ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква хи&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;psi;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#968;&lt;/td&gt;
      &lt;td&gt;ψ&lt;/td&gt;
      &lt;td&gt;греческая строчная буква пси&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;omega;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#969;&lt;/td&gt;
      &lt;td&gt;ω&lt;/td&gt;
      &lt;td&gt;греческая строчная буква омега&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th colspan=&quot;4&quot;&gt; Стрелки&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;larr;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8592;&lt;/td&gt;
      &lt;td&gt;←&lt;/td&gt;
      &lt;td&gt;стрелка влево&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;uarr;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8593;&lt;/td&gt;
      &lt;td&gt;↑&lt;/td&gt;
      &lt;td&gt;стрелка вверх&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;rarr;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8594;&lt;/td&gt;
      &lt;td&gt;→&lt;/td&gt;
      &lt;td&gt;стрелка вправо&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;darr;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8595;&lt;/td&gt;
      &lt;td&gt;↓&lt;/td&gt;
      &lt;td&gt;стрелка вниз&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;harr;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8596;&lt;/td&gt;
      &lt;td&gt;↔&lt;/td&gt;
      &lt;td&gt;стрелка влево-вправо&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th colspan=&quot;4&quot;&gt; Прочие символы&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;spades;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#9824;&lt;/td&gt;
      &lt;td&gt;♠&lt;/td&gt;
      &lt;td&gt; знак масти &quot;пики&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;clubs;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#9827;&lt;/td&gt;
      &lt;td&gt;♣&lt;/td&gt;
      &lt;td&gt;знак масти &quot;трефы&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;hearts;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#9829;&lt;/td&gt;
      &lt;td&gt;♥&lt;/td&gt;
      &lt;td&gt;знак масти &quot;червы&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;diams;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#9830;&lt;/td&gt;
      &lt;td&gt;♦&lt;/td&gt;
      &lt;td&gt;знак масти &quot;бубны&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;quot;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#34;&lt;/td&gt;
      &lt;td&gt;&quot;&lt;/td&gt;
      &lt;td&gt;двойная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;amp;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#38;&lt;/td&gt;
      &lt;td&gt;&amp;amp;&lt;/td&gt;
      &lt;td&gt;амперсанд&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;lt;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#60;&lt;/td&gt;
      &lt;td&gt;&amp;lt;&lt;/td&gt;
      &lt;td&gt;знак &quot;меньше&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;gt;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#62;&lt;/td&gt;
      &lt;td&gt;&amp;gt;&lt;/td&gt;
      &lt;td&gt;знак &quot;больше&quot;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th colspan=&quot;4&quot;&gt; Знаки пунктуации&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;hellip;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8230;&lt;/td&gt;
      &lt;td&gt;…&lt;/td&gt;
      &lt;td&gt;многоточие ...&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;prime;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8242;&lt;/td&gt;
      &lt;td&gt;′&lt;/td&gt;
      &lt;td&gt;одиночный штрих - минуты и футы&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;Prime;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8243;&lt;/td&gt;
      &lt;td&gt;″&lt;/td&gt;
      &lt;td&gt;двойной штрих - секунды и дюймы&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th colspan=&quot;4&quot;&gt; Общая пунктуация&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;ndash;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8211;&lt;/td&gt;
      &lt;td&gt;–&lt;/td&gt;
      &lt;td&gt;тире&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;mdash;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8212;&lt;/td&gt;
      &lt;td&gt;—&lt;/td&gt;
      &lt;td&gt;длинное тире&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;lsquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8216;&lt;/td&gt;
      &lt;td&gt;‘&lt;/td&gt;
      &lt;td&gt;левая одиночная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;rsquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8217;&lt;/td&gt;
      &lt;td&gt;’&lt;/td&gt;
      &lt;td&gt;правая одиночная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;sbquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8218;&lt;/td&gt;
      &lt;td&gt;‚&lt;/td&gt;
      &lt;td&gt;нижняя одиночная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;ldquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8220;&lt;/td&gt;
      &lt;td&gt;“&lt;/td&gt;
      &lt;td&gt;левая двойная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;rdquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8221;&lt;/td&gt;
      &lt;td&gt;”&lt;/td&gt;
      &lt;td&gt;правая двойная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;bdquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#8222;&lt;/td&gt;
      &lt;td&gt;„&lt;/td&gt;
      &lt;td&gt;нижняя двойная кавычка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;laquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#171;&lt;/td&gt;
      &lt;td&gt;«&lt;/td&gt;
      &lt;td&gt;левая двойная угловая скобка&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;&amp;amp;raquo;&lt;/td&gt;
      &lt;td&gt;&amp;amp;#187;&lt;/td&gt;
      &lt;td&gt;»&lt;/td&gt;
      &lt;td&gt;правая двойная угловая скобка&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:58:10',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '9',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '29',
        'language_id' => '2',
        'title' => 'Ссылки',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Ссылки являются основой гипертекстовых документов и позволяют переходить с
  одной веб-страницы на другую. Особенность их состоит в том, что сама ссылка
  может вести не только на HTML-файлы, но и на файл любого типа, причем этот
  файл может размещаться совсем на другом сайте. Главное, чтобы к документу,
  на который делается ссылка, был доступ. Иными словами, если путь к файлу можно
  указать в адресной строке браузера, и файл при этом будет открыт, то на него
  можно сделать ссылку.&lt;/p&gt;
&lt;p&gt; Для создания ссылки необходимо сообщить браузеру, что является ссылкой, а также
  указать адрес документа, на который следует сделать ссылку. Оба действия выполняются
  с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;. Общий синтаксис создания ссылок следующий.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;URL&quot;&amp;gt;текст ссылки&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;URL&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;текст ссылки&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;Атрибут &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; определяет URL (Universal Resource Locator, универсальный указатель
  ресурса), иными словами, адрес документа, на который следует перейти, а содержимое
  контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; является ссылкой. Текст, расположенный между тегами &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;/a&amp;gt;&lt;/span&gt;,
  по умолчанию становится синего цвета и подчеркивается. В примере 8.1 показано
  создание нескольких ссылок на разные веб-страницы.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.1. Добавление ссылок&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Ссылки на странице&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;dog.html&quot;&amp;gt;Собаки&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;cat.html&quot;&amp;gt;Кошки&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылки на странице&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;dog.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Собаки&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;cat.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Кошки&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;В данном примере создаются две ссылки с разными текстами. При щелчке по тексту «Собаки» в
  окне браузера откроется документ dog.html, а при щелчке на «Кошки»&amp;nbsp;—
  файл cat.html.&lt;/p&gt;
&lt;p&gt; Результат примера показан на рис. 8.1. Обратите внимание, что при наведении
  курсора мыши на ссылку, в строке состояния браузера отображается полный путь
  к ссылаемому файлу. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_01.png&quot; alt=&quot;Рис. 8.1&quot; width=&quot;526&quot; height=&quot;189&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.1. Вид ссылок на странице&lt;/p&gt;
&lt;p&gt; Если указана ссылка на файл, которого не существует, например, его имя в атрибуте
  &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; набрано с ошибкой, то такая ссылка называется &lt;span class=&quot;term&quot;&gt;битая&lt;/span&gt;. Битых ссылок
  следует категорически избегать, поскольку они вводят посетителей сайта в заблуждение.
  Так, при щелчке по ссылке из примера&amp;nbsp;8.1 в браузере Safari откроется не сам документ, а
  окно с предупреждением (рис.&amp;nbsp;8.2).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_02.png&quot; alt=&quot;Рис. 8.2&quot; width=&quot;526&quot; height=&quot;315&quot;&gt; &lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.2. Результат при открытии битой ссылки&lt;/p&gt;
&lt;p&gt; Естественно, подобное сообщение будет различаться в браузерах, но смысл остается
  один&amp;nbsp;— документ, на который ведет ссылка, не может быть открыт. Чтобы
  не возникало подобных ошибок, тестируйте все ссылки на их работоспособность
  и сразу же устраняйте имеющиеся погрешности.&lt;/p&gt;
&lt;p&gt; Файл по ссылке открывается в окне браузера только в тех случаях, когда браузер
  знает тип документа. Но поскольку ссылку можно сделать на файл любого типа,
  то браузер не всегда может отобразить документ. При этом выводится сообщение,
  как следует обработать файл&amp;nbsp;— открыть его или сохранить в указанную папку. Например, в браузере Firefox выводится следующее окно 
  (рис.&amp;nbsp;8.3).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_03.png&quot; alt=&quot;Рис. 8.3&quot; width=&quot;449&quot; height=&quot;321&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.3. Окно для выбора действия с файлом в Firefox&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:58:31',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '30',
        'language_id' => '2',
        'title' => 'Абсолютные и относительные ссылки',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Адрес ссылки может быть как абсолютным, так и относительным. Абсолютные адреса
  должны начинаться с указания протокола (обычно http://) и содержать имя сайта.
  Относительные ссылки ведут отсчет от корня сайта или текущего документа.&lt;/p&gt;
&lt;p&gt; В примере&amp;nbsp;8.2 показано создание абсолютной ссылки на другой сайт.&lt;/p&gt;&lt;!--break--&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.2. Использование абсолютных ссылок &lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Абсолютный адрес&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;http://htmlbook.ru&quot;&amp;gt;Изучение HTML&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Абсолютный адрес&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;http://htmlbook.ru&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Изучение HTML&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;В данном примере ссылка вида &lt;span class=&quot;var&quot;&gt;&amp;lt;a href=&quot;http://htmlbook.ru&quot;&amp;gt;Изучение
  HTML&amp;lt;/a&amp;gt;&lt;/span&gt; является абсолютной и ведет на главную страницу сайта htmlbook.ru. &lt;/p&gt;
&lt;p class=&quot;note&quot;&gt; При указании в качестве ссылки каталога сайта (например, http://htmlbook.ru/css/),
  отображается &lt;span class=&quot;term&quot;&gt;индексный файл&lt;/span&gt;. Это файл, который загружается по умолчанию
  при обращении к каталогу без явного указания имени файла. Обычно в качестве
индексного файла выступает документ с именем &lt;span class=&quot;term&quot;&gt;index.html&lt;/span&gt;.&lt;/p&gt;
&lt;p&gt; Абсолютные ссылки обычно применяются для указания документа на другом сетевом
  ресурсе, впрочем, допустимо делать абсолютные ссылки и внутри текущего сайта.
  Однако подобное практикуется нечасто, поскольку такие ссылки достаточно длинные
  и громоздкие. Поэтому внутри сайта преимущественно используются относительные
ссылки. &lt;/p&gt;
&lt;h3&gt;Ссылки относительно текущего документа&lt;/h3&gt;
&lt;p&gt;При создании относительных ссылок надо понимать, какое значение для атрибута
  &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; следует указывать, поскольку оно зависит от исходного расположения файлов.
  Рассмотрим несколько типичных вариантов.&lt;/p&gt;
&lt;p&gt; 1. Файлы располагаются в одной папке (рис.&amp;nbsp;8.4).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_04.png&quot; alt=&quot;Рис. 8.4&quot; width=&quot;188&quot; height=&quot;57&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.4&lt;/p&gt;
&lt;p&gt; Необходимо сделать ссылку из исходного документа на ссылаемый. В таком случае
  код будет следующий.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;Ссылаемый документ.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;Ссылаемый документ.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Подобное имя файла взято только для образца, на сайте в именах файлов не следует
  использовать русские символы с пробелами, да еще и в разном регистре.&lt;/p&gt;
&lt;p&gt; 2. Файлы размещаются в разных папках (рис.&amp;nbsp;8.5).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_05.png&quot; alt=&quot;Рис. 8.5&quot; width=&quot;198&quot; height=&quot;76&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.5&lt;/p&gt;
&lt;p&gt; Когда исходный документ хранится в одной папке, а ссылаемый в корне сайта,
  то перед именем файла в адресе ссылки следует поставить две точки и слэш (/),
  как показано ниже.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;../Ссылаемый документ.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;../Ссылаемый документ.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Две точки в данном случае означают выйти из текущей папки на уровень выше.&lt;/p&gt;
&lt;p&gt; 3. Файлы размещаются в разных папках (рис.&amp;nbsp;8.6).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_06.png&quot; alt=&quot;Рис. 8.6&quot; width=&quot;214&quot; height=&quot;95&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.6&lt;/p&gt;
&lt;p&gt; Теперь исходный файл находится в двух вложенных папках, и чтобы сослаться на
  документ в корне сайта, требуется повторить написание предыдущего примера два
  раза.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;../../Ссылаемый документ.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;../../Ссылаемый документ.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;Аналогично обстоит дело с любым числом вложенных папок.&lt;/p&gt;
&lt;p&gt; 4. Файлы размещаются в разных папках (рис.&amp;nbsp;8.7).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_07.png&quot; alt=&quot;Рис. 8.7&quot; width=&quot;211&quot; height=&quot;81&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.7&lt;/p&gt;
&lt;p&gt; Теперь ситуация меняется, исходный файл располагается в корне сайта, а файл,
  на который необходимо сделать ссылку&amp;nbsp;- в папке. В этом случае путь к файлу
  будет следующий.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;Папка/Ссылаемый документ.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;Папка/Ссылаемый документ.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt;Заметьте, что никаких дополнительных точек и слэшей перед именем папки нет.
  Если файл находится внутри не одной, а двух папок, то путь к нему записывается
  так.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a href=&quot;Папка 1/Папка 2/Ссылаемый документ.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;Папка 1/Папка 2/Ссылаемый документ.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;h3&gt;Ссылки относительно корня сайта&lt;/h3&gt;
&lt;p&gt;Иногда можно встретить путь к файлу относительно корня сайта, он выглядит
  как &lt;span class=&quot;value&quot;&gt;&quot;/Папка/Имя файла&quot;&lt;/span&gt; со слэшем вначале. Так, запись  &lt;span class=&quot;var&quot;&gt;&amp;lt;a href=&quot;/course/&quot;&amp;gt;Курсы&amp;lt;/a&amp;gt;&lt;/span&gt; означает,
  что ссылка ведет в папку с именем course, которая располагается в корне сайта,
а в ней необходимо загрузить индексный файл.&lt;/p&gt;
&lt;p&gt; Учтите, что такая форма записи не работает на локальном компьютере, а только
под управлением веб-сервера. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:58:55',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '31',
        'language_id' => '2',
        'title' => 'Виды ссылок',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Любая ссылка на веб-странице может находиться в одном из следующих состояний.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Непосещенная ссылка.&lt;/strong&gt; Такое состояние характеризуется для
  ссылок, которые еще не открывали. По умолчанию непосещенные текстовые ссылки
  изображаются синего цвета и с подчеркиванием.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Активная ссылка.&lt;/strong&gt; Ссылка помечается как активная в момент
  ее открытия. Поскольку время между нажатием на ссылку и началом загрузки нового
  документа достаточно мало, подобное состояние ссылки весьма кратковременно.
  Активной ссылка становится также, при ее выделении с помощью клавиатуры. Цвет
  такой ссылки по умолчанию красный.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Посещенная ссылка.&lt;/strong&gt; Как только пользователь открывает документ,
  на который указывает ссылка, она помечается как посещенная и меняет свой цвет
  на фиолетовый, установленный по умолчанию. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 22:59:13',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '32',
        'language_id' => '2',
        'title' => 'Правила вложений для тега &lt;a&gt;',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Любая ссылка является встроенным элементом, поэтому для нее действуют те же
  правила, что и для встроенных элементов. А именно, нельзя размещать внутри
  тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; блочные элементы, но допустимо делать наоборот, и вкладывать
  ссылку в блочный контейнер. В примере&amp;nbsp;8.3 показано ошибочное и правильное
  использование тегов.&lt;/p&gt;&lt;!--break--&gt;
&lt;p class=&quot;exampleTitle&quot;&gt;Пример 8.3. Вложение тегов&lt;/p&gt;
&lt;p class=&quot;example-support&quot;&gt;&lt;span class=&quot;html no&quot;&gt;HTML 4.01&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;IE&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Cr&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Op&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Sa&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Fx&lt;/span&gt;&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Ошибки при использовании ссылок&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;a href=&quot;lion.html&quot;&amp;gt;&amp;lt;h1&amp;gt;Охота на льва&amp;lt;/h1&amp;gt;&amp;lt;/a&amp;gt;
  &amp;lt;h1&amp;gt;&amp;lt;a href=&quot;lion.html&quot;&amp;gt;Как поймать льва в пустыне&amp;lt;/a&amp;gt;&amp;lt;/h1&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Ошибки при использовании ссылок&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;lion.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;Охота на льва&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;lion.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Как поймать льва в пустыне&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;h1&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;В строке 8 данного примера содержится типичная ошибка&amp;nbsp;— тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;&lt;/span&gt; располагается
  внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;. Поскольку &lt;span class=&quot;tag&quot;&gt;&amp;lt;h1&amp;gt;&lt;/span&gt; это
  блочный элемент, то его недопустимо вкладывать внутрь ссылки. В строке 9 этого
  же примера показан корректный вариант.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:00:25',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '33',
        'language_id' => '2',
        'title' => 'Атрибуты ссылок',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Основной атрибут &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; мы уже освоили,
  рассмотрим еще несколько полезных, но необязательных атрибутов этого тега.&lt;/p&gt;
&lt;h3&gt;target&lt;/h3&gt;
&lt;p&gt;По умолчанию, при переходе по ссылке документ открывается в текущем окне или
  фрейме. При необходимости, это условие
  может быть изменено атрибутом &lt;span class=&quot;attribute&quot;&gt;target&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;.
  Синтаксис следующий.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a target=&quot;имя окна&quot;&amp;gt;...&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;имя окна&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;В качестве значения используется имя окна или фрейма, заданное атрибутом &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt;.
  Если установлено несуществующее имя, то будет открыто новое окно. В качестве
  зарезервированных имен применяются следующие.&lt;/p&gt;
&lt;ul&gt;
&lt;li&gt; &lt;span class=&quot;value&quot;&gt;_blank&lt;/span&gt;&amp;nbsp;— загружает страницу в новое окно браузера.&lt;/li&gt;
&lt;li&gt;    &lt;span class=&quot;value&quot;&gt;_self&lt;/span&gt;&amp;nbsp;— загружает страницу в текущее окно (это значение задается по умолчанию).&lt;/li&gt;
&lt;li&gt;    &lt;span class=&quot;value&quot;&gt;_parent&lt;/span&gt;&amp;nbsp;— загружает страницу во фрейм-родитель, если фреймов нет, то это
  значение работает как &lt;span class=&quot;value&quot;&gt;_self&lt;/span&gt;.&lt;/li&gt;
&lt;li&gt;    &lt;span class=&quot;value&quot;&gt;_top&lt;/span&gt;&amp;nbsp;— отменяет все фреймы и загружает страницу в полном окне браузера,
  если фреймов нет, то это значение работает как &lt;span class=&quot;value&quot;&gt;_self&lt;/span&gt;. &lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt; В примере 8.4 показано, как сделать, чтобы ссылка открывалась в новом окне.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.4. Открытие ссылки в новом окне&lt;/p&gt;

&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Ссылка в новом окне&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;new.html&quot; target=&quot;_blank&quot;&amp;gt;Открыть
      в новом окне&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Ссылка в новом окне&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;new.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;_blank&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Открыть
      в новом окне&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p class=&quot;note&quot;&gt;Атрибут &lt;span class=&quot;attribute&quot;&gt;target&lt;/span&gt; корректно использовать только при переходном &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;, при строгом &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; будет сообщение об ошибке, поскольку в этой версии HTML  &lt;span class=&quot;attribute&quot;&gt;target&lt;/span&gt; уже не поддерживается.&lt;/p&gt;
 
 &lt;p&gt;Учтите также, что пользователи не любят, когда ссылки открываются в новых окнах,
  поэтому используйте подобную возможность осмотрительно и при крайней необходимости. &lt;/p&gt;
&lt;h3&gt;title&lt;/h3&gt;
&lt;p&gt;Добавляет поясняющий текст к ссылке в виде всплывающей подсказки. Такая подсказка
  отображается, когда курсор мыши задерживается на ссылке, после чего подсказка
  через некоторое время пропадает. Синтаксис следующий.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;a title=&quot;текст&quot;&amp;gt;...&amp;lt;/a&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; title=&lt;span class=&quot;value&quot;&gt;&quot;текст&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
&lt;p&gt;В качестве значения указывается любая текстовая строка. Строка должна заключаться
  в двойные или одинарные кавычки. В примере&amp;nbsp;8.5 показано, как использовать
  атрибут &lt;span class=&quot;attribute&quot;&gt;title&lt;/span&gt; для ссылок.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.5. Создание всплывающей подсказки&lt;/p&gt;

&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Подсказка к ссылке&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;zoo.html&quot; title=&quot;Рисунки различных животных и не только...&quot;&amp;gt;Рисунки&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Подсказка к ссылке&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;zoo.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; title=&lt;span class=&quot;value&quot;&gt;&quot;Рисунки различных животных и не только...&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Рисунки&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;8.8.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_08_08.png&quot; alt=&quot;Рис. 8.8&quot; width=&quot;446&quot; height=&quot;198&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 8.8. Вид всплывающей подсказки в браузере&lt;/p&gt;
&lt;p&gt; Цвета и оформления всплывающей подсказки зависят от настроек операционной
системы и браузера, и меняться разработчиком не могут. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:00:49',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '34',
        'language_id' => '2',
        'title' => 'Ссылка на адрес электронной почты',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Создание ссылки на адрес электронной почты делается почти также как и ссылка
  на веб-страницу. Только вместо URL указывается &lt;span class=&quot;attribute&quot;&gt;mailto:адрес электронной почты&lt;/span&gt;  (пример&amp;nbsp;8.6).&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.6. Ссылка на адрес электронной почты &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Адрес почты&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;mailto:vlad@htmlbook.ru&quot;&amp;gt;Задавайте вопросы по электронной почте&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Адрес почты&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;mailto:vlad@htmlbook.ru&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Задавайте вопросы по электронной почте&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;В атрибуте &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; вначале пишется ключевое слово &lt;span class=&quot;attribute&quot;&gt;mailto&lt;/span&gt;, затем
  через двоеточие желаемый почтовый адрес. Подобная ссылка ничем не отличается
  от ссылки на веб-страницу, но при нажатии на нее запускается почтовая программа,
  установленная по умолчанию. Поэтому в названии ссылки следует указывать, что
  она имеет отношение к электронной почте, чтобы читатели понимали, к чему приведет
  нажатие на нее.&lt;/p&gt;
&lt;p&gt; Можно также автоматически добавить тему сообщения, присоединив к адресу электронной
  почты через символ вопроса (?) параметр &lt;span class=&quot;attribute&quot;&gt;subject=тема сообщения&lt;/span&gt;,
  как показано в примере&amp;nbsp;8.7.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 8.7. Задание темы сообщения&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt; 
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Тема письма&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
 &amp;lt;p&amp;gt;&amp;lt;a href=&quot;mailto:vlad@htmlbook.ru?subject=Вопрос по HTML&quot;&amp;gt;Задавайте
  вопросы по электронной почте&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt; 
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Тема письма&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;mailto:vlad@htmlbook.ru?subject=Вопрос по HTML&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Задавайте
  вопросы по электронной почте&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt;При запуске почтовой программы поле Тема (Subject) будет заполнено автоматически.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:01:13',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '10',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '35',
        'language_id' => '2',
        'title' => 'Якоря',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Якорем называется закладка с уникальным именем на определенном месте  веб-страницы, предназначенная для создания перехода к ней по ссылке. Якоря  удобно применять в документах большого объема, чтобы можно было быстро  переходить к нужному разделу. &lt;/p&gt;
&lt;p&gt;Для создания якоря следует вначале сделать закладку в соответствующем месте
  и дать ей имя при помощи атрибута &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; (пример&amp;nbsp;9.1).
  В качестве значения &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; для  перехода к этому
  якорю используется имя закладки с символом решетки (#) впереди.&lt;/p&gt;

&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 9.1. Создание якоря&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Быстрый переход внутри документа&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a name=&quot;top&quot;&amp;gt;&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;...&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;#top&quot;&amp;gt;Наверх&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Быстрый переход внутри документа&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;top&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;...&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;#top&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Наверх&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;Между тегами &lt;span class=&quot;tag&quot;&gt;&amp;lt;a name=&quot;top&quot;&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;/a&amp;gt;&lt;/span&gt; текст не обязателен, так как требуется лишь указать  местоположение перехода по ссылке, находящейся внизу страницы. Имя ссылки на  якорь начинается с символа #, после чего идет имя якоря, оно выбирается любое,  соответствующее тематике. Главное, чтобы значения атрибутов &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; совпадали  (символ решетки не в счет).&lt;/p&gt;

&lt;p class=&quot;note&quot;&gt;С якорями связана одна особенность работы браузера. После перехода к  указанному якорю нажатие на кнопку «Назад» возвращает не на предыдущую  просмотренную страницу, а к ссылке, с которой был сделан переход к якорю. Получается,  что для перехода к предыдущему документу надо нажать кнопку «Назад» два раза.&lt;/p&gt;
&lt;p&gt;Cсылку можно также сделать  на закладку, находящуюся в другой веб-странице
  и даже другом сайте. Для этого в атрибуте &lt;span class=&quot;attribute&quot;&gt;href&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; надо
  указать адрес документа и в конце добавить символ решетки # и имя закладки
  (пример&amp;nbsp;9.2). &lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 9.2. Ссылка на закладку из другой веб-страницы&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Якорь в другом документе&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;text.html#bottom&quot;&amp;gt;Перейти к нижней части текста&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Якорь в другом документе&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;text.html#bottom&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Перейти к нижней части текста&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt;В данном примере показано создание ссылки на файл text.html, при открытии этого     файла происходит переход на закладку с именем bottom.&lt;/p&gt;
&lt;p class=&quot;note&quot;&gt;Если на веб-странице содержится ссылка на якорь, а самого якоря нет, то никакой  ошибки не возникнет.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:01:34',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '11',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '36',
        'language_id' => '2',
        'title' => 'Изображения',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Добавление изображения происходит в два этапа: вначале готовится графический
  файл желаемого размера, затем он добавляется на страницу через тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;.
  Сам HTML предназначен только для того, чтобы отобразить требуемую картинку,
  при этом никак ее не меняя. &lt;/p&gt;
&lt;p&gt;При подготовке изображений следует учесть несколько моментов.&lt;/p&gt;
&lt;ol&gt;
  &lt;li&gt;Поскольку веб-страница загружается по сети, существенным фактором выступает
    объем графического файла, встроенного в документ. Чем он меньше, тем быстрее
    отобразится изображение.&lt;/li&gt;
  &lt;li&gt;Размер картинки необходимо ограничить по ширине, например, установить не
    более 800 пикселов. Иначе изображение целиком не поместится в окне браузера,
    и появятся полосы прокрутки. &lt;/li&gt;
&lt;/ol&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:02:12',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '12',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '37',
        'language_id' => '2',
        'title' => 'Форматы файлов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Широкое распространение для веб-графики получили два формата&amp;nbsp;— GIF и JPEG.
  Их многофункциональность, универсальность, небольшой объем исходных файлов
  при достаточном для сайта качестве, сослужили им положительную службу, фактически
  определив их как стандарт веб-изображений. Есть еще формат PNG, который также
  поддерживается браузерами при добавлении изображений и существует в двух ипостасях&amp;nbsp;—
  PNG-8 и PNG-24. Однако популярность PNG сильно уступает признанию форматов
  GIF и JPEG.&lt;/p&gt;
&lt;h2&gt; Формат GIF&lt;/h2&gt;
&lt;p&gt; GIF (Graphics Interchange Format)&amp;nbsp;— формат графических файлов, широко применяемый
  при создании сайтов. GIF использует 8-битовый цвет и эффективно сжимает сплошные
  цветные области, при этом сохраняя детали изображения.&lt;/p&gt;
&lt;h3&gt; Особенности&lt;/h3&gt;
&lt;ul&gt;
  &lt;li&gt; Количество цветов в изображении может быть от 2 до 256, но это могут быть
    любые цвета из 24-битной палитры.&lt;/li&gt;
  &lt;li&gt; Файл в формате GIF может содержать прозрачные участки. Если используется
    отличный от белого цвета фон, он будет проглядывать сквозь
    «дыры»
    в изображении.&lt;/li&gt;
  &lt;li&gt; Поддерживает покадровую смену изображений, что делает формат популярным
    для создания баннеров и простой анимации.&lt;/li&gt;
  &lt;li&gt; Использует свободный от потерь метод сжатия&lt;/li&gt;
&lt;/ul&gt;
&lt;h3&gt;Область применения&lt;/h3&gt;
&lt;p&gt;Текст, логотипы, иллюстрации с четкими краями, анимированные рисунки, изображения
  с прозрачными участками, баннеры. &lt;/p&gt;
&lt;h2&gt;Формат JPEG&lt;/h2&gt;
&lt;p&gt; JPEG (Joint Photographic Experts Group)&amp;nbsp;— популярный формат графических файлов,
  широко применяемый при создании сайтов и для хранения изображений. JPEG поддерживает
  24-битовый цвет и сохраняет яркость и оттенки цветов в фотографиях неизменными.
  Данный формат называют сжатием с потерями, поскольку алгоритм JPEG выборочно
  отвергает данные. Метод сжатия может внести искажения в рисунок, особенно содержащий
  текст, мелкие детали или четкие края. Формат JPEG не поддерживает прозрачность.
  Когда вы сохраняете фотографию в этом формате, прозрачные пиксели заполняются
  определенным цветом. &lt;/p&gt;
&lt;h3&gt; Особенности&lt;/h3&gt;
&lt;ul&gt;
  &lt;li&gt; Количество цветов в изображении&amp;nbsp;— около 16 миллионов, что вполне достаточно
    для сохранения фотографического качества изображения.&lt;/li&gt;
  &lt;li&gt; Основная характеристика формата&amp;nbsp;— качество, позволяющее управлять конечным
    размером файла.&lt;/li&gt;
  &lt;li&gt; Поддерживает технологию, так называемый прогрессивный JPEG, в котором
    версия рисунка с низким разрешением появляется в окне просмотра до полной
    загрузки самого изображения.&lt;/li&gt;
&lt;/ul&gt;
&lt;h3&gt;Область применения&lt;/h3&gt;
&lt;p&gt; Используется преимущественно для фотографий. Не очень подходит для рисунков
  содержащих прозрачные участки, мелкие детали или текст.&lt;/p&gt;
&lt;h2&gt; Формат PNG-8&lt;/h2&gt;
&lt;p&gt; PNG-8 (Portable Network Graphics)&amp;nbsp;— формат по своему действию аналогичен
  GIF. По заверению разработчиков использует улучшенный формат сжатия данных,
  но как показывает практика, это не всегда так. &lt;/p&gt;
&lt;h3&gt;Особенности&lt;/h3&gt;
&lt;ul&gt;
  &lt;li&gt; Использует 8-битную палитру (256 цветов) в изображении, за что и получил
    в своем названии цифру восемь. При этом можно выбирать, сколько цветов будет
    сохраняться в файле&amp;nbsp;— от 2 до 256.&lt;/li&gt;
  &lt;li&gt; В отличие от GIF, не отображает анимацию ни в каком виде.&lt;/li&gt;
&lt;/ul&gt;
&lt;h3&gt;Область применения&lt;/h3&gt;
&lt;p&gt; Текст, логотипы, иллюстрации с четкими краями.&lt;/p&gt;
&lt;h2&gt;Формат PNG-24&lt;/h2&gt;
&lt;p&gt; PNG-24&amp;nbsp;— формат, аналогичный PNG-8, но использующий 24-битную палитру цвета
  Подобно формату JPEG, сохраняет яркость и оттенки цветов в фотографиях. Подобно
  GIF и формату PNG-8, сохраняет детали изображения, как, например, в линейных
  рисунках, логотипах, или иллюстрациях&lt;/p&gt;
&lt;h3&gt; Особенности&lt;/h3&gt;
&lt;ul&gt;
  &lt;li&gt; Использует примерно 16,7 млн. цветов в файле, из-за чего этот формат применяется
    для полноцветных изображений.&lt;/li&gt;
  &lt;li&gt; Поддерживает многоуровневую прозрачность, это позволяет создавать плавный
    переход от прозрачной области изображения к цветной, так называемый градиент.&lt;/li&gt;
  &lt;li&gt; Из-за того, что используемый алгоритм сжатия сохраняет все цвета и пикселы
    в изображении неизменными, если сравнивать с другими форматами, то у PNG-24
    конечный объем графического файла получается наибольшим.&lt;/li&gt;
&lt;/ul&gt;
&lt;h3&gt; Область применения&lt;/h3&gt;
&lt;p&gt; Фотографии, рисунки, содержащие прозрачные и полупрозрачные участки, рисунки с большим количеством
  цветов и четкими краями изображений.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:02:44',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '4',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '38',
        'language_id' => '2',
        'title' => 'Добавление рисунка',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для добавления изображения на веб-страницу используется тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;, 
  атрибут &lt;span class=&quot;attribute&quot;&gt;src&lt;/span&gt; которого определяет адрес графического
  файла. Общий синтаксис добавления изображения будет следующий.&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;img src=&quot;URL&quot; alt=&quot;альтернативный текст&quot;&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;URL&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;альтернативный текст&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

&lt;p&gt; &lt;span class=&quot;term&quot;&gt;URL&lt;/span&gt; (Universal Resource Locator, универсальный
  указатель ресурсов) представляет собой путь к графическому файлу. Для его указания
  можно использовать как абсолютный, так и относительный адрес. Далее рассмотрим
  несколько разных путей к графическому файлу для размещения его на веб-странице.
  Для примера возьмем файл с рисунком, который называется &lt;span class=&quot;attribute&quot;&gt;sample.gif&lt;/span&gt; и
  хранится в папке &lt;span class=&quot;attribute&quot;&gt;images&lt;/span&gt; корня сайта.&lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt; Если в начале адреса стоит слэш (символ /), это значит, что отсчет идет 
    от корня сайта. Например, адрес сайта&amp;nbsp;— http://baklan.narod.ru, значит, 
    написав путь к изображению как &lt;span class=&quot;value&quot;&gt;/images/bird.jpg&lt;/span&gt;, 
    мы, тем самым говорим серверу, что показать следует файл http://baklan.narod.ru/images/bird.jpg. 
    Учтите, что подобные ссылки со слэшем впереди работают только на веб-сервере, 
    на локальном компьютере они действовать не будут. &lt;/li&gt;
  &lt;li&gt; Если перед адресом добавляется упоминание протокола http (&lt;span class=&quot;attribute&quot;&gt;http://&lt;/span&gt;), 
    то речь идет об абсолютной ссылке. Изображение всегда будет загружаться с 
    указанного адреса в Интернете, даже при сохранении веб-страницы на локальный 
    компьютер. &lt;/li&gt;
  &lt;li&gt; Двоеточие со слэшем (../) в начале адреса говорит о том, что и рисунок
    и веб-страница находятся в разных папках, которые размещены на одном уровне.
    На рис.&amp;nbsp;10.1 показан файл index.html, в который требуется поместить
    рисунок pic.gif. Тогда относительный путь к изображению из index.html будет &lt;span class=&quot;value&quot;&gt;../images/pic.gif&lt;/span&gt;.
    Возможны случаи хранения файлов, что обращение из одного файла к другому
    превращается  в набор двоеточий, например: &lt;span class=&quot;value&quot;&gt;../../../images/pic.gif&lt;/span&gt;. &lt;/li&gt;
&lt;/ul&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_01.png&quot; alt=&quot;Рис. 10.1&quot; width=&quot;122&quot; height=&quot;68&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.1. Пример размещения файлов&lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt; Имя папки в начале пути, без всяких слэшей и двоеточий, сообщает, что
    и  текущий файл и папка с изображением находятся на одном уровне. Как показано
    на рис.&amp;nbsp;10.2, относительный путь к рисунку pic.gif из файла index.html
    будет &lt;span class=&quot;value&quot;&gt;images/pic.gif&lt;/span&gt;. &lt;/li&gt;
&lt;/ul&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_02.png&quot; alt=&quot;Рис. 10.2&quot; width=&quot;104&quot; height=&quot;49&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.2. Пример размещения файлов&lt;/p&gt;
&lt;p&gt; В примере&amp;nbsp;10.1 показано несколько способов добавления рисунка
  на веб-страницу.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt;Пример 10.1. Вставка изображения в документ&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Добавление рисунков&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;http://webimg.ru/themes/cloverfield/images/ref_collage.gif&quot; 
        alt=&quot;Это абсолютный адрес размещения изображения&quot;&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;/example/images/home.png&quot; 
        alt=&quot;Адрес размещения изображения относительно корня сайта&quot;&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/home.png&quot; 
        alt=&quot;Адрес размещения изображения относительно текущего HTML-документа&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Добавление рисунков&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;http://webimg.ru/themes/cloverfield/images/ref_collage.gif&quot;&lt;/span&gt;&lt;/span&gt; 
       &lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Это абсолютный адрес размещения изображения&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;/example/images/home.png&quot;&lt;/span&gt;&lt;/span&gt; 
       &lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Адрес размещения изображения относительно корня сайта&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/home.png&quot;&lt;/span&gt;&lt;/span&gt; 
       &lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Адрес размещения изображения относительно текущего HTML-документа&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt; Как правило, в качестве формата графического файла выступает GIF и JPEG. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:03:08',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '12',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '39',
        'language_id' => '2',
        'title' => 'Альтернативный текст',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Альтернативный текст позволяет получить текстовую информацию  о рисунке при отключенном в браузере показе картинок или во время их загрузки. Такой  текст появляется раньше самого изображения и дает представление об его  содержании (рис.&amp;nbsp;10.3). Затем зарезервированное пустое поле заменяется  картинкой (рис.&amp;nbsp;10.4). &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_03.png&quot; alt=&quot;Рис. 10.3&quot; width=&quot;446&quot; height=&quot;501&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt; Рис. 10.3. Альтернативный текст до загрузки изображения&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_04.jpg&quot; alt=&quot;Рис. 10.4&quot; width=&quot;446&quot; height=&quot;501&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt; Рис. 10.4. Веб-страница после загрузки изображения &lt;/p&gt;

&lt;p class=&quot;note&quot;&gt; Вид всплывающей подсказки, а именно, ее цвет, фон, шрифт и др. параметры задаются 
  с помощью настроек операционной системы и не могут быть изменены через HTML-файл.&lt;/p&gt;
&lt;p&gt; Для создания альтернативного текста используется атрибут &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;, как показано в примере&amp;nbsp;10.2. &lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример 10.2. Добавление альтернативного текста&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Альтернативный текст&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/robot.jpg&quot; alt=&quot;Девочка и робот&quot; width=&quot;300&quot; height=&quot;388&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Альтернативный текст&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/robot.jpg&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Девочка и робот&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;300&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;388&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

 &lt;p&gt; Учтите, что текст в атрибуте &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt; обязательно 
  должен быть взят в кавычки, как в данном примере. &lt;/p&gt;
&lt;p&gt; Не все браузеры отображают альтернативный текст в виде всплывающей подсказки.
  Поэтому для ее создания используйте атрибут &lt;span class=&quot;attribute&quot;&gt;title&lt;/span&gt; (пример&amp;nbsp;10.3).&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример 10.3. Всплывающая подсказка&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Атрибут title &amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;p&amp;gt;&amp;lt;a href=&quot;index.html&quot;&amp;gt;&amp;lt;img src=&quot;images/home.png&quot; 
       alt=&quot;Вернуться на главную страницу&quot; title=&quot;Главная страница&quot;&amp;gt;&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Атрибут title &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;index.html&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/home.png&quot;&lt;/span&gt;&lt;/span&gt; 
      &lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Вернуться на главную страницу&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; title=&lt;span class=&quot;value&quot;&gt;&quot;Главная страница&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt; Как показано в данном примере, значения у атрибутов &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;title&lt;/span&gt; может различаться, что позволяет установить 
  определенный текст для разных случаев. Только учтите, что длинный текст будет
  «обрезаться»
  и отображается не весь. Но поисковые системы, для которых иной 
  раз и применяют атрибут &lt;span class=&quot;attribute&quot;&gt;title&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;alt&lt;/span&gt;, 
вполне его читают.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:03:32',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '12',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '40',
        'language_id' => '2',
        'title' => 'Изменение размеров рисунка',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для изменения размеров рисунка средствами HTML у тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; предусмотрены атрибуты &lt;span class=&quot;attribute&quot;&gt;width&lt;/span&gt; (ширина) и &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt; (высота). В качестве значения используются пикселы, при этом аргументы должны
  совпадать с физическими размерами картинки. Например, на рис.&amp;nbsp;10.6
  показано  изображение, которое имеет размеры 100х111 пикселов.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_06.jpg&quot; alt=&quot;Рис. 10.5&quot; width=&quot;100&quot; height=&quot;111&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.6. Картинка исходного размера&lt;/p&gt;
&lt;p&gt; Соответственно, HTML-код для размещения данного рисунка, приведен в примере&amp;nbsp;10.4.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример 10.4. Размеры рисунка&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Размеры изображения&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/figure.jpg&quot; width=&quot;100&quot; height=&quot;111&quot; alt=&quot;Винни-Пух&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Размеры изображения&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/figure.jpg&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;111&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Винни-Пух&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
&lt;p&gt; Если размеры изображения указаны явно, то браузер использует их для того,
  чтобы отображать соответствующую картинке пустую область в процессе загрузки
  документа (рис.&amp;nbsp;10.7). В противном случае браузер ждет, когда рисунок
  загрузится полностью, после чего меняет ширину и высоту картинки (рис.&amp;nbsp;10.8).
  При этом может произойти переформатирование текста, поскольку первоначально
  размер картинки  не известен и автоматически он устанавливается небольшим.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_07.png&quot; alt=&quot;Рис. 10.7&quot; width=&quot;481&quot; height=&quot;398&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.7. Размеры картинки не указаны и она еще не загрузилась&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_08.png&quot; alt=&quot;Рис. 10.8&quot; width=&quot;481&quot; height=&quot;398&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.8. Картинка загружена, текст переформатирован&lt;/p&gt;
&lt;p&gt;Ширину и высоту изображения можно менять как в меньшую, так и большую сторону. 
  Однако на скорость загрузки рисунка это никак не влияет, поскольку размер файла 
  остается неизменным. Поэтому с осторожностью уменьшайте изображение, т.к. это 
  может вызвать недоумение у читателей, отчего такой маленький рисунок так долго 
  грузится. А вот увеличение размеров приводит к обратному эффекту&amp;nbsp;— размер 
  изображения велик, но файл относительно изображения аналогичного размера загружается 
  быстрее.&lt;/p&gt;
&lt;p&gt; На рис. 10.9 приведено то же изображение, что показано на рис.&amp;nbsp;10.6,
  но с увеличенной в два раза шириной и высотой.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_06.jpg&quot; alt=&quot;Рис. 10.9&quot; width=&quot;200&quot; height=&quot;222&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.9. Вид картинки, увеличенной в браузере &lt;/p&gt;
&lt;p&gt; Код для такого рисунка останется практически неизменным и показан в примере&amp;nbsp;10.5.&lt;/p&gt;
&lt;p class=&quot;exampleTitle2&quot;&gt; Пример 10.5. Изменение размера рисунка&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Увеличение размеров изображения&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;img src=&quot;images/figure.jpg&quot; width=&quot;200&quot; height=&quot;222&quot; alt=&quot;Винни-Пух&quot;&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Увеличение размеров изображения&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;img&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;images/figure.jpg&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;200&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;222&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; alt=&lt;span class=&quot;value&quot;&gt;&quot;Винни-Пух&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

&lt;p&gt; Такое изменение размеров называется ресемплированием, при этом алгоритм браузера
  по своим возможностям уступает графическим редакторам. Поэтому увеличивать
  таким  способом изображения нужно только в особых случаях, а то слишком ухудшается
  качество картинки. Лучше воспользоваться какой-нибудь графической программой.
  Исключением являются рисунки, содержащие прямоугольные области. На рис.&amp;nbsp;10.10
  приведен файл узора, который занимает 54 байта и имеет исходный размер 8
  на  8 пикселов, увеличенных до 150 пикселов.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_10_10.gif&quot; alt=&quot;Рис. 10.10&quot; width=&quot;150&quot; height=&quot;150&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 10.10. Увеличенное изображение&lt;/p&gt;
&lt;p class=&quot;note&quot;&gt;Браузеры используют два алгоритма для ресемплирования — бикубический (дает сглаженные границы и плавный тоновый диапазон цветов) и по ближайшим точкам (сохраняет первоначальный набор цветов и резкость краев). Последние версии браузеров применяют бикубический алгоритм, а старые браузеры, наоборот, алгоритм по ближайшим точкам.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:03:56',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '12',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '41',
        'language_id' => '2',
        'title' => 'Списки',
        'description' => '&amp;lt;div class=&amp;quot;field-item even&amp;quot;&amp;gt;  &amp;lt;p&amp;gt;Списком называется взаимосвязанный набор отдельных фраз или предложений, которые     начинаются с маркера или цифры. Списки предоставляют возможность упорядочить     и систематизировать разные данные и представить их в наглядном и удобном для     пользователя виде. &amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt; Любой список представляет собой контейнер &amp;lt;span class=&amp;quot;tag&amp;quot;&amp;gt;&amp;amp;lt;ul&amp;amp;gt;&amp;lt;/span&amp;gt;,     который устанавливает маркированный список, или &amp;lt;span class=&amp;quot;tag&amp;quot;&amp;gt;&amp;amp;lt;ol&amp;amp;gt;&amp;lt;/span&amp;gt;,     определяющий список нумерованный. Каждый элемент списка должен начинаться с     тега &amp;lt;span class=&amp;quot;tag&amp;quot;&amp;gt;&amp;amp;lt;li&amp;amp;gt;&amp;lt;/span&amp;gt;. &amp;lt;/p&amp;gt;&amp;lt;/div&amp;gt;',
        'created_at' => '2018-07-04 23:04:22',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '13',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '42',
        'language_id' => '2',
        'title' => 'Маркированный список',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Маркированный список определяется тем, что перед каждым элементом списка добавляется     небольшой маркер, обычно в виде закрашенного кружка. Сам список формируется с помощью контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;ul&amp;gt;&lt;/span&gt;, а каждый пункт списка  начинается с тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;li&amp;gt;&lt;/span&gt;,  как показано ниже.&lt;/p&gt;
  &lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;ul&amp;gt;
 &amp;lt;li&amp;gt;Первый пункт&amp;lt;/li&amp;gt;
 &amp;lt;li&amp;gt;Второй пункт&amp;lt;/li&amp;gt;
 &amp;lt;li&amp;gt;Третий пункт&amp;lt;/li&amp;gt;
&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Первый пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Второй пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Третий пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
  &lt;p&gt;В списке непременно должен присутствовать закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/span&gt;, иначе возникнет  ошибка. Закрывающий тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;/li&amp;gt;&lt;/span&gt; хотя и не обязателен, но советуем всегда его добавлять, чтобы четко разделять  элементы списка. &lt;/p&gt;
  &lt;p&gt;В примере &amp;nbsp;11.1 приведен код HTML для добавления маркированного списка на веб-странице. &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.1. Создание маркированного списка&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Маркированный список&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;hr&amp;gt;
   &amp;lt;ul&amp;gt;
     &amp;lt;li&amp;gt;Чебурашка&amp;lt;/li&amp;gt;
     &amp;lt;li&amp;gt;Крокодил Гена&amp;lt;/li&amp;gt;
     &amp;lt;li&amp;gt;Шапокляк&amp;lt;/li&amp;gt;
     &amp;lt;li&amp;gt;Крыса Лариса&amp;lt;/li&amp;gt;
   &amp;lt;/ul&amp;gt;
   &amp;lt;hr&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Маркированный список&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;hr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Чебурашка&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Крокодил Гена&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Шапокляк&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Крыса Лариса&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;hr&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;11.1. &lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_11_1.png&quot; alt=&quot;Рис. 11.1&quot; width=&quot;453&quot; height=&quot;220&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 11.1. Вид маркированного списка&lt;/p&gt;
  &lt;p&gt; Обратите внимание на отступы сверху, снизу и слева от списка. Такие отступы     добавляются автоматически. &lt;/p&gt;
  &lt;p&gt; Маркеры могут принимать один из трех видов: круг (по умолчанию), окружность     и квадрат. Для выбора стиля маркера используется атрибут &lt;span class=&quot;attribute&quot;&gt;type&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;ul&amp;gt;&lt;/span&gt;. Допустимые значения приведены в табл.&amp;nbsp;11.1 &lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 11.1. Стили маркеров списка
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Тип списка&lt;/th&gt;
      &lt;th&gt;Код HTML&lt;/th&gt;
      &lt;th&gt;Пример&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Список с маркерами в виде круга&lt;/td&gt;
      &lt;td&gt;&amp;lt;ul type=&quot;disc&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ul&amp;gt; &lt;/td&gt;
      &lt;td&gt;&lt;ul style=&quot;list-style:disc&quot;&gt;
        &lt;li&gt;Первый&lt;/li&gt;
        &lt;li&gt;Второй&lt;/li&gt;
        &lt;li&gt;Третий &lt;/li&gt;
      &lt;/ul&gt;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Список с маркерами в виде окружности&lt;/td&gt;
      &lt;td&gt;&amp;lt;ul type=&quot;circle&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ul&amp;gt; &lt;/td&gt;
      &lt;td&gt;&lt;ul style=&quot;list-style:circle&quot;&gt;
        &lt;li&gt;Первый &lt;/li&gt;
        &lt;li&gt;Второй&lt;/li&gt;
        &lt;li&gt;Третий &lt;/li&gt;
      &lt;/ul&gt;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Список с квадратными маркерами&lt;/td&gt;
      &lt;td&gt;&amp;lt;ul type=&quot;square&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ul&amp;gt; &lt;/td&gt;
      &lt;td&gt;&lt;ul style=&quot;list-style:square&quot;&gt;
        &lt;li&gt;Первый&lt;/li&gt;
        &lt;li&gt;Второй&lt;/li&gt;
        &lt;li&gt;Третий &lt;/li&gt;
      &lt;/ul&gt;&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;

  &lt;p class=&quot;note&quot;&gt;Вид маркеров может незначительно различаться в разных  браузерах, а также при смене шрифта и размера текста.&lt;/p&gt;
  &lt;p&gt;Создание списка с квадратными маркерами показано в примере&amp;nbsp;11.2.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.2. Вид маркеров&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Маркированный список&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Изменение убеждений&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;ul type=&quot;square&quot;&amp;gt;
   &amp;lt;li&amp;gt;изменение религиозной веры (на выбор: буддизм, конфуцианство, индуизм). 
       Специальное предложение - иудаизм и мусульманство вместе;&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;изменение веры в непогрешимость любимой партии;&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;убеждение в том, что инопланетяне существуют;&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;предпочтение политического строя, как самого лучшего в своем роде 
       (на выбор: феодализм, социализм, коммунизм, капитализм).&amp;lt;/li&amp;gt;
  &amp;lt;/ul&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Маркированный список&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;Изменение убеждений&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; type=&lt;span class=&quot;value&quot;&gt;&quot;square&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;изменение религиозной веры (на выбор: буддизм, конфуцианство, индуизм). 
       Специальное предложение - иудаизм и мусульманство вместе;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;изменение веры в непогрешимость любимой партии;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;убеждение в том, что инопланетяне существуют;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;предпочтение политического строя, как самого лучшего в своем роде 
       (на выбор: феодализм, социализм, коммунизм, капитализм).&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ul&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;11.2. &lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_11_2.png&quot; alt=&quot;Рис. 11.2&quot; width=&quot;453&quot; height=&quot;325&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 11.2. Вид списка с квадратными маркерами&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:05:08',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '13',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '43',
        'language_id' => '2',
        'title' => 'Нумерованный список',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Нумерованные списки представляют собой набор элементов с их порядковыми номерами.     Вид и тип нумерации зависит от атрибутов тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt;, который и применяется для создания списка. Каждый пункт нумерованного списка обозначается тегом &lt;span class=&quot;tag&quot;&gt;&amp;lt;li&amp;gt;&lt;/span&gt;, как показано ниже.&lt;/p&gt;
&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;ol&amp;gt;
 &amp;lt;li&amp;gt;Первый пункт&amp;lt;/li&amp;gt;
 &amp;lt;li&amp;gt;Второй пункт&amp;lt;/li&amp;gt;
 &amp;lt;li&amp;gt;Третий пункт&amp;lt;/li&amp;gt;
&amp;lt;/ol&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Первый пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Второй пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Третий пункт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

  &lt;p&gt;Если не указывать никаких дополнительных атрибутов и просто  написать тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt;,  то по умолчанию применяется список с арабскими числами (1, 2, 3,...), как  показано в примере&amp;nbsp;11.3.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.3. Создание нумерованного списка &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Нумерованный список&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Работа со временем&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;ol&amp;gt;
    &amp;lt;li&amp;gt;создание пунктуальности (никогда не будете никуда опаздывать);&amp;lt;/li&amp;gt;
    &amp;lt;li&amp;gt;излечение от пунктуальности (никогда никуда не будете торопиться);&amp;lt;/li&amp;gt;
    &amp;lt;li&amp;gt;изменение восприятия времени и часов.&amp;lt;/li&amp;gt;
  &amp;lt;/ol&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Нумерованный список&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;Работа со временем&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;strong&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;создание пунктуальности (никогда не будете никуда опаздывать);&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;излечение от пунктуальности (никогда никуда не будете торопиться);&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;изменение восприятия времени и часов.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;11.3.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_11_3.png&quot; alt=&quot;Рис. 11.3&quot; width=&quot;453&quot; height=&quot;254&quot;&gt; &lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 11.3. Вид нумерованного списка &lt;/p&gt;
  &lt;p&gt;Заметьте, что в нумерованном списке также добавляются  автоматические отступы сверху, снизу и слева от текста.&lt;/p&gt;
  &lt;p&gt;В качестве нумерующих элементов могут выступать следующие значения: &lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; арабские числа (1, 2, 3, ...);&lt;/li&gt;
    &lt;li&gt; прописные латинские буквы (A, B, C, ...);&lt;/li&gt;
    &lt;li&gt; строчные латинские буквы (a, b, c, ...); &lt;/li&gt;
    &lt;li&gt; прописные римские числа (I, II, III, ...);&lt;/li&gt;
    &lt;li&gt; строчные римские числа (i, ii, iii, ...).&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p&gt;Для указания типа нумерованного списка применяется атрибут &lt;span class=&quot;attribute&quot;&gt;type&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt;. Его возможные значения приведены в     табл.&amp;nbsp;11.2.&lt;/p&gt;
  &lt;table class=&quot;data&quot;&gt;
    &lt;caption&gt;
      Табл. 11.2. Типы нумерованного списка
    &lt;/caption&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;th&gt;Тип списка&lt;/th&gt;
      &lt;th&gt;Код HTML&lt;/th&gt;
      &lt;th&gt;Пример&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Арабские числа&lt;/td&gt;
      &lt;td&gt;&amp;lt;ol type=&quot;1&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ol&amp;gt; &lt;/td&gt;
      &lt;td&gt; 1. Чебурашка&lt;br&gt;
        2. Крокодил Гена&lt;br&gt;
        3. Шапокляк&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Прописные буквы латинского алфавита&lt;/td&gt;
      &lt;td&gt;&amp;lt;ol type=&quot;A&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ol&amp;gt; &lt;/td&gt;
      &lt;td&gt;A. Чебурашка&lt;br&gt;
        B. Крокодил Гена&lt;br&gt;
        C. Шапокляк&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Строчные буквы латинского алфавита&lt;/td&gt;
      &lt;td&gt;&amp;lt;ol type=&quot;a&quot;&amp;gt; &lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ol&amp;gt; &lt;/td&gt;
      &lt;td&gt;a. Чебурашка&lt;br&gt;
        b. Крокодил Гена&lt;br&gt;
        c. Шапокляк&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Римские числа в верхнем регистре&lt;/td&gt;
      &lt;td&gt;&amp;lt;ol type=&quot;I&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ol&amp;gt; &lt;/td&gt;
      &lt;td&gt; I. Чебурашка&lt;br&gt;
        II. Крокодил Гена&lt;br&gt;
        III. Шапокляк&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Римские числа в нижнем регистре&lt;/td&gt;
      &lt;td&gt;&amp;lt;ol type=&quot;i&quot;&amp;gt;&lt;br&gt;
        &amp;lt;li&amp;gt;...&amp;lt;/li&amp;gt;&lt;br&gt;
        &amp;lt;/ol&amp;gt; &lt;/td&gt;
      &lt;td&gt; i. Чебурашка&lt;br&gt;
        ii. Крокодил Гена&lt;br&gt;
        iii. Шапокляк&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p&gt;Чтобы начать список с определенного значения, используется  атрибут &lt;span class=&quot;attribute&quot;&gt;start&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;ol&amp;gt;&lt;/span&gt;.  При этом не имеет значения, какой тип списка установлен с помощью  &lt;span class=&quot;attribute&quot;&gt;type&lt;/span&gt;, атрибут &lt;span class=&quot;attribute&quot;&gt;start&lt;/span&gt; одинаково  работает и с римскими и с арабскими числами. В примере&amp;nbsp;11.4 показано создание списка с использованием римских цифр в верхнем     регистре, начинающихся с восьми. &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.4. Нумерация списка &lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Римские числа&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;ol type=&quot;I&quot; start=&quot;8&quot;&amp;gt;
   &amp;lt;li&amp;gt;Король Магнум XLIV&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;Король Зигфрид XVI&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;Король Сигизмунд XXI&amp;lt;/li&amp;gt;
   &amp;lt;li&amp;gt;Король Хусбрандт I&amp;lt;/li&amp;gt;
  &amp;lt;/ol&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Римские числа&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; type=&lt;span class=&quot;value&quot;&gt;&quot;I&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; start=&lt;span class=&quot;value&quot;&gt;&quot;8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Король Магнум XLIV&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Король Зигфрид XVI&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Король Сигизмунд XXI&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;Король Хусбрандт I&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;li&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;ol&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;11.4. &lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_11_4.png&quot; alt=&quot;Рис. 11.4&quot; width=&quot;453&quot; height=&quot;206&quot;&gt; &lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 11.4. Нумерованный список с римскими числами &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:05:30',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '13',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '44',
        'language_id' => '2',
        'title' => 'Список определений',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Список определений состоит из двух элементов&amp;nbsp;— термина и его определения.     Сам список задается с помощью контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;dl&amp;gt;&lt;/span&gt;,     термин&amp;nbsp;— тегом &lt;span class=&quot;tag&quot;&gt;&amp;lt;dt&amp;gt;&lt;/span&gt;, а его определение&amp;nbsp;— с помощью     тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;dd&amp;gt;&lt;/span&gt;. Вложение тегов для создания списка     определений продемонстрировано в примере&amp;nbsp;11.5. &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.5. Общая структура списка определений&lt;/p&gt;

&lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;dl&amp;gt;
  &amp;lt;dt&amp;gt;Термин 1&amp;lt;/dt&amp;gt;
    &amp;lt;dd&amp;gt;Определение 1&amp;lt;/dd&amp;gt;
  &amp;lt;dt&amp;gt;Термин 2&amp;lt;/dt&amp;gt;
    &amp;lt;dd&amp;gt;Определение 2&amp;lt;/dd&amp;gt;
&amp;lt;/dl&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dl&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;Термин 1&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;Определение 1&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;Термин 2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;Определение 2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dl&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;

  &lt;p&gt;Список определений хорошо подходит для расшифровки терминов, создания глоссария,  словаря, справочника и т.д. В примере&amp;nbsp;11.6 показано одно из возможных использований     этого вида списка.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 11.6. Создание списка определений&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Список определений&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;dl&amp;gt;
   &amp;lt;dt&amp;gt;Тег&amp;lt;/dt&amp;gt;
     &amp;lt;dd&amp;gt;Тег — это специальный символ разметки, который применяется для 
         вставки различных элементов на веб-страницу таких как: рисунки, 
         таблицы, ссылки и др., и для изменения их вида.&amp;lt;/dd&amp;gt;
   &amp;lt;dt&amp;gt;HTML-документ&amp;lt;/dt&amp;gt;
     &amp;lt;dd&amp;gt;Обычный текстовый файл, который может содержать в себе текст, 
         теги и стили. Изображения и другие объекты хранятся отдельно. 
         Содержимое такого файла обычно называется HTML-код.&amp;lt;/dd&amp;gt;
   &amp;lt;dt&amp;gt;Сайт&amp;lt;/dt&amp;gt;
   &amp;lt;dd&amp;gt;Cайт — это набор отдельных веб-страниц, которые связаны между собой 
         ссылками и единым оформлением.&amp;lt;/dd&amp;gt;
  &amp;lt;/dl&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Список определений&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dl&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;Тег&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;Тег — это специальный символ разметки, который применяется для 
         вставки различных элементов на веб-страницу таких как: рисунки, 
         таблицы, ссылки и др., и для изменения их вида.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;HTML-документ&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;Обычный текстовый файл, который может содержать в себе текст, 
         теги и стили. Изображения и другие объекты хранятся отдельно. 
         Содержимое такого файла обычно называется HTML-код.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;Сайт&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dt&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;Cайт — это набор отдельных веб-страниц, которые связаны между собой 
         ссылками и единым оформлением.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dd&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;dl&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат примера показан на рис.&amp;nbsp;11.5.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_11_5.png&quot; alt=&quot;Рис. 11.5&quot; width=&quot;453&quot; height=&quot;390&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 11.5. Вид списка определений &lt;/p&gt;
  &lt;p&gt;Как видно на картинке, текст термина прижимается к левому  краю окна браузера, а его определение сдвигается вправо.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:05:58',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '13',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '45',
        'language_id' => '2',
        'title' => 'Таблицы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Благодаря универсальности таблиц, большому числу  параметров, управляющих их видом, таблицы надолго стали определенным стандартом  для верстки веб-страниц. Таблица с невидимой границей представляет собой словно  модульную сетку, в блоках которой удобно размещать элементы веб-страницы. Тем  не менее, это не совсем правильный подход, ведь каждый объект HTML определен для своих собственных  целей и если он используется не по назначению, причем повсеместно, это значит,  что альтернатив нет. Так оно и было долгое время, пока на смену таблицам при  верстке сайтов не пришли слои. Это не значит, что слои теперь используются  сплошь и рядом, но тенденция уже наметилась четко&amp;nbsp;— таблицы применяются  для размещения табличных данных, а слои&amp;nbsp;— для верстки и оформления.&lt;/p&gt;
  &lt;h2&gt;Создание таблицы&lt;/h2&gt;
  &lt;p&gt;Таблица состоит из строк и  столбцов ячеек, которые могут содержать текст и рисунки. Обычно таблицы  используются для упорядочения и представления данных, однако возможности таблиц  этим не ограничиваются. C помощью таблиц удобно верстать макеты страниц,  расположив нужным образом фрагменты текста и изображений.&lt;/p&gt;
  &lt;p&gt; Для добавления таблицы на веб-страницу используется тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;.  Этот элемент служит контейнером для элементов, определяющих содержимое таблицы.  Любая таблица состоит из строк и ячеек, которые задаются соответственно с  помощью тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;. Таблица должна  содержать хотя бы одну ячейку (пример&amp;nbsp;12.1). Допускается вместо тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt; использовать тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;th&amp;gt;&lt;/span&gt;.  Текст в ячейке, оформленной с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;th&amp;gt;&lt;/span&gt;, отображается браузером шрифтом жирного  начертания и выравнивается по центру ячейки. В остальном, разницы между  ячейками, созданными через теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;th&amp;gt;&lt;/span&gt;&amp;nbsp;нет.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример  12.1. Создание таблицы &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Тег TABLE&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table border=&quot;1&quot; width=&quot;100%&quot; cellpadding=&quot;5&quot;&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;th&amp;gt;Ячейка 1&amp;lt;/th&amp;gt;
    &amp;lt;th&amp;gt;Ячейка 2&amp;lt;/th&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td&amp;gt;Ячейка 3&amp;lt;/td&amp;gt;
    &amp;lt;td&amp;gt;Ячейка 4&amp;lt;/td&amp;gt;
  &amp;lt;/tr&amp;gt;
 &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML  4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Тег TABLE&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;5&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 1&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 3&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 4&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Порядок расположения ячеек и их вид показан на рис.&amp;nbsp;12.1.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_1.png&quot; alt=&quot;Рис. 12.1&quot; width=&quot;453&quot; height=&quot;187&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.1. Результат  создания таблицы с четырьмя ячейками&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:06:15',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '46',
        'language_id' => '2',
        'title' => 'Атрибуты тега &lt;table&gt;',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Тот факт, что таблицы применяются достаточно часто и не  только для отображения табличных данных обязан не только их гибкости и  универсальности, но и обилию атрибутов тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;. Далее перечислены  некоторые атрибуты тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;,  которые применяются наиболее часто. &lt;/p&gt;
  &lt;h3&gt;align&lt;/h3&gt;
  &lt;p&gt;Задает выравнивание таблицы по  краю окна браузера. Допустимые значения: &lt;span class=&quot;value&quot;&gt;left&lt;/span&gt;&amp;nbsp;— выравнивание таблицы  по левому краю, &lt;span class=&quot;value&quot;&gt;center&lt;/span&gt;&amp;nbsp;— по  центру и &lt;span class=&quot;value&quot;&gt;right&lt;/span&gt;&amp;nbsp;— по правому краю. Когда  используются значения &lt;span class=&quot;value&quot;&gt;left&lt;/span&gt; и &lt;span class=&quot;value&quot;&gt;right&lt;/span&gt;,  текст начинает обтекать таблицу сбоку и снизу. &lt;/p&gt;
  &lt;h3&gt;bgcolor&lt;/h3&gt;
  &lt;p&gt;Устанавливает цвет фона  таблицы. &lt;/p&gt;
  &lt;h3&gt;border&lt;/h3&gt;
  &lt;p&gt;Устанавливает толщину границы в пикселах вокруг таблицы. При наличии этого атрибута также отображаются границы между ячеек.&lt;/p&gt;
  &lt;h3&gt;cellpadding&lt;/h3&gt;
  &lt;p&gt;Определяет расстояние между  границей ячейки и ее содержимым. Этот атрибут добавляет пустое пространство к  ячейке, увеличивая тем самым ее размеры. Без &lt;span class=&quot;attribute&quot;&gt;cellpadding&lt;/span&gt; текст в таблице
    «налипает»
    на рамку, ухудшая тем самым его восприятие.  Добавление же &lt;span class=&quot;attribute&quot;&gt;cellpadding&lt;/span&gt; позволяет улучшить читабельность текста. При отсутствии границ особого значения  этот атрибут не имеет, но может помочь, когда требуется установить пустой  промежуток между ячейками.&lt;/p&gt;
  &lt;h3&gt;cellspacing&lt;/h3&gt;
  &lt;p&gt;Задает расстояние между  внешними границами ячеек. Если установлен атрибут &lt;span class=&quot;attribute&quot;&gt;border&lt;/span&gt;,  толщина границы принимается в расчет и входит в общее значение.&lt;/p&gt;
  &lt;h3&gt;cols&lt;/h3&gt;
  &lt;p&gt;Атрибут &lt;span class=&quot;attribute&quot;&gt;cols&lt;/span&gt; указывает количество столбцов в таблице, помогая браузеру в подготовке к ее  отображению. Без этого атрибута таблица будет показана только после того, как  все ее содержимое будет загружено в браузер и проанализировано. Использование  атрибута &lt;span class=&quot;attribute&quot;&gt;cols&lt;/span&gt; позволяет  несколько ускорить отображение содержимого таблицы.&lt;/p&gt;
  &lt;h3&gt;rules&lt;/h3&gt;
  &lt;p&gt;Сообщает браузеру, где  отображать границы между ячейками. По умолчанию рамка рисуется вокруг каждой  ячейки, образуя тем самым сетку. В дополнение можно указать отображать линии  между колонками (значение &lt;span class=&quot;value&quot;&gt;cols&lt;/span&gt;),  строками (&lt;span class=&quot;value&quot;&gt;rows&lt;/span&gt;) или группами  (&lt;span class=&quot;value&quot;&gt;groups&lt;/span&gt;), которые  определяются наличием тегов &lt;span class=&quot;tag&quot;&gt;&amp;lt;thead&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;tfoot&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;tbody&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;colgroup&amp;gt;&lt;/span&gt; или &lt;span class=&quot;tag&quot;&gt;&amp;lt;col&amp;gt;&lt;/span&gt;. Толщина границы указывается с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;border&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;width&lt;/h3&gt;
  &lt;p&gt;Задает ширину таблицы. Если  общая ширина содержимого превышает указанную ширину таблицы, то браузер будет  пытаться
    «втиснуться»
    в заданные размеры за счет форматирования текста. В  случае, когда это невозможно, например, в таблице находятся изображения,  атрибут &lt;span class=&quot;attribute&quot;&gt;width&lt;/span&gt; будет  проигнорирован, и новая ширина таблицы будет вычислена на основе ее  содержимого.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:06:38',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '47',
        'language_id' => '2',
        'title' => 'Атрибуты тега &lt;td&gt;',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Каждая ячейка таблицы, задаваемая через тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;, в свою очередь  тоже имеет свои атрибуты, часть из которых совпадает с атрибутами тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;.&lt;/p&gt;
  &lt;h3&gt;align&lt;/h3&gt;
  &lt;p&gt;Задает выравнивание  содержимого ячейки по горизонтали. Возможные значения: &lt;span class=&quot;value&quot;&gt;left&lt;/span&gt;&amp;nbsp;—- выравнивание по левому  краю, &lt;span class=&quot;value&quot;&gt;center&lt;/span&gt;&amp;nbsp;— по центру и &lt;span class=&quot;value&quot;&gt;right&lt;/span&gt;&amp;nbsp;— по правому краю ячейки.&lt;/p&gt;
  &lt;h3&gt;bgcolor&lt;/h3&gt;
  &lt;p&gt;Устанавливает цвет фона  ячейки. Используя этот атрибут совместно с атрибутом &lt;span class=&quot;attribute&quot;&gt;bgcolor&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt; можно  получить разнообразные цветовые эффекты в таблице.&lt;/p&gt;
  &lt;h3&gt;colspan&lt;/h3&gt;
  &lt;p&gt;Устанавливает число ячеек,  которые должны быть объединены по горизонтали. Этот атрибут имеет смысл для  таблиц, состоящих из нескольких столбцов. Например, как для таблицы, показанной на  рис.&amp;nbsp;12.2.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_2.png&quot; alt=&quot;Рис. 12.2&quot; width=&quot;405&quot; height=&quot;64&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.2. Пример таблицы, где используется горизонтальное  объединение ячеек&lt;/p&gt;
  &lt;p&gt; В приведенной на рис.&amp;nbsp;12.2 таблице содержатся две  строки и две колонки, причем верхние горизонтальные ячейки объединены с помощью  атрибута &lt;span class=&quot;attribute&quot;&gt;colspan&lt;/span&gt;. &lt;/p&gt;
  &lt;h3&gt;height&lt;/h3&gt;
  &lt;p&gt;Браузер сам устанавливает высоту таблицы и ее ячеек исходя  из их содержимого. Однако при использовании атрибута &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt; высота ячеек будет изменена. Здесь возможны два варианта. Если значение &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt; меньше, чем  содержимое ячейки, то этот атрибут будет проигнорирован. В случае, когда  установлена высота ячейки, превышающая ее содержимое, добавляется пустое  пространство по вертикали.&lt;/p&gt;
  &lt;h3&gt;rowspan&lt;/h3&gt;
  &lt;p&gt;Устанавливает число ячеек,  которые должны быть объединены по вертикали. Этот атрибут имеет смысл для  таблиц, состоящих из нескольких строк. Например, как для таблицы, показанной на  рис.&amp;nbsp;12.3.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_3.png&quot; alt=&quot;Рис. 12.3&quot; width=&quot;405&quot; height=&quot;64&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.3. Пример таблицы, где применяется вертикальное  объединение ячеек&lt;/p&gt;
  &lt;p&gt; В приведенной на рис.&amp;nbsp;12.3 таблице содержатся две  строки и две колонки, левые вертикальные ячейки объединены с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;rowspan&lt;/span&gt;. &lt;/p&gt;
  &lt;h3&gt;valign&lt;/h3&gt;
  &lt;p&gt;Устанавливает вертикальное  выравнивание содержимого ячейки. По умолчанию содержимое ячейки располагается  по ее вертикали в центре. Возможные значения: &lt;span class=&quot;value&quot;&gt;top&lt;/span&gt;&amp;nbsp;— выравнивание по верхнему краю строки, &lt;span class=&quot;value&quot;&gt;middle&lt;/span&gt;&amp;nbsp;—  выравнивание по середине, &lt;span class=&quot;value&quot;&gt;bottom&lt;/span&gt;&amp;nbsp;— выравнивание по нижнему краю, &lt;span class=&quot;value&quot;&gt;baseline&lt;/span&gt;&amp;nbsp;— выравнивание по базовой линии, при этом происходит привязка содержимого ячейки  к одной линии.&lt;/p&gt;
  &lt;h3&gt;width&lt;/h3&gt;
  &lt;p&gt;Задает ширину ячейки. Суммарное значение ширины всех ячеек  может превышать общую ширину таблицы только в том случае, если содержимое  ячейки превышает указанную ширину.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:07:10',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '48',
        'language_id' => '2',
        'title' => 'Особенности таблиц',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;У каждого параметра таблицы  есть свое значение установленное по умолчанию. Это означает, что если какой-то  атрибут пропущен, то неявно он все равно присутствует, причем с некоторым  значением. Из-за чего вид таблицы может оказаться совсем другим, нежели  предполагал разработчик. Чтобы понимать, что можно ожидать от таблиц, следует  знать их явные и неявные особенности, которые перечислены далее.&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; Одну таблицу допускается  помещать внутрь ячейки другой таблицы. Это требуется для представления сложных  данных или в том случае, когда одна таблица выступает в роли модульной сетки, а  вторая, внутри нее, уже как обычная таблица.&lt;/li&gt;
    &lt;li&gt; Размеры  таблицы изначально не установлены и вычисляются на основе содержимого ячеек.  Например, общая ширина определяется автоматически исходя из суммарной ширины  содержимого ячеек плюс ширина границ между ячейками, поля вокруг содержимого,  устанавливаемые через атрибут &lt;span class=&quot;attribute&quot;&gt;cellpadding&lt;/span&gt; и расстояние между ячейками, которые определяются значением &lt;span class=&quot;attribute&quot;&gt;cellspacing&lt;/span&gt;. &lt;/li&gt;
    &lt;li&gt; Если  для таблицы задана ее ширина в процентах или пикселах, то содержимое таблицы  подстраивается под указанные размеры. Так, браузер автоматически добавляет  переносы строк в текст, чтобы он полностью поместился в ячейку, и при этом  ширина таблицы осталась без изменений. Бывает, что ширину содержимого ячейки  невозможно изменить, как это, например, происходит с рисунками. В этом случае  ширина таблицы увеличивается, несмотря на указанные размеры.&lt;/li&gt;
    &lt;li&gt; Пока таблица не загрузится  полностью, ее содержимое не начнет отображаться. Дело в том, что браузер,  прежде чем показать содержимое таблицы, должен вычислить необходимые размеры  ячеек, их ширину и высоту. А для этого необходимо знать, что в этих ячейках  находится. Поэтому браузер и ожидает, пока загрузится все, что находится в  ячейках, и только потом отображает таблицу.&lt;/li&gt;
  &lt;/ul&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:07:33',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '49',
        'language_id' => '2',
        'title' => 'Выравнивание таблиц',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Для задания выравнивания  таблицы по центру веб-страницы или по одному из ее краев предназначен атрибут &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;. Результат  будет заметен только в том случае, если ширина таблицы не занимает всю  доступную область, другими словами, меньше, чем 100%. На самом деле &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt; не только  устанавливает выравнивание, но и заставляет текст обтекать таблицу с других  сторон аналогично поведению тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt;.  В примере&amp;nbsp;12.2 показано выравнивание таблицы по правому краю и ее  обтекание текстом.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример  12.2. Выравнивание таблицы по правому краю &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Выравнивание таблицы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table width=&quot;200&quot; bgcolor=&quot;#c0c0c0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;5&quot; border=&quot;1&quot; align=&quot;right&quot;&amp;gt;
   &amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;Содержимое таблицы&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
  &amp;lt;/table&amp;gt;
  &amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diem nonummy nibh 
     euismod tincidunt ut lacreet dolore magna aliguam erat volutpat.&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Выравнивание таблицы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;200&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#c0c0c0&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;5&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;right&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Содержимое таблицы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diem nonummy nibh 
     euismod tincidunt ut lacreet dolore magna aliguam erat volutpat.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
  &lt;p&gt;В данном примере создается таблица с фоном серого цвета и  выравниванием по правому краю. Результат примера показан на рис.&amp;nbsp;12.4.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_4.png&quot; alt=&quot;Рис. 12.4&quot; width=&quot;453&quot; height=&quot;202&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.4. Таблица, выровненная по правому краю окна  браузера&lt;/p&gt;
  &lt;p&gt;По умолчанию таблица формируется в виде сетки, при этом в  каждой строке таблицы содержится одинаковое количество ячеек. Такой вариант  вполне подходит для формирования простых таблиц, но совершенно не годится для  тех случаев, когда предстоит сделать сложную таблицу. В подобных ситуациях  применяются два основных метода: объединение ячеек и вложенные таблицы.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:07:54',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '50',
        'language_id' => '2',
        'title' => 'Объединение ячеек',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Для объединения двух и более ячеек в одну используются  атрибуты &lt;span class=&quot;attribute&quot;&gt;colspan&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;rowspan&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;. Атрибут &lt;span class=&quot;attribute&quot;&gt;colspan&lt;/span&gt; устанавливает число ячеек объединяемых по горизонтали. Аналогично  работает и атрибут &lt;span class=&quot;attribute&quot;&gt;rowspan&lt;/span&gt;,  с тем лишь отличием, что объединяет ячейки по вертикали. Перед добавлением  атрибутов проверьте число ячеек в каждой строке, чтобы не возникло ошибок. Так, &lt;span class=&quot;attribute&quot;&gt;&amp;lt;td  colspan=&quot;3&quot;&amp;gt;&lt;/span&gt; заменяет три ячейки, поэтому в следующей строке должно быть три тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt; или конструкция вида &lt;span class=&quot;attribute&quot;&gt;&amp;lt;td colspan=&quot;2&quot;&amp;gt;...&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;...&amp;lt;/td&amp;gt;&lt;/span&gt;. Если число ячеек в каждой строке  не будет совпадать, появятся пустые фантомные ячейки. В примере&amp;nbsp;12.3  приведен хотя и валидный, но неверный код, в котором как раз проявляется подобная ошибка.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 12.3. Неверное объединение ячеек&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Неправильное использование colspan&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
   &amp;lt;table border=&quot;1&quot; cellpadding=&quot;5&quot; width=&quot;100%&quot;&amp;gt;
    &amp;lt;tr&amp;gt;
     &amp;lt;td colspan=&quot;2&quot;&amp;gt;Ячейка 1&amp;lt;/td&amp;gt;
     &amp;lt;td&amp;gt;Ячейка 2&amp;lt;/td&amp;gt;
    &amp;lt;/tr&amp;gt;
    &amp;lt;tr&amp;gt;
     &amp;lt;td&amp;gt;Ячейка 3&amp;lt;/td&amp;gt;
     &amp;lt;td&amp;gt;Ячейка 4&amp;lt;/td&amp;gt;
    &amp;lt;/tr&amp;gt;
   &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Неправильное использование colspan&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;5&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; colspan=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 1&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 2&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 3&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Ячейка 4&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;12.5.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_5.png&quot; alt=&quot;Рис. 12.5&quot; width=&quot;453&quot; height=&quot;201&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.5. Появление дополнительной ячейки в таблице&lt;/p&gt;
  &lt;p&gt;В первой строке примера задано три ячейки, две из них объединены с  помощью атрибута &lt;span class=&quot;attribute&quot;&gt;colspan&lt;/span&gt;,  а во второй строке добавлено только две ячейки. Из-за этого возникает дополнительная  ячейка, которая отображается в браузере. Ее хорошо видно на рис.&amp;nbsp;12.5. &lt;/p&gt;
  &lt;p&gt;Правильное использование атрибутов &lt;span class=&quot;attribute&quot;&gt;colspan&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;rowspan&lt;/span&gt; продемонстрировано в примере &amp;nbsp;12.4.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 12.4. Объединение ячеек по вертикали и горизонтали&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Объединение ячеек&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table border=&quot;1&quot; cellpadding=&quot;4&quot; cellspacing=&quot;0&quot;&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td rowspan=&quot;2&quot;&amp;gt;Браузер&amp;lt;/td&amp;gt;
    &amp;lt;th colspan=&quot;2&quot;&amp;gt;Internet  Explorer&amp;lt;/th&amp;gt;
    &amp;lt;th colspan=&quot;3&quot;&amp;gt;Opera&amp;lt;/th&amp;gt;
    &amp;lt;th colspan=&quot;2&quot;&amp;gt;Firefox&amp;lt;/th&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;th&amp;gt;6.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;7.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;7.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;8.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;9.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;1.0&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;2.0&amp;lt;/th&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr align=&quot;center&quot;&amp;gt;
    &amp;lt;td&amp;gt;Поддерживается&amp;lt;/td&amp;gt;
    &amp;lt;td&amp;gt;Нет&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Да&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Нет&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Да&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Да&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Да&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;Да&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
  &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Объединение ячеек&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;4&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; rowspan=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Браузер&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; colspan=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Internet  Explorer&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; colspan=&lt;span class=&quot;value&quot;&gt;&quot;3&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Opera&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; colspan=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Firefox&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;6.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;7.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;7.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;8.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;9.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;1.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;2.0&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; align=&lt;span class=&quot;value&quot;&gt;&quot;center&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Поддерживается&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Нет&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Да&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Нет&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Да&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Да&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Да&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Да&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;12.6.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_6.png&quot; alt=&quot;Рис. 12.6&quot; width=&quot;453&quot; height=&quot;202&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.6. Таблица с объединенными ячейками&lt;/p&gt;
  &lt;p&gt;В данной таблице установлено восемь колонок и три строки.  Часть ячеек с надписями
    «Internet Explorer»
    ,
  «Opera»
    и
  «Firefox»
    объединены где по  две, а где и по три ячейки. В ячейке с надписью
  «Браузер»
    применено объединение  по вертикали. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:08:12',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '51',
        'language_id' => '2',
        'title' => 'Вложенные таблицы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Объединение ячеек имеет некоторые недостатки, поэтому этот  метод создания таблиц нельзя использовать повсеместно. Для примера рассмотрим  пример 12.5, где задается высота ячейки с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt;.&lt;/p&gt;&lt;!--break--&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 12.5. Явно заданная высота ячейки&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
   &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
   &amp;lt;title&amp;gt;Объединение ячеек&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;4&quot; cellspacing=&quot;0&quot;&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td width=&quot;100&quot; valign=&quot;top&quot;&amp;gt;Duis te feugifacilisi. Duis autem dolor in hendrerit 
         in vulputate velit esse molestie consequat.&amp;lt;/td&amp;gt;
    &amp;lt;td rowspan=&quot;2&quot; valign=&quot;top&quot;&amp;gt;Lorem ipsum dolor sit amet, consectetuer 
         adipiscing  elit, sed diem nonummy nibh euismod tincidunt ut lacreet 
         dolore magna aliguam  erat volutpat. Ut wisis enim ad minim veniam, quis 
         nostrud exerci tution  ullamcorper suscipit lobortis nisl ut aliquip ex ea 
         commodo consequat. Duis te  feugifacilisi. Ut wisi enim ad minim veniam, quis 
         nostrud exerci taion  ullamcorper suscipit lobortis nisl ut aliquip ex 
         en commodo consequat.&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td height=&quot;40&quot;&amp;gt;Lorem ipsum&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
  &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Объединение ячеек&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;4&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; valign=&lt;span class=&quot;value&quot;&gt;&quot;top&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Duis te feugifacilisi. Duis autem dolor in hendrerit 
         in vulputate velit esse molestie consequat.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; rowspan=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; valign=&lt;span class=&quot;value&quot;&gt;&quot;top&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum dolor sit amet, consectetuer 
         adipiscing  elit, sed diem nonummy nibh euismod tincidunt ut lacreet 
         dolore magna aliguam  erat volutpat. Ut wisis enim ad minim veniam, quis 
         nostrud exerci tution  ullamcorper suscipit lobortis nisl ut aliquip ex ea 
         commodo consequat. Duis te  feugifacilisi. Ut wisi enim ad minim veniam, quis 
         nostrud exerci taion  ullamcorper suscipit lobortis nisl ut aliquip ex 
         en commodo consequat.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;40&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Результат данного примера показан на рис.&amp;nbsp;12.7.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_7.png&quot; alt=&quot;Рис. 12.7&quot; width=&quot;453&quot; height=&quot;305&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.7. Высота ячеек&lt;/p&gt;
  &lt;p&gt;Левая нижняя ячейка согласно коду HTML имеет  высоту 40 пикселов, но поскольку высота содержимого правой колонки больше, чем  содержимое левой колонки, то высота ячейки меняется. Получается, что атрибут &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt; в  данном случае игнорируется. Заметим, что данная особенность проявляется только  в браузере Opera, но и  другие браузеры могут отображать сложные таблицы с ошибками. Это часто выражается  в тех таблицах, где явно устанавливается высота ячеек и их объединение по  вертикали. Для упрощения верстки применяется прием с вложенными таблицами.&lt;/p&gt;
  &lt;p&gt;Суть идеи проста&amp;nbsp;— в ячейку вкладывается еще одна  таблица со своими параметрами. Поскольку эти таблицы в каком-то смысле независимы,  то можно создавать довольно причудливые конструкции. Чтобы вложенная таблица занимала всю ширину ячейки,  таблице надо задать ширину 100%. &lt;/p&gt;
  &lt;p&gt;В примере&amp;nbsp;12.6 показан пример использования вложенных  таблиц для создания двух колонок и навигации.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 12.6. Вложенные таблицы &lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Вложенные таблицы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table width=&quot;100%&quot; border=&quot;0&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot;&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td width=&quot;150&quot; valign=&quot;top&quot; bgcolor=&quot;#f0f0f0&quot;&amp;gt;
     &amp;lt;table width=&quot;100%&quot; cellpadding=&quot;2&quot; cellspacing=&quot;1&quot;&amp;gt;
      &amp;lt;tr&amp;gt;&amp;lt;td bgcolor=&quot;#ffffff&quot;&amp;gt;Lorem&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
      &amp;lt;tr&amp;gt;&amp;lt;td bgcolor=&quot;#ffffff&quot;&amp;gt;Ipsum&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
      &amp;lt;tr&amp;gt;&amp;lt;td bgcolor=&quot;#ffffff&quot;&amp;gt;Dolor&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
      &amp;lt;tr&amp;gt;&amp;lt;td bgcolor=&quot;#ffffff&quot;&amp;gt;Sit&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
      &amp;lt;tr&amp;gt;&amp;lt;td bgcolor=&quot;#ffffff&quot;&amp;gt;Amet&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
     &amp;lt;/table&amp;gt;
    &amp;lt;/td&amp;gt;
    &amp;lt;td valign=&quot;top&quot; bgcolor=&quot;#ffffee&quot;&amp;gt;Lorem ipsum dolor sit amet, consectetuer 
         adipiscing elit, sed diem nonummy nibh euismod tincidunt ut lacreet 
         dolore magna aliguam erat volutpat. Ut wisis enim ad minim veniam, quis 
         nostrud exerci tution ullamcorper suscipit lobortis nisl ut aliquip ex ea 
         commodo consequat.&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
  &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Вложенные таблицы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;5&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;150&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; valign=&lt;span class=&quot;value&quot;&gt;&quot;top&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#f0f0f0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;2&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
      &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
      &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Ipsum&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
      &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Dolor&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
      &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Sit&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
      &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffff&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Amet&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; valign=&lt;span class=&quot;value&quot;&gt;&quot;top&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bgcolor=&lt;span class=&quot;value&quot;&gt;&quot;#ffffee&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Lorem ipsum dolor sit amet, consectetuer 
         adipiscing elit, sed diem nonummy nibh euismod tincidunt ut lacreet 
         dolore magna aliguam erat volutpat. Ut wisis enim ad minim veniam, quis 
         nostrud exerci tution ullamcorper suscipit lobortis nisl ut aliquip ex ea 
         commodo consequat.&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt; Результат данного примера показан на рис.&amp;nbsp;12.8.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_8.png&quot; alt=&quot;Рис. 12.8&quot; width=&quot;453&quot; height=&quot;261&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.8. Вид вложенных таблиц &lt;/p&gt;
  &lt;p&gt;В данном макете с помощью таблицы создается две колонки, причем  левая колонка имеет фиксированную ширину 150 пикселов. Чтобы создать подобие  навигации, внутрь ячейки добавлена еще одна таблица с шириной 100%.&lt;/p&gt;
  &lt;p&gt;Как видно из рис.&amp;nbsp;12.8, если не задавать границы, то  определить наличие таблиц по виду веб-страницы довольно сложно. По этой причине  таблицы до сих пор активно применяются для верстки сложных макетов.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:08:42',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '52',
        'language_id' => '2',
        'title' => 'Заголовок таблицы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt; При большом количестве таблиц на странице каждой из них удобно задать заголовок, 
    содержащий название таблицы и ее описание. Для этой цели в HTML существует 
    специальный тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;caption&amp;gt;&lt;/span&gt;, который устанавливает текст 
    и его положение относительно таблицы. Проще всего размещать текст по центру 
    таблицы сверху или снизу от нее, в остальных случаях браузеры по разному интерпретируют 
    атрибуты тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;caption&amp;gt;&lt;/span&gt;, из-за чего результат получается 
    неодинаковый. По умолчанию заголовок помещается сверху таблицы по центру, его 
    ширина не превышает ширины таблицы и в случае длинного текста он автоматически 
    переносится на новую строку. Для изменения положения заголовка у тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;caption&amp;gt;&lt;/span&gt; существует атрибут &lt;span class=&quot;attribute&quot;&gt;align&lt;/span&gt;, который может принимать следующие значения.&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt; &lt;span class=&quot;value&quot;&gt;left&lt;/span&gt; — выравнивает заголовок по левому 
      краю таблицы. Браузер Firefox располагает текст сбоку от таблицы, Internet Explorer и Opera располагают заголовок сверху, выравнивая его по левому краю. &lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;right&lt;/span&gt; — в браузере Internet Explorer и Opera 
      располагает заголовок сверху таблицы и выравнивает его по правому краю таблицы. 
      Firefox отображает 
      заголовок справа от таблицы.&lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;center&lt;/span&gt; — заголовок располагается сверху таблицы 
      по ее центру. Такое расположение задано в браузерах по умолчанию.&lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;top&lt;/span&gt; — результат аналогичен действию атрибута &lt;span class=&quot;attribute&quot;&gt;center&lt;/span&gt;, но в отличие от него входит в спецификацию 
      HTML 4 и понимается всеми браузерами.&lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;bottom&lt;/span&gt; — заголовок размещается внизу таблицы 
      по ее центру.&lt;/li&gt;
  &lt;/ul&gt;
  &lt;p&gt; В примере&amp;nbsp;12.7 показано, как установить 
    заголовок сверху таблицы. Обратите внимание, 
    что тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;caption&amp;gt;&lt;/span&gt; находится внутри контейнера &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;, это его стандартное местоположение.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 12.7. Создание заголовка таблицы&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Заголовок таблицы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;4&quot; cellspacing=&quot;0&quot;&amp;gt;
   &amp;lt;caption&amp;gt;Изменение добычи ресурсов по годам&amp;lt;/caption&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;th&amp;gt;&amp;amp;nbsp;&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;2003&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;2004&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;2005&amp;lt;/th&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td&amp;gt;Нефть&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;43&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;51&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;79&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td&amp;gt;Золото&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;29&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;34&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;48&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
   &amp;lt;tr&amp;gt;
    &amp;lt;td&amp;gt;Дерево&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;38&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;57&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;36&amp;lt;/td&amp;gt;
   &amp;lt;/tr&amp;gt;
  &amp;lt;/table&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Заголовок таблицы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;1&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellpadding=&lt;span class=&quot;value&quot;&gt;&quot;4&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cellspacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;caption&lt;/span&gt;&amp;gt;&lt;/span&gt;Изменение добычи ресурсов по годам&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;caption&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&amp;amp;nbsp;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;2003&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;2004&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;2005&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;th&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Нефть&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;43&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;51&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;79&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Золото&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;29&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;34&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;48&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
    &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;Дерево&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;38&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;57&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;36&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;td&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;tr&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;table&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
  &lt;p&gt;Ниже показан результат данного примера (рис.&amp;nbsp;12.9). &lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_12_9.png&quot; alt=&quot;Рис. 12.9&quot; width=&quot;453&quot; height=&quot;246&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 12.9. Вид заголовка таблицы в браузере Safari&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:09:03',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '14',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '53',
        'language_id' => '2',
        'title' => 'Фреймы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Фреймы разделяют окно браузера на отдельные области, расположенные 
    рядом друг с другом. В каждую из таких областей загружается самостоятельная 
    веб-страница. Поскольку вокруг фреймов существует много разговоров 
    об их необходимости, далее приведем достоинства и недостатки фреймов, 
    чтобы можно было самостоятельно решить стоит ли их использовать 
    на своем сайте.&lt;/p&gt;
  &lt;h2&gt;Достоинства фреймов&lt;/h2&gt;
  &lt;h3&gt;Простота&lt;/h3&gt;
  &lt;p&gt; С помощью фреймов веб-страница разграничивается на две области, которые содержат 
    навигацию по сайту и его контент. Механизм фреймов позволяет открывать документ 
    в одном фрейме, по ссылке, нажатой в совершенно другом фрейме. Такое разделение 
    веб-страницы на составляющие интуитивно понятно и логически обусловлено.&lt;/p&gt;
  &lt;h3&gt;Быстрота&lt;/h3&gt;
  &lt;p&gt; Для верстки без фреймов характерно размещение на одной странице и навигации 
    и содержания. Это увеличивает объем каждой страницы и в сумме может существенно 
    повлиять на объем загружаемой с сайта информации. А так как фреймы используют 
    разделение информации на части, страницы с ними будут загружаться быстрее. &lt;/p&gt;
  &lt;h3&gt;Размещение&lt;/h3&gt;
  &lt;p&gt; Фреймы предоставляют уникальную возможность&amp;nbsp;— размещение информации 
    точно в нужном месте окна браузера. Так, можно поместить фрейм внизу браузера 
    и независимо от прокручивания содержимого, эта область не изменит своего положения.&lt;/p&gt;
  &lt;h3&gt;Изменение размеров областей&lt;/h3&gt;
  &lt;p&gt; Можно изменять размеры фреймов «на лету», чего не позволяет сделать 
    традиционная верстка HTML. &lt;/p&gt;
  &lt;h3&gt;Загрузка&lt;/h3&gt;
  &lt;p&gt; Загрузка веб-страницы происходит только в указанное окно, остальные остаются 
    неизменными. С помощью языка JavaScript можно осуществить одновременную загрузку 
    двух и более страниц во фреймы.&lt;/p&gt;
  &lt;h2&gt;Недостатки фреймов&lt;/h2&gt;
  &lt;h3&gt;Навигация&lt;/h3&gt;
  &lt;p&gt; Пользователь зачастую оказывается на сайте, совершенно не представляя, куда 
    он попал, потому что всего лишь нажал на ссылку, полученную в поисковой системе. 
    Чтобы посетителю сайта было проще разобраться, где он находится, на каждую страницу 
    помещают название сайта, заголовок страницы и навигацию. Фреймы, как правило, 
    нарушают данный принцип, отделяя заголовок сайта от содержания, а навигацию 
    от контента. Представьте, что вы нашли подходящую ссылку в поисковой системе, 
    нажимаете на нее, а в итоге открывается документ без названия и навигации. Чтобы 
    понять, где мы находимся или посмотреть другие материалы, придется редактировать 
    путь в адресной строке, что в любом случае доставляет неудобство. &lt;/p&gt;
  &lt;h3&gt;Плохая индексация поисковыми системами&lt;/h3&gt;
  &lt;p&gt; Поисковые системы плохо работают с фреймовой структурой, поскольку на страницах, 
    которые содержат контент, нет ссылок на другие документы. &lt;/p&gt;
  &lt;h3&gt;Внутренние страницы нельзя добавить в «Закладки» &lt;/h3&gt;
  &lt;p&gt; Фреймы скрывают адрес страницы, на которой находится посетитель, и всегда 
    показывают только адрес сайта. По этой причине понравившуюся страницу сложно 
    поместить в закладки браузера.&lt;/p&gt;
  &lt;h3&gt;Несовместимость с разными браузерами&lt;/h3&gt;
  &lt;p&gt; Параметры фреймов обладают свойством совершенно по разному отображаться в 
    различных браузерах. Причём противоречие между ними настолько явное, что одни 
    и те же параметры интерпретируются браузерами совершенно по-своему. &lt;/p&gt;
  &lt;h3&gt;Непрестижность&lt;/h3&gt;
  &lt;p&gt; Весьма странный недостаток, который не имеет никакого отношения к техническим 
    особенностям создания сайта, а носит скорее идеологический характер. Сайты с 
    фреймами считаются несолидными, а их авторы сразу выпадают из разряда профессионалов, 
    которые никогда не используют фреймы в своих работах. Исключение составляют 
    чаты, где без фреймов обойтись хотя можно, но достаточно хитрыми методами, а 
    с помощью фреймов создавать чаты достаточно просто.&lt;/p&gt;
&lt;p&gt;Надо отметить, что некоторые приведённые недостатки вполне обходятся. Так, с помощью скриптов можно сделать, что открытый в браузере отдельный документ формируется со всей фреймовой структурой. Поисковые системы также уже лучше индексируют фреймовые документы, чем это было несколько лет назад. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:09:37',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '54',
        'language_id' => '2',
        'title' => 'Создание фреймов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Несмотря на то, что сайты с фреймами встречаются все реже,  изучение HTML было бы  неполным без рассмотрения темы о фреймах. К тому же фреймы в каком-то смысле  заняли свою нишу и применяются для систем администрирования и справки. Там, где  недостатки фреймов не имеют особого значения, а преимущества наоборот, активно  востребованы.&lt;/p&gt;
  &lt;p&gt;Для создания фрейма используется тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;, 
    который заменяет тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt; в документе и 
    применяется для разделения экрана на области. Внутри данного тега 
    находятся теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt;, которые указывают 
    на HTML-документ, предназначенный для загрузки в область (рис.&amp;nbsp;13.1).&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_1.png&quot; alt=&quot;Рис. 13.1&quot; width=&quot;453&quot; height=&quot;246&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 13.1. Пример разделения окна браузера на два фрейма&lt;/p&gt;
  &lt;p&gt;При использовании фреймов необходимо как минимум три HTML-файла: первый определяет  фреймовую структуру и делит окно браузера на две части, а оставшиеся два  документа загружаются в заданные окна. Количество фреймов не обязательно равно  двум, может быть и больше, но никак не меньше двух, иначе вообще теряется смысл  применения фреймов. &lt;/p&gt;
  &lt;p&gt;Рассмотрим этапы создания фреймов на основе страницы,  продемонстрированной на рис.&amp;nbsp;13.1. Нам понадобится три файла: &lt;span class=&quot;value&quot;&gt;index.html&lt;/span&gt;&amp;nbsp;— определяет структуру документа,  &lt;span class=&quot;value&quot;&gt;menu.html&lt;/span&gt;&amp;nbsp;— загружается в левый фрейм и &lt;span class=&quot;value&quot;&gt;content.html&lt;/span&gt;&amp;nbsp;— загружается в правый фрейм. Из  них только &lt;span class=&quot;value&quot;&gt;index.html &lt;/span&gt;отличается  по структуре своего кода от других файлов (пример&amp;nbsp;13.1).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример&amp;nbsp;13.1. Файл index.html &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset cols=&quot;100,*&quot;&amp;gt;
  &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot;&amp;gt;
  &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В случае использования фреймов в первой строке кода  пишется следующий тип документа.&lt;/p&gt;
  &lt;pre style=&quot;display: none;&quot;&gt;&lt;code class=&quot;no-buttons&quot;&gt;&amp;lt;!DOCTYPE  HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;pre&gt;&lt;code class=&quot;no-buttons html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE  HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;
  &lt;p&gt;Данный &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; указывает браузеру, что он имеет дело с фреймами, эта строка кода является  обязательной. Контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt; содержит типовую информацию вроде кодировки страницы и  заголовка документа. Вот только учтите, что заголовок остается неизменным, пока  HTML-файлы открываются  внутри фреймов. &lt;/p&gt;
  &lt;p&gt;В данном примере окно браузера разбивается на две колонки с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;cols&lt;/span&gt;, левая колонка занимает 100 
    пикселов, а правая&amp;nbsp;— оставшееся пространство, заданное символом звездочки. 
    Ширину или высоту фреймов можно также задавать в процентном отношении, наподобие 
    таблиц. &lt;/p&gt;
  &lt;p&gt;В теге &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt; задается имя HTML-файла, 
    загружаемого в указанную область с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;src&lt;/span&gt;. 
    В левое окно будет загружен файл, названный &lt;span class=&quot;value&quot;&gt;menu.html&lt;/span&gt; (пример&amp;nbsp;13.2), 
    а в правое — &lt;span class=&quot;value&quot;&gt;content.html&lt;/span&gt; (пример&amp;nbsp;13.3). Каждому 
    фрейму желательно задать его уникальное имя, чтобы документы можно 
    было загружать в указанное окно с помощью атрибута &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt;. &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример&amp;nbsp;13.2. Файл menu.html&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Навигация по сайту&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body style=&quot;background: #f0f0f0&quot;&amp;gt;
   &amp;lt;p&amp;gt;МЕНЮ&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Навигация по сайту&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; style=&lt;span class=&quot;value&quot;&gt;&quot;background: #f0f0f0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;МЕНЮ&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;В данном примере серый фон на странице задается с помощью  стилей, о которых речь пойдет далее.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.3. Файл content.html &lt;/p&gt;
&lt;pre id=&quot;example_2_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Содержание сайта&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;СОДЕРЖАНИЕ&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Содержание сайта&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;СОДЕРЖАНИЕ&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
     
  &lt;p&gt;Рассмотрим более сложный пример уже с тремя фреймами (рис.&amp;nbsp;13.2).&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_2.png&quot; alt=&quot;Рис. 13.2&quot; width=&quot;453&quot; height=&quot;337&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 13.2. Разделение страницы на три фрейма &lt;/p&gt;
  &lt;p&gt;В данном случае опять используется тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;, но два раза, причем один  тег вкладывается в другой. Горизонтальное разбиение создается через атрибут &lt;span class=&quot;attribute&quot;&gt;rows&lt;/span&gt;, где для разнообразия применяется  процентная запись (пример&amp;nbsp;13.4). &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.4. Три фрейма &lt;/p&gt;
&lt;pre id=&quot;example_3_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset rows=&quot;25%,75%&quot;&amp;gt;
   &amp;lt;frame src=&quot;top.html&quot; name=&quot;TOP&quot; scrolling=&quot;no&quot; noresize&amp;gt;
   &amp;lt;frameset cols=&quot;100,*&quot;&amp;gt;
     &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot;&amp;gt;
     &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
   &amp;lt;/frameset&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; rows=&lt;span class=&quot;value&quot;&gt;&quot;25%,75%&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;top.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;TOP&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; scrolling=&lt;span class=&quot;value&quot;&gt;&quot;no&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; noresize&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Как видно из данного примера, контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt; с атрибутом &lt;span class=&quot;attribute&quot;&gt;rows&lt;/span&gt; вначале  создает два горизонтальных фрейма, но вместо второго фрейма подставляется еще  один &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;,  который повторяет уже известную вам структуру из примера&amp;nbsp;13.1. Чтобы не появилась вертикальная полоса прокрутки, и пользователь  не мог самостоятельно изменить размер верхнего фрейма, добавлены атрибуты &lt;span class=&quot;attribute&quot;&gt;scrolling=&quot;no&quot;&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;noresize&lt;/span&gt;. &lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:10:02',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '55',
        'language_id' => '2',
        'title' => 'Ссылки во фреймах',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;В обычном HTML-документе при переходе по ссылке, в окне браузера текущий документ заменяется новым. При использовании фреймов схема загрузки документов отличается от стандартной. Основное отличие&amp;nbsp;— возможность загружать       документ в выбранный фрейм из другого. Для этой цели используется атрибут &lt;span class=&quot;attribute&quot;&gt;target&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;. В качестве значения используется имя фрейма, в который будет загружаться документ, указанный атрибутом &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; (пример&amp;nbsp;13.5).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример&amp;nbsp;13.5. Ссылка на другой фрейм&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset cols=&quot;100,*&quot;&amp;gt;
  &amp;lt;frame src=&quot;menu2.html&quot; name=&quot;MENU&quot;&amp;gt;
  &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu2.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;

  &lt;p&gt;В приведенном примере фрейму присваивается имя &lt;span class=&quot;var&quot;&gt;CONTENT&lt;/span&gt;.     Чтобы документ загружался в указанный фрейм, используется конструкция &lt;span class=&quot;attribute&quot;&gt;target=&quot;CONTENT&quot;&lt;/span&gt;, как показано в примере&amp;nbsp;13.6. &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.6. Содержимое файла menu2.html&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Навигация по сайту&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body style=&quot;background: #f0f0f0&quot;&amp;gt;
  &amp;lt;p&amp;gt;МЕНЮ&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;text.html&quot; target=&quot;CONTENT&quot;&amp;gt;Текст&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Навигация по сайту&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; style=&lt;span class=&quot;value&quot;&gt;&quot;background: #f0f0f0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;МЕНЮ&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;text.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;Текст&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  &lt;p&gt;Имя фрейма должно начинаться на цифру или латинскую букву. В качестве     зарезервированных имен используются следующие:&lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;_blank&lt;/span&gt; — загружает документ в новое окно;&lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;_self&lt;/span&gt; — загружает документ в текущий фрейм;&lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;_parent&lt;/span&gt; — загружает документ во фрейм, занимаемый родителем, если фрейма-родителя нет значение действует также, как &lt;span class=&quot;value&quot;&gt;_top&lt;/span&gt;; &lt;/li&gt;
    &lt;li&gt;&lt;span class=&quot;value&quot;&gt;_top&lt;/span&gt; — отменяет все фреймы и загружает документ в полное окно браузера.&lt;/li&gt;
&lt;/ul&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:10:27',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '56',
        'language_id' => '2',
        'title' => 'Границы между фреймами',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Граница между фреймами отображается по умолчанию и, как правило, в виде трехмерной     линии. Чтобы ее скрыть используется атрибут &lt;span class=&quot;attribute&quot;&gt;frameborder&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt; со значением &lt;span class=&quot;value&quot;&gt;0&lt;/span&gt;.     Однако в браузере Opera граница хоть и становится в этом случае бледной, все     же остается. Для этого браузера требуется добавить  &lt;span class=&quot;attribute&quot;&gt;framespacing=&quot;0&quot;&lt;/span&gt;.     Таким образом, комбинируя разные атрибуты тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;,     получим универсальный код, который работает во всех браузерах. Линия при этом     показываться никак не будет (пример&amp;nbsp;13.6).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle&quot;&gt;Пример 13.6. Убираем границу между фреймами &lt;/p&gt;
&lt;p class=&quot;example-support&quot;&gt;&lt;span class=&quot;html no&quot;&gt;HTML 4.01&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;IE&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Cr&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Op&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Sa&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Fx&lt;/span&gt;&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
  &amp;lt;frameset cols=&quot;100,*&quot; frameborder=&quot;0&quot; framespacing=&quot;0&quot;&amp;gt;
   &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot;&amp;gt;
   &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
  &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; frameborder=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; framespacing=&lt;span class=&quot;value&quot;&gt;&quot;0&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
  
  &lt;p&gt;Учтите, что атрибуты &lt;span class=&quot;attribute&quot;&gt;frameborder&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;framespacing&lt;/span&gt; не являются валидными и не соответствуют спецификации HTML. &lt;/p&gt;
  &lt;p&gt;Если граница между фреймами все же нужна, в браузере она рисуется по умолчанию,     без задания каких-либо атрибутов. Можно, также, задать цвет рамки с помощью     атрибута &lt;span class=&quot;attribute&quot;&gt;bordercolor&lt;/span&gt;, который может применяться     в тегах &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt;.     Цвет указывается по его названию или шестнадцатеричному значению (пример&amp;nbsp;13.7), а толщина линии управляется атрибутом &lt;span class=&quot;attribute&quot;&gt;border&lt;/span&gt;.     Браузер Opera игнорирует этот атрибут и обычно отображает линию черного цвета.&lt;/p&gt;
  &lt;p class=&quot;exampleTitle&quot;&gt;Пример 13.7. Изменение цвета границы &lt;/p&gt;
&lt;p class=&quot;example-support&quot;&gt;&lt;span class=&quot;html no&quot;&gt;HTML 4.01&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;IE&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Cr&lt;/span&gt;&lt;span class=&quot;no&quot;&gt;Op&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Sa&lt;/span&gt;&lt;span class=&quot;yes&quot;&gt;Fx&lt;/span&gt;&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset cols=&quot;100,*&quot; bordercolor=&quot;#000080&quot; border=&quot;5&quot;&amp;gt;
   &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot;&amp;gt;
   &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; bordercolor=&lt;span class=&quot;value&quot;&gt;&quot;#000080&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; border=&lt;span class=&quot;value&quot;&gt;&quot;5&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
     
  &lt;p&gt;Атрибуты &lt;span class=&quot;attribute&quot;&gt;bordercolor&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;border&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt; также не являются валидными и не признаются спецификацией HTML. &lt;/p&gt;
  &lt;p&gt;В данном примере линия между фреймами задается синего цвета толщиной пять пикселов. Линии различается по своему виду в разных браузерах, несмотря на одинаковые параметры (рис. 13.3).&lt;/p&gt;
  &lt;table style=&quot;width: 400px; margin: auto&quot;&gt;
    &lt;tbody&gt;&lt;tr&gt;
      &lt;td align=&quot;center&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_3a.png&quot; alt=&quot;Internet Explorer&quot; style=&quot;border: 1px solid #333&quot; height=&quot;110&quot; width=&quot;110&quot;&gt;&lt;/td&gt;
      &lt;td align=&quot;center&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_3b.png&quot; alt=&quot;Opera&quot; style=&quot;border: 1px solid #333&quot; height=&quot;110&quot; width=&quot;110&quot;&gt;&lt;/td&gt;
      &lt;td align=&quot;center&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_3c.png&quot; alt=&quot;Firefox&quot; style=&quot;border: 1px solid #333&quot; height=&quot;110&quot; width=&quot;110&quot;&gt;&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td class=&quot;figsign&quot;&gt;Internet Explorer&lt;/td&gt;
      &lt;td class=&quot;figsign&quot;&gt;Opera&lt;/td&gt;
      &lt;td class=&quot;figsign&quot;&gt;Firefox&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 13.3. Вид границы между фреймами в разных браузерах&lt;/p&gt;
  &lt;p&gt;Браузер Opera никак не изменяет цвет границы между фреймами, Internet Explorer     устанавливает широкую границу практически сплошного цвета, а Firefox     границу отображает в виде набора линий.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:10:45',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '57',
        'language_id' => '2',
        'title' => 'Изменение размеров фреймов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;По умолчанию размеры фреймов можно изменять с помощью курсора мыши, наведя       его на границу между фреймами. Для блокировки возможности изменения пользователем       размера фреймов следует воспользоваться атрибутом &lt;span class=&quot;attribute&quot;&gt;noresize&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt; (пример&amp;nbsp;13.8).&lt;/p&gt;&lt;!--break--&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.8. Запрет на изменение размера фреймов &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset cols=&quot;100,*&quot;&amp;gt;
   &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot; noresize&amp;gt;
   &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; noresize&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;Атрибут &lt;span class=&quot;attribute&quot;&gt;noresize&lt;/span&gt; не требует никаких     значений и используется сам по себе. Для случая двух фреймов этот     атрибут можно указать лишь в одном месте. Естественно, если у одного     фрейма нельзя изменять размеры, то у близлежащего к нему размеры     тоже меняться не будут.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:11:04',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '58',
        'language_id' => '2',
        'title' => 'Полосы прокрутки фрейма',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Если содержимое фрейма не помещается в отведенное окно, автоматически появляются     полосы прокрутки для просмотра информации. В некоторых случаях полосы прокрутки     нарушают дизайн веб-страницы, поэтому от них можно отказаться. Для управления     отображением полос прокрутки используется атрибут &lt;span class=&quot;attribute&quot;&gt;scrolling&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;frame&amp;gt;&lt;/span&gt;.      Он может принимать два основных значения: &lt;span class=&quot;value&quot;&gt;yes&lt;/span&gt;&amp;nbsp;— всегда вызывает появление полос прокрутки, независимо от объема информации и &lt;span class=&quot;value&quot;&gt;no&lt;/span&gt;&amp;nbsp;— запрещает их появление (пример&amp;nbsp;13.9). &lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.9. Запрет на изменение размера фреймов &lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Фреймы&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;frameset cols=&quot;100,*&quot;&amp;gt;
   &amp;lt;frame src=&quot;menu.html&quot; name=&quot;MENU&quot; noresize scrolling=&quot;no&quot;&amp;gt;
   &amp;lt;frame src=&quot;content.html&quot; name=&quot;CONTENT&quot;&amp;gt;
 &amp;lt;/frameset&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Frameset//EN&quot; &quot;http://www.w3.org/TR/html4/frameset.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;Content-Type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Фреймы&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; cols=&lt;span class=&quot;value&quot;&gt;&quot;100,*&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;menu.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;MENU&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; noresize&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; scrolling=&lt;span class=&quot;value&quot;&gt;&quot;no&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
   &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;frame&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;content.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;CONTENT&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;frameset&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;При выключенных полосах прокрутки, если информация не помещается в окно фрейма,     просмотреть ее будет сложно. Поэтому &lt;span class=&quot;attribute&quot;&gt;scrolling=&quot;no&quot;&lt;/span&gt; следует использовать осторожно.&lt;/p&gt;
  &lt;p&gt;Если атрибут &lt;span class=&quot;attribute&quot;&gt;scrolling&lt;/span&gt; не указан, то полосы       прокрутки добавляются браузером только по необходимости, в том случае, когда       содержимое фрейма превышает его видимую часть.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:11:31',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '59',
        'language_id' => '2',
        'title' => 'Плавающие фреймы',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;  &lt;p&gt;Разговор о фреймах будет неполным без упоминания плавающих  фреймов. Так называется фрейм, который можно добавлять в любое место  веб-страницы. Еще одно его название&amp;nbsp;— встроенный фрейм, он называется так  из-за своей особенности встраиваться прямо в тело веб-страницы. На  рис.&amp;nbsp;13.4 приведен пример такого фрейма.&lt;/p&gt;
  &lt;p class=&quot;fig&quot;&gt;&lt;img src=&quot;http://htmlbook.ru/files/images/samhtml/fig_1_13_4.png&quot; width=&quot;453&quot; height=&quot;238&quot; alt=&quot;Рис. 13.4&quot;&gt;&lt;/p&gt;
  &lt;p class=&quot;figsign&quot;&gt;Рис. 13.4. Плавающий фрейм на веб-странице&lt;/p&gt;
  &lt;p&gt;Во фрейм можно загружать HTML-документ и прокручивать его содержимое независимо от  остального материала на веб-странице. Размеры фрейма устанавливаются  самостоятельно согласно дизайну сайта или собственных предпочтений. &lt;/p&gt;
  &lt;p&gt;Создание плавающего фрейма происходит с помощью тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;iframe&amp;gt;&lt;/span&gt;, он имеет  обязательный атрибут &lt;span class=&quot;attribute&quot;&gt;src&lt;/span&gt;,  указывающий на загружаемый во фрейм документ (пример&amp;nbsp;13.10).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.10. Использование тега &amp;lt;iframe&amp;gt;&lt;/p&gt;
&lt;pre id=&quot;example_0_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Плавающий фрейм&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;iframe src=&quot;hsb.html&quot; width=&quot;300&quot; height=&quot;120&quot;&amp;gt;&amp;lt;/iframe&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Плавающий фрейм&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;iframe&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;hsb.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;300&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;120&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;iframe&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;В данном примере ширина и высота фрейма устанавливается  через атрибуты &lt;span class=&quot;attribute&quot;&gt;width&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt;.  Сам загружаемый во фрейм файл называется hsb.html.  Заметьте, что если содержимое не помещается целиком в отведенную область,  появляются полосы прокрутки.&lt;/p&gt;
  &lt;p&gt;Еще одно удобство плавающих фреймов состоит в том, что в  него можно загружать документы по ссылке. Для этого требуется задать имя фрейма  через атрибут &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt;, а  в теге &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; указать это же имя в атрибуте &lt;span class=&quot;attribute&quot;&gt;target&lt;/span&gt; (пример&amp;nbsp;13.11).&lt;/p&gt;
  &lt;p class=&quot;exampleTitle2&quot;&gt;Пример 13.11. Загрузка документа во фрейм&lt;/p&gt;
&lt;pre id=&quot;example_1_c&quot; style=&quot;display: none;&quot;&gt;&lt;code&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;
&amp;lt;html&amp;gt;
 &amp;lt;head&amp;gt;
  &amp;lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=utf-8&quot;&amp;gt;
  &amp;lt;title&amp;gt;Плавающий фрейм&amp;lt;/title&amp;gt;
 &amp;lt;/head&amp;gt;
 &amp;lt;body&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;a href=&quot;rgb.html&quot; target=&quot;color&quot;&amp;gt;RGB&amp;lt;/a&amp;gt; | 
     &amp;lt;a href=&quot;cmyk.html&quot; target=&quot;color&quot;&amp;gt;CMYK&amp;lt;/a&amp;gt; | 
     &amp;lt;a href=&quot;hsb.html&quot; target=&quot;color&quot;&amp;gt;HSB&amp;lt;/a&amp;gt;&amp;lt;/p&amp;gt;
  &amp;lt;p&amp;gt;&amp;lt;iframe src=&quot;model.html&quot; name=&quot;color&quot; width=&quot;100%&quot; height=&quot;200&quot;&amp;gt;&amp;lt;/iframe&amp;gt;&amp;lt;/p&amp;gt;
 &amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;htmlbook-code&quot;&gt;&lt;pre&gt;&lt;code class=&quot; html&quot;&gt;&lt;span class=&quot;doctype&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;meta&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; http-equiv=&lt;span class=&quot;value&quot;&gt;&quot;content-type&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; content=&lt;span class=&quot;value&quot;&gt;&quot;text/html; charset=utf-8&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;Плавающий фрейм&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;title&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;head&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;rgb.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;color&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;RGB&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt; | 
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;cmyk.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;color&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;CMYK&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt; | 
     &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; href=&lt;span class=&quot;value&quot;&gt;&quot;hsb.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; target=&lt;span class=&quot;value&quot;&gt;&quot;color&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;HSB&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;a&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
  &lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;&lt;span class=&quot;keyword&quot;&gt;iframe&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; src=&lt;span class=&quot;value&quot;&gt;&quot;model.html&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; name=&lt;span class=&quot;value&quot;&gt;&quot;color&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; width=&lt;span class=&quot;value&quot;&gt;&quot;100%&quot;&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;attribute&quot;&gt; height=&lt;span class=&quot;value&quot;&gt;&quot;200&quot;&lt;/span&gt;&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;iframe&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;p&lt;/span&gt;&amp;gt;&lt;/span&gt;
 &lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;body&lt;/span&gt;&amp;gt;&lt;/span&gt;
&lt;span class=&quot;tag&quot;&gt;&amp;lt;/&lt;span class=&quot;keyword&quot;&gt;html&lt;/span&gt;&amp;gt;&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;&lt;div class=&quot;example-view&quot;&gt;&lt;img src=&quot;/themes/hb/img/win.gif&quot; title=&quot;Посмотреть в этом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;img src=&quot;/themes/hb/img/win2.gif&quot; title=&quot;Посмотреть в новом окне&quot; alt=&quot;Посмотреть пример&quot; class=&quot;example-win&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;/div&gt;
    
  &lt;p&gt;В данном примере добавлено несколько ссылок, они открываются  во фрейме с именем &lt;span class=&quot;var&quot;&gt;color&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;note&quot;&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;iframe&amp;gt;&lt;/span&gt;  проходит валидацию только при использовании переходного &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:11:56',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '15',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '60',
        'language_id' => '2',
        'title' => 'Валидация документов',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Валидацией будем называть проверку  документа на соответствие веб-стандартам и выявление существующих  ошибок. Соответственно, валидным является такой веб-документ, который  прошел подобную процедуру и не имеет замечаний по коду. Код  веб-страницы должен подчиняться определенным правилам, которые  называются спецификацией, ее разрабатывает W3 Консорциум (&lt;a href=&quot;http://www.w3c.org&quot;&gt;www.w3c.org&lt;/a&gt;) при поддержке разработчиков браузеров.&lt;/p&gt;
&lt;p&gt;  На  первый взгляд, кажется, что валидация необходима, ведь речь идет о  сокращении количества ляпов разработчиков и написании «правильного»  кода. На деле все обстоит гораздо сложнее и вокруг валидации до сих пор  ведутся горячие споры об ее актуальности. Чтобы объективно раскрыть  этот вопрос далее рассмотрим плюсы и минусы такой проверки.&lt;/p&gt;
&lt;h2&gt;Плюсы валидации  &lt;/h2&gt;
&lt;p&gt;  Хотя  HTML-код имеет достаточно простую иерархическую структуру, при  разрастании объема документа в коде легко запутаться, следовательно,  просто и совершить ошибку. Браузеры, несмотря на явно неверный код, в  любом случае постараются отобразить веб-страницу. Но поскольку не существует единого  регламента о том, как же должен быть показан «кривой»  документ, каждый браузер пытается сделать это по-своему. А это в свою  очередь приводит к тому, что один и тот же документ может выглядеть  по-разному в популярных браузерах. Исправление явных промахов и  систематизация кода приводит, как правило, к стабильному результату.&lt;/p&gt;
&lt;h3&gt;Тенденции  &lt;/h3&gt;
&lt;p&gt;  Времена,  когда производители браузеров добавляли уникальные возможности в свой  продукт вопреки всем стандартам, начинают уходить в прошлое. Каждая  новая версия браузера все больше поддерживает спецификации и отображает  документы с минимальными ошибками или вообще без них. Разработчики  сайтов, также придерживающихся канонов веб-стандартов, таким образом  соответствуют современным тенденциям развития веб-технологий.&lt;/p&gt;
&lt;p&gt;  Не  стоит забывать и об XML (eXtensible Markup Language, расширяемый язык  разметки). Этот язык становится стандартом де-факто для хранения данных  и обмена информацией между разными приложениями. Синтаксис XML более  жесткий, чем HTML и не прощает малейших ошибок. В каком-то смысле XML  похож на языки программирования, в которых программа не будет  скомпилирована, пока код не отлажен. HTML является первой ступенькой к  изучению XML, поэтому приучая себя писать код по всем правилам, будет  легче перейти к следующему этапу развития HTML.&lt;/p&gt;
&lt;h3&gt;Мода на валидацию  &lt;/h3&gt;
&lt;p&gt;  Как  это не удивительно, но среди веб-разработчиков тоже существует своя  мода. Текущая мода — создавать валидные документы и вывешивать  специальный значок в виде картинки, что сайт соответствует спецификации  HTML. Подобная тенденция затронула даже заказчиков сайтов и при  написании технического задания на разработку сайта некоторые из них  специально оговаривают, чтобы сайт был выполнен по веб-стандартам.&lt;/p&gt;
&lt;h3&gt; Косвенные преимущества&lt;/h3&gt;
&lt;p&gt;  Следование  стандартам во многом дает множество выгод, которые проявляются в  мелочах и становятся заметными при достижении определенной критической  массы. В частности, объем кода становится меньше, компактнее и  читабельнее. Соответственно, для пользователей повышается скорость  загрузки сайта в целом. &lt;/p&gt;
&lt;h2&gt;Минусы валидации  &lt;/h2&gt;
&lt;p&gt;  Сайты,  конечно же, делают для того, чтобы их посещали люди. Именно посетители  выступают мерилом работы сайта, а их интересует информация и способ ее  получения. Пользователь желает, чтобы сайт корректно отображался в его  любимом браузере, быстро загружался и содержал те материалы, которые  ему нужны. Заметьте, в этом списке нет ничего про код документа и его  валидность, посетителей это просто не интересует. Поэтому совершенно  невалидный сайт, но выполненный с душой, наполненный интересными  материалами привлечет к себе больше посетителей, чем пустой ресурс, но  сделанный по всем «правилам». &lt;/p&gt;
&lt;h3&gt;Браузеры&lt;/h3&gt;
&lt;p&gt;  Разработчики  браузеров не всегда следуют спецификации и в некоторых случаях трактуют  код не по заданным правилам, а по-своему. В конечном итоге это приводит  к тому, что веб-страница, которая правильно (т.е. так, как и задумывали  разработчики) отображается в одном браузере, выводится с ошибками в  другом. Следование спецификации в подобных случаях, скорее всего,  отпугнет пользователей некоторых браузеров. К примеру, Internet  Explorer (IE) в настоящее время занимает лидирующее положение среди  браузеров, но при этом поддерживает спецификацию HTML и CSS хуже, чем  Firefox и Opera. Очевидно, что пользователи IE при посещении сайта  выполненного по всем стандартам, но не учитывающего специфику этого  браузера, увидят неприглядную картину. &lt;/p&gt;
&lt;p&gt;  Заказчикам сайта, а также  их разработчикам подобная ситуация не по нраву, поэтому стоя перед  выбором: стандарты или браузер, они в большинстве своем выбирают  браузер. &lt;/p&gt;
&lt;p&gt;  Получается неутешительная картина&amp;nbsp;— тратить время на  отладку кода для соответствия спецификации нет особой нужды. Это время  лучше посвятить тому, чтобы документ без проблем работал в разных  браузерах&amp;nbsp;— так в основном размышляют веб-разработчики.&lt;/p&gt;
&lt;h2&gt;Резюме&lt;/h2&gt;
&lt;p&gt;Так  стоит ли проводить валидацию документов и заниматься этим этапом при  написании веб-страниц? Безусловно, да. Кому-то она поможет выявить существующие недочеты, другому поможет писать корректный код. Исправлять же ошибки, добиваясь полного соответствия стандартам, или оставить их ради совместимости с разными браузерами&amp;nbsp;— здесь уже каждый решает сам, какие цели он преследует и что для него важнее.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:12:23',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '16',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '61',
        'language_id' => '2',
        'title' => 'Проверка данных на валидность',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Для проверки веб-страниц на наличие ошибок и замечаний  существует множество путей и способов. Условно они делятся на онлайновые и  локальные. Онлайновые предназначены для проверки страниц с помощью браузера  через Интернет, а локальные используются для проверки документов на текущем  компьютере. Далее рассмотрим популярные методы валидации документов.&lt;/p&gt;
&lt;h2&gt;validator.w3.org&lt;/h2&gt;
&lt;p&gt;По адресу &lt;a href=&quot;http://validator.w3.org&quot;&gt;http://validator.w3.org&lt;/a&gt; располагается, пожалуй, самый распространенный инструмент для проверки отдельных  страниц на валидность. Этот сайт предлагает три способа проверки: по адресу,  локального файла и введенного в форму кода.&lt;/p&gt;
&lt;h3&gt;Проверка по адресу&lt;/h3&gt;
&lt;p&gt;Если ваш сайт уже опубликован в Интернете, то любую  страницу можно проверить, вводя в текстовое поле ее адрес (рис.&amp;nbsp;14.1).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;674&quot; height=&quot;555&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_01.png&quot; alt=&quot;Рис. 14.1&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.1. Форма для ввода  адреса документа&lt;/p&gt;
&lt;p&gt;  Так, вводя http://htmlbook.ru в форме «Validate  by URI» (валидация по адресу) и нажав кнопку &lt;span class=&quot;menuitem&quot;&gt;Check&lt;/span&gt; (проверить) получим сообщение о том, валидный документ или  нет.&lt;/p&gt;
&lt;p class=&quot;note&quot;&gt;  Хотя в текстовом поле вводится адрес сайта, проверяется не сайт  целиком, а только одна главная страница. Учтите, что, к примеру, адрес http://htmlbook.ru равнозначен вводу http://htmlbook.ru/index.php.&lt;/p&gt;
&lt;p&gt;  Валидатор проверяет HTML-код страницы и в случае отсутствия ошибок докладывает о  валидности документа (рис.&amp;nbsp;14.2).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;674&quot; height=&quot;533&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_02.png&quot; alt=&quot;Рис. 14.2&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.2. Отчет о проверке и  валидности веб-страницы&lt;/p&gt;
&lt;p&gt;  При обнаружении ошибок выводится уведомление о том, что  страница не валидна и список ошибок с указанием строк, где встречаются ошибки (рис.&amp;nbsp;14.3).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;674&quot; height=&quot;520&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_03.png&quot; alt=&quot;Рис. 14.3&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.3. Отчет о проверке и  вывод ошибок&lt;/p&gt;
&lt;h3&gt;Проверка локальных файлов&lt;/h3&gt;
&lt;p&gt;Документы, еще не выставленные в Интернете, можно  проверить с помощью формы, озаглавленной «Validate by File Upload» (валидация  загруженных файлов), как показано на рис.&amp;nbsp;14.4.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;576&quot; height=&quot;309&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_04.png&quot; alt=&quot;Рис. 14.4&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.4. Форма ввода пути к  локальному файлу для его проверки&lt;/p&gt;
&lt;p&gt;  Вначале следует указать путь к HTML-файлу, после чего нажать кнопку &lt;span class=&quot;menuitem&quot;&gt;Check&lt;/span&gt;. Файл будет загружен на сервер и проверен на ошибки.&lt;/p&gt;
&lt;h3&gt;Использование формы для ввода кода&lt;/h3&gt;
&lt;p&gt;В некоторых случаях требуется проверить код без сохранения  его в отдельный файл. В этом случае пригодится форма для прямого набора текста  и отправки его на сервер для валидации (рис.&amp;nbsp;14.5). &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;616&quot; height=&quot;372&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_05.png&quot; alt=&quot;Рис. 14.5&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.5. Форма для ввода HTML-кода&lt;/p&gt;
&lt;h2&gt;Расширение HTML Validator для браузера Firefox&lt;/h2&gt;
&lt;p&gt;Популярность браузера Firefox обусловлена наличием для него большого количества  разнообразных расширений&amp;nbsp;— программ, которые добавляют новые возможности в  браузер. Расширения построены по открытой технологии и написать их может любой  разработчик. Не оставлены без внимания и веб-разрабочики&amp;nbsp;— для их удобства создано множество  расширений, в том числе и для валидации документа прямо в браузере. В данном  случае нас интересует HTML Validator.  Эта программа построена по той же технологии, что и валидатор W3C, но не требует подключения к Интернету и работает прямо «на лету».&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Где скачать&lt;/strong&gt;&lt;br&gt;
  &lt;a href=&quot;http://users.skynet.be/mgueury/mozilla/&quot;&gt;http://users.skynet.be/mgueury/mozilla/&lt;/a&gt;&lt;/p&gt;
&lt;h3&gt;Установка расширения&lt;/h3&gt;
&lt;p&gt;После скачивания файла установить расширение можно  несколькими способами. &lt;/p&gt;
&lt;p&gt;&lt;strong&gt;1. Через менеджер  расширений&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;  Запустите Firefox  и откройте меню &lt;span class=&quot;menuitem&quot;&gt;Инструменты&amp;nbsp;&amp;gt;  Расширения&lt;/span&gt;. Перетащите мышью загруженный файл (он имеет расширение xpi) в открывшееся окно.  Далее расширение будет установлено автоматически.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;2. С помощью  открытия файла&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;  Выберите в меню Firefox пункт &lt;span class=&quot;menuitem&quot;&gt;Файл&amp;nbsp;&amp;gt;  Открыть файл...&lt;/span&gt; и укажите путь к файлу с расширением, дальнейшие действия  браузер выполнит сам.&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;3. Копирование  файла в папку &lt;/strong&gt;&lt;strong&gt;extension&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;  Откройте папку на диске, где установлен Firefox (к примеру c:\\Program Files\\Mozilla Firefox) и найдите в ней подпапку extension, в которую  скопируйте расширение. После запуска браузера дальнейшая установка пройдет  самостоятельно.&lt;/p&gt;
&lt;p&gt;  Все приведенные методы установки требуют перезагрузки браузера  после установки расширения. Работа HTML Validator начинается сразу же после  повторного запуска Firefox.&lt;/p&gt;
&lt;p&gt;  Если указанные способы по каким-либо причинам не  помогли, вы можете обратиться на сайт поддержки браузера Mozilla Firefox и  прочитать обо всех возможных методах установки расширений по адресу&lt;br&gt;
  &lt;a href=&quot;http://forum.mozilla-russia.org/doku.php?id=general:extensions_installing&quot;&gt;http://forum.mozilla-russia.org/doku.php?id=general:extensions_installing&lt;/a&gt;&lt;/p&gt;
&lt;h3&gt;Использование HTML Validator&lt;/h3&gt;
&lt;p&gt;При открытии веб-страницы HTML Validator начинает  сразу же свою работу, и результат проверки отображается в строке состояния, в  ее правом нижнем углу в виде небольшой картинки. Изображение зависит от статуса  проверки и показано на рис.&amp;nbsp;14.6.&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;206&quot; height=&quot;128&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_06a.png&quot; alt=&quot;Рис. 14.6а&quot;&gt;&lt;img width=&quot;205&quot; height=&quot;127&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_06b.png&quot; alt=&quot;Рис. 14.6б&quot;&gt;&lt;img width=&quot;279&quot; height=&quot;153&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_06c.png&quot; alt=&quot;Рис. 14.6с&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.6. Виды картинок,  отображаемых при проверке документа&lt;/p&gt;
&lt;p&gt;  Кружок с галочкой (рис.&amp;nbsp;14.6а) показывает, что  документ валидный, желтый треугольник с восклицательным знаком  (рис.&amp;nbsp;14.6б)&amp;nbsp;— по коду имеются замечания, которые могут быть  исправлены автоматически. А красный кружок с крестиком (рис.&amp;nbsp;14.6в)  предупреждает, что есть серьезные ошибки.&lt;/p&gt;
&lt;p&gt;  Просмотреть все ошибки можно двояко. Во-первых, заглянуть  в HTML-код документа  через меню &lt;span class=&quot;menuitem&quot;&gt;Вид&amp;nbsp;&amp;gt; Исходный код  страницы&lt;/span&gt; или щелкнуть правой кнопкой и в контекстном меню выбрать &lt;span class=&quot;menuitem&quot;&gt;Просмотр исходного кода страницы&lt;/span&gt; (рис.&amp;nbsp;14.7).&lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;237&quot; height=&quot;249&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_07.png&quot; alt=&quot;Рис. 14.7&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.7. Контекстное меню с  пунктом выбора исходного кода&lt;/p&gt;
&lt;p&gt;  Окно исходного кода веб-страницы разделено на три части  (рис.&amp;nbsp;14.8), где верхний блок содержит собственно HTML-код. В левом нижнем блоке  отображается список ошибок и замечаний или информационные сообщения в случае  валидного документа. Правый нижний блок предназначен для подробных подсказок о  текущих замечаниях. &lt;/p&gt;
&lt;p class=&quot;fig&quot;&gt;&lt;img width=&quot;801&quot; height=&quot;564&quot; src=&quot;http://htmlbook.ru/files/images/samhtml/fig_2_02_08.png&quot; alt=&quot;Рис. 14.8&quot;&gt;&lt;/p&gt;
&lt;p class=&quot;figsign&quot;&gt;Рис. 14.8. Результат работы  расширения HTML Validator&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:12:45',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '16',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '62',
        'language_id' => '2',
        'title' => 'Написание корректного кода',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Валидация документов предназначена не только для того  чтобы удостовериться, что код соответствует спецификации HTML, но и с целью устранения имеющихся  ошибок и замечаний в документе. Между тем, формирование определенной культуры  написания кода позволяет существенно снизить или даже вообще избавиться от  возможных ошибок. Такая культура складывается из знания спецификаций и типовых  ляпов разработчиков, которых надо избегать. &lt;/p&gt;
&lt;p&gt;  По адресу &lt;a href=&quot;http://www.w3.org/TR/html401/&quot;&gt;http://www.w3.org/TR/html401/&lt;/a&gt; ознакомиться с правилами HTML версии 4.01 может каждый, здесь же мы рассмотрим рядовые  ошибки и научимся, как же их обходить.&lt;/p&gt;
&lt;p&gt;  Ошибки в коде обычно возникают по следующим причинам: &lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt;на странице не задан &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;;&lt;/li&gt;
  &lt;li&gt;опечатка (неверно написан тег или его атрибут);&lt;/li&gt;
  &lt;li&gt;не указан обязательный атрибут тега;&lt;/li&gt;
  &lt;li&gt;используется тег или его атрибут, который не  входит в спецификацию;&lt;/li&gt;
  &lt;li&gt;неверное вложение тегов.&lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt;Далее разберем эти ошибки подробнее.&lt;/p&gt;
&lt;h3&gt;Не указан &amp;lt;!&lt;strong&gt;DOCTYPE&lt;/strong&gt;&amp;gt;&lt;/h3&gt;
&lt;p&gt;    Элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; располагается в первой строке кода документа и сообщает  браузеру, как интерпретировать код и отображать данную веб-страницу. Разница  между страницей с &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;  и без него может быть очень существенной, к тому же валидатор в первую очередь  проверяет наличие этого элемента в коде. &lt;/p&gt;
&lt;h3&gt;Опечатки&lt;/h3&gt;
&lt;p&gt;    Очевидно, что самая простая для исправления ошибка  возникает из-за опечатки, когда допущено неверное написание требуемого тега.  После валидации выдается тип ошибки и номер строки в коде, где она имеется, так  что остается только поменять значение на корректное.&lt;/p&gt;
&lt;h3&gt;Не указан  обязательный атрибут тега&lt;/h3&gt;
&lt;p&gt;  У некоторых тегов имеются атрибуты, которые обязательно  должны присутствовать. Например, нельзя просто указать тег &lt;span class=&quot;attribute&quot;&gt;&amp;lt;style&amp;gt;&lt;/span&gt;, необходимо писать &lt;span class=&quot;attribute&quot;&gt;&amp;lt;style  type=&quot;text/css&quot;&amp;gt;&lt;/span&gt;. &lt;/p&gt;
&lt;h3&gt;Атрибут или значение  не входит в спецификацию&lt;/h3&gt;
&lt;p&gt;  В порыве завоевать рынок пользователей разработчики  браузеров добавляли в них специальные теги, не входящие в спецификацию HTML, но расширяющие  возможности веб-страниц. Со временем часть таких тегов была включена в  спецификацию, но многие так и остались «за бортом». При этом поддержка браузером  осталась, так что результат работы тега наблюдать можно, но валидацию документ  не пройдет. Типичным примером подобного тега является &lt;span class=&quot;tag&quot;&gt;&amp;lt;marquee&amp;gt;&lt;/span&gt; придуманный компанией Microsoft и понимаемый всеми  современными браузерами. Вот только в спецификацию этот тег не включен.&lt;/p&gt;
&lt;h3&gt;Неверное вложение  тегов&lt;/h3&gt;
&lt;p&gt;    Ошибка с вложением одного контейнера внутрь другого может  быть вызвана следующими причинами:&lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt;  блочный элемент располагается внутри строчного, когда должно  быть наоборот&amp;nbsp;— строчные элементы допустимо помещать внутрь блочных;&lt;/li&gt;
  &lt;li&gt; пересечение тегов, например, как это показано в  следующем примере: &lt;span class=&quot;attribute&quot;&gt;&amp;lt;strong&amp;gt;&amp;lt;em&amp;gt;текст&amp;lt;/strong&amp;gt;&amp;lt;/em&amp;gt;&lt;/span&gt;. Здесь закрывающий тег  &lt;span class=&quot;tag&quot;&gt;&amp;lt;/strong&amp;gt;&lt;/span&gt;  помещается в контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;em&amp;gt;&lt;/span&gt;,  тогда как он должен следовать только после тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;/em&amp;gt;&lt;/span&gt;;&lt;/li&gt;
  &lt;li&gt; не соблюдается порядок вложения тегов. В определенных  элементах вроде списка и таблицы принципиальное значение имеет порядок  следования тегов. Перестановка тегов местами может привести к неверному  отображению объекта и появлению ошибок при валидации документа.&lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt;Напоследок отметим еще раз простые правила написания кода,  соблюдение которых поможет существенно сократить количество ошибок или обойтись  без них.&lt;/p&gt;
&lt;h3&gt;Закрывайте все теги&lt;/h3&gt;
&lt;p&gt;    Хотя HTML и не требует присутствия некоторых закрывающих тегов, их  наличие поможет сохранить строгость кода и четко определить порядок следования  тегов.&lt;/p&gt;
&lt;h3&gt;Указывайте значения  атрибутов тегов в кавычках&lt;/h3&gt;
&lt;p&gt;    Валидатор во многих случаях пропустит значения атрибутов указанных без всяких кавычек, тем не менее, кавычки лучше писать всегда.  Во-первых, подобный навык поможет для устранения возможных ошибок связанных с  атрибутами тегов. А во-вторых, поможет легче перейти на XHTML (Extensible Hypertext Markup  Language, расширяемый язык разметки гипертекста), синтаксически более строгую  версию HTML. В XHTML кавычки выступают  обязательным элементом синтаксиса.&lt;/p&gt;
&lt;h3&gt;Коллекционируйте  заготовки&lt;/h3&gt;
&lt;p&gt;    Большинство элементов веб-страницы достаточно шаблонно,  поэтому имея в своем запасе набор проверенных заготовок на разные случаи, можно  сократить затраты времени и быть уверенным, что код корректный.&lt;/p&gt;
&lt;h3&gt;Используйте блочные  элементы&lt;/h3&gt;
&lt;p&gt;  Нельзя так просто вставить текст в код документа, он  должен располагаться внутри абзаца (тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;p&amp;gt;&lt;/span&gt;) или другого блочного элемента. В тех случаях, когда вы не  знаете, какой блочный тег использовать, добавляйте универсальный элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;div&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;h3&gt;Переключайте &amp;lt;!DOCTYPE&amp;gt;&lt;/h3&gt;
&lt;p&gt;  В HTML-коде  обычно применяется строгий &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;,  который наиболее полно соответствует спецификации. Однако он же и требует  соблюдения всех, самых жестких правил написания кода. В тех случаях, когда это  сложно или затратно по времени, переключайтесь на переходный &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:13:08',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '16',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
    [
        'article_id' => '63',
        'language_id' => '2',
        'title' => 'Исправление ошибок',
        'description' => '&lt;div class=&quot;field-item even&quot;&gt;&lt;p&gt;Большинство ошибок, возникающих при валидации кода можно  свести к набору типовых вариантов, зная которые легко понять, на что «намекает»  валидатор. В качестве образца возьмем расширение HTML Validator для  браузера Firefox,  предназначенное для проверки кода и рассмотрим список ошибок и замечаний по  коду. &lt;/p&gt;
&lt;p&gt;  Посмотреть все возможные сообщения валидатора можно по  адресу &lt;a href=&quot;http://www.htmlpedia.org/wiki/HTML_Tidy&quot;&gt;http://www.htmlpedia.org/wiki/HTML_Tidy&lt;/a&gt;, далее приведены основные ошибки с их описанием и  решением. Зеленым цветом выделен корректный вариант, другой цвет используется для обозначения ошибки.&lt;/p&gt;
&lt;h2&gt;Notice: entity &quot;...&quot; doesn&#039;t end in  &quot;;&quot;&lt;/h2&gt;
&lt;p&gt;Это замечание возникает при использовании спецсимволов  вроде &lt;span class=&quot;attribute&quot;&gt;&amp;amp;lt;&lt;/span&gt; при  отсутствии на конце точки с запятой. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;amp;nbsp;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;amp;nbsp&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте в конце спецсимвола точку с запятой.&lt;/p&gt;
&lt;h2&gt;Notice: numeric character reference &quot;...&quot;  doesn&#039;t end in &#039;;&#039;&lt;/h2&gt;
&lt;p&gt;Возникает при использовании числовых спецсимволов вроде &lt;span class=&quot;attribute&quot;&gt;&amp;amp;#8212;&lt;/span&gt;  когда в конце забыли добавить точку с запятой.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;amp;#8482;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;amp;#8482&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте в конце спецсимвола точку с запятой.&lt;/p&gt;
&lt;h2&gt;unescaped &amp;amp; or unknown entity &quot;&amp;amp;...&quot;&lt;/h2&gt;
&lt;p&gt;Символ амперсанда (&lt;span class=&quot;attribute&quot;&gt;&amp;amp;&lt;/span&gt;) часто применяется в адресах  ссылок (атрибут&lt;span class=&quot;attribute&quot;&gt; href&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt;),  поскольку он разделяет несколько параметров. Однако амперсанд зарезервирован  для спецсимволов вроде &lt;span class=&quot;attribute&quot;&gt;&amp;amp;nbsp;&lt;/span&gt;  поэтому в ссылках необходимо указывать &lt;span class=&quot;attribute&quot;&gt;&amp;amp;amp;&lt;/span&gt; вместо &lt;span class=&quot;attribute&quot;&gt;&amp;amp;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;a href=&quot;http://www.htmlbook.ru/content/?id=30&amp;amp;amp;text=1&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;a href=&quot;http://www.htmlbook.ru/content/?id=30&amp;amp;text=1&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Замените &lt;span class=&quot;attribute&quot;&gt;&amp;amp;&lt;/span&gt; на &lt;span class=&quot;attribute&quot;&gt;&amp;amp;amp;&lt;/span&gt;.&lt;/p&gt;
&lt;h2&gt;missing  &amp;lt;/...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Отсутствует обязательный закрывающий тег. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте закрывающий тег. &lt;/p&gt;
&lt;h2&gt;missing &amp;lt;/aaa&amp;gt; before &amp;lt;bbb&amp;gt;&lt;/h2&gt;
&lt;p&gt;Ошибка возникает при нарушении порядка тегов, когда  блочный тег располагается внутри встроенного. В данном случае блочный тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;bbb&amp;gt;&lt;/span&gt; находится внутри  встроенного тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;aaa&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;span&amp;gt;Текст&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;span&amp;gt;&amp;lt;p&amp;gt;Текст&amp;lt;/p&amp;gt;&amp;lt;/span&amp;gt; &lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Поменяйте расположение тегов&amp;nbsp;— перенесите встроенный  тег внутрь блочного.&lt;/p&gt;
&lt;h2&gt;discarding unexpected &amp;lt;...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Обнаружен открывающий или закрывающий тег, у которого нет  пары. Подобная ошибка возникает в двух случаях: есть открывающий тег, но нет  закрывающего; имеется закрывающий тег, которому не соответствует открывающий.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;div&amp;gt;&amp;lt;div&amp;gt;Текст&amp;lt;/div&amp;gt;&amp;lt;/div&amp;gt; &lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;div&amp;gt;Текст&amp;lt;/div&amp;gt;&amp;lt;/div&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;div&amp;gt;&amp;lt;div&amp;gt;Текст&amp;lt;/div&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  В зависимости от ситуации добавьте или удалите открывающий  или закрывающий тег.&lt;/p&gt;
&lt;h2&gt;Notice: nested emphasis ...&lt;/h2&gt;
&lt;p&gt;Контейнер содержит аналогичный тег физического форматирования,  который не должен повторяться. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;b&amp;gt;Текст&amp;lt;/b&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;b&amp;gt;&amp;lt;b&amp;gt;Текст&amp;lt;/b&amp;gt;&amp;lt;/b&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Удалите один из тегов.&lt;/p&gt;
&lt;h2&gt;replacing unexpected ... by &amp;lt;/...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Закрывающий тег не соответствует открывающему тегу.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;b&amp;gt;Текст&amp;lt;/b&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;b&amp;gt;Текст&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Замените открывающий или закрывающий тег на парный.&lt;/p&gt;
&lt;h2&gt;... isn&#039;t allowed in &amp;lt;...&amp;gt; elements &lt;/h2&gt;
&lt;p&gt;Обнаружены теги, которые запрещено размещать внутри  указанных элементов.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;body&amp;gt;Текст&amp;lt;/body&amp;gt;&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Переместите HTML-элемент в правильный раздел.&lt;/p&gt;
&lt;h2&gt;missing  &amp;lt;...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Нет обязательного тега в структуре элементов. Ошибка, к  примеру, может возникнуть при формировании таблицы, когда пропущен тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;tr&amp;gt;&lt;/span&gt; и сразу же после &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt; следует &lt;span class=&quot;tag&quot;&gt;&amp;lt;td&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;ol&amp;gt;&amp;lt;li&amp;gt;Список&amp;lt;/li&amp;gt;&amp;lt;/ol&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;ol&amp;gt;Список&amp;lt;/ol&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Проверить правильность вложения тегов в текущем элементе и  наличие обязательных элементов.&lt;/p&gt;
&lt;h2&gt;Notice: inserting implicit &amp;lt;...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Сообщение возникает из-за предыдущей ошибки на странице.&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Исправьте предыдущие ошибки.&lt;/p&gt;
&lt;h2&gt;Insert missing &amp;lt;title&amp;gt; element&lt;/h2&gt;
&lt;p&gt;В коде не вставлен тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;head&amp;gt;&amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;strong&gt; &lt;/strong&gt;&lt;/h3&gt;
&lt;p&gt;  Добавьте контейнер &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;h2&gt;Multiple &amp;lt;frameset&amp;gt; elements&lt;/h2&gt;
&lt;p&gt;Тег &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;  используется в документе более одного раза без вложения. Допускается вставлять несколько  элементов &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;, но вложенных один в другой.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;frameset ...&amp;gt;&amp;lt;frame ...&amp;gt;&lt;br&gt;
  &amp;lt;frameset ...&amp;gt;&amp;lt;frame  ...&amp;gt;&amp;lt;/frameset&amp;gt;&lt;br&gt;
  &amp;lt;/frameset&amp;gt; &lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;frameset ...&amp;gt;&amp;lt;frame ...&amp;gt;&amp;lt;/frameset&amp;gt;&lt;br&gt;
  &amp;lt;frameset  ...&amp;gt;&amp;lt;frame ...&amp;gt;&amp;lt;/frameset&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Используйте вложенные теги &lt;span class=&quot;tag&quot;&gt;&amp;lt;frameset&amp;gt;&lt;/span&gt;. &lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; is not approved by W3C &lt;/h2&gt;
&lt;p&gt;Указанный тег не входит в спецификацию HTML.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;span style=&quot;white-space: nowrap;&quot;&amp;gt;текст без переносов&amp;lt;/span&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;nobr&amp;gt;текст без переносов&amp;lt;/nobr&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Удалите тег или замените его подходящим эквивалентом.&lt;/p&gt;
&lt;h2&gt;Error: &amp;lt;...&amp;gt; is not recognized!&lt;/h2&gt;
&lt;p&gt;Тег не распознан и не входит в спецификацию HTML. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;  Правильно: &amp;lt;p&amp;gt;Текст&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;  Неверно: &amp;lt;p&amp;gt;&amp;lt;adres&amp;gt;Текст&amp;lt;/adres&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Удалите неизвестный тег.&lt;/p&gt;
&lt;h2&gt;Trimming Empty Tag &lt;/h2&gt;
&lt;p&gt;Контейнер пустой или содержит только пробел. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;Текст&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;amp;nbsp;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;  Удалите тег или добавьте внутрь контейнера текст.&lt;/p&gt;
&lt;h2&gt;&amp;lt;a&amp;gt; is probably intended as &amp;lt;/a&amp;gt;&lt;/h2&gt;
&lt;p&gt;В закрывающем теге &lt;span class=&quot;tag&quot;&gt;&amp;lt;a&amp;gt;&lt;/span&gt; отсутствует слэш. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;a href=&quot;http://htmlbook.ru&quot;&amp;gt;Ссылка на сайт&amp;lt;/a&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;a href=&quot;http://htmlbook.ru&quot;&amp;gt;Ссылка на сайт&amp;lt;a&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Добавьте слэш к закрывающему тегу.&lt;/p&gt;
&lt;h2&gt;... shouldn&#039;t be nested &lt;/h2&gt;
&lt;p&gt;Некоторые теги вроде &lt;span class=&quot;tag&quot;&gt;&amp;lt;form&amp;gt;&lt;/span&gt; не могут содержать сами себя.  Это сообщение также возникает из-за предыдущей ошибки.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;form action=&quot;gb.php&quot; name=&quot;guestbook&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;br&gt;
  &amp;lt;form  action=&quot;gb2.php&quot; name=&quot;guestbook2&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;form  action=&quot;gb.php&quot; name=&quot;guestbook&quot;&amp;gt;&lt;br&gt;
  &amp;lt;form  action=&quot;gb2.php&quot; name=&quot;guestbook2&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;br&gt;
  &amp;lt;/form&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Удалите вложенные теги или исправьте предыдущую ошибку.&lt;/p&gt;
&lt;h2&gt;Text found after closing &amp;lt;/body&amp;gt;-tag&lt;/h2&gt;
&lt;p&gt;Теги или текст добавляется после закрывающего тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;/body&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;html&amp;gt;&lt;br&gt;
  &amp;nbsp;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&amp;lt;/head&amp;gt;&lt;br&gt;
  &amp;nbsp;&amp;lt;body&amp;gt;&amp;lt;p&amp;gt;Основной  текст&amp;lt;/p&amp;gt;&amp;lt;/body&amp;gt;&lt;br&gt;
  &amp;lt;/html&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;html&amp;gt;&lt;br&gt;
  &amp;nbsp;&amp;lt;head&amp;gt;&amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&amp;lt;/head&amp;gt;&lt;br&gt;
  &amp;nbsp;&amp;lt;body&amp;gt;&amp;lt;p&amp;gt;Основной текст&amp;lt;/p&amp;gt;&amp;lt;/body&amp;gt;&lt;br&gt;
  &amp;nbsp;&amp;lt;b&amp;gt;Привет!&amp;lt;/b&amp;gt;&lt;br&gt;
  &amp;lt;/html&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Удалите текст после тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;/body&amp;gt;&lt;/span&gt; или перенесите этот тег в конец  текста.&lt;/p&gt;
&lt;h2&gt;Adjacent hyphens within comment&lt;/h2&gt;
&lt;p&gt;Комментарии в коде HTML определяются конструкцией вида &lt;span class=&quot;tag&quot;&gt;&amp;lt;!--  комментарий --&amp;gt;&lt;/span&gt;. Если в тексте комментария подряд идет два и более дефиса,  возникает ошибка.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;!-- Комментарий - заголовок --&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;!--- комментарий ---&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;!-- Комментарий -- тело документа --&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Удалите лишние дефисы.&lt;/p&gt;
&lt;h2&gt;SYSTEM, PUBLIC, W3C, DTD, EN must be upper case&lt;/h2&gt;
&lt;p&gt;Элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; указан неверно, в частности следующие атрибуты необходимо  писать в верхнем регистре: &lt;span class=&quot;attribute&quot;&gt;SYSTEM&lt;/span&gt;, &lt;span class=&quot;attribute&quot;&gt;PUBLIC&lt;/span&gt;, &lt;span class=&quot;attribute&quot;&gt;W3C&lt;/span&gt;, &lt;span class=&quot;attribute&quot;&gt;DTD&lt;/span&gt;, &lt;span class=&quot;attribute&quot;&gt;EN&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt; &lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;!doctype html public &quot;-//w3c//dtd html 4.01 Transitional//en&quot; &quot;http://www.w3.org/TR/html4/loose.dtd&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Пишите &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; корректно.&lt;/p&gt;
&lt;h2&gt;Warning: missing &amp;lt;!DOCTYPE&amp;gt; declaration &lt;/h2&gt;
&lt;p&gt;Не указан элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt;. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;!DOCTYPE  HTML PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot;  &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&amp;gt;&lt;br&gt;
  &amp;lt;html&amp;gt;&lt;br&gt;
  &amp;lt;head&amp;gt;&lt;br&gt;
  &amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&lt;br&gt;
  &amp;lt;/head&amp;gt;&lt;br&gt;
  &amp;lt;body&amp;gt;&lt;br&gt;
  &amp;lt;p&amp;gt;Основной  текст&amp;lt;/p&amp;gt;&lt;br&gt;
  &amp;lt;/body&amp;gt;&lt;br&gt;
  &amp;lt;/html&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;html&amp;gt;&lt;br&gt;
  &amp;lt;head&amp;gt;&lt;br&gt;
  &amp;lt;title&amp;gt;Untitled  Document&amp;lt;/title&amp;gt;&lt;br&gt;
  &amp;lt;/head&amp;gt;&lt;br&gt;
  &amp;lt;body&amp;gt;&lt;br&gt;
  &amp;lt;/body&amp;gt;&lt;br&gt;
  &amp;lt;/html&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Поместите элемент &lt;span class=&quot;tag&quot;&gt;&amp;lt;!DOCTYPE&amp;gt;&lt;/span&gt; в самую первую строку кода  документа.&lt;/p&gt;
&lt;h2&gt;Too much &amp;lt;...&amp;gt;-elements &lt;/h2&gt;
&lt;p&gt;Повторяется тег, который в коде должен быть только один. К  таким тегам относится &lt;span class=&quot;tag&quot;&gt;&amp;lt;html&amp;gt;&lt;/span&gt;,  &lt;span class=&quot;tag&quot;&gt;&amp;lt;head&amp;gt;&lt;/span&gt;, &lt;span class=&quot;tag&quot;&gt;&amp;lt;title&amp;gt;&lt;/span&gt; и &lt;span class=&quot;tag&quot;&gt;&amp;lt;body&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;head&amp;gt;&lt;br&gt;
  &amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&lt;br&gt;
  &amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;head&amp;gt;&lt;br&gt;
  &amp;lt;title&amp;gt;Заголовок&amp;lt;/title&amp;gt;&lt;br&gt;
  &amp;lt;title&amp;gt;Название статьи&amp;lt;/title&amp;gt;&lt;br&gt;
  &amp;lt;/head&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Удалите повторяющийся тег.&lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; inserting &quot;...&quot; attribute &lt;/h2&gt;
&lt;p&gt;Не указан обязательный атрибут для данного тега. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;style  type=&quot;text/css&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;style&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Проверьте тег и добавьте недостающие атрибуты.&lt;/p&gt;
&lt;h2&gt;... attribute ... lacks value &lt;/h2&gt;
&lt;p&gt;Атрибут тега не содержит обязательное значение или оно  написано с синтаксической ошибкой. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;a href=&quot;link.html&quot;&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;a href&amp;gt;Ссылка&amp;lt;/a&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Проверьте атрибуты тега и добавьте недостающие значения.&lt;/p&gt;
&lt;h2&gt;... attribute &quot;...&quot; has invalid value &quot;...&quot;&lt;/h2&gt;
&lt;p&gt;Атрибут содержит  некорректное значение. Ошибка проявляется в тех случаях, когда в значении  вместо текста пишется число и наоборот. Так, атрибуты &lt;span class=&quot;attribute&quot;&gt;id&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; должны  начинаться с символа ([A-Za-z]) и могут содержать цифры ([0-9]), дефис (-),  подчеркивание (_), двоеточие (:) и точку (.). Значение ширины и высоты в  атрибутах тегов не должно содержать ничего, кроме цифр ([0-9]) и процентов (%).&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;div id=&quot;layer1&quot;&amp;gt;Слой 1&amp;lt;/div&amp;gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;img src=&quot;images/pic.gif&quot;  width=&quot;200&quot; height=&quot;120&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;div id=&quot;2layer&quot;&amp;gt;Слой 2&amp;lt;/div&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;img src=&quot;images/pic.gif&quot;  width=&quot;200px&quot; height=&quot;120px&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Проверьте атрибут тега и измените его значение.&lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; missing &amp;gt; for end of tag &lt;/h2&gt;
&lt;p&gt;Ошибка может возникать  в двух случаях: некорректно написан тег, что происходит, когда забыли добавить  закрывающую скобку и применение &lt;span class=&quot;tag&quot;&gt;&amp;gt;&lt;/span&gt; вместо использования спецсимвола.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;Пример текста&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;Для случая 0&amp;amp;lt;p рассмотрим  следующий пример.&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p Пример текста&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;Для случая 0&amp;lt;p рассмотрим  следующий пример.&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Вставьте отсутствующую закрывающую скобку.&lt;br&gt;
  Замените &lt;span class=&quot;attribute&quot;&gt;&amp;lt;&lt;/span&gt; на &lt;span class=&quot;attribute&quot;&gt;&amp;amp;lt;&lt;/span&gt;.&lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; proprietary attribute &quot;...&quot;&lt;/h2&gt;
&lt;p&gt;Тег содержит атрибут, специфичный только для браузера Internet Explorer или другого и не входящий в спецификацию. Примером является атрибут &lt;span class=&quot;attribute&quot;&gt;height&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;table&amp;gt;&lt;/span&gt;.&lt;/p&gt;
&lt;p&gt;  Список всех атрибутов, входящих в спецификацию HTML приведен по адресу &lt;a href=&quot;http://www.w3.org/TR/html4/index/attributes.html&quot; title=&quot;http://www.w3.org/TR/html4/index/attributes.html&quot;&gt;http://www.w3.org/TR/html4/index/attributes.html&lt;/a&gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;table style=&quot;height: 100%&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;table height=&quot;100%&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Список  наиболее характерных атрибутов тегов приведен в табл.&amp;nbsp;14.1.&lt;/p&gt;
&lt;table class=&quot;data&quot;&gt;
&lt;caption&gt;Табл.  14.1. Замена нестандартных атрибутов тегов&lt;/caption&gt;
  &lt;tbody&gt;&lt;tr&gt;
    &lt;th&gt;Тег&lt;/th&gt;
    &lt;th&gt;Устаревший атрибут&lt;/th&gt;
    &lt;th&gt;Стандартный атрибут&lt;/th&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;body&amp;gt;&lt;/td&gt;
    &lt;td&gt;marginwidth=0, marginheight=0, leftmargin=0, topmargin=0&lt;/td&gt;
    &lt;td&gt;style=&quot;margin: 0&quot;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;table&amp;gt;&lt;/td&gt;
    &lt;td&gt;height=100%&lt;/td&gt;
    &lt;td&gt;style=&quot;height: 100%&quot;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;table&amp;gt;&lt;/td&gt;
    &lt;td&gt;nowrap&lt;/td&gt;
    &lt;td&gt;style=&quot;white-space:    nowrap&quot; или &lt;br&gt;
      &amp;lt;td nowrap&amp;gt;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;&amp;lt;td&amp;gt;&lt;/td&gt;
    &lt;td&gt;background=&quot;abc.gif&quot;&lt;/td&gt;
    &lt;td&gt;style=&quot;background-image:url(abc.gif)&quot;&lt;/td&gt;
  &lt;/tr&gt;
&lt;/tbody&gt;&lt;/table&gt;
&lt;h2&gt;... proprietary attribute value &quot;...&quot;&lt;/h2&gt;
&lt;p&gt;Значение атрибута не входит в спецификацию HTML и  является специфичным для браузера Internet Explorer или другого. Например, значение  &lt;span class=&quot;attribute&quot;&gt;align=&quot;absmiddle&quot;&lt;/span&gt; тега &lt;span class=&quot;tag&quot;&gt;&amp;lt;img&amp;gt;&lt;/span&gt; недопустимо.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;img src=&quot;hello.gif&quot; alt=&quot;Привет&quot; align=&quot;middle&quot;&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;img src=&quot;hello.gif&quot; alt=&quot;Привет&quot; style=&quot;vertical-align:  middle&quot;&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;img src=&quot;hello.gif&quot; alt=&quot;Привет&quot; align=&quot;absmiddle&quot;&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;Решение&lt;/h3&gt;
&lt;p&gt;Используйте стандартные значения атрибутов тегов или  используйте стилевой эквивалент.&lt;/p&gt;
&lt;h2&gt;... dropping value &quot;...&quot; for repeated attribute  &quot;...&quot;&lt;/h2&gt;
&lt;p&gt;Атрибут применяется в теге больше одного раза.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;img src=&quot;image.jpg&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;img src=&quot;image.jpg&quot;  src=&quot;image.jpg&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Удалите повторяющийся атрибут.&lt;/p&gt;
&lt;h2&gt;... unexpected or duplicate quote mark &lt;/h2&gt;
&lt;p&gt;Отсутствует открывающая или закрывающая кавычка в  атрибуте тега.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;img src=&quot;image.jpg&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;img src=image.jpg&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте парную кавычку к значению атрибута.&lt;/p&gt;
&lt;h2&gt;... attribute with missing trailing quote mark&lt;/h2&gt;
&lt;p&gt;Тег содержит атрибут, в котором задано неверное  количество кавычек.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p id=&quot;my_id&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p id=&quot;my_id&quot;&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте или удалите одну из кавычек.&lt;/p&gt;
&lt;h2&gt;... id and name attribute value mismatch&lt;/h2&gt;
&lt;p&gt;Ошибка возникает, когда значения атрибутов &lt;span class=&quot;attribute&quot;&gt;id&lt;/span&gt; и &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; не  совпадают между собой, что приводит к конфликту при обращении к свойствам  элемента через скрипты. &lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;a name=&quot;elm&quot; id=&quot;elm&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;a id=&quot;elm&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;a name=&quot;abcdef&quot; id=&quot;db1&quot;&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение &lt;/h3&gt;
&lt;p&gt;  Удалите один из атрибутов или сделайте значения атрибутов  &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; и  &lt;span class=&quot;attribute&quot;&gt;id&lt;/span&gt; одинаковыми. &lt;/p&gt;
&lt;h2&gt;Notice: replacing &amp;lt;...&amp;gt; by &amp;lt;...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Ошибка возникает в следующих случаях:&lt;/p&gt;
&lt;ul&gt;
  &lt;li&gt;  неверный порядок тегов;&lt;/li&gt;
  &lt;li&gt; добавлен лишний закрывающий тег;&lt;/li&gt;
  &lt;li&gt; имеется открывающий тег без наличия обязательного  закрывающего.&lt;/li&gt;
&lt;/ul&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;p&amp;gt;Текст&amp;lt;/p&amp;gt;&amp;lt;br&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;Текст&amp;lt;/p&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;p&amp;gt;abc&amp;lt;br&amp;gt;&amp;lt;table&amp;gt;...&amp;lt;/table&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Измените порядок тегов или удалите один из открывающих или  закрывающих тегов.&lt;/p&gt;
&lt;h2&gt;... anchor &quot;...&quot; already defined&lt;/h2&gt;
&lt;p&gt;Значения атрибута &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; у различных тегов совпадает между собой. Значение &lt;span class=&quot;attribute&quot;&gt;name&lt;/span&gt; должно быть уникальным.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;form name=&quot;my_form1&quot; action=&quot;test1.php&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;br&gt;
  &amp;lt;form  name=&quot;my_form2&quot; action=&quot;test2.php&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;form name=&quot;my_form&quot; action=&quot;test1.php&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;br&gt;
  &amp;lt;form name=&quot;my_form&quot;  action=&quot;test2.php&quot;&amp;gt;&amp;lt;/form&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Выберите другое имя или измените предыдущие имена таким  образом, чтобы они не совпадали.&lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; is probably intended as &amp;lt;/...&amp;gt;&lt;/h2&gt;
&lt;p&gt;Тег повторяется дважды в коде HTML, тогда как подобный тег не должен содержать  сам себя.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;em&amp;gt;Привет, мир!&amp;lt;/em&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;em&amp;gt;Привет&amp;lt;em&amp;gt;,  мир!&amp;lt;/em&amp;gt;&amp;lt;/em&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Удалите один из тегов.&lt;/p&gt;
&lt;h2&gt;&amp;lt;...&amp;gt; lacks &quot;...&quot; attribute &lt;/h2&gt;
&lt;p&gt;Требуется обязательный атрибут тега, который, тем не  менее, отсутствует.&lt;/p&gt;
&lt;p class=&quot;ok&quot;&gt;&amp;lt;form action=&quot;my_action.php&quot;&amp;gt;&lt;/p&gt;
&lt;p class=&quot;error&quot;&gt;&amp;lt;form&amp;gt;&lt;/p&gt;
&lt;h3&gt;  Решение&lt;/h3&gt;
&lt;p&gt;  Добавьте недостающий атрибут к тегу.&lt;/p&gt;&lt;/div&gt;',
        'created_at' => '2018-07-04 23:13:32',
        'updated_at' => '2018-07-08 21:20:39',
        'status' => 'published',
        'article_group_id' => '16',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => null,
        'alias_id' => null,
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('title', '{{%article}}');
        $this->dropIndex('status', '{{%article}}');
        $this->dropIndex('date_added', '{{%article}}');
        $this->dropIndex('date_update', '{{%article}}');
        $this->dropIndex('article_group_id', '{{%article}}');
        $this->dropIndex('language_id', '{{%article}}');
        $this->dropIndex('alias_id', '{{%article}}');
        $this->dropIndex('difficult_id', '{{%article}}');
        $this->dropTable('{{%article}}');
    }
}
