<?php
/**
 * Created by PhpStorm.
 * HouseListing
 * By: Olamiposi
 * 12/07/2020
 * 2020
 **/
?>

@if($errors->any())

    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
