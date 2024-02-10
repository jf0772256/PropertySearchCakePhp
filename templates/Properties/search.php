<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */


?>
<div class="properties index content">
    <?php //= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Properties') ?></h3>

    <style>
        /*
            making room for the side filter section
        */
        .container
        {
            max-width: 150rem;
        }

        /*
            I didnt like the default red button... I couldn't find an easy way to do it without creating custom configurations
        */
        form>button[type=submit]
        {
            background: #2f85ae;
            border-color: #2f85ae;
            margin-right: 1rem;
        }
        form>button[type=submit]:hover
        {
            background: #2a6496;
            border-color: #2a6496;
            margin-right: 1rem;
        }
    </style>

    <div class="row">
        <div class="column column-20" style="border-right:1px solid #808080">
            <h5>Filter properties</h5>
            <?php
                // this is the search / filter form code being laid out on the page... it's a post to the properties controller search method.
                echo $this->Form->create($searchForm);
                echo $this->Form->control('beds', ['type'=>'select', 'options'=>['Select Beds','1 bed','2 beds','3 beds','4 beds','5 beds','6+ beds']]);
                echo $this->Form->control('baths',['type' => 'select', 'options'=>['Select Baths','1 bath','2 baths','3 baths','4 baths','5 baths','6+ baths']]);
                echo $this->Form->control('price',['type' => 'select', 'options'=>[''=>'Select Price Range','<200k'=>'under 200k', '200k-500k'=>'200k-500k', '500k-1m'=>'500k-1m', '>=1m'=>'>1 mil']]);
                echo $this->Form->button('Apply Filters');
                echo $this->Form->end();
            ?>
        </div>
        <div class="column">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('street_address') ?></th>
                        <th><?= $this->Paginator->sort('city') ?></th>
                        <th><?= $this->Paginator->sort('state') ?></th>
                        <th><?= $this->Paginator->sort('postal_code') ?></th>
                        <th><?= $this->Paginator->sort('price') ?></th>
                        <th><?= $this->Paginator->sort('baths') ?></th>
                        <th><?= $this->Paginator->sort('beds') ?></th>
                        <th><?= $this->Paginator->sort('sqft') ?></th>
                        <th><?= $this->Paginator->sort('acres') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?= h($property->name) ?></td>
                            <td><?= h($property->street_address) ?></td>
                            <td><?= h($property->city) ?></td>
                            <td><?= h($property->state) ?></td>
                            <td><?= h($property->postal_code) ?></td>
                            <td>$<?= $this->Number->format($property->price) ?></td>
                            <td><?= $this->Number->format($property->baths) ?></td>
                            <td><?= $this->Number->format($property->beds) ?></td>
                            <td><?= $this->Number->format($property->sqft) ?></td>
                            <td><?= $this->Number->format($property->acres) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
    </div>
</div>
