<style>
 .error-message {
    color:red;
    font-size;smaller;
    font-weight:bold;
 }
</style>
<h1>Databaseサンプル</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'addRecord']]) ?>
<fieldset>
<?=$this->Form->input("name",['type'=>'text', 'label' => '名前']) ?>
<?=$this->Form->label('タイトル');?>
<?=$this->Form->text("title") ?>
<div class="error"><?=$this->Form->error('title') ?></div>
<?=$this->Form->input("content") ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>
