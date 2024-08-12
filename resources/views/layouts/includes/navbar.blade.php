<?php
?>

<a href="#" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i> Users </a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Products </a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-desktop"></i> Cashier </a>
<a href="{{ route('orderAdmin.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i> Order List </a>
<a href="{{ route('logout') }}" class="btn btn-outline rounded-pill"><i class="fa fa-chart"></i>Logout</a>

<style>
    .btn-outline{
        border-color: #873600;
        color: #873600;
        margin: 5px;
    }

    .btn-outline:hover{
        background: #873600;
        color: #ffffff;
    }

</style>

