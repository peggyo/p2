<?php require("includes/calcTip.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Form</title>
        <meta charset="utf-8" />

        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link href='css/p2.css' rel='stylesheet'>

    </head>
    <body>
        <!-- Start Body -->
        <h1>Tip Calculator</h1>
        <form method='GET'>
                <div class="form-group">
                  <label for="billAmount">Bill Amount:</label>
                  <input name="billAmount" type="text" />
                </div>

                <div class="form-group">
                  <label for="tip">Tip:</label>
                  <select name="tip">
                      <option value="10">Poor (10%)</option>
                      <option value="15" selected>Average (15%)</option>
                      <option value="18">Good (18%)</option>
                      <option value="20">Excellent (20%)</option>
                  </select>
                </div>

                <div class="form-group"
                  <label for="round">Round:</label>
                  <input name="round" type="checkbox" checked>
                </div>

                <div class="form-group">
                  <label for="divideBy">Divide By:</label>
                  <input name="divideBy" type="number" min=1 max=16 />
                </div>

                <input type="submit" value="Calculate" />
        </form>
        <!-- End Body -->
    </body>
</html>
