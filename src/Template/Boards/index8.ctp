<?=$this->Form->create($entity,['url'=>['action'=>'delRecord']]) ?>

<fieldset>
<?=$this->Form->text("id") ?>
</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>