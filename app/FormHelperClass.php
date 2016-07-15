<?php
//
//if (!function_exists('delete_form')){
//    function delete_form($method, $action){
//        $form = <<<FORM
//        <form method="$method" action="$action" style="display:inline">
//        <input type="submit" class="btn btn-danger btn-xs" title="Delete Member" onclick="return confirm("Confirm delete?")" />
//        </form>
//FORM;
//        return $form;
//    }
//}

namespace App;

class FormHelperClass
{
    public static function delete_form($method, $action, $text = "Member")
    {
        $token = csrf_field();
        $action = url($action);
        $form = <<<FORM
        <form method="POST" action="$action" accept-charset="UTF-8" style="display:inline">
        <input name="_method" type="hidden" value="$method">
        $token
        <button type="submit" class="btn btn-danger btn-xs" title="Delete $text" onclick="return confirm('Confirm delete?')" />
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
        </form>
FORM;
        return $form;
    }

    public static function block_form($method, $action, $text = "Member")
    {
        $token = csrf_field();
        $action = url($action);
        $form = <<<FORM
        <form method="POST" action="$action" accept-charset="UTF-8" style="display:inline">
        <input name="_method" type="hidden" value="$method">
        $token
        <input class="hidden" name="block" type="text" value="1">
        <button type="submit" class="btn btn-warning btn-xs" title="Block $text" onclick="return confirm('Confirm block?')" />
            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
        </button>
        </form>
FORM;
        return $form;
    }

    public static function un_block_form($method, $action, $text = "Member")
    {
        $token = csrf_field();
        $action = url($action);
        $form = <<<FORM
        <form method="POST" action="$action" accept-charset="UTF-8" style="display:inline">
        <input name="_method" type="hidden" value="$method">
        $token
        <input class="hidden" name="restore" type="text" value="1">
        <button type="submit" class="btn btn-info btn-xs" title="Restore $text" onclick="return confirm('Confirm restore?')" />
            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
        </button>
        </form>
FORM;
        return $form;
    }

    public static function post_count($forum_posts)
    {
        $count = 0;

        if ($forum_posts->count() == 0) {
            return 0;
        }

        foreach ($forum_posts as $forum_post) {
            $count += $forum_post->forumPosts->count();
        }

        return $count;
    }

    public static function last_post($forum_posts)
    {
        $last_post = null;

        if ($forum_posts->count() == 0) {
            return 0;
        }

        foreach ($forum_posts as $forum_post) {

            if ($forum_post->forumPosts->count() == 0) {
                return 0;
            }


            if (is_null($last_post)) {
                $last_post = $forum_post->forumPosts()->orderBy('created_at', 'desc')->first();
            } else {
                $newDate = $forum_post->forumPosts()->orderBy('created_at', 'desc')->first();
                if ($last_post->created_at->diffInMinutes($newDate->created_at) > 0) {
                    $last_post = $newDate;
                }
            }
        }

        return $last_post;
    }
}