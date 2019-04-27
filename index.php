<?php

require 'bootstrap.php';

$repo = $entityManager->getRepository('Rate');

$end = array_pop($repo->findAll());

$time = time();

if (empty($end) || ($time - 86400) > $end->timeStamp) {
    $rate = new Rate;
    $curl = $rate->getInfo('https://api.exchangeratesapi.io/latest?base=USD');
    $rate->setRate(json_encode($curl['rates']));
    $rate->setTimeStamp($time);
    $entityManager->persist($rate);
    $entityManager->flush();
}
?>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<?php if (!empty($end)) { ?>
    USD <input class="number" type="number"> to <select>
        <?php foreach (json_decode($end->rate, true) as $key => $item) { ?>
            <option value="<?= $item ?>"><?= $key ?></option>
        <?php } ?>
    </select>
    <button id="change">Convert</button>
    <div class="result"></div>
<?php } ?>
