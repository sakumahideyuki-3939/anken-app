<style>
  /* ヘッダー強制固定スタイル */
  .algo-header-fixed {
    width: 100%;
    height: 100px;
    background: #fff;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 9999;
  }
  .algo-header-fixed__inner {
    width: 1920px;
    padding: 0 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .algo-header-fixed__logo a {
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 0.4em;
    color: #2f2f2f;
    text-decoration: none;
  }
  .algo-header-fixed__nav ul {
    display: flex;
    list-style: none;
    gap: 40px;
    margin: 0;
    padding: 0;
  }
  .algo-header-fixed__nav a {
    font-size: 11px;
    letter-spacing: 0.2em;
    color: #2f2f2f;
    text-decoration: none;
  }
  .nav-contact-btn {
    border: 1px solid #2f2f2f;
    padding: 8px 16px;
  }
  @media (max-width: 959px) {
    .algo-header-fixed { height: auto; }
    .algo-header-fixed__inner { flex-direction: column; padding: 20px; width: 100%; }
    .algo-header-fixed__nav ul { gap: 15px; flex-wrap: wrap; justify-content: center; margin-top: 15px; }
  }
</style>

<header class="algo-header-fixed">
  <div class="algo-header-fixed__inner">
    <div class="algo-header-fixed__logo">
      <a href="index.php">ALGO Inc.</a>
    </div>
    <nav class="algo-header-fixed__nav">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="company.php">COMPANY</a></li>
        <li><a href="work.php">WORK</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php" class="nav-contact-btn">CONTACT</a></li>
      </ul>
    </nav>
  </div>
</header>