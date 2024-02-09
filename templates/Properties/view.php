<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="properties view content">
            <h3><?= h($property->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($property->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street Address') ?></th>
                    <td><?= h($property->street_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($property->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($property->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postal Code') ?></th>
                    <td><?= h($property->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($property->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($property->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Baths') ?></th>
                    <td><?= $this->Number->format($property->baths) ?></td>
                </tr>
                <tr>
                    <th><?= __('Beds') ?></th>
                    <td><?= $this->Number->format($property->beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sqft') ?></th>
                    <td><?= $this->Number->format($property->sqft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Acres') ?></th>
                    <td><?= $this->Number->format($property->acres) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($property->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($property->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $property->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($property->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Ammenities') ?></h4>
                <?php if (!empty($property->ammenities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Ammenity') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($property->ammenities as $ammenities) : ?>
                        <tr>
                            <td><?= h($ammenities->id) ?></td>
                            <td><?= h($ammenities->ammenity) ?></td>
                            <td><?= h($ammenities->created) ?></td>
                            <td><?= h($ammenities->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ammenities', 'action' => 'view', $ammenities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ammenities', 'action' => 'edit', $ammenities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ammenities', 'action' => 'delete', $ammenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ammenities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
