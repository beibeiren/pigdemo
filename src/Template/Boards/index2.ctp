<h1>Databaseサンプル</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'index2']]) ?>
<fieldset>
<!-- <?=$this->Form->text("name") ?>
<?=$this->Form->text("title") ?>
<?=$this->Form->textarea("content") ?>-->

<?=$this->Form->text("id") ?>

</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>

<hr>

<table>

            <tr>
                <th>id</th>
                <th>name</th>
                <th>TITLE</th>
                <th>CONTENT</th>
            </tr>

            <?php
            $arr = $data->toArray();
            for($i = 0;$i < count($arr);$i++){
            echo $this->Html->tableCells(
               $arr[$i]->toArray(),
               ['style'=>'background-color:#f0f0f0'],
               ['style'=>'font-weight:bold'],
               true);
            }

            ?>
</table>

