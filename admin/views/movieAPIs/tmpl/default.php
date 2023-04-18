<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_movieAPI
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_movieAPI&view=movieAPIs" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
<!--			<th width="1%">--><?php //echo JText::_('COM_MOVIEAPI_NUM'); ?><!--</th>-->
<!--			<th width="2%">-->
<!--				--><?php //echo JHtml::_('grid.checkall'); ?>
<!--			</th>-->
<!--			<th width="90%">-->
<!--				--><?php //echo JText::_('COM_MOVIEAPI_MOVIEAPIS_NAME') ;?>
<!--			</th>-->
<!--			<th width="5%">-->
<!--				--><?php //echo JText::_('COM_MOVIEAPI_PUBLISHED'); ?>
<!--			</th>-->
			<th width="2%">
				<?php echo JText::_('COM_MOVIEAPI_ID'); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="2%">
				<?php echo " URL"; ?>
			</th>
			<th width="2%">
				<?php echo "Key"; ?>
			</th>

		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_movieAPI&task=movieAPI.edit&id=' . $row->id);
				?>
					<tr>
						<td><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_MOVIEAPI_EDIT_MOVIEAPI'); ?>">
								<?php echo $row->url; ?>
							</a>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_MOVIEAPI_EDIT_MOVIEAPI'); ?>">
								<?php echo $row->key; ?>
							</a>
						</td>
<!--						<td align="center">-->
<!--							--><?php //echo JHtml::_('jgrid.published', $row->key, $i, 'movieAPIs.', true, 'cb'); ?>
<!--						</td>-->
<!--						<td align="center">-->
<!--							--><?php //echo $row->id; ?>
<!--						</td>-->
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>