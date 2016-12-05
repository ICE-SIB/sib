<?php
echo $this->Html->script('jquery', ['block' => true]);
echo $this->Html->script('jquery-ui', ['block' => true]);
echo $this->Html->script('autocomplete-scroll', ['block' => true]);
echo $this->Html->css('jquery-ui', ['block' => true]);
?>

<script>
$(function() {
	$(`#${<?= json_encode($tag_id) ?>}`).autocomplete({
		source: <?= json_encode($list) ?>,
		maxShowItems: 5
	});
});
</script>