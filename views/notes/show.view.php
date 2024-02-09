<?php
require "/Programs/xampp/htdocs/notesApp/views/Partials/head.php";
require "/Programs/xampp/htdocs/notesApp/views/Partials/nav.php";
?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $heading?></h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($note['body']) ?></p>
        <p class = "mt-6 text-blue-500 hover:underline">
          <a href="/index.php/notes">Go back to notes</a>
        </p>
        <form method='POST' action='' class='mt-6'>
          <!-- with the input tag we get the note id to pass to the target page for validation
          To evalute if the user is authorized to delete it -->
          <input type='hidden' name='_method' value='DELETE'>
          <input type= 'hidden' name='id' value="<?=$note['id']?>">
          <button type='submit' class = 'text-red-500 text-sm'>Delete</button>
        </form>
    </div>
  </main>
</div>
<?php

require "/Programs/xampp/htdocs/notesApp/views/Partials/foot.php";
?>