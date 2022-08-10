<?php

class CreateErorr
{
    public function CreateErorr($title, $description, $close_btn)
    {
?>

        <div class="alert alert-danger" role="alert" bis_skin_checked="1">
            <?php if (!empty($title)) { ?>
                <strong><?php echo $title; ?> <?php if (!empty($description)) { ?>
                        <br><?php echo $description; ?>
                    <?php } ?>
                </strong>
            <?php } ?>
            <?php if ($close_btn == true) { ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="icon-close" aria-hidden="true"></span>
                </button>
            <?php } ?>
        </div>

<?php
    }
}
