<h1>Databaseサンプル</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'index3']]) ?>

<fieldset>
<?=$this->Form->text("name") ?>
</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>

<hr>

<table>

            <tr>
                <th>id</th>
                <th>NAME</th>
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