<footer class="footer">
  <nav class="items">
    <dl class="list row">
      <div class="column">
        <dt>About Me</dt>
        <dd>
          <p><?= $author_fullname ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
          <p><a href="about">All about <?= $author_shortname ?></a></p>
        <dd>
      </div>
      <div class="column">
        <dt>Follow Me</dt>
        <dd>
          <ul>
            <li><a href="<?= $author_github ?>">Github</a></li>
            <li><a href="<?= $author_packagist ?>">Packagist</a></li>
            <li><a href="<?= $author_npmjs ?>">NPM</a></li>
            <li><a href="<?= $author_linkedin ?>">LinkedIn</a></li>
            <li><a href="<?= $author_twitter ?>">Twitter</a></li>
            <li><a href="<?= $author_whatsapp ?>">WhatsApp</a></li>
            <li><a href="<?= $author_youtube ?>">Youtube</a></li>
            <li><a href="<?= $author_facebook ?>">Facebook</a></li>
            <li><a href="<?= $author_instagram ?>">Instagram</a></li>
            <li><a href="<?= $author_pinterest ?>">Pinterest</a></li>
          </ul>
        <dd>
      </div>
      <div class="column">
        <dt>Contact Me</dt>
        <dd>
          <form action="contact" method="POST">
            <input class="entry" type="email" name="address" placeholder="Type your address" required/>
            <input class="entry" type="text" name="subject" placeholder="Type your subject" required/>
            <textarea class="entry" name="compose" placeholder="Compose email&hellip;"></textarea>
            <button class="button" name="send" type="submit" value="ok">Send mail</button>
          </form>
        <dd>
      </div>
    </dl>
  </nav>
  <p class="copyright content centered"><a class="link" title="Copyright" href="copyright"><?= $app_name . ' &copy; ' . (date('Y') > 2021 ? 2021 . ' - ' . date('Y') : 2021) ?></a> <?= $author_fullname ?> &mdash; All right reserved</p>
</footer>
