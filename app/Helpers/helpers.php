<?php

use App\Models\User;
use App\Models\Category;

function getBuyerName($buyer_id)
{
    $user = User::find($buyer_id);
    return $user->login;
}

function getSellerName($seller_id)
{
    $user = User::find($seller_id);
    return $user->login;
}

function getCategoryName($category_id)
{
    $category = Category::find($category_id);
    return $category->name;
}

function getCategories()
{
    return Category::all();
}
