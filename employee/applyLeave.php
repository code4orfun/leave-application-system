<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/footer.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/models/leave.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/supports/model.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/db-connection.php'
?>
<html>
<section class="container">
    <div class="row justify-content-center h-75 align-items-center">
        <div class="col-md-7 border shadow-sm p-3 mb-5 bg-white rounded">
            <form method="post" action="/actions.php?action=apply for leave">
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Message</label>
                    <textarea id="text" name="message" row="10" col="500" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
</html>

<?php


