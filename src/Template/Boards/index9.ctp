<?=$this->Form->create($entity,['url'=>['action'=>'editRecord']]) ?>

<fieldset>
<p><?='ID = ' . $entity->id ?></p>
<?=$this->Form->hidden("id") ?>
<?=$this->Form->text("name") ?>
<?=$this->Form->text("title") ?>
<?=$this->Form->textarea("content") ?>

</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>