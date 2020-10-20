<?php
/**
 * @var int     $counterId
 * @var array   $counterParams
 */
?>
<!-- Yandex.Metrika counter -->
<script src="//mc.yandex.ru/metrika/watch.js"></script>
<script>
    try {
        var yaCounter<?= $counterId ?> = new Ya.Metrika(<?=\yii\helpers\Json::encode($counterParams)?>);
    } catch (e) {
    }
</script>
<!-- /Yandex.Metrika counter -->
