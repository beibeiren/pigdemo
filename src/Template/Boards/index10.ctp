<h1>Databaseサンプル</h1>
<?=$this->Form->create(null ,['url'=>['action'=>'index10']]) ?>
<fieldset>
<?=$this->Form->text("name") ?>
</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>
<p>data: <?=$data ?></p>

