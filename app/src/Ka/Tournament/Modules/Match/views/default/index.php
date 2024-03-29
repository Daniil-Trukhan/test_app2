<?php
declare(strict_types=1);

/**
 * @var MatchResultInterface[] $matchResults
 * @var \yii\web\View $this
 */

use Ka\Tournament\Modules\Common\Interfaces\Match\Models\MatchResultInterface;

?>

<div class="match-default-index">
    <h1>All Matches</h1>

    <?= $this->render('parts/match-details', ['matchResults' => $matchResults]); ?>

</div>
