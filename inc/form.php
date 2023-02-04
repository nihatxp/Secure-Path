<form class="search-box" action="" method="POST" id='form'>
    <button style="background: none; border: none; padding: 0"><span style="font-size: 30px; vertical-align: -1px; color: #9B9B9B" class="material-symbols-outlined">search</span></button>
    <input style="vertical-align: 4px; width: 255px;" type="text" name="url" value="<?php echo isset($_POST['url']) ? $_POST['url'] : "https://avatars.githubusercontent.com/u/87497469" ?>" placeholder="Resim URL" id="search-input" value="">
</form>