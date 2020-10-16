{if $comments}
    {foreach from=$comments item=element}
        <div class="module-item-wrapper-grid">
            <div class="module-container">
                {$element.comment} | {$element.firstname}
            </div>
        </div>
    {/foreach}
{/if}


{if $messageResult }
<div class="alert alert-success" role="alert">
    <p class="alert-text">
        Thanks for the review!
    </p>
</div>
{else}
    <div class="alert alert-danger" role="alert">
        <p class="alert-text">
            <i class="material-icons">error_outline</i>Something went wrong!
        </p>
    </div>
{/if}

<form action="" method="post">
    <fieldset class="form-group">
        <label class="form-control-label" for="exampleInput1">Type your message</label>
        <textarea required name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
    </fieldset>
    <br>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>