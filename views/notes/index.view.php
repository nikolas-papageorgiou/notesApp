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
      <?php foreach($notes as $note):?>
        <ul>
        <li>
          <a href="/index.php/note?id=<?= $note['id']?>" class='text-blue-500 hover:underline'>
          <!--With htmlspecialchars we catch XSS attacks. --> 
          <?= htmlspecialchars($note['body']) ?></a>
        </li>
        <?php endforeach;?>
      </ul>

      <p class='mt-6'>
        <a href="/index.php/notes/create" class='text-blue-500 hover:underline '>Create Note</a>
      </p>
    </div>

  </main>
</div>
<?php

require "/Programs/xampp/htdocs/notesApp/views/Partials/foot.php";
?>