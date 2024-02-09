<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ammenity $ammenity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ammenity'), ['action' => 'edit', $ammenity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ammenity'), ['action' => 'delete', $ammenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ammenity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ammenities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ammenity'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ammenities view content">
            <h3><?= h($ammenity->ammenity) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ammenity') ?></th>
                    <td><?= h($ammenity->ammenity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ammenity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($ammenity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($ammenity->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Properties') ?></h4>
                <?php if (!empty($ammenity->properties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Baths') ?></th>
                            <th><?= __('Beds') ?></th>
                            <th><?= __('Sqft') ?></th>
                            <th><?= __('Acres') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ammenity->properties as $properties) : ?>
                        <tr>
                            <td><?= h($properties->id) ?></td>
                            <td><?= h($properties->name) ?></td>
                            <td><?= h($properties->description) ?></td>
                            <td><?= h($properties->price) ?></td>
                            <td><?= h($properties->baths) ?></td>
                            <td><?= h($properties->beds) ?></td>
                            <td><?= h($properties->sqft) ?></td>
                            <td><?= h($properties->acres) ?></td>
                            <td><?= h($properties->active) ?></td>
                            <td><?= h($properties->created) ?></td>
                            <td><?= h($properties->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
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
