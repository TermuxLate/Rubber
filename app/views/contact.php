<?php
declare(strict_types=1);
$title = 'Contact';
?>
<section class="content-block">
  <div class="container">
    <h1>Contact</h1>
    <form method="post" action="#" class="contact-form" onsubmit="alert('Wire this up to a PHP handler.'); return false;">
      <div class="grid">
        <label>
          <span>Name</span>
          <input type="text" name="name" required />
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email" required />
        </label>
      </div>
      <label>
        <span>Message</span>
        <textarea name="message" rows="5" required></textarea>
      </label>
      <button type="submit">Send</button>
    </form>
  </div>
</section>