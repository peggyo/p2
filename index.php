<?php require('includes/calcTip.php'); ?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>My Form</title>
        <meta charset='utf-8' />
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link href='css/p2.css' rel='stylesheet'>
    </head>
    <body>
    <!-- Start Body -->
        <h1>American Tip Calculator</h1>
        <form method='GET'>
        <!-- Start Form -->
          <div class='form-group'>
             <label for='billAmount'>Bill Amount:</label>
             <input name='billAmount' id='billAmount' type='text' value='<?=$billAmount?>'>
             <span class="hint">(Required)</span>
          </div>
          <div class='form-group'>
            <label for='tip'>Tip:</label>
            <select name='tip' id='tip'>
                <option <?php if ($tip == '10') echo 'SELECTED'?> value='10'>Poor (10%)</option>
                <option <?php if ($tip == '15') echo 'SELECTED'?> value='15'>Average (15%)</option>
                <option <?php if ($tip == '18') echo 'SELECTED'?> value='18'>Good (18%)</option>
                <option <?php if ($tip == '20') echo 'SELECTED'?> value='20'>Excellent (20%)</option>
            </select>
          </div>
          <div class='form-group'>
             <label for='round'>Round:</label>
             <input name='round' id='round' type='checkbox'<?php if (($round)) echo 'CHECKED'?>>
          </div>
          <div class='form-group'>
             <label for='divideBy'>Divide By:</label>
             <input name='divideBy' id='divideBy' type='number' min='1' max='100' step='1' value='<?=$divideBy?>' required/>
          </div>
          <input type='submit' value='Calculate' />
          <?php if (!$newTransaction) : ?>
             <?php if (!$pleasePay) : ?>
                <div class='alert alert-warning'>You did not enter a valid amount for the total the bill.</div>
             <?php else : ?>
                <div class='alert alert-success'>The total amount including tip is: <strong>$<?=sanitize($totalBill)?></strong>, or: <strong>$<?=sanitize($pleasePay)?></strong> per person.</div>
             <?php endif; ?>
          <?php endif; ?>
        <!-- End Form -->
        </form>
        <!-- End Body -->
    </body>
</html>
