<footer class="footer">
  <p class="content centered"><a href="home"><img src="icon.png" alt="icon" width="48px" height="48px" style="padding:4px;border-radius:50%;object-fit:cover;"/></a></p>
  <nav class="items">
    <dl class="list box">
      <div class="column">
        <dt>About Me<span class="underline"></span></dt>
        <dd class="about">
          <p><?= $author_fullname ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
          <p><a href="about">All about <?= $author_shortname ?></a></p>
        <dd>
      </div>
      <div class="column">
        <dt>Follow Me<span class="underline"></span></dt>
        <dd>
          <ul class="list">
            <li class="item"><a class="link" href="<?= $author_github ?>">Github</a></li>
            <li class="item"><a class="link" href="<?= $author_packagist ?>">Packagist</a></li>
            <li class="item"><a class="link" href="<?= $author_npmjs ?>">NPM</a></li>
            <li class="item"><a class="link" href="<?= $author_linkedin ?>">LinkedIn</a></li>
            <li class="item"><a class="link" href="<?= $author_twitter ?>">Twitter</a></li>
            <li class="item"><a class="link" href="<?= $author_whatsapp ?>">WhatsApp</a></li>
            <li class="item"><a class="link" href="<?= $author_youtube ?>">Youtube</a></li>
            <li class="item"><a class="link" href="<?= $author_facebook ?>">Facebook</a></li>
            <li class="item"><a class="link" href="<?= $author_instagram ?>">Instagram</a></li>
            <li class="item"><a class="link" href="<?= $author_pinterest ?>">Pinterest</a></li>
          </ul>
        <dd>
      </div>
      <div class="column">
        <dt>Contact Me<span class="underline"></span></dt>
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
